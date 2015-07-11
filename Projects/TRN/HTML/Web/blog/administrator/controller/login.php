<?php
	//To check user login
	if(user_exists())
	{
		//To Redirect Page
		redirect(SITEPATH."/administrator/home.php");
	}
	
	//To check form submit 
	if(isset($_POST['submit_value']))
	{
		//To get form field values
		$username = wraptext($_POST['username']);
		$password = sha1(wraptext($_POST['password']));
		
		//User login check
		$chk_user_login = select_single_record(USERS, "username , id", "username = '$username' AND password = '$password' AND is_active = 1");
		if($chk_user_login[0] > 0)
		{
			//To get user details
			$user_login = $chk_user_login[1];
			
			//To set session values
			$_SESSION['username'] = striptext($user_login['username']);
			

			//To update last login
			update_table(USERS,"date_last_login = NOW()","username  = '$username'");
			
			//To Redirect Page
			redirect(SITEPATH."/administrator/home.php");
		}
		else
		{
			//To set notice message
			frame_notices("Invalid Username / Password, Try Again !!","failure");
			//To Redirect Page
			redirect(SITEPATH."/administrator/index.php");
		}		
	}
?>