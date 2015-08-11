<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property  users_model $users_model
 * @property  session $session
 * @property  user_login_model $user_login_model
 * @property  location_model $location_model
 */
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('users_model');
        $this->load->model('user_login_model');
        $this->load->model('location_model');

    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != TRUE) {
            $this->load->view('signin');
        } else {
            $data['users'] = $this->users_model->getUsers();
            $data['flag'] = "users";
            $this->load->view('users_view', $data);
        }
    }

    //get user details page
    public function getdetails($id)
    {
        $data['getUsers'] = $this->users_model->getUserDetail($id);
        $data['getUsersProduct'] = $this->users_model->getUserProduct($id);
        $data['flag'] = "users";
        $this->load->view('users_detail', $data);
    }

    //disable the selected users
    public function disableUser()
    {
        $result = $this->users_model->getDisable();
        if ($result > 0) {
            return 1;
        }
    }

    //send message to selected user
    public function sendMessage()
    {
        $result = $this->users_model->messageSend();
        if ($result > 0) {

            $data['users'] = $this->users_model->getUsers();
            $data['flag'] = "users";
            $this->session->set_flashdata('flashSuccess', 'Message was send successfully');
            redirect('users', 'refresh');
        }
    }

    public function userSignUp()
    {
        //http://www.barterhub.in/demo/barteradmin/users/userSignup?user_email=devishankargru@gmail.com&user_fname=Devishankar&user_lname=R&password=aaaaaa&install_id=devishankar
        $muser_email = $this->input->get('user_email', true);
        $muser_fname = $this->input->get('user_fname', true);
        $muser_lname = $this->input->get('user_lname', true);
        $minstall_id = $this->input->get('install_id', true);
        $password = $this->input->get('password', true);
        $os_Ver = $this->input->get('os_ver', true);
        $flag_android = $this->input->get('flag_android', true);
        $flag_ios = $this->input->get('flag_ios', true);
        $flag_windows = $this->input->get('flag_windows', true);

        $mxdata = $this->user_login_model->isUserRegistered($muser_email);

        $temp_obj = array();
        $mresult = array();
        if (count($mxdata) == 0) {
            $muser = new stdClass();
            $muser->user_email = $muser_email;
            $muser->user_fname = $muser_fname;
            $muser->user_lname = $muser_lname;
            $muser->user_pass = crypt($password, getSalt());
            $muser->user_sex = 0;
            $muser->user_mobile_isd = '';
            $muser->user_mobile_no = '';
            $muser->user_country_code = 'IN';
            $muser->user_currency = '';
            $muser->user_tz = 'UTC';
            $muser->user_image = '';
            $muser->user_key = get_uuid_v4();
            $muser->user_reg_type = 1;
            $muser->flag_native_signup = 1;
            $muser->flag_email_verified = 0;
            $muser->flag_dele = 0;
            $muser->crea_date = getDateForDb();
            $muser->crea_ip = getUserIp();
            $muser->user_src = 'APP';
            $muser->flag_invited_friends = 0;
            $muser->flag_shared = 0;
            $muser->flag_active = 1;
            $muser->os_ver = $os_Ver;
            $muser->install_id = $minstall_id;

            $userData = $this->user_login_model->getUserData($muser_email);
            $new_user = 0;
            if (count($userData) == 0) {
                $muser_id = $this->user_login_model->createUser($muser);
                $new_user = 1;
                $status = 1;
            } else {
                $muser_id = $userData[0]->user_id;
                $muser->user_lname = $userData[0]->user_lname;
                $muser->user_sex = $userData[0]->user_sex;
                $muser->user_mobile_isd = $userData[0]->user_mobile_isd;
                $muser->user_mobile_no = $userData[0]->user_mobile_no;
                $muser->user_country_code = $userData[0]->user_country_code;
                $muser->user_tz = $userData[0]->user_tz;
                $muser->user_image = $userData[0]->user_image;
                $muser->user_key = $userData[0]->user_key;
                $muser->flag_invited_friends = $userData[0]->flag_invited_friends;
                $muser->flag_shared = $userData[0]->flag_shared;
                $muser->flag_active = $userData[0]->flag_active;
                $muser->flag_dele = $userData[0]->flag_dele;
                $muser->crea_date = $userData[0]->crea_date;
                $muser->modi_date = getDateForDb();
                $status = $this->user_login_model->updateUser($muser, $muser_id);
                if ($status == 1) {
                    $new_user = 0;
                }
            }

            if ($muser_id > 0) {
                $muser->user_id = $muser_id;
                $mos = "";
                if ($flag_android == 1) {
                    $mos = "Android";
                } elseif ($flag_ios == 1) {
                    $mos = "IOS";
                } elseif ($flag_windows == 1) {
                    $mos = "Windows";
                }
                $muser->os = $mos;

                $this->user_login_model->registerDevice($muser);
                $ls = $this->user_login_model->logUserLogin($muser);

                $temp_obj['status'] = $status;
                $temp_obj['st'] = getEpoch();
                $temp_obj['msg'] = "Thank you for signing up with Barterhub";
                $body = array();
                $body['new_user'] = $new_user;
                $body['user_id'] = $muser_id;
                $upcity = $this->getUserPreferredArea($muser_id);
                $user_preferred_city = 0;
                $user_preferred_city_name = "";
                if ($upcity) {
                    $user_preferred_city = $upcity->user_preferred_city;
                    $user_preferred_city_name = $upcity->city_name;
                }
                $body['user_preferred_city_id'] = $user_preferred_city;
                $body['user_preferred_city_name'] = $user_preferred_city_name;
                $body['user_email'] = $muser_email;
                $body['user_fname'] = $muser_fname;
                $body['user_lname'] = $muser_lname;
                $body['login_session'] = $ls;

                if ($new_user) {
                    $body['available_cities'] = $this->location_model->getAvailableCitiesData();
                }


                $mresult['header'] = $temp_obj;
                $mresult['body'] = $body;
            } else {
                $temp_obj['status'] = $status;
                $temp_obj['st'] = getEpoch();
                $temp_obj['msg'] = "Could not signup now, please try again!";
                $mresult['header'] = $temp_obj;
            }
        } elseif (isset($mxdata[0]) && $mxdata[0]->flag_native_signup == 1) {
            $temp_obj['status'] = "0";
            $temp_obj['msg'] = "This Email already exists. Please use a different Email";
            $temp_obj['st'] = getEpoch();
            $mresult['header'] = $temp_obj;
        }
        header('Content-Type: application/json');
        echo json_encode($mresult);
    }

    public function getUserPreferredArea($user_id)
    {
        $sql = "select user_preferred_city,b.city as city_name from user_mst a
                LEFT JOIN enable_location b on (a.user_preferred_city = b.el_id)
                where user_id='$user_id' LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        if (count($result) == 1) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function userLogin()
    {
        //http://www.barterhub.in/demo/barteradmin/users/userLogin?user_email=devishankargru@gmail.com&user_fname=Devishankar&user_lname=R&install_id=devishankar&reg_type=2&flag_android=1&os=Android&os_ver=test
        $muser_email = $this->input->get('user_email', true);
        $muser_fname = $this->input->get('user_fname', true);
        $muser_lname = $this->input->get('user_lname', true);
        $mflag_android = $this->input->get('flag_android', true);
        $mflag_ios = $this->input->get('flag_ios', true);
        $mflag_windows = $this->input->get('flag_windows', true);
        $wp_content_uri = $this->input->get('wp_content_uri', true);
        $gcm_reg_id = $this->input->get('gcm_reg_id', true);
        $is_new_user = $this->input->get('new_user', true);
        $mreg_type = $this->input->get('reg_type', true);

        $minstall_id = $this->input->get('install_id', true);
        $mip = $_SERVER['REMOTE_ADDR'];

        if ($mflag_android == 1) {
            $mos = "Android";
        } elseif ($mflag_ios == 1) {
            $mos = "IOS";
        } elseif ($mflag_windows == 1) {
            $mos = "Windows";
        }

        $mos_ver = $this->input->get('os_ver', true);
        $password = "";

        $dudata = $this->user_login_model->getUserData($muser_email);

        $muser = new stdClass();
        $muser->user_email = $muser_email;
        $muser->user_fname = $muser_fname;
        $muser->user_lname = $muser_lname;
        $muser->user_pass = "";
        $muser->user_sex = 0;
        $muser->user_mobile_isd = '';
        $muser->user_mobile_no = '';
        $muser->user_country_code = 'IN';
        $muser->user_currency = '';
        $muser->user_tz = 'UTC';
        $muser->user_image = '';
        $muser->user_key = get_uuid_v4();
        $muser->user_reg_type = $mreg_type;
        $muser->flag_native_signup = 0;
        $muser->flag_email_verified = 0;
        $muser->flag_dele = 0;
        $muser->crea_date = getDateForDb();
        $muser->crea_ip = getUserIp();
        $muser->user_src = 'APP';
        $muser->flag_invited_friends = 0;
        $muser->flag_shared = 0;
        $muser->flag_active = 1;
        $muser->os_ver = $mos_ver;
        $muser->install_id = $minstall_id;

        $new_user = 0;
        $muser_id = 0;
        $mnew_signup = 0;
        $force_pass_change = 0;
        $ls = "";
        $status = 0;
        $pass_check = false;
        $msg = "";

        if ($mreg_type > 1) {
            if (count($dudata) == 0) {
                $muser_id = $this->user_login_model->createUser($muser);
                $new_user = 1;
                $mnew_signup = 1;
                $status = 1;
                $msg = "Thank you for signing up with Barterhub";
            } else {
                $muser_id = $dudata[0]->user_id;
                $status = 1;
            }
        } else if ($mreg_type == 1) {
            if (count($dudata) == 1 && $dudata[0]->flag_native_signup == 1) {
                $password = $this->input->get('password', true);
                $pass_check_data = $this->user_login_model->checkUserAndPassword($password, $muser_email);
                if (count($pass_check_data) == 1) {
                    $pass_check = true;
                    $muser_id = $pass_check_data[0]->user_id;
                    $muser_email = $pass_check_data[0]->user_email;
                    $muser_fname = $pass_check_data[0]->user_fname;
                    $muser_lname = $pass_check_data[0]->user_lname;

                    if ($password == $pass_check_data[0]->user_temp_pass) {
                        $force_pass_change = 1;
                    } else if ($pass_check_data[0]->user_temp_pass != "")
                        $force_pass_change = 1;
                    $status = 1;
                } else {
                    $muser_id = 0;
                    $pass_check = false;
                }
            } else if (count($dudata) == 0) {
                $muser_id = 0;
                $pass_check = false;
            }
        }

        $mresult = array();
        if ($muser_id > 0 && $status == 1) {
            $muser->user_id = $muser_id;
            $mos = "";
            if ($mflag_android == 1) {
                $mos = "Android";
            } elseif ($mflag_ios == 1) {
                $mos = "IOS";
            } elseif ($mflag_windows == 1) {
                $mos = "Windows";
            }
            $muser->os = $mos;

            $this->user_login_model->registerDevice($muser);
            $ls = $this->user_login_model->logUserLogin($muser);

            $temp_obj['status'] = 1;
            $temp_obj['st'] = getEpoch();
            $temp_obj['msg'] = $msg;
            $body = array();
            $new_user = 1;
            $body['new_user'] = $new_user;
            $body['user_id'] = $muser_id;
            $upcity = $this->getUserPreferredArea($muser_id);
            $user_preferred_city = 0;
            $user_preferred_city_name = "";
            if ($upcity) {
                $user_preferred_city = $upcity->user_preferred_city;
                $user_preferred_city_name = $upcity->city_name;
            }
            $body['user_preferred_city_id'] = $user_preferred_city;
            $body['user_preferred_city_name'] = $user_preferred_city_name;
            $body['user_email'] = $muser_email;
            $body['user_fname'] = $muser_fname;
            $body['user_lname'] = $muser_lname;
            $body['login_session'] = $ls;
            $body['force_pass_reset'] = $force_pass_change;
            if ($new_user) {
                $body['available_cities'] = $this->location_model->getAvailableCitiesData();
            }
            $mresult['header'] = $temp_obj;
            if ($status == 1)
                $mresult['body'] = $body;
        } else if ($mreg_type == 1 && $pass_check == false) {
            $temp_obj['status'] = "0";
            $temp_obj['st'] = getEpoch();
            $temp_obj['login_type'] = $mreg_type;
            $temp_obj['msg'] = "Invalid User Email or Password!";
            $mresult['header'] = $temp_obj;
        } else if ($mreg_type == 2) {
            $temp_obj['status'] = "0";
            $temp_obj['st'] = getEpoch();
            $temp_obj['login_type'] = $mreg_type;
            $temp_obj['msg'] = "Facebook Login Failed!";
            $mresult['header'] = $temp_obj;
        } else if ($mreg_type == 3) {
            $temp_obj['status'] = "0";
            $temp_obj['st'] = getEpoch();
            $temp_obj['login_type'] = $mreg_type;
            $temp_obj['msg'] = "Google Login Failed!";
            $mresult['header'] = $temp_obj;
        }
        header('Content-Type: application/json');
        echo json_encode($mresult);
    }

    public function resetPassword()
    {
        $muser_email = $this->input->get('user_email', true);

        $mxdata = $this->user_login_model->getUserData($muser_email);

        $temp_obj = array();
        $mresult = array();
        if (count($mxdata) == 0) {
            $temp_obj['status'] = "0";
            $temp_obj['msg'] = "Email not registered.";
            $temp_obj['st'] = getEpoch();
            $mresult['header'] = $temp_obj;
        } else if (isset($mxdata[0]) && $mxdata[0]->flag_native_signup == 0) {
            $temp_obj['status'] = "0";
            $temp_obj['msg'] = "Please sign up for Barterhub account before resetting password.";
            $temp_obj['st'] = getEpoch();
            $mresult['header'] = $temp_obj;
        } else if (isset($mxdata[0]) && $mxdata[0]->flag_native_signup == 1) {
            $user_id = $mxdata[0]->user_id;
            $temp_pass = get_rand_num(4);
            $isql = "update user_mst set user_temp_pass='$temp_pass' WHERE user_id='$user_id'";

            $update = $this->db->query($isql);
            if ($update) {
                $status = 1;
                $msg = "Temporary password has been sent to $muser_email.";
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
        }
        header('Content-Type: application/json');
        echo json_encode($mresult);
    }
}


?>