<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 10-07-2015
 * Time: 12:54 AM
 */
class notification extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

    public function getNotifications($user_id)
    {
        $sql = "SELECT a.log_id, a.noty_type,a.ref_id,a.flag_read
                  FROM user_notification_mst a
                   WHERE user_id='$user_id'
                  ORDER BY crea_date";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "No notifications";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['notifications'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getInbox($user_id)
    {
        $sql = "SELECT a.user_id,c.user_fname,c.user_email,c.user_mobile_no,a.req_id,a.crea_date, b.*
                  FROM user_prod_request_mst a
                  LEFT JOIN product_mst b ON (a.product_id = b.product_id AND b.flag_active=1 AND b.flag_dele=0)
                  LEFT JOIN user_mst c ON (a.user_id = c.user_id)
                WHERE b.user_id =$user_id AND a.flag_dele=0 AND a.flag_active=1";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "No inbox items";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['items'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getOutbox($user_id)
    {
        $sql = "SELECT c.user_id,c.user_fname,c.user_email,c.user_mobile_no,
                  a.req_id,a.crea_date,b.*
                  FROM user_prod_request_mst a
                  LEFT JOIN product_mst b ON (a.product_id = b.product_id)
                  LEFT JOIN user_mst c ON (b.user_id = c.user_id)
                WHERE a.user_id=$user_id AND a.flag_dele=0 AND a.flag_active=1";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "" : "No outbox items";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $body = array();
            $body['items'] = $query_res;
            $result['body'] = $body;
        }
        return $result;
    }
}