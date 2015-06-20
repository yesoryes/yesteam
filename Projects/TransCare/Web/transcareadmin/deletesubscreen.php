
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

    $untemp1img = mysql_query("SELECT * FROm template1_carousel WHERE template1_rightid='$temp1rgtimgid'");
    $fetchUntemp1 = mysql_fetch_array($untemp1img);
    $urlyou = $fetchUntemp1['template1_rightimages'];
    if($urlyou != ''){
    	if(!filter_var($urlyou, FILTER_VALIDATE_URL) === false){
    		$result=mysql_query("Delete from template1_carousel where template1_rightid='$temp1rgtimgid'");
	    	echo 1;
    	}else{
		unlink($fetchUntemp1['template1_rightimages']);
    	$result=mysql_query("Delete from template1_carousel where template1_rightid='$temp1rgtimgid'");
    	echo 1;
    	}
    }else
	{
		echo  0 ;
	}
}
if(isset($_POST['template3id'])) {  
    $temp3id = $_POST['template3id'];
	
   $query="Delete from template3event where te_id='$temp3id'";

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
if(isset($_POST['template4id'])) {  
    $temp4id = $_POST['template4id'];
	
   $query="Delete from template4event where te_id='$temp4id'";

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
