<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 29-06-2015
 * Time: 11:10 PM
 */
class location_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getAvailableCities()
    {
        $query_res = $this->getAvailableCitiesData();

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

    public function getAvailableCitiesData()
    {
        $sql = "SELECT a.el_id AS city_id,a.city AS city_name, a.country_id, c.name AS country_name, a.state AS state_id,
                  b.StateName AS state_name
                  FROM enable_location a
                  INNER JOIN state b ON ( a.state = b.stateID )
                  INNER JOIN country c ON ( a.country_id = c.id )
                  WHERE a.flag_status =1 ORDER BY city_name";
        $query = $this->db->query($sql);
        return $query->result();
    }
}