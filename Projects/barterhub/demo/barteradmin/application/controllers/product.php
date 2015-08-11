<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
	public function __construct()
   	{
        parent::__construct();

        $this->load->model('product_model');
        $this->method_call =& get_instance();
        //$this->load->model('account_model');
        // Your own constructor code
   	}
   	public function index()
	{
		if($this->session->userdata('logged_in') != TRUE){
		$this->load->view('signin'); 
		}else{
			$data['productList'] = $this->product_model->getProduct();
			$data['flag'] = "product";
			$this->load->view('product_list', $data);
		}
	}

	//get the product details
	public function getProductDetails($id){
		$data['productDetails'] = $this->product_model->productDetails($id);
		$data['flag'] = "product";
		$this->load->view('product_details', $data);
	}
	
	//After approval, product page,
	public function getListedProject($id){
		$data['productDetails'] = $this->product_model->productDetails($id);
		$data['flag'] = "product";
		$this->load->view('product_details_approval', $data);
	}
	//Get user details
	public function getUserDetailsContent($id){
		return $this->product_model->productUser($id);
	}
	//item have to approval 
	public function itemApprove(){
		$result = $this->product_model->approveItem();
		if($result > 0){
			echo "Product was approved";
		}
	}
	
	//product was rejected
	public function rejectProduct(){
		$result = $this->product_model->productReject();
		if($result > 0){
			$data['productList'] = $this->product_model->getProduct();
			$data['mess'] = "Item was rejected";
			$data['flag'] = "product";
			$this->load->view("product_list", $data);
		}
	}
	//Search post controller
	public function getSearch(){
		return $this->product_model->searchProduct();
	}

}



?>