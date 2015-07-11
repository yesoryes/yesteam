<?php
//Include header file
require_once(dirname(__FILE__).'/templates/header.php');
require_once(dirname(__FILE__).'/controller/post.php');
//Switch case to display the Pages
switch($task)
{	
    //Case for Add/Edit
    case "detail":
        //Include listing controller file
        require_once(dirname(__FILE__).'/controller/post_detail.php');
        //Include listing controller file
        require_once(dirname(__FILE__).'/templates/post_detail.php');
        break;

    //default case for listing
    default:
        //Include listing controller file
        require_once(dirname(__FILE__).'/controller/post_list.php');
        //Include listing controller file
        require_once(dirname(__FILE__).'/templates/post_list.php');
        break;
}//End of switchcase

require_once(dirname(__FILE__).'/templates/footer.php');
?>