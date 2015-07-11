<?php
	//To check user session
	user_session();
	
	//To include validation files
	validation_files();

	//To set redirect page patt
	$redirect_page = SITEPATH."/administrator/globalsetting.php";
	$file_image_path = "../uploads/paypalpro/";
	
	//To Get the dispaly details
	$get_display_details = select_single_record(GLOBAL_CONFIGURATION,"site_title,phonenumber,meta_keyword,meta_description,admin_page_length,admin_email,user_page_length , delimiter , delete_csv_days");
	$display_details = $get_display_details[1];		
	$site_title = striptext($display_details['site_title']);
	$phonenumber = striptext($display_details['phonenumber']);
	$meta_keyword =striptext($display_details['meta_keyword']);
	$meta_description = striptext($display_details['meta_description']);
	$admin_page_length = striptext($display_details['admin_page_length']);
	$user_page_length = striptext($display_details['user_page_length']);		
	$admin_email = striptext($display_details['admin_email']);
	$delete_csv_days = striptext($display_details['delete_csv_days']);				
	$delimiter = striptext($display_details['delimiter']);			
	//To check form submit 
	if(isset($_POST['submit_value']))
	{	
		//To get the form values
		$site_title = wraptext($_POST['site_title']);
		$phonenumber = wraptext($_POST['phonenumber']);
		$meta_keyword = wraptext($_POST['meta_keyword']);
		$meta_description = wraptext($_POST['meta_description']);
		$admin_page_length = wraptext($_POST['admin_page_length']);
		$user_page_length = wraptext($_POST['user_page_length']);		
		$admin_email =  wraptext($_POST['admin_email']);				
		$delete_csv_days =  wraptext($_POST['delete_csv_days']);				
		$delimiter =  wraptext($_POST['delimiter']);				
		
			$lofttv_set_details_query = totalrows(GLOBAL_CONFIGURATION,'*');
			if($lofttv_set_details_query>0)
			{
				update_table(GLOBAL_CONFIGURATION, "site_title = '$site_title',phonenumber = '$phonenumber',meta_keyword = '$meta_keyword',meta_description = '$meta_description',admin_page_length = '$admin_page_length',admin_email = '$admin_email',user_page_length = '$user_page_length',delete_csv_days = '$delete_csv_days' , delimiter = '$delimiter' ");
							
				//To display updated message
				frame_notices("Global settings Details Updated Successfully !!", "success");
				//To Redirect Page
				redirect($redirect_page);	
				
				
			}	
			else
			{
				insert_table(GLOBAL_CONFIGURATION, "site_title,phonenumber,meta_keyword,meta_description,admin_page_length,user_page_length,delete_csv_days,delimiter" ,"'$site_title','$phonenumber','$meta_keyword','$meta_description','$admin_page_length','$user_page_length','$delete_csv_days','$delimiter'");
		
				//To display updated message
				frame_notices("Global settings Details Added Successfully !!", "success");
				//To Redirect Page
				redirect($redirect_page);	
			}
	}
    //To display notice message
    notice_message();
?>