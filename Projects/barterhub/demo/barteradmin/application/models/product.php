<?php

/**
 * Created by PhpStorm.
 * User: Devishankar
 * Date: 05-07-2015
 * Time: 04:44 PM
 */
class product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
    }

    public function addNewProduct($user_id)
    {
        $product_name = $this->db->escape($this->input->get("product_name"));
        $cate_id = $this->db->escape($this->input->get("cate_id"));
        $sub_cate_id = $this->db->escape($this->input->get("sub_cate_id"));
        $product_desc = $this->db->escape($this->input->get("product_desc"));
        $points = $this->db->escape($this->input->get("product_points"));
        $product_brand = $this->db->escape($this->input->get("product_brand"));
        $city_id = $this->db->escape($this->input->get("city_id"));
        $flag_charity = $this->db->escape($this->input->get("flag_charity"));
        $flag_condition = $this->db->escape($this->input->get("flag_condition"));

        $key = get_uuid_v4();
        $sql = "insert into product_mst (product_name, product_key, product_desc, product_points,cate_id,flag_charity,
                  user_id,product_brand,flag_condition,city_id,sub_cate_id)
                  VALUES ($product_name,'$key',$product_desc,$points,$cate_id,$flag_charity,$user_id,$product_brand,
                  $flag_condition,$city_id,$sub_cate_id)";
        $this->db->query($sql);
        $pid = $this->db->insert_id();

        $result = array();
        $header = array();
        $header['status'] = $pid > 0 ? 1 : 0;
        $header['msg'] = $pid > 0 ? "Product added successfully" : "In development mode  :-)";
        $result['header'] = $header;
        if ($pid > 0) {
            $body = array();
            $body['product_id'] = $pid;
            $result['body'] = $body;
        }
        return $result;
    }

    public function uploadProdImgs($user_id)
    {
        //echo count($_FILES);
        //var_dump($_FILES);
        if (!isset($_FILES))
            return false;

        $config = array(
            'upload_path' => 'product_gallery/',
            'allowed_types' => 'jpg|gif|png|jpeg',
            'overwrite' => 1,
        );

        $images = array();
        $i = 1;
        foreach ($_FILES as $file) {

            //var_dump($file);
            $_FILES['product_image[]']['name'] = $file['name'];
            $_FILES['product_image[]']['type'] = $file['type'];
            $_FILES['product_image[]']['tmp_name'] = $file['tmp_name'];
            $_FILES['product_image[]']['error'] = $file['error'];
            $_FILES['product_image[]']['size'] = $file['size'];

            $fileName = $user_id . '_' . $file['name'];

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $imgName = 'product_gallery/' . $fileName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('product_image[]');
            ++$i;
        }

        return true;
    }

    public function getMyPosts($user_id)
    {
        $sql = "SELECT a.product_id,a.product_name,a.product_desc,a.product_key,a.product_points,
                 IFNULL(f.sub_category_name,'') AS sub_cate_name,b.category_name, a.product_brand,
                 GROUP_CONCAT(concat('http://www.barterhub.in/demo/barteradmin/',c.img_name)) AS img_names,
                 b.c_id as cate_id, b.category_name as cate_name,
                 d.el_id as city_id, d.city as city_name,flag_charity,a.flag_condition
                FROM product_mst a
                  LEFT JOIN Category b ON (a.cate_id = b.c_id)
                  LEFT JOIN sub_category f ON (a.sub_cate_id = f.sc_id)
                  LEFT JOIN product_img_mst c ON (a.product_id = c.product_id AND c.flag_dele=0)
                  LEFT JOIN enable_location d on (a.city_id = d.el_id)
                WHERE user_id='$user_id' AND a.flag_dele=0 AND a.flag_active=1
                GROUP BY a.product_id";
        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "Product list" : "";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $items = array();
            foreach ($query_res as $row) {
                $item = array();
                $item['product_id'] = $row->product_id;
                $item['product_name'] = $row->product_name;
                $item['product_desc'] = $row->product_desc;
                $item['product_key'] = $row->product_key;
                $item['product_points'] = "Points $row->product_points";
                $item['product_brand'] = "Brand: <b>$row->product_brand</b>";
                $cond = $row->flag_condition ? 'New' : 'Used';
                $item['product_condition'] = "Item condition: <b>$cond</b>";
                $item['cate_id'] = $row->cate_id;
                $item['cate_name'] = $row->cate_name;
                $item["cate_name"] = $row->cate_name;
                $item["sub_cate_name"] = $row->sub_cate_name;
                $sub_cate_name = ($row->sub_cate_name) ? "/" . $row->sub_cate_name : "";
                $item["product_type"] = $row->cate_name . $sub_cate_name;
                $item['city_id'] = $row->city_id;
                $item['city_name'] = $row->city_name;
                $item['flag_charity'] = $row->flag_charity;
                $item['flag_req_id'] = 0;
                $item['images'] = $this->getImgArr($row->img_names);
                array_push($items, $item);
            }
            $body = array();
            $body['posts'] = $items;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getImgArr($img_names)
    {
        $arr = explode(',', $img_names);
        $items = array();
        foreach ($arr as $item) {
            $row = array();
            //$row['img'] = $item;
            $row['img'] = "https://farm4.staticflickr.com/3096/cameras/72157605564604036_model_huge_9b35338624.jpg";
            array_push($items, $row);
        }
        return $items;
    }

    public function getAvailablePosts($user_id)
    {
        $city_id = $this->input->get('city_id');
        $selected_subs = $this->input->get('selected_subs');
        $sub_where = "";
        if ($selected_subs != "") {
            $subs_arr = explode(", ", $selected_subs);
            if (count($subs_arr) > 0) {
                $tarr = array();
                foreach ($subs_arr as $val) {
                    if ($val != "") {
                        array_push($tarr, $val);
                    }
                }
                if (count($tarr) > 0) {
                    $tstr = implode(",", $tarr);
                    $sub_where = "AND f.sc_id IN ($tstr)";
                }
            }
        }


        $sql = "SELECT a.*,(c.req_id IS NOT NULL) AS req_id,1 AS flag_req_id,d.city,b.category_name as cate_name,
                    IFNULL(f.sub_category_name,'') AS sub_cate_name,
                    GROUP_CONCAT(CONCAT('http://www.barterhub.in/demo/barteradmin/',e.img_name)) AS img_names
                    FROM product_mst a
                    LEFT JOIN Category b ON (a.cate_id = b.c_id)
                    LEFT JOIN sub_category f ON (a.sub_cate_id = f.sc_id)
                    LEFT JOIN user_prod_request_mst c ON (a.product_id = c.product_id AND c.flag_active=1 AND c.flag_dele=0)
                    LEFT JOIN enable_location d ON (a.city_id = d.el_id)
                    LEFT JOIN product_img_mst e ON (a.product_id = e.product_id AND e.flag_dele=0)
                    WHERE a.user_id!=$user_id AND a.city_id=$city_id AND
                    a.flag_dele=0 AND a.flag_active=1 $sub_where
                    GROUP BY a.product_id";

        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "Post list" : "No Product found.";
        $result['header'] = $header;
        $body = array();
        if (count($query_res) > 0) {
            $post = array();
            foreach ($query_res as $item) {
                $row = array();
                $row["product_id"] = $item->product_id;
                $row["user_id"] = $item->user_id;
                $row["product_name"] = $item->product_name;
                $row['product_brand'] = "Brand: <b>$item->product_brand</b>";
                $row['product_points'] = "Points $item->product_points";

                $row["product_key"] = $item->product_key;
                $row["product_desc"] = $item->product_desc;
                $row["cate_id"] = $item->cate_id;
                $row["city_id"] = $item->city_id;
                $row["city_name"] = $item->city;
                $row["cate_name"] = $item->cate_name;
                $row["sub_cate_name"] = $item->sub_cate_name;
                $sub_cate_name = ($item->sub_cate_name) ? "/" . $item->sub_cate_name : "";
                $row["product_type"] = $item->cate_name . $sub_cate_name;
                $row["flag_condition"] = $item->flag_condition;
                $cond = $item->flag_condition ? 'New' : 'Used';
                $row['product_condition'] = "Item condition: <b>$cond</b>";
                $row["flag_charity"] = $item->flag_charity;
                $row["flag_active"] = $item->flag_active;
                $row["flag_dele"] = $item->flag_dele;
                $row["crea_date"] = $item->crea_date;
                $row["modi_date"] = $item->modi_date;
                $row["req_id"] = $item->req_id;
                $row["flag_req_id"] = $item->flag_req_id;
                $row['images'] = $this->getImgArr($item->img_names);
                array_push($post, $row);
            }

            $body['posts'] = $post;
        }
        $csql = "SELECT count(log_id) AS cnt
                  FROM user_notification_mst WHERE flag_dele=0 AND flag_active=1 AND flag_read=0";
        $cquery = $this->db->query($csql);
        $cresult = $cquery->result();
        $cnt = 0;
        if (count($cresult) > 0) {
            $cnt = $cresult[0]->cnt;
        }
        $body['noty_count'] = $cnt;

        $result['body'] = $body;
        return $result;

    }

    public function getPosts($user_id)
    {
        $city_id = $this->input->get('city_id');

        $sql = "SELECT CONCAT(COUNT(a.product_id),' posts') AS post_count,b.category_name,a.cate_id FROM product_mst a
                    INNER JOIN Category b ON (a.cate_id = b.c_id)
                    WHERE a.user_id!=$user_id AND a.city_id=$city_id AND a.flag_dele=0 AND a.flag_active=1
                    GROUP BY a.cate_id
                    ORDER BY post_count DESC";

        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "Post list" : "No product found on your city";
        $result['header'] = $header;

        $csql = "SELECT count(log_id) AS cnt
                  FROM user_notification_mst a
                  LEFT JOIN product_mst b ON (a.ref_id = b.product_id AND a.noty_type='NEW_REQ')
                  WHERE a.flag_dele=0 AND a.flag_active=1 AND a.flag_read=0 AND
                  b.flag_dele =0 AND b.flag_active=1 AND a.user_id=$user_id";
        $cquery = $this->db->query($csql);
        $cresult = $cquery->result();
        $cnt = 0;
        if (count($cresult) > 0) {
            $cnt = $cresult[0]->cnt;
        }

        if (count($query_res) > 0) {
            $body = array();
            $body['cate_list'] = $query_res;
            $body['noty_count'] = $cnt;

            $result['body'] = $body;
        }
        return $result;
    }

    public function getProdListByCategory($user_id)
    {
        $city_id = $this->input->get('city_id');
        $cate_id = $this->input->get('cate_id');

        $sql = "SELECT a.*,(c.req_id IS NOT NULL) AS req_id,1 AS flag_req_id,d.city,b.category_name as cate_name,
                    IFNULL(f.sub_category_name,'') AS sub_cate_name,
                    GROUP_CONCAT(CONCAT('http://www.barterhub.in/demo/barteradmin/',e.img_name)) AS img_names
                    FROM product_mst a
                    LEFT JOIN Category b ON (a.cate_id = b.c_id)
                    LEFT JOIN sub_category f ON (a.sub_cate_id = f.sc_id)
                    LEFT JOIN user_prod_request_mst c ON (a.product_id = c.product_id AND c.flag_active=1 AND c.flag_dele=0)
                    LEFT JOIN enable_location d ON (a.city_id = d.el_id)
                    LEFT JOIN product_img_mst e ON (a.product_id = e.product_id AND e.flag_dele=0)
                    WHERE a.user_id!=$user_id AND b.c_id=$cate_id AND a.city_id=$city_id AND
                    a.flag_dele=0 AND a.flag_active=1
                    GROUP BY a.product_id";

        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "Post list" : "No Product found.";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $post = array();
            foreach ($query_res as $item) {
                $row = array();
                $row["product_id"] = $item->product_id;
                $row["user_id"] = $item->user_id;
                $row["product_name"] = $item->product_name;
                $row['product_brand'] = "Brand: <b>$item->product_brand</b>";
                $row['product_points'] = "Points $item->product_points";

                $row["product_key"] = $item->product_key;
                $row["product_desc"] = $item->product_desc;
                $row["cate_id"] = $item->cate_id;
                $row["city_id"] = $item->city_id;
                $row["city_name"] = $item->city;
                $row["cate_name"] = $item->cate_name;
                $row["sub_cate_name"] = $item->sub_cate_name;
                $sub_cate_name = ($item->sub_cate_name) ? "/" . $item->sub_cate_name : "";
                $row["product_type"] = $item->cate_name . $sub_cate_name;
                $row["flag_condition"] = $item->flag_condition;
                $cond = $item->flag_condition ? 'New' : 'Used';
                $row['product_condition'] = "Item condition: <b>$cond</b>";
                $row["flag_charity"] = $item->flag_charity;
                $row["flag_active"] = $item->flag_active;
                $row["flag_dele"] = $item->flag_dele;
                $row["crea_date"] = $item->crea_date;
                $row["modi_date"] = $item->modi_date;
                $row["req_id"] = $item->req_id;
                $row["flag_req_id"] = $item->flag_req_id;
                $row['images'] = $this->getImgArr($item->img_names);
                array_push($post, $row);
            }

            $body = array();
            $body['posts'] = $post;
            $result['body'] = $body;
        }
        return $result;
    }

    public function getPostSearchData($user_id)
    {
        $city_id = $this->input->get('city_id');
        $query = str_replace("'", "''", strtolower($this->input->get('query')));

        $sql = "SELECT a.*,(c.req_id IS NOT NULL) AS req_id,1 AS flag_req_id,d.city,b.category_name as cate_name,
                    IFNULL(f.sub_category_name,'') AS sub_cate_name,
                    GROUP_CONCAT(CONCAT('http://www.barterhub.in/demo/barteradmin/',e.img_name)) AS img_names
                    FROM product_mst a
                    LEFT JOIN Category b ON (a.cate_id = b.c_id)
                    LEFT JOIN sub_category f ON (a.sub_cate_id = f.sc_id)
                    LEFT JOIN user_prod_request_mst c ON (a.product_id = c.product_id AND c.flag_active=1 AND c.flag_dele=0)
                    LEFT JOIN enable_location d ON (a.city_id = d.el_id)
                    LEFT JOIN product_img_mst e ON (a.product_id = e.product_id AND e.flag_dele=0)
                    WHERE a.user_id!=$user_id AND a.city_id=$city_id AND
                    (LOWER(b.category_name) LIKE '%$query%' OR LOWER(a.product_name) LIKE '%$query%' OR
                    LOWER(a.product_brand) LIKE '%$query%' OR LOWER(f.sub_category_name) LIKE '%$query%') AND
                    a.flag_dele=0 AND a.flag_active=1
                    GROUP BY a.product_id";

        $query = $this->db->query($sql);
        $query_res = $query->result();

        $result = array();
        $header = array();
        $header['status'] = count($query_res) > 0 ? 1 : 0;
        $header['msg'] = count($query_res) > 0 ? "Post list" : "No product matches for your search.";
        $result['header'] = $header;
        if (count($query_res) > 0) {
            $post = array();
            foreach ($query_res as $item) {
                $row = array();
                $row["product_id"] = $item->product_id;
                $row["user_id"] = $item->user_id;
                $row["product_name"] = $item->product_name;
                $row['product_brand'] = "Brand: <b>$item->product_brand</b>";
                $row['product_points'] = "Points $item->product_points";

                $row["product_key"] = $item->product_key;
                $row["product_desc"] = $item->product_desc;
                $row["cate_id"] = $item->cate_id;
                $row["city_id"] = $item->city_id;
                $row["city_name"] = $item->city;
                $row["cate_name"] = $item->cate_name;
                $row["sub_cate_name"] = $item->sub_cate_name;
                $sub_cate_name = ($item->sub_cate_name) ? "/" . $item->sub_cate_name : "";
                $row["product_type"] = $item->cate_name . $sub_cate_name;
                $row["flag_condition"] = $item->flag_condition;
                $cond = $item->flag_condition ? 'New' : 'Used';
                $row['product_condition'] = "Item condition: <b>$cond</b>";
                $row["flag_charity"] = $item->flag_charity;
                $row["flag_active"] = $item->flag_active;
                $row["flag_dele"] = $item->flag_dele;
                $row["crea_date"] = $item->crea_date;
                $row["modi_date"] = $item->modi_date;
                $row["req_id"] = $item->req_id;
                $row["flag_req_id"] = $item->flag_req_id;
                $row['images'] = $this->getImgArr($item->img_names);
                array_push($post, $row);
            }

            $body = array();
            $body['posts'] = $post;
            $result['body'] = $body;
        }
        return $result;
    }

    public function requestProduct($user_id)
    {
        $product_id = $this->input->get('product_id');
        $sql = "insert into user_prod_request_mst (user_id, product_id)
                  VALUES ($user_id,$product_id)";
        $this->db->query($sql);
        $rid = $this->db->insert_id();

        $result = array();
        $header = array();
        $header['status'] = $rid > 0 ? 1 : 0;
        $header['msg'] = $rid > 0 ? "Product requested successfully" : "";
        $result['header'] = $header;
        if ($rid > 0) {
            $isql = "insert into user_notification_mst (user_id, noty_type, ref_id) VALUES
                      ($user_id,'NEW_REQ',$product_id)";
            $this->db->query($isql);

            $body = array();
            $body['product_id'] = $product_id;
            $body['request_id'] = $rid;
            $result['body'] = $body;
        }
        return $result;
    }

    public function cancelRequest($user_id)
    {
        $product_id = $this->input->get('product_id');
        $sql = "update user_prod_request_mst set flag_active=0, flag_dele=1 WHERE product_id=$product_id";
        $update = $this->db->query($sql);
        if ($update) $status = 1;
        else $status = 0;

        $result = array();
        $header = array();
        $header['status'] = $status;
        $header['msg'] = $status > 1 ? "Product request canceled" : "";
        $result['header'] = $header;
        if ($status == 1) {
            $body = array();
            $body['product_id'] = $product_id;
            $result['body'] = $body;
        }
        return $result;
    }
}