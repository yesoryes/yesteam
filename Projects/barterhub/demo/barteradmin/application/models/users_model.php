<?php

class Users_model extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    //Listing users from database
	public function getUsers(){
		$query = $this->db->query("SELECT * FROM `users` ORDER BY user_id DESC");
		return $query->result();
	}
	//get user details 
	public function getUserDetail($id){
		$query = $this->db->query("SELECT * FROM `users` WHERE user_id = '$id'");
		return $query->result();
	}
	//user post history of product
	public function getUserProduct($id){
		$query = $this->db->query("SELECT * FROM `product` WHERE user_id = '$id'");
		return $query->result();
	}
	//disable user from database.
	public function getDisable(){
		if($this->input->post('cids') != ''){
			$getId = $this->input->post('cids');
			$removeSpecial = trim($getId, ',');
			$split = explode(',', $removeSpecial);
			$count = count($split);
			for($i = 0; $i < $count; $i++){
				//echo $split[$i];
				$query = $this->db->query("UPDATE `users` SET status = 0 WHERE user_id = '".$split[$i]."'");
			}
			if($query){
				$subject = "Disable from barterhub";
				$message = "Due to some reason you are disable form barterhub.in";
				$getEmail = $this->input->post('email');

				$remTrim = trim($getEmail, ',');
				//$cover = '$remTrim';
				//echo $cover;
			    return $this->sendEmail($remTrim, $subject, $message);
			    
			}
		}
	}
	//Sending mail
	function sendEmail($remTrim, $subject, $message) 
	{
		$this->load->library('email');
						
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$exp = explode(',', $remTrim);
		$getCount = count($exp);
		for($j = 0; $j < $getCount; $j++){
			$mydata['email'] = $exp[$j];
			//echo $exp[$j];
			$mydata['from'] = 'vijay.karthik63@gmail.com';
				
			//$message = $this->load->view('mail_template/invite_message', $mydata, true);        
			$message = "Barterhub disable you for some reason";
			$this->email->from('info@barterhub.in', 'Barterhub');
			
			$this->email->to($exp[$j]); 
			  
			$this->email->subject($subject);
			
			$this->email->message($message);	
			
			$this->email->send();	
		}

		return 1;

	}

	//Message sending the selected user
	public function messageSend(){
		$getId = $this->input->post('saveId');
		$getEmail = $this->input->post('saveEmail');
		//echo "hello".$getEmail;
		$subject = $this->input->post('subject');
		$desc = $this->input->post('description');
		$trimId = trim($getId, ',');
		$trimEmail = trim($getEmail, ',');
		//echo $trimEmail;
		// $expId = explode(',', $trimId);
		// $expEmail = explode(',', $trimEmail);
		// $countEmail = count($expEmail);
		

		return $this->sendEmail($trimEmail, $subject, $desc);

	}
	
}

?>