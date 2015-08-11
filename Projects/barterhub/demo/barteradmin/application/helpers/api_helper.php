<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Get state Name from database
if (!function_exists('gen_uuid_v4')) {

    function getSalt()
    {
        return "Barterhub is cool";
    }

    function getUserIp()
    {
        return $_SERVER['REMOTE_ADDR'];

    }

    function getDateForDb()
    {
        $gdt = new DateTime(NULL, new DateTimeZone('UTC'));
        $gdts = $gdt->format("Y-m-d H:i:s T");
        $gdtd = $gdt->format("Y-m-d H:i:s");
        $gdtss = $gdt->format("Y-m-d");
        $gdtn = $gdt->format("U");
        return $gdtd;
    }

    function getEpoch()
    {
        $gdt = new DateTime(NULL, new DateTimeZone('UTC'));
        $gdts = $gdt->format("Y-m-d H:i:s T");
        $gdtd = $gdt->format("Y-m-d H:i:s");
        $gdtss = $gdt->format("Y-m-d");
        $gdtn = $gdt->format("U");
        return $gdtn;
    }

    function get_uuid_v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }


    function get_rand_num($length)
    {
        $mbase = "0123456789";
        $rand_id = "";
        if ($length > 0) {
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double)microtime() * 1000000);
                $num = mt_rand(0, 9);
                $rand_id .= substr($mbase, $num, 1);
            }
        }
        return $rand_id;
    }

    function get_android_gcm_url()
    {
        return "https://android.googleapis.com/gcm/send";
    }

    function get_android_server_key()
    {
        //https://console.developers.google.com/project/barterhub-981/apiui/credential
        return "AIzaSyC8FrvmRlm1GD7kutTH2l1Y9qbEAO01OKA";
    }

    function push_msg_to_cloud($ap_array = array())
    {
        if (count($ap_array) > 0) {

            $url = get_android_gcm_url();

            $fields = array(
                'registration_ids' => $ap_array,
                'data' => array("message" => json_encode($ap_array)),
            );

            $headers = array(
                'Authorization: key=' . get_android_server_key(),
                'Content-Type: application/json'
            );

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            echo $result = curl_exec($ch);

            curl_close($ch);

            $gcm_data = json_decode($result, true);

            $gcm_data['multicast_id'];
            $results = $gcm_data['results'];
            for ($i = 0; $i < count($results); $i++) {
                if (isset($results[$i]['message_id'])) {
                    echo $message = $results[$i]['message_id'];
                } else {
                    echo $results[$i]['error'];
                }
            }
        }
    }


    function getImgArr($img_names)
    {
        $arr = explode(',', $img_names);
        $items = array();
        foreach ($arr as $item) {
            $row = array();
            $row['img'] = $item;
            array_push($items, $row);
        }
        return $items;
    }
}