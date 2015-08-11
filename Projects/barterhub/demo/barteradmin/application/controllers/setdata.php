<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 05-07-2015
 * Time: 04:41 PM
 * @property  api_model $api_model
 * @property  product $product
 * @property  user_login_model $user_login_model
 */
class setdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model("api_model");
        $this->load->model("product");
        $this->load->model("user_login_model");
    }

    public function v1()
    {
        $user_id = $this->api_model->getUserFromSession();
        $result = array();

        if ($user_id != 0) {
            $action = $this->input->get("action");
            $install_id = $this->input->get('install_id');

            if ($action == "setPushRegId") {
                $result = $this->api_model->setPushRegId($user_id, $install_id);
            } else if ($action == "addNewProduct") {
                $result = $this->product->addNewProduct($user_id);
            } else if ($action == "uploadProdImgs") {
                $result = $this->product->uploadProdImgs($user_id);
            } else if ($action == "setUserCity") {
                $result = $this->api_model->setUserCity($user_id);
            } else if ($action == "requestProduct") {
                $result = $this->product->requestProduct($user_id);
            } else if ($action == "cancelRequest") {
                $result = $this->product->cancelRequest($user_id);
            } else if ($action == "setUserPassword") {
                $result = $this->user_login_model->updatePassword($user_id);
            } else if ($action == "setUserProfileData") {
                $result = $this->user_login_model->setUserProfileData($user_id);
            } else {
                $temp_obj = array();
                $temp_obj['status'] = 0;
                $temp_obj['st'] = getEpoch();
                $temp_obj['msg'] = "Invalid action";
                $result['header'] = $temp_obj;
            }

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }
}