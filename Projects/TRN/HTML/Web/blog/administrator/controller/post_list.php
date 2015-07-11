<?php

	validation_files();

    $search_condition   =   null;
    $nam    =   $_GET['nam'];
    if(empty($nam) === false)
    {
        $search_condition   =   " AND title LIKE '%$nam%' ";
    }

	
	//To get the total number of rows	
	$total             = totalrows(POSTS, "id", " id <> '' $search_condition", "ORDER BY id desc");

	if($total>0)
	{
		//For Pagination
		$limit 	= page_length();
		$pager  = getPagerData($total, $limit, $page); 
		$offset = $pager->offset; 
		$limit  = $pager->limit; 
		$page   = $pager->page;	
	
		//Intilize count for serial number(S.No)
		$s=$offset+1;
		
		//To display the list
		$get_list_details = select_multi_records(POSTS , " id, title, description, date_created, date_updated, is_active", " id <> '' $search_condition", "ORDER BY id desc LIMIT $offset, $limit");
	}
	
	
?>