<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 29-06-2015
 * Time: 11:05 PM
 * @property  mdl_master_list $mdl_master_list
 */
class ctrl_master_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model("mdl_master_list");
    }


    public function getCategoryList()
    {
        $query_res = $this->mdl_master_list->getCategoryData();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['categories'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }
}