<?php

include("admin-header.php");



$getelement = $_GET['scid'];

$gettbe = $_GET['tn'];



$get_template_id = $_GET['temp_id'];



if(isset($_POST['editSave'])){



$linkId = $_POST['updatelinkname'];

$linkname = $_POST['elinkname'];

if($linkname != ""){



$quers = mysql_query("UPDATE template_content SET linkname = '$linkname' WHERE id = '$linkId'");



}





if(isset($_POST['template1'])){

	

	$title = $_POST['etemp1title'];

	$desc = $_POST['etemp1desc'];

	$temp1id = $_POST['template1id'];

	//Update template1 link 

	//echo "UPDATE template1_link SET title = '$title', description = '$desc' WHERE id = '$temp1id'";

	$uptemp = mysql_query("UPDATE template1_link SET title = '$title', description = '$desc' WHERE template1_id = '$temp1id'");

	

	if(isset($_FILES['template1image']['name']))

	{

		$tempfilesize=$_FILES['template1image']['size'];

		if($tempfilesize>0)

		{

	   $tmpFilePath = $_FILES['template1image']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $tempremove = $_POST['gettopImage'];

		   unlink($tempremove);

		   $temppath = "template1image/"; // create folder 

		   $tempName = $_FILES['template1image']['name'];

		   $tempN = $temppath.$tempName;



		   if(move_uploaded_file($_FILES['template1image']['tmp_name'], $tempN)){

		   $qur = mysql_query("UPDATE template1_link SET topimage = '$tempN' WHERE template1_id = '$temp1id'");

		   }

	   }

		}

	}

	

	//update template1 link right images with multimple time

	

	//update rotating image main

		

	$tempCount = $_POST['countRight'];

	

	for($i=1; $i <= $tempCount; $i++) 

	{

		$t1id = $_POST['t1id'.$i];

		$tmpFilePath = $_FILES['etemplate1topimage'.$i]['tmp_name'];

	   if($_FILES["etemplate1topimage".$i]["size"] > 0)

	   {   

		

		   $tempr1path = "template1topimage/"; // create folder 

		   $tmpr1name = $_FILES['etemplate1topimage'.$i]['name'];

		   $deletImg = $_POST['temprimage'.$i];

		   $chename = $tempr1path.$tmpr1name;

		   unlink($deletImg);



		   if(move_uploaded_file($_FILES['etemplate1topimage'.$i]['tmp_name'], $chename)) 

		   { 

		   //echo ;

			$equery=mysql_query("UPDATE template1_carousel SET template1_rightimages = '$chename' WHERE template1_rightid = '$t1id'");

		   }

			

		}

	}

	

	//Add&edit rotating main

	if(isset($_FILES['aetemplate1topimage']['name']))

	{

		for($i=0; $i<count($_FILES['aetemplate1topimage']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['aetemplate1topimage']['tmp_name'][$i];

			   if ($tmpFilePath != "")

			   {    

				   $path = "template1topimage/"; // create folder 

				   $name = $_FILES['aetemplate1topimage']['name'][$i];

				   $paname = $path.$name;



				   if(move_uploaded_file($_FILES['aetemplate1topimage']['tmp_name'][$i], $paname)) 

				   { 

					$query=mysql_query("INSERT INTO `template1_carousel` (template_id, template1_rightimages, template_content_id) VALUES('$get_template_id', '$paname', '$getelement')");

				   }

			 }

		}



	}

	

	

	

}



//Update template 2



if(isset($_POST['template2'])){

	

	$title = $_POST['etemp2title'];

	$subtitle1 = $_POST['etemp2subtitle'];

	$desc1 = $_POST['etemp2desc'];

	$temp1id = $_POST['template1id'];

	

	//Update template2 link 

	//echo "UPDATE template1_link SET title = '$title', description = '$desc' WHERE id = '$temp1id'";

	$uptemp = mysql_query("UPDATE template2_link SET title = '$title', subtitle = '$subtitle1', description = '$desc1' WHERE template2_id = '$temp1id'");

	

	if(isset($_FILES['etemplate2topimage']['name']))

	{

		$tempfilesize=$_FILES['etemplate2topimage']['size'];

		if($tempfilesize>0)

		{

	   $tmpFilePath = $_FILES['etemplate2topimage']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $tempremove = $_POST['gettop1Image'];

		   unlink($tempremove);

		   $temppath = "template2topimage/"; // create folder 

		   $tempName = $_FILES['etemplate2topimage']['name'];

		   $tempN = $temppath.$tempName;



		   if(move_uploaded_file($_FILES['etemplate2topimage']['tmp_name'], $tempN)){

		   $qur = mysql_query("UPDATE template2_link SET image = '$tempN' WHERE template2_id = '$temp1id'");

		   }

	   }

		}

	}

	

	//update template2 link right images with multimple time

	

		

	$tempCount = $_POST['count2Right'];

	

	for($i=1; $i <= $tempCount; $i++) 

	{

		$t2id = $_POST['t2id'.$i];

		$tmpFilePath = $_FILES['etemplate2rightimage'.$i]['tmp_name'];

	   if($_FILES["etemplate2rightimage".$i]["size"] > 0)

	   {   

		

		   $tempr1path = "template2rightimage/"; // create folder 

		   $tmpr1name = $_FILES['etemplate2rightimage'.$i]['name'];

		   $deletImg = $_POST['temprimage'.$i];

		   $chename = $tempr1path.$tmpr1name;

		   unlink($deletImg);



		   if(move_uploaded_file($_FILES['etemplate2rightimage'.$i]['tmp_name'], $chename)) 

		   { 

		   //echo ;

			$equery=mysql_query("UPDATE template2_carousal SET template2_rightimages = '$chename' WHERE id = '$t2id'");

		   }

			

		}

	}

	

	if(isset($_FILES['aetemplate2rightimage']['name']))

	{

		//echo count($_FILES['aetemplate2rightimage']['name']);

		for($i=0; $i<count($_FILES['aetemplate2rightimage']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['aetemplate2rightimage']['tmp_name'][$i];

			   if ($tmpFilePath != "")

			   {    

				   $path = "template2rightimage/"; // create folder 

				   $name = $_FILES['aetemplate2rightimage']['name'][$i];

				   $paname = $path.$name;



				   if(move_uploaded_file($_FILES['aetemplate2rightimage']['tmp_name'][$i], $paname)) 

				   { 

				   echo "INSERT INTO `template2_carousal` (template2_rightimages, template_content_id) VALUES('$paname', '$getelement')";

					$query=mysql_query("INSERT INTO `template2_carousal` (template2_rightimages, template_content_id) VALUES('$paname', '$getelement')");

				   }

			 }

		}



	}

	

	

	

}



//Update template 3



if(isset($_POST['template3'])){

	$title = $_POST['etemp3tittle'];



	for($i=0; $i<count($_POST["eeventname"]); $i++) 

		{

			$temp3id=$_POST["template3id"][$i];

			$eventname=$_POST["eeventname"][$i];

			   $temp3description=$_POST["etemplate3description"][$i];

			     $time=$_POST["etime"][$i];

				   $temp3place=$_POST["etemp3place"][$i];

				   $date=$_POST["edate"][$i];

			

		$template3=mysql_query("UPDATE `template3_link` SET title = '$title', eventname = '$eventname',description = '$temp3description', time = '$time',date = '$date', place = '$temp3place' WHERE id = '$temp3id'");

				

		

			

			

		}

	

}





//Update template 4



if(isset($_POST['template4'])){

	$title = $_POST['etemplate4title'];

	for($i=0; $i<count($_POST["eheadername"]); $i++) 

		{

			$temp4id=$_POST["template4id"][$i];

			$headername=$_POST["eheadername"][$i];

			   $description=$_POST["etemp4description"][$i];

			     $division=$_POST["eDivision"][$i];

				   $type=$_POST["eType"][$i];

				     $available=$_POST["eAvailable"][$i];

					   $place=$_POST["ePlace"][$i];

					   $template3=mysql_query("UPDATE `template4_link` SET title = '$title', headername = '$headername',description = '$description', division = '$division',type = '$type',available= '$available', place = '$place' WHERE id = '$temp4id'");

		}





	

}







//Update template 5



if(isset($_POST['template5'])){

	

	$title = $_POST['etemp5title'];

	$desc1 = $_POST['etemp5desc'];

	$temp5id = $_POST['template5id'];

	

	//Update template2 link 

	//echo "UPDATE template1_link SET title = '$title', description = '$desc' WHERE id = '$temp1id'";

	$uptemp = mysql_query("UPDATE template5_link SET title = '$title', description = '$desc1' WHERE temp5_id = '$temp5id'");

	

	if(isset($_FILES['etemplate5bannerimg']['name']))

	{

		$tempfilesize=$_FILES['etemplate5bannerimg']['size'];

		if($tempfilesize>0)

		{

	   $tmpFilePath = $_FILES['etemplate5bannerimg']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $tempremove = $_POST['gettopImage'];

		   unlink($tempremove);

		   $temppath = "template5bannerimg/"; // create folder 

		   $tempName = $_FILES['etemplate5bannerimg']['name'];

		   $tempN = $temppath.$tempName;



		   if(move_uploaded_file($_FILES['etemplate5bannerimg']['tmp_name'], $tempN)){

		   $qur = mysql_query("UPDATE template5_link SET bannerimage = '$tempN' WHERE temp5_id = '$temp5id'");

		   }

	   }

		}

	}

	

	

	

}



//Update template 6



if(isset($_POST['template6'])){

	

	$title = $_POST['etemplate6title'];

	$desc1 = $_POST['temp6desc'];

	$temp6id = $_POST['template6id'];

	

	//Update template2 link 

	//echo "UPDATE template1_link SET title = '$title', description = '$desc' WHERE id = '$temp1id'";

	$uptemp = mysql_query("UPDATE template6_link SET title = '$title', description = '$desc1' WHERE temp6_id = '$temp6id'");

	

	if(isset($_FILES['template6bannerimg']['name']))

	{

		$tempfilesize=$_FILES['template6bannerimg']['size'];

		if($tempfilesize>0)

		{

	   $tmpFilePath = $_FILES['template6bannerimg']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

		   $tempremove = $_POST['gettopImage'];

		   unlink($tempremove);

		   $temppath = "template6bannerimg/"; // create folder 

		   $tempName = $_FILES['template6bannerimg']['name'];

		   $tempN = $temppath.$tempName;



		   if(move_uploaded_file($_FILES['template6bannerimg']['tmp_name'], $tempN)){

		   $qur = mysql_query("UPDATE template6_link SET bannerimage = '$tempN' WHERE temp6_id = '$temp6id'");

		   }

	   }

		}

	}

	

	

	

}









if($quers){

	$message = "Template added sucessfully";

}



}







?>

<style>

	.fileUpload {

	position: relative;

	overflow: hidden;

	margin: 10px;

}

.fileUpload input.upload {

	position: absolute;

	top: 20px;

	right: 0;

	margin: 0;

	padding: 0;

	font-size: 20px;

	cursor: pointer;

	opacity: 0;

	filter: alpha(opacity=0);

}



.save_button{

	border: 1px solid #000;

	padding: 12px 80px;

	cursor:pointer;

}

.save_button:hover{

	background-color:#000;

	color:#fff;

}

</style>

<form method="post" action="" enctype="multipart/form-data">

<div class="container">

	<!-----Header Part--->

 <div class="header">

    	<div class="headerContent">

            <div class="indexLogo">

                   Admin Panel

            </div>

            <div class="indexLogout">

                <a href="process.php"></a>

            </div>

        </div>

 </div>

 <?php if(isset($message)){ ?> 

	<h2 style="border:#000; padding:10px; background-color: #B2DBB2;margin: 10px 184px;color: #626262;border-radius: 4px;"><?php echo $message; ?></h2>

    <?php } ?>

    <!-- Sub Screens-->

  <div class="subScreenheader">   

        <div class="back">

                <a href="transcare_manage.php"></a>

        </div> 

        <?php

		$getlink = mysql_query("SELECT * FROM template_content WHERE id = '$getelement'");

		$fetctlink = mysql_fetch_array($getlink);

		 ?>

        <div class="linkName">

            <p>Link Name</p>

            <p class="linkLimit">

            <input type="hidden" name="updatelinkname" value="<?php echo $getelement; ?>">

            <input type="text" name="elinkname"  class="linkText" value="<?php echo $fetctlink['linkname']; ?>"> 

            <span>Note: Limit 20 Characters</span></p>

        </div>

		<!--<div class="subScr1">

                <a href="#"></a>

        </div>

        <div class="subScr2">

                <a href="#"></a>

        </div>

        <div class="addSubScr">

                <a href="#"></a>

        </div>-->

   </div> 

   <div class="subScreenContent">

		<div class="temSec">  

        	<div class="contentSecTitle">

        		<h3>Template</h3>

        	</div>

    	</div> 

           <!-----Template1--->

          

           <?php 

		   

		   if($get_template_id == 1){ 

		   

		   	$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

			$fetquery = mysql_fetch_array($query);

		   ?>

           

           <input type="hidden" name="template1" value="template1">

        <div class="fillContent" id="subscreen1">        

            <div class="mainTitle">

                <h3>Fill Content - Template C</h3>

            </div>

            <div class="fillSec">

                <div class="contentSecTitle">

                    <h3>Left Part- Text</h3>

                </div>

                <div class="left-part">

                    <div class="fill-title"> 

                    <input type="hidden" name="template1id" value="<?php echo $fetquery['template1_id']; ?>">

                        <label>Title</label> <input type="text" name="etemp1title" id="" value="<?php echo $fetquery['title']; ?>" class="fillTitleText"> <!--<a href="#"></a>  -->

                    </div>

                    <div class="text-area">

                      <label>Description</label>  <textarea rows="4" name="etemp1desc"><?php echo $fetquery['description']; ?></textarea>

                    </div>

				</div>

			</div> 

            <div class="section2">

            	 <div class="contentSecTitle">

                     <h3>Top Image</h3>

                </div>

                 <div class="subSec">                

                    <div class="subSec1">

                        <div class="ses1">

                            <p>1</p>

                        </div>

                        <div class="contentSec2Left">

                        

                <input type="text" id="template1_topimage" value="<?php echo $fetquery['topimage']; ?>" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span>

                     <input id="temp1" onchange="template1topimage(this)" name="template1image" type="file" class="upload" value="Browse">

                 </div>

                          

                        </div>

                        <div class="contentSecRight"> 

                        <input type="hidden" name="gettopImage" value="<?php echo $fetquery['topimage']; ?>">

                              <p class="imageView3"><img id="changetopimg" style="width:82px; height:82px;" src="<?php echo $fetquery['topimage']; ?>"><br><br>Current Image</p>

                              <!--<p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="javascript:void(0);" onclick="eremovetemplate1topimg();"></a>

                              </div> -->

                        </div>

                     </div> 

                 </div>

            </div>  

           <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right - Files</h3>

                </div>

                <div class="subSec">  

                <div id="template1rightfiles"> 

                

                <?php

				$i = 1;

				$getimage = mysql_query("SELECT * FROM template1_carousel WHERE template_content_id = '$getelement'");

				$countIm = mysql_num_rows($getimage);

				while($fetcImg = mysql_fetch_array($getimage)){

				?>

                <input type="hidden" name="t1id<?php echo $i; ?>" value="<?php echo $fetcImg['template1_rightid']; ?>">

                      <input type="hidden" name="countRight" value="<?php echo $countIm; ?>" >      

                    <div class="subSec1" id="appendtemplate1class<?php echo $i; ?>">  

                    

                        <div class="ses1">

                             <!--<input type="hidden" id="temp1righthid" value="1" /> --> 

                        <p id="temp1count1"><?php echo $i; ?></p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template1_rightimage<?php echo $i; ?>" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp1_right<?php echo $i; ?>" onchange="template1rightimage(this,<?php echo $i; ?>)" name="etemplate1topimage<?php echo $i; ?>" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                        <input type="hidden" name="temprimage<?php echo $i; ?>" value="<?php echo $fetcImg['template1_rightimages']; ?>">

                              <p class="imageView3"><img src="<?php echo $fetcImg['template1_rightimages']; ?>" style="width:82px; height:82px;" id="temp1_currimg<?php echo $i; ?>"><br><br>Current Image</p>

                              <div class="deLete">

                                    <a href="javascript:void(0);"  onClick="removetemplate1rightfiles(<?php echo $i; ?>,<?php echo $fetcImg['template1_rightid'];  ?>);"></a>

                              </div> 

                        </div>

                        </div>

                        

                      <?php 

					  $i++;

					  } 

					  if($countIm < 5){

					  $getbal1 = 5 - $countIm;

						  ?>

                          <h3 style="margin-bottom:10px;">You Can add <?php echo $getbal1; ?> images</h3>

                          <?php for($i=1; $i <= $getbal1; $i++){ ?>

                          <div class="subSec1">  

                    

                        <div class="ses1">

                             <!--<input type="hidden" id="temp1righthid" value="1" /> --> 

                        <p id="temp1count1"><?php echo $i; ?></p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="aetemplate1_rightimage<?php echo $i; ?>" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="aetemp1_right<?php echo $i; ?>" onchange="aetemplate1rightimage(this,<?php echo $i; ?>)" name="aetemplate1topimage[]" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="<?php echo $fetcImg['template1_rightimages']; ?>" style="width:82px; height:82px;" id="aetemp1_currimg<?php echo $i; ?>"><br><br>Current Image</p>

                              <!--<div class="deLete">

                                    <a href="javascript:void(0);"  onClick="aeremovetemplate1rightfiles(<?php echo $i; ?>);"></a>

                              </div> 
-->
                        </div>

                        </div>

                      <?php }

					  }?>

                     </div>

                 </div> 

        	</div> 

        </div>

        <?php }

		if($get_template_id == 2){

			$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

			$fetquery = mysql_fetch_array($query);

		 ?>

        <!-----Template2 ---> 

        <input type="hidden" name="template2" value="template2">

        

          <div class="fillContent" id="subscreen2">         

           <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div>

            <input type="hidden" name="template1id" value="<?php echo $fetquery['template2_id']; ?>">

            <div class="current-title"> 

                      <label>Current Title</label> <input type="text" class="fillTitleText" placeholder="Lorem Ipsum" name="etemp2title" value="<?php echo $fetquery['title']; ?>"> <!-- <a href="#">Edit</a>-->  

            </div>

            <div class="fillSec">

                <div class="contentSecTitle">

                    <h3>Left Side</h3>

                </div>

                <div class="current-subtitle"><label>Sub Title</label> <input type="text" name="etemp2subtitle" id="" class="subtitle-text" placeholder="Lorem Ipsum" value="<?php echo $fetquery['subtitle']; ?>"></div>

                <div class="subSec">

                              

                    <div class="subSec1">   

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template2topimg" value="<?php echo $fetquery['image']; ?>" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp2_topimg" onchange="template2topimage(this)" name="etemplate2topimage" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                        <input type="hidden" name="gettop1Image" value="<?php echo $fetquery['image']; ?>">

                              <p class="imageView3"><img src="<?php echo $fetquery['image']; ?>" style="width:82px; height:82px;" id="changetemp2topimg"><br><br>Current Image</p>

                              <!--<p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate2topimage()"></a>

                              </div> -->

                        </div>

                     </div>

                    

                     

                 </div>

                <div class="current-textarea">  

                    <div class="text-area">

                       <label>Descrption</label><textarea rows="4" name="etemp2desc"><?php echo $fetquery['description']; ?></textarea>

					</div>

                   

                </div> 

            </div> 

           <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right Side</h3>

                </div>

                <div class="subSec">                

                     <div id="template2rightfiles">

                     

                     <?php

						$i = 1;

						$getimage = mysql_query("SELECT * FROM template2_carousal WHERE template_content_id = '$getelement'");

						$countIm = mysql_num_rows($getimage);

						if($countIm>0){

						while($fetcImg = mysql_fetch_array($getimage)){

					?>

                      <input type="hidden" name="t2id<?php echo $i; ?>" value="<?php echo $fetcImg['id']; ?>">

                      <input type="hidden" name="count2Right" value="<?php echo $countIm; ?>" >          

                    <div class="subSec1" id="appendclass<?php echo $i; ?>">   

                    

                        <div class="ses1">

                             <!--<input type="hidden" id="temp2righthid" value="1" /> --> 

                        <p id="temp2count1"><?php echo $i; ?></p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template2_rightimage<?php echo $i; ?>" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp2_right<?php echo $i; ?>" onchange="template2rightimage(this,<?php echo $i; ?>)" name="etemplate2rightimage<?php echo $i; ?>" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                        <input type="hidden" name="temprimage<?php echo $i; ?>" value="<?php echo $fetcImg['template2_rightimages']; ?>">

                              <p class="imageView3"><img src="<?php echo $fetcImg['template2_rightimages']; ?>" style="width:82px; height:82px;" id="temp2_currimg<?php echo $i; ?>"><br><br>Current Image</p>

                              <p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="javascript:void(0);"  onClick="removetemplate2rightfiles(<?php echo $i; ?>,<?php echo $fetcImg['id']; ?>);"></a>

                              </div> 

                        </div>

                        </div>

                        <?php 

					  $i++;

					  }

						}

					  if($countIm < 6){

					  $getbal1 = 6 - $countIm;

						  ?>

                          <h3 style="margin-bottom:10px;">You Can add <?php echo $getbal1; ?> images</h3>

                          <?php for($i=1; $i <= $getbal1; $i++){ ?>

                          <div class="subSec1">  

                    

                        <div class="ses1">

                             <!--<input type="hidden" id="temp1righthid" value="1" /> --> 

                        <p id="temp1count1"><?php echo $i; ?></p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="aetemplate2_rightimage<?php echo $i; ?>" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="aetemp2_right<?php echo $i; ?>" onchange="aetemplate2rightimage(this,<?php echo $i; ?>)" name="aetemplate2rightimage[]" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="<?php echo $fetcImg['template1_rightimages']; ?>" style="width:82px; height:82px;" id="aetemp2_currimg<?php echo $i; ?>"><br><br>Current Image</p>

                              <!--<div class="deLete">

                                    <a href="javascript:void(0);"  onClick="aeremovetemplate2rightfiles(<?php echo $i; ?>);"></a>

                              </div> -->

                        </div>

                        </div>

                           <?php }

					  }?>

                     </div>

                 

                    

                 

                    <!-- <div class="addMore" id="template2addbutton">

                            <a href="javascript:void(0);" onClick="addtemplate2rightfiles();"></a>

                     </div>-->

                     

                     

                     

                     

                      

                 </div> 

        	</div> 

        </div> 

        <?php } 

		 if($get_template_id == 3){

		 	$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

			$fetquery = mysql_fetch_array($query);

		?>

        <!-----Template 3 ---->

        <input type="hidden" name="template3" value="template3">

             <div class="fillContent" id="subscreen3">    

            <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div> 

            <div class="fillSec"> 

                <div class="contentSecTitle">

                    <h3>Events</h3>

                </div>

                <div class="current-title"> 

               

                      <label>Current Title</label> <input type="text" value="<?php echo $fetquery['title']; ?>" name="etemp3tittle" class="fillTitleText" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>-->  

                </div> 

                <?php  

                $getMultiple = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = '$getelement'");

				$i = 1;

                while($fetchMulti = mysql_fetch_array($getMultiple)){



                ?>

                  <input type="hidden" name="template3id[]" value="<?php echo $fetchMulti['id']; ?>">

				<div class="event-sec">      

                    <div class="ses1"> 

                        <p><?php echo $i; ?></p>

                    </div>

                    <div class="event-content">      

                       

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eeventname[]" id="" value="<?php echo $fetchMulti['eventname']; ?>" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4"  name="etemplate3description[]" ><?php echo $fetchMulti['description']; ?></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="etime[]" id="" value="<?php echo $fetchMulti['time']; ?>" class="subtitle-text" placeholder="">

                            	</div>

                                  <div class="event-title"><label>Date</label> <input type="date" name="edate[]" id="" value="<?php echo $fetchMulti['date']; ?>" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="etemp3place[]" id="" value="<?php echo $fetchMulti['place']; ?>" class="subtitle-text" placeholder="Place Name"></div>

                      

                                                                         

                    </div> 

				</div>

				<?php 

				$i++;

				} ?>

               			</div>

		</div>

        <?php }

		 if($get_template_id == 4){

			$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

			$fetquery = mysql_fetch_array($query);

		 ?>

        <!---- Template4--->

        <input type="hidden" name="template4" value="template4">

        <div class="fillContent" id="subscreen4">       

         <div class="mainTitle"> 

                <h3>Fill Content - Template D</h3> 

            </div> 

            <div class="fillSec">  

                <div class="contentSecTitle">

                    <h3>Sub Screen</h3>

                </div>

                <div class="current-title"> 

                      <label>Current Title</label> <input type="text" name="etemplate4title" class="fillTitleText" placeholder="Lorem Ipsum" value="<?php echo $fetquery['title'] ?>">  <!--<a href="#">Edit</a>  -->

                </div>

                 <?php  

                $getMultipletemp4 = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = '$getelement'");

				$i = 1;

                while($fetchMultitemplate4 = mysql_fetch_array($getMultipletemp4)){



                ?>

                <input type="hidden" name="template4id[]" value="<?php echo $fetchMultitemplate4['id']; ?>">

				<div class="event-sec">     

                    <div class="ses1">

                        <p><?php echo $i ?></p>

                    </div>

                    <div class="event-content"> 

                      

                            <div class="event-title"><label>Header Name</label> <input type="text" name="eheadername[]" id="" value="<?php echo $fetchMultitemplate4['headername'] ?>" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="etemp4description[]"><?php echo $fetchMultitemplate4['description'] ?></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="eDivision[]" id="" value="<?php echo $fetchMultitemplate4['division'] ?>" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="eType[]" id="" value="<?php echo $fetchMultitemplate4['type'] ?>" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="eAvailable[]" id="" value="<?php echo $fetchMultitemplate4['available'] ?>" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="ePlace[]" id="" value="<?php echo $fetchMultitemplate4['place'] ?>" class="subtitle-text" placeholder=""></div>

                       

                                                                         

                    </div> 

				</div>

                <?php

				$i++;

				}?>

                

                </div>

                </div>

                <?php }

				if($get_template_id == 5){

					$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

					$fetquery = mysql_fetch_array($query);

				 ?>

                 <!-- Template5-->

                 <input type="hidden" name="template5" value="template5">

        <div class="fillContent" id="subscreen5">    

        <div class="mainTitle"> 

                <h3>Fill Content - Template E</h3> 

            </div>

            <input type="hidden" name="template5id" value="<?php echo $fetquery['temp5_id']; ?>">

            <div class="current-title">  

				<label>Main Title</label> <input type="text" class="fillTitleText" name="etemp5title"placeholder="Lorem Ipsum" value="<?php echo $fetquery['title']; ?>"><!--  <a href="#">Edit</a>  -->

            </div>

            <div class="section2"> 

                <div class="contentSecTitle">

                    <h3>Banner Image</h3>

                </div>

                <div class="subSec">                

                    <div class="subSec1">  

                        <div class="contentSec2Left">

                                      <input type="text" id="template5banner" value="<?php echo $fetquery['bannerimage']; ?>" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp5_bannerimg" onchange="addtemplate5banner(this)" name="etemplate5bannerimg" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                        <input type="hidden" name="gettopImage" value="<?php echo $fetquery['bannerimage']; ?>">

                              <p class="imageView3"><img src="<?php echo $fetquery['bannerimage']; ?>" style="width:82px; height:82px;" id="changetemp5banner"><br><br>Current Image</p>

                             <!-- <p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="" onClick="removetemplate5banner()"></a>

                              </div> 
-->
                        </div>

                     </div>  

                 </div> 

        	</div>

            <div class="fillSec"> 

                <div class="contentSecTitle">

                    <h3>Content</h3>

                </div> 

                <div class="current-textarea">  

                    <div class="text-area">

                      <label>Description</label>  <textarea rows="4" name="etemp5desc" ><?php echo $fetquery['description']; ?></textarea>

					</div>

                    

                </div> 

            </div> 

        </div>

        <?php }

		if($get_template_id == 6){

			$query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

			$fetquery = mysql_fetch_array($query);

		 ?>

        <!-- Template6-->

        <input type="hidden" name="template6" value="template6">

        <div class="fillContent" id="subscreen6">    

        <div class="mainTitle">

                <h3>Fill Content - Template F</h3> 

            </div>

            <input type="hidden" name="template6id" value="<?php echo $fetquery['temp6_id']; ?>">

            <div class="current-title"> 

				<label>Main Title</label> <input value="<?php echo $fetquery['title']; ?>" type="text" class="fillTitleText" name="etemplate6title" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>  -->

            </div>

            <div class="section2">  

                <div class="contentSecTitle">

                    <h3>Banner Image</h3>

                </div>

                <div class="subSec">                

                    <div class="subSec1">  

                        <div class="contentSec2Left">

                                      <input type="text" id="template6banner" value="<?php echo $fetquery['bannerimage']; ?>" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp6_bannerimg" onchange="addtemplate6banner(this)" name="template6bannerimg" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight">

                        <input type="hidden" name="gettopImage" value="<?php echo $fetquery['bannerimage']; ?>"> 

                              <p class="imageView3"><img src="<?php echo $fetquery['bannerimage']; ?>" style="width:82px; height:82px;" id="changetemp6banner"><br><br>Current Image</p>

                             <!-- <p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="" onClick="removetemplate6banner()"></a>

                              </div> -->

                        </div>

                     </div>  

                 </div> 

        	</div>

            <div class="fillSec"> 

                <div class="contentSecTitle">

                    <h3>Content</h3>

                </div> 

                <div class="current-textarea">  

                    <div class="text-area">

                       <label>Desription</label>  <textarea rows="4" name="temp6desc"><?php echo $fetquery['description']; ?></textarea>

					</div>

                    

                </div> 

            </div> 

            </div>

            <?php } ?>

         <!-- <p class="innerText"><a href="#">Delete this Screen</a></p>-->

         <div class="save" style="margin:40px 0;width: 204px;">

              <input type="submit" value="Save" name="editSave" class="save_button">

         </div>

        <!-- <div class="preview">

                            <a href="#"></a>

         </div> -->

  

  </div>

</div>

</form>

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

<script type="text/javascript">

/*top image in template1*/

                bkLib.onDomLoaded(function() { 

				nicEditors.allTextAreas()

				 });        

//template 1 Top images

	function template1topimage(input) {

		$('#template1_topimage').val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#changetopimg').attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   

    $("#temp1").change(function() {

	   template1topimage(this);

   });
   
function removetemplate1rightfiles(id,temp1imgid)
	{
		$.ajax({
        url: "test.php",
        type: "post",
        data: {value:id,template1rghtimg:temp1imgid},
        success: function(data){
			if(data==1)
			{
				$('#appendtemplate1class'+id).remove();
			}
        },
        error:function(data){
          
		   alert("failiure");
           
        }
    });
	
	}
	
	
	
	
	function removetemplate2rightfiles(id,imgid)
	{
		$.ajax({
        url: "test.php",
        type: "post",
        data: {value:id,imageid:imgid},
        success: function(data){
			if(data==1)
			{
				$('#appendclass'+id).remove();
			}
        },
        error:function(data){
           alert(data);
		   alert("failiure");
           
        }
    });
	
	}
   

/*Right files in template1*/

	function template1rightimage(input,id) {

		$('#template1_rightimage'+id).val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#temp1_currimg'+id).attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   /*Right files in template1 add another*/

	function aetemplate1rightimage(input,id) {

		$('#aetemplate1_rightimage'+id).val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#aetemp1_currimg'+id).attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   

   

//Template 2 top images 

function template2topimage(input) {

		$('#template2topimg').val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#changetemp2topimg').attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   $("#temp2_topimg").change(function() {

	   template2topimage(this);

   });

   

//template 2 right side image



function template2rightimage(input,id) {

		$('#template2_rightimage'+id).val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#temp2_currimg'+id).attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

   

   /*Right files in template2 add another*/

	function aetemplate2rightimage(input,id) {

		$('#aetemplate2_rightimage'+id).val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#aetemp2_currimg'+id).attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }



/*Template 5*/

    $("#temp5_bannerimg").change(function() {

	   addtemplate5banner(this);

   });

   

	function addtemplate5banner(input) {

		$('#template5banner').val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#changetemp5banner').attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }



   /*banner image in template6*/ 

	 $("#temp6_bannerimg").change(function() {

	   addtemplate6banner(this);

   });

   

	function addtemplate6banner(input) {

		$('#template6banner').val(input.value);

	   if (input.files && input.files[0]) {

		   var reader = new FileReader();

		   reader.onload = function(e) {

			   $('#changetemp6banner').attr('src', e.target.result);

		   }



		   reader.readAsDataURL(input.files[0]);

	   }

   }

</script>