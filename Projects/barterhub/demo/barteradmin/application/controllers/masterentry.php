<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterentry extends CI_Controller{
	public function __construct()
   	{
        parent::__construct();
		
		if($this->session->userdata('logged_in') != TRUE) 
		{ 
		redirect('account','refresh');	
		}
        
        $this->load->model('masterentry_model');
        $this->method_call =& get_instance();
        // Your own constructor code
   	}
	//load enaable location
	public function enableLocation(){
		$data['country'] = $this->masterentry_model->getCountry();
		$data['state'] = $this->masterentry_model->getState();
		$data['location'] = $this->masterentry_model->getLocation();
		$data['flag'] = "masterentry";
		$this->load->view('Materpage', $data);
	}
	
	//add location
	public function addLocation(){
		// $result = $this->masterentry_model->addEnable();
		// //echo "hello world";
		// if($result == 1){
		// 	echo "Location added successfully";
		// }

		$result = $this->masterentry_model->addEnable();
		//echo "hello".$result;
		if($result>0){
			
			return 1;
			//$this->load->view("full_profile",$data);
		}

	}
	public function changeStatus(){
		$result = $this->masterentry_model->addStatus();

		if($result > 0){
			return 1;
		}
	}
	//Add and edit category 
	public function category(){
		$data['category'] = $this->masterentry_model->getCategory();
		$data['subCategory'] = $this->masterentry_model->getSubCategory();
		$data['flag'] = "masterentry";
		$this->load->view('category', $data);
	}

	//adding category
	public function addCategory(){
		$result = $this->masterentry_model->categoryAdd();

		if($result > 0){
			return 1;
		}
	}

	//view to edit the data
	public function categoryEdit($id){
		$data['categoryedit'] = $this->masterentry_model->getEditCategory($id);
		$data['flag'] = "masterentry";
		$this->load->view('category_edit', $data);
	}

	//Edit category, update the data.
	public function editCategory(){
		$result = $this->masterentry_model->saveCategory();
		if($result > 0){
			$data['category'] = $this->masterentry_model->getCategory();
			$data['subCategory'] = $this->masterentry_model->getSubCategory();
			$data['flag'] = "masterentry";
			$this->session->set_flashdata('flashSuccess', 'Category has been updated..');
			redirect('masterentry/category','refresh');
		}
	}
	//delete the category
	public function deleteCategory(){
		$result = $this->masterentry_model->deleteCat();
		if($result > 0){
			echo "Deleted successfully";
		}
	}
	//Add sub category
	public function addSubCategory(){
		$result = $this->masterentry_model->subcatergoryAdd();
		if($result > 0){
			return 1;
		}
	}
	//Edit sub category
	public function subCategoryEdit($id){
		$data['category'] = $this->masterentry_model->getCategory();
		$data['subcatedit'] = $this->masterentry_model->getEditSubCategory($id);
		$data['flag'] = "masterentry";
		$this->load->view('sub_category_edit', $data);
	}
	//edit subcategory
	public function editSubCategory(){
		$result = $this->masterentry_model->updateSubCategory();
		if($result > 0){
			$data['category'] = $this->masterentry_model->getCategory();
			$data['subCategory'] = $this->masterentry_model->getSubCategory();
			$data['flag'] = "masterentry";
			$this->session->set_flashdata('flashSuccess', 'Sub Category has been updated..');
			redirect('masterentry/category','refresh');
		}
	}

	//delete Sub category
	public function deleteSubCategory(){
		$result = $this->masterentry_model->deletesub();
		if($result > 0){
			echo "Deleted successfully";
		}
	}
	//Country master entry
	public function country(){
		$data['country'] = $this->masterentry_model->getCountry();
		$data['stateentry'] = $this->masterentry_model->getStateDb();
		$data['flag'] = "masterentry";
		$this->load->view('country_master', $data);
	}
	//Add country to database
	public function countryAdd(){
		$result = $this->masterentry_model->addCountry();
		if($result > 0){
			return 1;
		}
	}
	//country edit page
	public function countryEdit($id){
		$data['editCountry'] = $this->masterentry_model->editCounty($id);
		
		$data['flag'] = "masterentry";
		$this->load->view('country_edit', $data);
	}
	//update country
	public function updateCountry(){
		$result = $this->masterentry_model->countryUpdate();
		if($result > 0){
			$data['country'] = $this->masterentry_model->getCountry();
			$data['flag'] = "masterentry";
			$this->session->set_flashdata('flashSuccess', 'Country has been updated successfully..');
			redirect('masterentry/country','refresh');
		}
	}
	//delete the country from master.
	public function deleteCountry(){
		return $this->masterentry_model->deleteCon();
	}

	//Add state in to database
	public function stateEntry(){
		$result = $this->masterentry_model->entryState();
		if($result > 0){

			$this->session->set_flashdata('flashSuccess', 'State has been updated successfully..');
			redirect('masterentry/country','refresh');
		}
	}
	public function stateEdit($id){
		
		$data['stateEntry'] = $this->masterentry_model->stateEntrydb($id);
		$data['country'] = $this->masterentry_model->getCountry();
		$data['flag'] = "masterentry";
		$this->load->view('state_edit', $data);
	}
	//update state coding
	public function updateState(){
		$result = $this->masterentry_model->stateUpdate();
		if($result > 0){
			$data['country'] = $this->masterentry_model->getCountry();
			$data['stateentry'] = $this->masterentry_model->getStateDb();
			$data['flag'] = "masterentry";
			$this->session->set_flashdata('flashSuccess', 'State has been updated successfully..');
			redirect('masterentry/country','refresh');
		}
	}
	//delete state from database
	public function deletestate(){
		return $this->masterentry_model->deletests();
	}
	//filter state based on country id
	public function getCountryLocation(){
		return $this->masterentry_model->getFilter();
	}
	//Delete enable location controller
	public function deleteLocation(){
		return $this->masterentry_model->deleteEnableLocation();
	}


}
?>