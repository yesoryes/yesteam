<?php
	

	//To set file path
	$upload_thumb_path   = "uploads/thumb/";
	$upload_path   		 = "uploads/photos/";
	
	$post_id 		= $_REQUEST['post_id'];
		
	if(!empty($_POST))
	{
		$name 		= wraptext($_POST['name']);
		$email 		= wraptext($_POST['email']);
		$comments 	= wraptext($_POST['comments']);
		insert_table(COMMENTS, ' `post_id`, `name`, `email`, `comment` ', " '$post_id', '$name', '$email', '$comments' ");
	}	
	if(!empty($post_id))
	{
		
		$get_post_details = select_single_record(POSTS, "  id, title, description, date_created, file_path", " id = $post_id ");
		
		
		//To get the total number of rows
		$total             = totalrows(COMMENTS, "id", " post_id = $post_id AND id <> '' $search_condition", "ORDER BY id desc");
	
		if($total>0)
		{
			//For Pagination
			$limit 		=  user_page_length();
	
			$pager  	= getPagerData($total, $limit, $page);
			$offset 	= $pager->offset;
			$limit  	= $pager->limit;
			$page   	= $pager->page;
					
			//Intilize count for serial number(S.No)
			$s=$offset+1;
	
			//To display the list
			$get_list_details = select_multi_records(COMMENTS, " name, email, comment, date_created ", " post_id = $post_id AND is_active = 1 AND id <> '' $search_condition", " ORDER BY id asc LIMIT $offset, $limit");
		 }
	 }
?>