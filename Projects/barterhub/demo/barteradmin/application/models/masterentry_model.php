<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterentry_model extends CI_Model{
	function __construct(){
        parent::__construct();
    }
	public function getState(){
		$query = $this->db->query("SELECT * FROM `state`");
		return $query->result();
	}
	//get location on list
	public function getLocation(){
		$query = $this->db->query("SELECT * FROM `enable_location`");
		return $query->result();
	}
	//add enable location to database
	public function addEnable(){
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$pincode = $this->input->post('pincode');
		$cont = $this->input->post('con');
		echo $cont;
		$createdOn = date('Y-m-d H:i:s');
		//echo "hello".$createdOn;
		if($state != ''){
			//echo "INSERT INTO `enable_location`(state, city, pincode, site_enable, status, created_on) VALUES('$state', '$city', '$pincode', '$createdOn', 'enable', '$createdOn')";
			$query = $this->db->query("INSERT INTO `enable_location`(country_id, state, city, pincode, site_enable, status, created_on) VALUES('$cont','$state', '$city', '$pincode', '$createdOn', 'enable', '$createdOn')");
			$affect = $this->db->affected_rows();
		}
		

		return 1;		
	}
	//change status for location 
	public function addStatus(){
		$status = $this->input->post('status');
		$id = $this->input->post('id');

		if($status == 1){

		$query = $this->db->query("UPDATE `enable_location` SET status = 'disable' WHERE el_id = '$id'");
		if($query){
			return 1;
		}

		}else{
			$query = $this->db->query("UPDATE `enable_location` SET status = 'enable' WHERE el_id = '$id'");
			if($query){
				return 1;
			}
		}
	}

	//add category
	public function categoryAdd(){
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');
		$createdOn = date('Y-m-d H:i:s');
		//echo "hello".$createdOn;
		if($name != ''){
			//echo "INSERT INTO `enable_location`(state, city, pincode, site_enable, status, created_on) VALUES('$state', '$city', '$pincode', '$createdOn', 'enable', '$createdOn')";
			$query = $this->db->query("INSERT INTO `Category`(category_name, description, created_on) VALUES('$name', '$desc', '$createdOn')");
			$affect = $this->db->affected_rows();
		}
		

		return 1;	
	}
	//Get category datas to bind
	public function getCategory(){
		$query = $this->db->query("SELECT * FROM `Category`");
		return $query->result();
	}
	//get category to edit
	public function getEditCategory($id){
		//echo "SELECT * FROM `Category` WHERE c_id = '$id'";
		$query = $this->db->query("SELECT * FROM `Category` WHERE c_id = '$id'");
		return $query->result();
	}
	//Update category
	public function saveCategory(){
		$name = $this->input->post('category_name');
		$desc = $this->input->post('category_description');
		$createdOn = date('Y-m-d H:i:s');
		$id = $this->input->post('cid');

		$query = $this->db->query("UPDATE `Category` SET category_name = '$name', description = '$desc', updated_on = '$createdOn' WHERE c_id = '$id'");
		$affect = $this->db->affected_rows();

		if($query){
			return 1;
		}
		
	}
	//Delete category from database
	public function deleteCat(){
		$id = $this->input->post('id');

		$query = $this->db->query("DELETE FROM `Category` WHERE c_id = '$id'");
		if($query){
			return 1;
		}
	}

	//Add sub-category to database
	public function subcatergoryAdd(){
		$catid = $this->input->post('catId');
		$subcat = $this->input->post('subName');
		$desc = $this->input->post('desc');
		$createdOn = date('Y-m-d H:i:s');
		//echo "hello".$createdOn;
		if($catid != ''){
			//echo "INSERT INTO `sub_category`(Category_id, sub_category_name, description, created_on) VALUES('$catid', '$subcat', '$desc', '$createdOn')";
			$query = $this->db->query("INSERT INTO `sub_category`(Category_id, sub_category_name, description, created_on) VALUES('$catid', '$subcat', '$desc', '$createdOn')");
			$affect = $this->db->affected_rows();
		}
		

		return 1;
	}
	//getting subcategory from database
	public function getSubCategory(){
		$query = $this->db->query("SELECT * FROM `sub_category`");
		return $query->result();
	}

	//get sub-category to edit
	public function getEditSubCategory($id){
		//echo "SELECT * FROM `Category` WHERE c_id = '$id'";
		$query = $this->db->query("SELECT * FROM `sub_category` WHERE sc_id = '$id'");
		return $query->result();
	}
	//update the sub-category to database
	public function updateSubCategory(){
		$catId = $this->input->post('categoryId');
		$subCategory = $this->input->post('subCategory');
		$desc = $this->input->post('sub_cat_desc');
		$createdOn = date('Y-m-d H:i:s');
		$scid = $this->input->post('scid');

		$query = $this->db->query("UPDATE `sub_category` SET Category_id = '$catId', sub_category_name = '$subCategory', description = '$desc', updated_on = '$createdOn' WHERE sc_id = '$scid'");
		$affect = $this->db->affected_rows();

		if($query){
			return 1;
		}
	}
	//delete sub category from database 
	public function deletesub(){
		$id = $this->input->post('id');

		$query = $this->db->query("DELETE FROM `sub_category` WHERE sc_id = '$id'");
		if($query){
			return 1;
		}
	}
	//Getting active user from user table
	public function userActive(){
		$query = $this->db->query("SELECT * FROM `users` WHERE status = 1");
		return $query->result();
	}
	//Get the country data
	public function getCountry(){
		$query = $this->db->query("SELECT * FROM `country`");
		return $query->result();
	}
	//Add country to database
	public function addCountry(){
		$name = $this->input->post('country');
		$createdOn = date('Y-m-d H:i:s');
		$query = $this->db->query("INSERT INTO `country` (name, created_on) VALUES('$name', '$createdOn')");
		if($query){
			return $this->db->affected_rows();
		}
	}
	//Edit country to database
	public function editCounty($id){
		$query = $this->db->query("SELECT * FROM `country` WHERE id = '$id'");
		return $query->result();
	}

	//update country to database
	public function countryUpdate(){
		$name = $this->input->post('country_name');
		$id = $this->input->post('cid');

		//echo "UPDATE `country` SET name = '$name' WHERE id = '$id'";
		$query = $this->db->query("UPDATE `country` SET name = '$name' WHERE id = '$id'");
		$affect = $this->db->affected_rows();

		if($query){
			return 1;
		}
	}

	//delete the country from database.
	public function deleteCon(){
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM `country` WHERE id = '$id'");
		if($query)
		{
			return 1;
		}
	}
	//get state from database 
	public function getStateDb(){
		$query = $this->db->query("SELECT * FROM `state`");
		return $query->result();
	}
	//save state name in to a database
	public function entryState(){
		$name = $this->input->post('state_name');
		$id = $this->input->post('country_id');
		$query = $this->db->query("INSERT INTO `state` (countryId, StateName) VALUES('$id', '$name')");
		if($query){
			return $this->db->affected_rows();
		}

	}
	//update state edit
	public function stateEntrydb($id){
		$query = $this->db->query("SELECT * FROM `state` WHERE StateID = '$id'");
		return $query->result();
	}
	//update state to database 
	public function stateUpdate(){
		$name = $this->input->post('state_name');
		$cid = $this->input->post('country_id');
		$id = $this->input->post('cid');

		//echo "UPDATE `country` SET name = '$name' WHERE id = '$id'";
		$query = $this->db->query("UPDATE `state` SET countryId = '$cid', StateName = '$name' WHERE StateID = '$id'");
		$affect = $this->db->affected_rows();

		if($query){
			return 1;
		}
	}
	//delete state from database
	public function deletests(){
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM `state` WHERE StateID = '$id'");
		if($query)
		{
			return 1;
		}
	}
	//Filter state data base on country id
	public function getFilter(){
		$id = $this->input->post('id');

		$query = $this->db->query("SELECT * FROM `state` WHERE countryId = '$id'");
		$html = '';

		$html .= '<select tabindex="1" data-placeholder="Select here.." class="span4" name="state" id="state">
					<option value="0">Select here..</option>';
		foreach($query->result() as $cont){
        $html .= '<option value="'.$cont->StateID.'">'.$cont->StateName.'</option>';
         }       
		$html .= '</select>';

		echo $html;

		
	}
	//delete enable location from database
	public function deleteEnableLocation(){
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM `enable_location` WHERE el_id = '$id'");
		if($query)
		{
			return 1;
		}
	}

}

?>