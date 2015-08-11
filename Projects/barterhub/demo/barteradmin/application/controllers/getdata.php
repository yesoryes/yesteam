<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 29-06-2015
 * Time: 11:49 PM
 * @property  api_model $api_model
 * @property  mdl_master_list $mdl_master_list
 * @property  location_model $location_model
 *
 * @property  Location $location
 * @property  ctrl_master_list $ctrl_master_list
 * @property  product $product
 * @property  notification $notification
 */
class getdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model("api_model");
        $this->load->model("mdl_master_list");
        $this->load->model("location_model");
        $this->load->model("product");
        $this->load->model("notification");

        $this->load->library('../controllers/location');
        $this->load->library('../controllers/ctrl_master_list');
    }

    public function v1()
    {
        $user_id = $this->api_model->getUserFromSession();
        $result = array();

        if ($user_id != 0) {
            $action = $this->input->get("action");

            if ($action == "getAvailableCities") {
                $result = $this->location_model->getAvailableCities();
            } else if ($action == "getCategories") {
                $result = $this->mdl_master_list->getCategoryData();
            } else if ($action == "getSubCategories") {
                $result = $this->mdl_master_list->getSubCategoryData();
            } else if ($action == "getCharities") {
                $result = $this->mdl_master_list->getCharities();
            } else if ($action == "getMyPosts") {
                $result = $this->product->getMyPosts($user_id);
            } else if ($action == "getPosts") { //TODO Remove this, handled in getAvailableCategories
                $result = $this->product->getPosts($user_id); //TODO Remove this, handled in getAvailableCategories
            } else if ($action == "getAvailablePosts") { //Product list for home page
                $result = $this->product->getAvailablePosts($user_id);
            } else if ($action == "getAvailableCategories") { //Product count by category wise
                $result = $this->product->getPosts($user_id);
            } else if ($action == "getProdListByCategory") { //Product list for selected category
                $result = $this->product->getProdListByCategory($user_id);
            } else if ($action == "getNotifications") {
                $result = $this->notification->getNotifications($user_id);
            } else if ($action == "getPostSearchData") {
                $result = $this->product->getPostSearchData($user_id);
            } else if ($action == "getFilterData") {
                $result = $this->mdl_master_list->getFilterData($user_id);
            } else if ($action == "getCharityTypes") {
                $result = $this->mdl_master_list->getCharityTypes($user_id);
            } else if ($action == "getInbox") {
                $result = $this->notification->getInbox($user_id);
            } else if ($action == "getOutbox") {
                $result = $this->notification->getOutbox($user_id);
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