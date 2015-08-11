<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{
	public function __construct()
   	{
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		
        $this->load->model('masterentry_model');
        $this->load->model('account_model');
        // Your own constructor code
   	}
   	public function index()
	{
		if($this->session->userdata('logged_in') != TRUE){
		$this->load->view('signin'); 
		}else{
			$data['location'] = $this->masterentry_model->getLocation();
			$data['activeUser'] = $this->masterentry_model->userActive();
			$data['flag'] = "home";
			$this->load->view('home', $data);
		}
	}
	
	//login process
	public function loginsum(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'password', 'required|callback_check_exists');

		if($this->form_validation->run() == true){
			if($this->session->userdata('logged_in') == TRUE) 
			{
				//$path =  get_redirect_path();
				redirect('account');
			}
		}
		else{
			if($this->session->userdata('logged_in') != TRUE) 
			{ 
 			$this->load->view('signin');
			}
			else
			{
			redirect('account');	
			}
		}
	}

	//check email and password with database correct or not	
	public function check_exists($password){
		$email = $this->input->post('email');
		$result = $this->account_model->logincheck($email, $password);
		if($result == 0)
		{	
 	 		$this->form_validation->set_message('check_exists', 'Email (or) Password incorrect');
			return false;
 		}
		else
		{
			return true;	
		}

	}
	
	//logout process 
	public function logout(){
		$session_array = array(
         		'email' => "",
				'user_id' => "",
				'logged_in' => FALSE
       		);
  			
       		$this->session->unset_userdata($session_array);
			
			redirect('account');
	}

	//password page
	public function changepass(){
		$data['flag'] = "home";
		$this->load->view('changePassword', $data);
	}
	//change new password controller
	public function changepassword(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'required|callback_passwordnew_validation');
		
		if($this->form_validation->run() == true)
		{
			$result = $this->account_model->updatepassword($this->input->post('newpassword'));
			
			if($result > 0){
				$data['message'] = "Password successfully changed, you can login with your new password";	
				$data['flag'] = "home";
				$this->load->view('changePassword',$data);
			}
			
		}else{
			$data['flag'] = "home";
			$this->load->view("changePassword",$data);
		}
		
	}
	//Checking enter password and current password to database
	public function passwordnew_validation(){
		$result = $this->account_model->passwordnew($this->input->post('currentpassword'));
		if($result == 0){
			$this->form_validation->set_message('passwordnew_validation', 'Current password is invalid');
			return false;
		}else{
			return true;
		}
		
	}

}



?>