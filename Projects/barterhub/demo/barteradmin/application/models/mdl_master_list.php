<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 04-07-2015
 * Time: 09:26 PM
 */
class mdl_master_list extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

    public function getCategoryData()
    {
        $sql = "SELECT a.c_id AS cate_id,a.category_name AS cate_name
                  FROM Category a ORDER BY cate_name";
        $query = $this->db->query($sql);
        $query_res = $query->result();

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

    public function getSubCategoryData()
    {
        $cate_id = $this->input->get('cate_id');

        $sql = "SELECT a.sc_id AS sub_cate_id,a.sub_category_name AS sub_cate_name
                  FROM sub_category a
                  WHERE a.Category_id = $cate_id
                  ORDER BY sub_cate_name ";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['sub_categories'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getCharities()
    {
        $sql = "SELECT a.*,CONCAT('http://www.barterhub.in/demo/barteradmin/',a.logo) AS logo,
                  GROUP_CONCAT(CONCAT('http://www.barterhub.in/demo/barteradmin/',b.image_name)) AS img_names 
                    FROM charities a 
                  LEFT JOIN charity_gallery b ON (a.char_id = b.charity_id) 
                  GROUP BY a.char_id";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $post = array();
            foreach ($query_res as $item) {
                $row = array();
                $row['char_id'] = $item->char_id;
                $row['charity_name'] = $item->charity_name;
                $row['reg_no'] = $item->reg_no;
                $row['contact_person'] = $item->contact_person;
                $row['contact_number'] = $item->contact_number;
                $row['address'] = $item->address;
                $row['about'] = $item->about;
                $row['logo'] = $item->logo;
                $row['images'] = getImgArr($item->img_names);
                array_push($post, $row);

            }
            $body = array();
            $body['charities'] = $post;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getFilterData($user_id)
    {
        $sql = "SELECT a.category_name,a.c_id,GROUP_CONCAT(b.sc_id) AS sc_id,
                  GROUP_CONCAT(b.sub_category_name) AS sub_cate
                  FROM Category a
                  LEFT JOIN sub_category b ON (a.c_id = b.Category_id)
                  GROUP BY a.c_id
                  ORDER BY b.sub_category_name";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $filter = array();
            foreach ($query_res as $item) {
                $row = array();
                $row['cate_id'] = $item->c_id;
                $row['cate_name'] = $item->category_name;
                $row['sub_cate_data'] = $this->getSubCateData($item->sc_id, $item->sub_cate);
                array_push($filter, $row);

            }
            $body = array();
            $body['filter_data'] = $filter;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getSubCateData($sc_id, $sc_name)
    {
        $sc_id_arr = explode(",", $sc_id);
        $sc_name_arr = explode(",", $sc_name);
        $sc_arr = array();
        for ($i = 0; $i < count($sc_id_arr); $i++) {
            $row = array();
            $row["sub_cate_id"] = $sc_id_arr[$i];
            $row["sub_cate_name"] = $sc_name_arr[$i];
            array_push($sc_arr, $row);
        }
        return $sc_arr;
    }

    public function getCharityTypes($user_id)
    {
        $sql = "SELECT a.c_id AS charity_cate_id,a.category_name AS charity_cate_name
                  FROM Category a ORDER BY charity_cate_name";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "In development mode  :-)";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['charity_types'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }

}