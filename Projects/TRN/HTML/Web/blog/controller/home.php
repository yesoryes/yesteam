<?php

//To set file path
$upload_thumb_path   = "uploads/thumb/";
$upload_path   		 = "uploads/photos/";

$page = $_GET['page'];

//To intialize common query strings
$common_querystrings = ($page>0?"&page=$page":"");
	//To get the total number of rows
	$total             = totalrows(POSTS, "id", " id <> '' $search_condition", "ORDER BY id desc");

	if($total>0)
	{
		//For Pagination
		$limit 		=  user_page_length();

		$pager  	= getPagerData($total, $limit, $page);
		$offset 	= $pager->offset;
		$limit  	= $pager->limit;
		$page   	= $pager->page;
		$tot_pages 	= $pager->numPages;
		
		
		if(empty($page) || $page == 1)
		{
			$prev = 0;	
		}
		if($page < $tot_pages)
		{
			$next = $page + 1;
			$prev = $page - 1;
		}
		else if($page == $tot_pages)
		{
			$next = 0;
			$prev = $page - 1;
		}		
		
		//Intilize count for serial number(S.No)
		$s=$offset+1;

		//To display the list
		$get_list_details = select_multi_records(POSTS .' AS p LEFT JOIN '.COMMENTS.' AS c ON p.id = c.post_id ', "  p.id, p.title, p.description, p.date_created, p.file_path, p.is_active, COUNT(c.id) AS comment_count ", " p.id <> '' $search_condition", " GROUP BY p.id ORDER BY p.id desc LIMIT $offset, $limit");
	}


?>