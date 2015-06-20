
<?php

include("connect.php");
if(isset($_POST['imageid'])) {  
    $aid = $_POST['imageid'];
	
   $query="Delete from template2_carousal where id='$aid'";

	$result=mysql_query($query);

	if($result)

	{
		echo 1;

	}

else

{

	echo  0 ;

	

}
} 
if(isset($_POST['template1rghtimg'])) {  
    $temp1rgtimgid = $_POST['template1rghtimg'];
	
   $query="Delete from template1_carousel where template1_rightid='$temp1rgtimgid'";

	$result=mysql_query($query);

	if($result)

	{
		echo 1;

	}

else

{

	echo  0 ;

	

}
} 
 ?>
