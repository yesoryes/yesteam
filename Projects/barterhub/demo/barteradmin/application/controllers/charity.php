<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property  charity_model $charity_model
 */
class Charity extends CI_Controller{
	public function __construct()
   	{
        parent::__construct();

        $this->load->model('charity_model');
        $this->method_call =& get_instance();
        $this->load->helper(array('form', 'url'));
        //$this->load->model('account_model');
        // Your own constructor code
   	}
   	public function index()
	{
		if($this->session->userdata('logged_in') != TRUE){
		$this->load->view('signin'); 
		}else{
			//$data['productList'] = $this->charity_model->getProduct();
			$data['charity'] = $this->charity_model->getCharitydata();
			$data['flag'] = "charity";
			$this->load->view('charity_view', $data);
		}
	}

	public function insertCharity(){
		$result = $this->charity_model->addCharity();
		if($result > 0){
			$data['charity'] = $this->charity_model->getCharitydata();
			$data['flag'] = "charity";
			$this->session->set_flashdata('flashSuccess', 'charity has been added successfully..');
			redirect('charity','refresh');
		}
	}
	//displaying charity edit 
	public function charityEdit($id){
		$data['editCharity'] = $this->charity_model->getCharityEdit($id);
		$data['flag'] = "charity";
		$this->load->view('charity_edit', $data);
	}
	//Getting gallery on edit view.
	public function getCharityGallery($id){
		return $this->charity_model->getGallery($id);
	}
	//deleting the charity image gallery
	public function deleteGallery(){
		return $this->charity_model->galleryDelete();
	}
	//Edit the charity page
	public function editCharity(){
		$result = $this->charity_model->charityEdit();
		if($result > 0){
			$data['charity'] = $this->charity_model->getCharitydata();
			$data['flag'] = "charity";
			$this->session->set_flashdata('flashSuccess', 'charity has been update successfully..');
			redirect('charity','refresh');
		}
	}

	//delete the charity
	public function deleteCharity(){
		$result = $this->charity_model->charityDelete();
		if($result > 0){
			echo "Deleted successfully";
		}
	}
	

}



?>