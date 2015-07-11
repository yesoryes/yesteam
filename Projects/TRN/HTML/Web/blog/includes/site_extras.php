<?php
	//Function to get admin page length
	function user_page_length()
	{
		//To get Admin page length
		$get_page_length = select_single_record(GLOBAL_CONFIGURATION, "user_page_length", "", "LIMIT 1");
		if($get_page_length[0]>0)
		{
			$set_page_length = $get_page_length[1];
			$user_page_length = striptext($set_page_length['user_page_length']);
		}
		else
		{
			$user_page_length = 10;
		}
		return (int) $user_page_length;
	}
	//Function to get Page Content
	function get_content($pageid)
	{
		$get_page_records          = select_single_record(CMS, "page_heading,content", "id = '$pageid'");
		$page_records              = $get_page_records[1];
		return $page_records;
	}
	//Function to get Page Meta Details
	function get_meta_records($pageid)
	{
		$get_meta_records          = select_single_record(CMS, "title,meta_keyword,meta_description", "id = '$pageid'");
		$meta_records              = $get_meta_records[1];
		return $meta_records;
	}
	//Function to get Page Default Meta Details
	function get_meta_records_default()
	{
		$get_meta_details          = select_single_record(GLOBAL_CONFIGURATION, "site_title,meta_keyword,meta_description", "");
		$meta_details              = $get_meta_details[1];
		return $meta_details;
	}
?>