<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 29-06-2015
 * Time: 11:05 PM
 * @property  location_model $location_model
 * @property  api_model $api_model
 */
class Location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model("api_model");
        $this->load->model("location_model");
    }


    public function getAvailableCities()
    {
        $query_res = $this->location_model->getAvailableCitiesData();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['available_cities'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }
}