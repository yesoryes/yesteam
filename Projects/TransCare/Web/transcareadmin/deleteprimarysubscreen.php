
<?php

include("connect.php");
if(isset($_POST['imageid'])) {  
    $aid = $_POST['imageid'];
	
   $query="Delete from primary_template2_carousal where id='$aid'";

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

    $untemp1img = mysql_query("SELECT * FROM primary_template1_carousal WHERE id='$temp1rgtimgid'");
    $fetchUntemp1 = mysql_fetch_array($untemp1img);
    $urlyou = $fetchUntemp1['template1_rightimages'];
    if($urlyou != ''){
    	if(!filter_var($urlyou, FILTER_VALIDATE_URL) === false){
    		$result=mysql_query("Delete from primary_template1_carousal where id='$temp1rgtimgid'");
	    	echo 1;
    	}else{
		unlink($fetchUntemp1['template1_rightimages']);
    	$result=mysql_query("Delete from primary_template1_carousal where id='$temp1rgtimgid'");
    	echo 1;
    	}
    }else{
    	echo 0;
    }
} 
if(isset($_POST['template3id'])) {  
    $temp3id = $_POST['template3id'];
	
   $query="Delete from primary_template3_event where te_id='$temp3id'";

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
	
   $query="Delete from primary_template4_event where te_id='$temp4id'";

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
