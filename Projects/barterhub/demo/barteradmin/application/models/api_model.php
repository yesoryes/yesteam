<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 29-06-2015
 * Time: 11:12 PM
 */
class api_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
    }

    public function getUserFromSession()
    {
        $install_id = $this->input->get("install_id");
        $ls = $this->input->get("ls");
        $action = $this->input->get("action");

        $status = 0;
        $user_id = 0;
        $msg = "";
        if ($install_id == "") {
            $msg = "Install id missing";
        } else if ($ls == "") {
            $msg = "Login session missing";
        } else if ($action == "") {
            $msg = "Action missing";
        } else {
            $xdts = getDateForDb();
            $muqry = $this->db->query("UPDATE user_devices SET la_date='$xdts' WHERE install_id='$install_id'");

            if ($muqry) {
                $musql = "UPDATE login_log SET la_date='$xdts' WHERE install_id='$install_id' AND login_session='$ls'";
                $mulstatus = $this->db->query($musql);

                if ($mulstatus) {
                    $msql = "SELECT * FROM login_log WHERE install_id='$install_id' AND login_session='$ls' LIMIT 1";
                    $query = $this->db->query($msql);
                    $result = $query->result();

                    if (count($result) > 0) {
                        $status = 1;
                        $user_id = $result[0]->user_id;
                    } else {
                        $msg = "Invalid user";
                    }
                } else {
                    $msg = "Invalid login";
                }
            } else {
                $msg = "Invalid device";
            }
        }

        if ($status == 0) {
            $temp_obj = array();
            $temp_obj['status'] = $status;
            $temp_obj['msg'] = $msg;
            $temp_obj['st'] = getEpoch();
            $result['header'] = $temp_obj;

            header('Content-Type: application/json');
            echo json_encode($result);
            return 0;

        } else {
            return $user_id;
        }
    }

    public function setUserCity($user_id)
    {
        $city_id = $this->input->get("city_id");
        $city_name = $this->input->get("city_name");

        $status = 0;
        $msg = "";

        $query = $this->db->query("UPDATE user_mst SET user_preferred_city= '$city_id' WHERE user_id= '$user_id'");

        if ($query) {
            $status = 1;
            $msg = "Updated successfully";
        }

        $temp_obj['status'] = $status;
        $temp_obj['msg'] = $msg;
        $temp_obj['st'] = getEpoch();
        $result['header'] = $temp_obj;

        return $result;
    }

    public function setPushRegId($user_id, $install_id)
    {
        $reg_id = $this->db->escape($this->input->get('reg_id'));

        $status = 0;
        $msg = "";

        $query = $this->db->query("UPDATE user_devices SET gcm_registration_id= $reg_id,push_notification_id= $reg_id,
                                      ap_push_flag=1
                                      WHERE user_id= '$user_id' AND install_id='$install_id'");
        $this->db->affected_rows();

        if ($query) {
            $status = 1;
            $msg = "Updated successfully";
        }

        $temp_obj['status'] = $status;
        $temp_obj['msg'] = $msg;
        $temp_obj['st'] = getEpoch();
        $result['header'] = $temp_obj;

        return $result;
    }

    public function push_msg_to_user($user_id = 0, $msg = array())
    {
        $message_to_push = $this->db->escape(json_encode($msg));

        $sql = "INSERT INTO gcm_user_msg_log (user_id, msg) VALUES ($user_id, $message_to_push)";
        $this->db->query($sql);
        $msg_id = $this->db->insert_id();
        $msg['msg_id'] = $msg_id;

        $gcm_arr = array();
        $gcm_arr[] = "APA91bG-Z9d9AYqrQR_kpzl7gYUqNuxsTN4lSi2pBv-ws3xo_cyI3Dx7EM30k1_jrfn-radBS36klBMPQCbCNtR9-ZbiodZjdLU2z-KQFjB13bxQpAGqPYI";

        push_msg_to_cloud($gcm_arr);
    }
}