
<?php

include("connect.php");
if(isset($_POST['mainimgid'])) {  
    $aid = $_POST['mainimgid'];
    $sleMain = mysql_query("SELECT * FROM rotate_image_main WHERE rim_id = '$aid'");
    $fetchmain = mysql_fetch_array($sleMain);
    if(unlink($fetchmain['rotate_image_main'])){
    	$result=mysql_query("Delete from rotate_image_main where rim_id='$aid'");
    	echo 1;
    }else
	{

		echo  0 ;
	}
}
if(isset($_POST['idleimgid'])) {  
    $idleimgsid = $_POST['idleimgid'];
	$sleMain = mysql_query("SELECT * FROM rotate_image_idle WHERE rii_id = '$idleimgsid'");
    $fetchmain = mysql_fetch_array($sleMain);

    if(unlink($fetchmain['rotate_image_idle'])){
    	$result=mysql_query("Delete from rotate_image_idle where rii_id='$idleimgsid'");
    	echo 1;
    }else
	{

		echo  0 ;
	}
} 

 ?>
