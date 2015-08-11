<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Get state Name from database
if ( ! function_exists('getState'))
{
    function getState($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT StateName FROM `state` WHERE StateID = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->StateName);
	 }	
 	   
     }   
}

//get category name by passing category id
if ( ! function_exists('getCategoryName'))
{
    function getCategoryName($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT category_name FROM `Category` WHERE c_id = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->category_name);
	 }	
 	   
     }   
}

//get sub-category name by passing sub-category id

if ( ! function_exists('getSubCategoryName'))
{
    function getSubCategoryName($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT sub_category_name FROM `sub_category` WHERE sc_id = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->sub_category_name);
	 }	
 	   
     }   
}
//Passing user id and getting no of post product from the given id
if ( ! function_exists('getTotalPost'))
{
    function getTotalPost($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT * FROM `product` WHERE user_id = '$id'");
	 
	 
		 return $result->num_rows;
 	   
     }   
}
//passing user id and getting user name
if ( ! function_exists('getUserName'))
{
    function getUserName($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT username FROM `users` WHERE user_id = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->username);
	 }	
 	   
     }   
}

//Get product status 

if ( ! function_exists('getProductStatus'))
{
    function getProductStatus($id)
    {
	 	 if($id == 0){
			return "Listed";
			}else if($id == 1){
				return "Sold";
			}else if($id == 2){
				return "Approve pending ";
			}else{
				return "Rejected";
			}
 	   
     }   
}

//passing user id and getting user email id
if ( ! function_exists('getUserEmail'))
{
    function getUserEmail($id)
    {
 	 $CI = &get_instance();
    	
	 
	 $result = $CI->db->query("SELECT email FROM `users` WHERE user_id = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->email);
	 }	
 	   
     }   
}

//Passing country id and getting country name

if ( ! function_exists('getCountry'))
{
    function getCountry($id)
    {
 	 $CI = &get_instance();
    	
	 //echo "SELECT name FROM `country` WHERE id = '$id'";
	 $result = $CI->db->query("SELECT name FROM `country` WHERE id = '$id'");
	 
	 if($result->num_rows > 0 )
	 {
		 $row = $result->row();
		 return ucfirst($row->name);
	 }	
 	   
     }   
}
//Get total no of user in barter hub
if ( ! function_exists('getNoOfUsers'))
{
    function getNoOfUsers()
    {
 	 $CI = &get_instance();
    	
	 //echo "SELECT name FROM `country` WHERE id = '$id'";
	 $result = $CI->db->query("SELECT * FROM `users`");
	 
	 
		 return $result->num_rows();
	 
 	   
     }   
}

//Get total no of products in barter hub
if ( ! function_exists('getNoOfProduct'))
{
    function getNoOfProduct()
    {
 	 $CI = &get_instance();
    	
	 //echo "SELECT name FROM `country` WHERE id = '$id'";
	 $result = $CI->db->query("SELECT * FROM `product`");
	 
	 
		return $result->num_rows();
	 
 	   
     }   
}
//Get total no of sold products in barter hub
if ( ! function_exists('getNoOfSold'))
{
    function getNoOfSold()
    {
 	 $CI = &get_instance();
    	
	 //echo "SELECT name FROM `country` WHERE id = '$id'";
	 //echo "SELECT COUNT(*) FROM `product` WHERE status = 1";
	 $result = $CI->db->query("SELECT * FROM `product` WHERE status = 1");
	 
	 
		return $result->num_rows();
	 
 	   
     }   
}