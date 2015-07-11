<?php	
	//To check user session
	user_session();

	//To include validation files
	validation_files();
	
	//To check form submit 
	if(isset($_POST['submit_value']))
	{
		//To get form field values
		$username			= $_SESSION['username'];
		$currentpassword 	= wraptext(sha1($_POST['currentpassword']));
		$password 			= wraptext(sha1($_POST['password']));
		$confirmpassword    = wraptext(sha1($_POST['confirmpassword']));
		
		if(strlen($_POST['password']) < 6)
		{
			frame_notices("Password length minimum 6 characters !!","failure");
		}
		elseif($password!=$confirmpassword)
		{
			frame_notices("Mismatching passwords !!","failure");
		}		
		else
		{
			//User login check
			$chk_user_login = select_single_record(USERS, "username", "username = '$username' AND password = '$currentpassword'");
			if($chk_user_login[0] > 0)
			{
				//To get user details
				$user_login_id = $chk_user_login[1];
				
				//To update last login
				update_table(USERS,"password='$confirmpassword'","username = '$username'");
				
				frame_notices("Password has been changed successfully !!","success");
				//To Redirect Page
				//redirect(SITEPATH."/administrator/home.php");
			}
			else
			{
				//To set notice message
				frame_notices("Invalid Current Password","failure");
				//To Redirect Page
				//redirect(SITEPATH."/administrator/index.php");
			}
		}		
	}
?>