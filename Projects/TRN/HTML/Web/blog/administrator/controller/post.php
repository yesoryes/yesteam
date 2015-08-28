<?php
//To check user session
user_session();

//To get the set of page values
$task         = wraptext($_GET['task']);
$page         = wraptext($_REQUEST['page']);
$delete_id    = wraptext($_GET['delete_id']);
$flag         = wraptext($_GET['flag']);
$status_id    = wraptext($_GET['status_id']);
$id            = wraptext($_GET['id']);


//To set file path
$upload_path   = "../uploads/photos/";
$thumb_path    = "../uploads/thumb/";

        //To intialize common query strings
$common_querystrings = ($page>0?"&page=$page":"").($nam!=""?"&nam=$nam":"");

//To check id
if($id>0)
{
    //To Get the dispaly details
    $get_display_details = select_single_record(POSTS , "id , title, description, file_path", "id = '$id'");
    $display_details     = $get_display_details[1];
    
    $id             = striptext($display_details['id']);
    $title          = striptext($display_details['title']);
    $file_path     = $upload_path.striptext($display_details['file_path']);
    $description    = striptext($display_details['description']);
    $is_active      = striptext($display_details['is_active']);
}

//Condition for status change option
if($status_id > 0)
{
        if($flag == "active")
        {
                //To update status as active
                update_table(POSTS, "is_active = '1'", "id = '$status_id'");
                //To display status change message
                frame_notices("Post has been activated successfully !!");
                //To redirect page
                redirect($redirect_page."?".$common_querystrings."#list");
        }
        else if($flag == "inactive")
        {
                //To update status as inactive
                update_table(POSTS, "is_active = '0'", "id = '$status_id'");
                //To display status change message
                frame_notices("Post has been deactivated successfully !!");
                //To redirect page
                redirect($redirect_page."?".$common_querystrings."#list");
        }
}//End of status change option

if($delete_id>0)
{
        delete_records(POSTS, "id = '$delete_id'");
        //To display delete message
        frame_notices("Post has been removed successfully !!");
        //To redirect page
        redirect($redirect_page."?".$common_querystrings."#list");

}//End of delete condition option 
//To set redirect page patt
$redirect_page       = SITEPATH."/administrator/post.php";
?>