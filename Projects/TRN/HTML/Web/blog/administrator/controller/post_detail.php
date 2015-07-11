<?php
	//To include validation files
	validation_files();

    $id = wraptext($_GET['id']);

	//To check form submit 
	if(isset($_POST['submit_value']))
	{
		//To get the form values
		$title          =   wraptext($_POST['title']);
		$description    =   wraptext($_POST['description']);
		//To set values for Image upload
		$file_accept        = true;
		$file_types         = array('jpg', 'jpeg', 'png', 'gif');
		$field_name        = 'file_path';
		$file_name         = '';
		
			
		if($_FILES[$field_name]['size'] <= 0  && !file_exist($file_path))
		{
			frame_notices("Please select a image file","failure");
			$error = true;
		}
		else
		{
			if($_FILES[$field_name]['size'] > 0)
			{
				$file_name = file_upload($upload_path, $field_name, '', $file_types, MAX_FILE_SIZE);
				
				$file_path      	 = $upload_path.$file_name;
				$get_thmb_file_path	 = $thumb_path.$file_name;
				//case for file upload error
				switch($file_name)
				{
					case "extension_failed":
						//To set notice message
						frame_notices(file_extension_message($file_types,"Image :"),"failure");
						$file_accept = false;
						break;
						
					case "size_failed":
						//To set notice message
						frame_notices(file_size_message("Image :"),"failure");
						$file_accept = false;
						break;
					
					case "file_exist":
						//To set notice message
						frame_notices(file_exist_message("Image :"),"failure");
						$file_accept = false;
						break;
				}
			}	
			if($file_accept)
			{
				
				//To creare thumb image
				image_resize($file_path, $get_thmb_file_path, THUMB_WIDTH, THUMB_HEIGHT);
				
                if(empty($id))
                {
                    insert_table(POSTS,  "title , description, file_path", " '$title', '$description', '$file_name'");
					//To display updated message
					frame_notices("Post added successfully !!", "success");
                }
                else
                {
					//To update new logog file
					update_table(POSTS, "title = '$title', description = '$description', date_updated = now()", "id = '$id'");

                    if(empty($_FILES[$field_name]['size']) === false)
                        update_table(POSTS, "file_path = '$file_name', date_updated = now()", "id = '$id'");
						
					frame_notices("Post updated successfully !!", "success");
                }
				//To Redirect Page
				redirect($redirect_page.'?'.$common_querystrings.'#list');
			}	
		}		
		//End Url Validation
	}
    //To display notice message
    notice_message();
?>