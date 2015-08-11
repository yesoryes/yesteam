<?php

class Account_model extends CI_Model{

	function __construct(){
        parent::__construct();
    }

	public function logincheck($email, $password){
		//echo "SELECT * FROM `account` WHERE email = '$email' AND password = '$password)'";
		$query = $this->db->query("SELECT * FROM `account` WHERE email = '$email' AND password = '".md5($password)."'");

		//checking row existes
		if($query->num_rows() == 1){
			$row = $query->row();
			$session_array = array(
				'email' => $row->email,//storing email in session 
				'user_id' => $row->id,//storing userid in session 
				'logged_in' => TRUE
			);
			$this->session->set_userdata($session_array);
			
			return 1;
		}else{
			return 0;
		}
	}

	//checking current password are matches or not with user entered password
	public function passwordnew($password){
		$query = $this->db->query("SELECT * FROM account WHERE password = '".md5($password)."'");
		if($query->num_rows() == 1){
			return 1;
		}else{
			return 0;
		}
	}
	public function updatepassword($password){
		$updatedOn = date('Y-m-d H:i:s');
		$this->db->query("UPDATE account SET password = '".md5($password)."', created_on = '$updatedOn' WHERE email = '".$this->session->userdata('email')."'");
		
		return 1;
	}

	
}

?>