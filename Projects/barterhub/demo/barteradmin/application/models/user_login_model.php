<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 27-06-2015
 * Time: 11:05 PM
 */
class user_login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUserDeviceData($minstall_id)
    {
        $query_str = "SELECT b.user_email,a.* FROM user_devices a
					LEFT JOIN user_mst b ON (a.user_id = b.user_id)
                    WHERE install_id='$minstall_id' LIMIT 1";
        $query = $this->db->query($query_str);
        return $query->result();
    }

    public function isUserRegistered($muser_email)
    {
        $qstr = "SELECT * FROM user_mst WHERE user_email = '$muser_email' AND user_reg_type=1 LIMIT 1";
        $query = $this->db->query($qstr);
        return $result = $query->result();
    }

    public function getUserData($muser_email)
    {
        $query = $this->db->query("SELECT * FROM user_mst WHERE user_email = '$muser_email' LIMIT 1");
        $result = $query->result();
        return $result;
    }

    public function checkUserAndPassword($pass, $muser_email)
    {
        $password = crypt($pass, getSalt());
        $password = $this->db->escape($password);
        $temp_pass = $this->db->escape($pass);
        $muser_email = $this->db->escape($muser_email);

        $query_str = "SELECT * FROM user_mst WHERE user_email = $muser_email and
                        (user_pass=$password OR user_temp_pass=$temp_pass) LIMIT 1";
        $query = $this->db->query($query_str);
        $result = $query->result();
        return $result;
    }

    public function returnCount($muser_email)
    {
        $this->db->select('*')->from('user_mst')->where('user_email', $muser_email);
        $q = $this->db->get();
        return $q->num_rows();

    }


    function createUser($muser)
    {
        $insert_query = 'INSERT INTO user_mst (
            user_email,
            user_fname,
            user_lname,
            user_pass,
            user_sex,
            user_mobile_isd,
            user_mobile_no,
            user_country_code,
            user_tz,
            user_image,
            user_key,
            user_reg_type,
            flag_invited_friends,
            flag_shared,
            flag_active,
            flag_native_signup,
            flag_email_verified,
            flag_dele,
            crea_date,
            crea_ip,
            user_src
            ) VALUES (' .
            "'" . $muser->user_email . "'," .
            "'" . $muser->user_fname . "'," .
            "'" . $muser->user_lname . "'," .
            "'" . $muser->user_pass . "'," .
            "'" . $muser->user_sex . "'," .
            "'" . $muser->user_mobile_isd . "'," .
            "'" . $muser->user_mobile_no . "'," .
            "'" . $muser->user_country_code . "'," .
            "'" . $muser->user_tz . "'," .
            "'" . $muser->user_image . "'," .
            "'" . $muser->user_key . "'," .
            "'" . $muser->user_reg_type . "'," .
            "'" . $muser->flag_invited_friends . "'," .
            "'" . $muser->flag_shared . "'," .
            "'" . $muser->flag_active . "'," .
            "'" . $muser->flag_native_signup . "'," .
            "'" . $muser->flag_email_verified . "'," .
            "'" . $muser->flag_dele . "'," .
            "'" . $muser->crea_date . "'," .
            "'" . $muser->crea_ip . "'," .
            "'" . $muser->user_src . "')";
        $this->db->query($insert_query);
        return $this->db->insert_id();
    }

    public function updateUser($muser, $muser_id)
    {
        $update_query = 'UPDATE user_mst SET ' .
            "user_email = " . "'" . $muser->user_email . "'," .
            "user_fname = " . "'" . $muser->user_fname . "'," .
            "user_lname = " . "'" . $muser->user_lname . "'," .
            "user_pass = " . "'" . $muser->user_pass . "'," .
            "user_sex = " . "'" . $muser->user_sex . "'," .
            "user_mobile_isd = " . "'" . $muser->user_mobile_isd . "'," .
            "user_mobile_no = " . "'" . $muser->user_mobile_no . "'," .
            "user_country_code = " . "'" . $muser->user_country_code . "'," .
            "user_tz = " . "'" . $muser->user_tz . "'," .
            "user_image = " . "'" . $muser->user_image . "'," .
            "user_key = " . "'" . $muser->user_key . "'," .
            "user_reg_type = " . "'" . $muser->user_reg_type . "'," .
            "flag_invited_friends = " . "'" . $muser->flag_invited_friends . "'," .
            "flag_email_verified = " . "'" . $muser->flag_email_verified . "'," .
            "flag_shared = " . "'" . $muser->flag_shared . "'," .
            "flag_active = " . "'" . $muser->flag_active . "'," .
            "flag_dele = " . "'" . $muser->flag_dele . "'," .
            "crea_date = " . "'" . $muser->crea_date . "'," .
            "modi_date = " . "'" . $muser->modi_date . "'," .
            "flag_native_signup = " . "'" . $muser->flag_native_signup . "'," .
            "crea_ip = " . "'" . $muser->crea_ip . "'," .
            "user_src = " . "'" . $muser->user_src . "'" .
            ' WHERE ' . "user_id = " . "'" . $muser_id . "'";
        $update = $this->db->query($update_query);
        $affect = $this->db->affected_rows();
        if ($update) return 1;
        else return 0;
    }

    public function registerDevice($muser)
    {
        $chk_d = $this->checkDevice($muser);
        if (count($chk_d) == 0) {
            $this->insertUserDevice($muser);
        } else {
            $this->updateUserDevice($muser);
        }
    }

    public function checkDevice($muser)
    {
        $mdsql = "SELECT * FROM user_devices WHERE install_id='$muser->install_id' LIMIT 1";
        $query = $this->db->query($mdsql);
        $result = $query->result();
        return $result;
    }

    public function insertUserDevice($muser)
    {
        $xdt = getDateForDb();
        $mdsql = "INSERT INTO user_devices (install_id,user_id,crea_date,os,os_ver) VALUES
                    ('$muser->install_id','$muser->user_id','$xdt','$muser->os','$muser->os_ver')";
        $this->db->query($mdsql);
    }

    private function updateUserDevice($muser)
    {
        $xdt = getDateForDb();
        $mdsql = "UPDATE user_devices SET user_id='$muser->user_id',la_date='$xdt'
                    WHERE install_id='$muser->install_id'";
        $this->db->query($mdsql);
    }

    public function logUserLogin($muser)
    {
        $mrkey = getEpoch() . "-$muser->user_id-" . gen_uuid_v4();
        $ip = getUserIp();
        $mlsql = "INSERT INTO login_log (user_id,user_email,login_session,install_id,login_ip) VALUES
                    ('$muser->user_id','$muser->user_email','$mrkey','$muser->install_id','$ip')";
        $this->db->query($mlsql);
        return $mrkey;
    }

    public function updatePassword($user_id)
    {
        $password = $this->input->get('password', true);
        $password = crypt($password, getSalt());

        $isql = "update user_mst set user_temp_pass='',user_pass='$password' WHERE user_id='$user_id'";

        $update = $this->db->query($isql);
        if ($update) {
            $status = 1;
            $msg = "Password updated successfully.";
        } else {
            $status = 0;
            $msg = "Could not reset you password now, please try again later!";
        }
        $temp_obj['status'] = $status;
        $temp_obj['msg'] = $msg;
        $temp_obj['st'] = getEpoch();

        $temp_body['msg'] = $msg;

        $mresult['header'] = $temp_obj;
        $mresult['body'] = $temp_body;

        return $mresult;
    }

    public function setUserProfileData($user_id)
    {
        $name = $this->db->escape($this->input->get('name', true));
        $phone = $this->db->escape($this->input->get('phone', true));

        $isql = "update user_mst set user_fname=$name,user_mobile_no=$phone WHERE user_id='$user_id'";

        $update = $this->db->query($isql);
        if ($update) {
            $status = 1;
            $msg = "Updated successfully.";
        } else {
            $status = 0;
            $msg = "Could not reset you profile now, please try again later!";
        }
        $temp_obj['status'] = $status;
        $temp_obj['msg'] = $msg;
        $temp_obj['st'] = getEpoch();

        $temp_body['msg'] = $msg;

        $mresult['header'] = $temp_obj;
        $mresult['body'] = $temp_body;

        return $mresult;
    }
}

?>