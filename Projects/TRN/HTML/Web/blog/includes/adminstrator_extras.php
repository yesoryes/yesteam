<?php
	//Define Maxmimum File Size 
	define("MAX_FILE_SIZE", 10485760); 
	
	//Predifined Icons Paths
	//Add New Icon
	define("ADD_ICON", SITEPATH."/administrator/images/add.gif");
	define("ADD_ICON_ALT","Add New");
	//Edit Icon
	define("EDIT_ICON", SITEPATH."/administrator/images/edit.png");
	define("EDIT_ICON_ALT","Modify");
	//Preview Icon
	define("PREVIEW_ICON", SITEPATH."/administrator/images/preview.gif");
	define("PREVIEW_ICON_ALT","Preview");
	//Delete Icon
	define("DELETE_ICON", SITEPATH."/administrator/images/delete.gif");
	define("DELETE_ICON_ALT","Delete");
	//Active Icon
	define("ACTIVE_ICON", SITEPATH."/administrator/images/active.gif");
	define("ACTIVE_ICON_ALT","Deactivate");
	//Inactive Icon
	define("INACTIVE_ICON", SITEPATH."/administrator/images/inactive.gif");
	define("INACTIVE_ICON_ALT","Activate");
	//Delete Icon
	define("DELETE_IMAGE_ICON", SITEPATH."/administrator/images/delete-image.jpg");
	define("DELETE_IMAGE_ICON_ALT","Delete");
	//Back Icon
	define("BACK_ICON", SITEPATH."/administrator/images/back.gif");
	define("BACK_ICON_ALT","Back");
	//To define manadatory indication
	define('STAR', '<span class="redhint">*</span>&nbsp;');
	define('STAR_INDICATES', '<span class="redhint">* Indicates Mandatory Field</span>');
	
	//View Icon
	define("VIEW_ICON", SITEPATH."/administrator/images/view.gif");
	define("VIEW_ICON_ALT","View");

	##### DEFINE WIDTH & HEIGHT FOR THUMBNAIL AND LARGE IMAGES
	//DEFAULT SIZES
	define("LARGE_WIDTH", 500);
	define("LARGE_HEIGHT", 500);
	define("THUMB_WIDTH", 416);
	define("THUMB_HEIGHT", 190);

	//Page Heading array
	$heading_array = array("home.php" => "Welcome to Lead Generation System - Administration" ,"globalsetting.php" => "Global Settings" ,"changepassword.php" => "Change Password");
	
	//Function to check user exists
	function user_exists()
	{	
		if((empty($_SESSION['username'])))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	//Function to check user session
	function user_session()
	{
		if((empty($_SESSION['username'])))
		{
			//To set notice message
			frame_notices("Please Login in to Continue !!","failure");
			//To Redirect Page
			redirect(SITEPATH."/administrator/index.php");
		}
	}
	
	//Function to get admin page length
	function page_length()
	{
		//To get Admin page length
		$get_page_length = select_single_record(GLOBAL_CONFIGURATION, "admin_page_length", "", "LIMIT 1");
		if($get_page_length[0]>0)
		{
			$set_page_length = $get_page_length[1];
			$admin_page_length = striptext($set_page_length['admin_page_length']);
		}
		else
		{
			$admin_page_length = 10;
		}
		
		return (int) $admin_page_length;
	}	
	
	//Function to get row alternate color
	function alternate_color($count)
	{
		if(($count%2) == 1)
			echo 'class="row1"';
		else
			echo 'class="row2"';
	}
	
	//function to include validation files
	function validation_files()
	{
		//Script file
		echo '<script src="'.SITEPATH.'/administrator/validation/validationtextfield.js" type="text/javascript"></script>
		<script src="'.SITEPATH.'/administrator/validation/validationtextarea.js" type="text/javascript"></script>
		<script src="'.SITEPATH.'/administrator/validation/validationselect.js" type="text/javascript"></script>';
		//css file
		echo '<link href="'.SITEPATH.'/administrator/validation/validationtextfield.css" rel="stylesheet" type="text/css" />
		<link href="'.SITEPATH.'/administrator/validation/validationtextarea.css" rel="stylesheet" type="text/css" />
		<link href="'.SITEPATH.'/administrator/validation/validationselect.css" rel="stylesheet" type="text/css" />';
	}
	
	//function to include calender files
	function calendar_files()
	{		
		echo '
				<link type="text/css" href="'.SITEPATH.'/administrator/calendar/themes/base/jquery.ui.all.css" rel="stylesheet" />
				<script type="text/javascript" src="'.SITEPATH.'/administrator/calendar/jquery-1.4.2.js"></script>
				<script type="text/javascript" src="'.SITEPATH.'/administrator/calendar/ui/jquery.ui.core.js"></script>
				<script type="text/javascript" src="'.SITEPATH.'/administrator/calendar/ui/jquery.ui.widget.js"></script>
				<script type="text/javascript" src="'.SITEPATH.'/administrator/calendar/ui/jquery.ui.datepicker.js"></script>
				<link type="text/css" href="'.SITEPATH.'/administrator/calendar/demos.css" rel="stylesheet" />
		';
	}

	//Function to include back link page
	function back_link($width)
	{
		if(empty($_POST))
			$_SESSION['back_page'] = $_SERVER['HTTP_REFERER'];
			
			echo '<table width="'.$width.'" border="0" align="center"><tr><td align="right" valign="middle"><a href="'.$_SESSION['back_page'].'" title="'.BACK_ICON_ALT.'"><img border="0" align="absmiddle" src="'.BACK_ICON.'" title="'.BACK_ICON_ALT.'" alt="'.BACK_ICON_ALT.'">Back</a></td></tr></table>';
	}
?>