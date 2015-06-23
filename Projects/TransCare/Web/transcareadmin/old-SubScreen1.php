<?php

include("admin-header.php");

$rows=mysql_query("SELECT * FROM templates");

$count=mysql_num_rows($rows);

 

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



<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script>

function TempNameChange(value)

{



		

	if(value=="1")

	{

		$('#subscreen1').css('display','block');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

	}

	else if(value=="2")

	{

		$('#subscreen2').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

	}

	else if(value=="3")

	{

		$('#subscreen3').css('display','block');

		$('#subscreen1').css('display','none');

			$('#subscreen2').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

	}

	else if(value=="4")

	{

		

		$('#subscreen4').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

	}

	else if(value=="5")

	{

		$('#subscreen5').css('display','block');

		$('#subscreen1').css('display','none');

			$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen6').css('display','none');

	}

	else

	{

		$('#subscreen6').css('display','block');

		$('#subscreen1').css('display','none');

			$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

	}

}

</script>



<?php

if(isset($_POST["Save"]))

{

$screenid=$_POST["screenid"];

$screenname=$_POST["screenname"];

$linkname=$_POST["linkname"];

$title=$_POST["temp1title"];

$description=$_POST["temp1desc"];

$temp2title=$_POST["temp2title"];

$temp2subtitle=$_POST["temp2subtitle"];

$temp2desc=$_POST["temp2desc"];

$temp5title=$_POST["temp5title"];

$temp5desc=$_POST["temp5desc"];

$templateid=$_POST["TempName"];

$temp4title=$_POST["template4title"];

$temp3title=$_POST["temp3tittle"];

$temp6title=$_POST["template6title"];

$temp6desc=$_POST["temp6desc"];

$createdOn = date('Y-m-d H:i:s');

if($linkname=="" && $title== "")

{

	$msg = "fill all fields";

}

else

{

	

	

	if($templateid==1)

	{

		$tablename="template1_link";

	}

	else if($templateid==2)

	{

		$tablename="template2_link";

	}

	else if($templateid==3)

	{

		$tablename="template3_link";

	}

	else if($templateid==4)

	{

		$tablename="template4_link";

	}

	else if($templateid==5)

	{

		$tablename="template5_link";

	}

	else

	{

		$tablename="template6_link";

	}

	

	

 	

	if($screenid == 0 && $screenname == 'screen1')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

	

		$PassId = mysql_insert_id();

		

		$Screen = 'screen2';

 	

	}

	elseif($screenid != 0 && $screenname == 'screen2')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

	

		$PassId = $screenid;

		

		$Screen = 'screen3';

		

	}

	elseif($screenid != 0 && $screenname == 'screen3')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

  	

		$PassId = '';

		

		$Screen = 'screen4';

 		

	}



	

	if($tablename=="template1_link")

	{

		$temp_content_id=mysql_insert_id();

	}

	else if($tablename=="template2_link")

	{

		$temp_content_id=mysql_insert_id();

	}

	else if($tablename=="template3_link")

	{

		$temp_content_id=mysql_insert_id();

	}

	else if($tablename=="template4_link")

	{

		$temp_content_id=mysql_insert_id();

	}

	else if($tablename=="template5_link")

	{

		$temp_content_id=mysql_insert_id();

	}

	else

	{

		$temp_content_id=mysql_insert_id();

	}

	

	if(isset($_FILES['template1image']['name']))

	{

		

	$temp1topsize=$_FILES['template1image']['size'];

	if($temp1topsize>0)

	{

	   $tmpFilePath = $_FILES['template1image']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    

 		   $temp1topimgpath = "template1image/"; // create folder 

		   $temp1topimgname = $_FILES['template1image']['name'];

		   $temp1target = $temp1topimgpath.$temp1topimgname;

 		   

		   if( move_uploaded_file($_FILES['template1image']['tmp_name'],$temp1target))

		   {

			   $template1imagequery = mysql_query("INSERT INTO $tablename (linkname,title,description,topimage,template_content_id) VALUES('$linkname','$title','$description','$temp1target','$temp_content_id')");

		   }

	   }



	}

	

	}

	

	if(isset($_FILES['template1topimage']['name']))

	{

		for($i=0; $i<count($_FILES['template1topimage']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['template1topimage']['tmp_name'][$i];

			   if ($tmpFilePath != "")

			   {    

				   $path = "template1topimage/"; // create folder 

				   $name = $_FILES['template1topimage']['name'][$i];

				   $paname = $path.$name;



				   if(move_uploaded_file($_FILES['template1topimage']['tmp_name'][$i], $path.$name)) 

				   { 

					$template1topimagequery=mysql_query("INSERT INTO `template1_carousel` (template_id, template1_rightimages, template_content_id) VALUES(1,'$paname', '$temp_content_id')");

				   }

			 }

		}



	}

	

	if(isset($_FILES['template2rightimage']['name']))

	{

		for($i=0; $i<count($_FILES['template2rightimage']['name']); $i++) 

		{

			   $tmpFilePath = $_FILES['template2rightimage']['tmp_name'][$i];

			  

			   if ($tmpFilePath != "")

			   {    

				   $temp2rgtpath = "template2rightimage/"; // create folder 

				   $temp2rgtname = $_FILES['template2rightimage']['name'][$i];

				   $temp2right = $temp2rgtpath.$temp2rgtname;



				   if(move_uploaded_file($_FILES['template2rightimage']['tmp_name'][$i], $temp2right)) 

				   { 

					$template2rightimage=mysql_query("INSERT INTO `template2_carousal` (template2_rightimages, template_content_id) VALUES('$temp2right', '$temp_content_id')");

				   }

			 }

		}



	}



	if(isset($_FILES['template2topimage']['name']))

	{

				$temp2topsize=$_FILES['template2topimage']['size'];

				if($temp2topsize>0)

	{

	   $tmpFilePath = $_FILES['template2topimage']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    



		   $temp2topimgpath = "template2topimage/"; // create folder 

		   $temp2topimgname = $_FILES['template2topimage']['name'];

		   $temp2target = $temp2topimgpath.$temp2topimgname;

		   if( move_uploaded_file($_FILES['template2topimage']['tmp_name'],$temp2target))

		   {

			   $template2 = mysql_query("INSERT INTO `template2_link` (linkname,title,subtitle,image,description,template_content_id) VALUES('$linkname','$temp2title','$temp2subtitle','$temp2target','$temp2desc','$temp_content_id')");

			   

		   }

	   }



	}



	}

		if(isset($_FILES['template5bannerimg']['name']))

	{

				$temp5topsize=$_FILES['template5bannerimg']['size'];

				if($temp5topsize>0)

	{

	   $tmpFilePath = $_FILES['template5bannerimg']['tmp_name'];

	   if ($tmpFilePath != "")

	   {    



		   $temp5bannerimgpath = "template5bannerimg/"; // create folder 

		   $temp5bannerimgname = $_FILES['template5bannerimg']['name'];

		   $temp5target = $temp5bannerimgpath.$temp5bannerimgname;

		   if( move_uploaded_file($_FILES['template5bannerimg']['tmp_name'],$temp5target))

		   {

			   $template = mysql_query("INSERT INTO `template5_link` (linkname,title,bannerimage,description,template_content_id) VALUES('$linkname','$temp5title','$temp5target','$temp5desc','$temp_content_id')");

			   

		   }

	   }



	}

	}

	if(isset($_FILES['template6bannerimg']['name']))

	{

				$temp6topsize=$_FILES['template6bannerimg']['size'];

				

				if($temp6topsize>0)

	{

	   $tmpFilePath = $_FILES['template6bannerimg']['tmp_name'];



	   if ($tmpFilePath != "")

	   {    



		   $temp6bannerimgpath = "template6bannerimg/"; // create folder 

		   $temp6bannerimgname = $_FILES['template6bannerimg']['name'];

		   $temp6target = $temp6bannerimgpath.$temp6bannerimgname;

		 

		   if( move_uploaded_file($_FILES['template6bannerimg']['tmp_name'],$temp6target))

		   {

			   $template = mysql_query("INSERT INTO `template6_link` (linkname,title,bannerimage,description,template_content_id) VALUES('$linkname','$temp6title','$temp6target','$temp6desc','$temp_content_id')");

			  

			   

		   }

	   }



	}

	}

	if($_POST["TempName"] == 4)

	{

		

				

		for($i=0; $i<count($_POST["headername"]); $i++) 

		{

			$headername=$_POST["headername"][$i];

			   $description=$_POST["temp4description"][$i];

			     $division=$_POST["Division"][$i];

				   $type=$_POST["Type"][$i];

				     $available=$_POST["Available"][$i];

					   $place=$_POST["Place"][$i];

					   if($headername != "" || $description != "" || $division !="" || $type !="" || $available !="" ||$place!= "")

					   {

			  $template4=mysql_query("INSERT INTO `template4_link` (linkname, title,headername,description,division,type,available,place,template_content_id) VALUES('$linkname','$temp4title','$headername','$description','$division','$type','$available','$place','$temp_content_id')");

		}

		else

		{

			if($i==0 )

			{

			$template4addtitle=mysql_query("INSERT INTO `template4_link` (linkname, title,template_content_id) VALUES('$linkname','$temp4title','$temp_content_id')");

			}

		}

			

			

		}



	}

	if($_POST["TempName"] == 3)

	{

		

		for($i=0; $i<count($_POST["eventname"]); $i++) 

		{

			$eventname=$_POST["eventname"][$i];

			   $temp3description=$_POST["template3description"][$i];

			     $time=$_POST["time"][$i];

				   $temp3place=$_POST["temp3place"][$i];

				   $date=$_POST["date"][$i];

				if($eventname != "" || $temp3description != "" || $time != "" || $temp3place != "" ||  $date != "")

				{

										$template3=mysql_query("INSERT INTO `template3_link` (linkname, title,eventname,description,time,date,place,template_content_id) VALUES('$linkname','$temp3title','$eventname','$temp3description','$time','$date','$temp3place','$temp_content_id')");

				}

				else

				{

					if($i==0 )

			{

						$template3addtitle=mysql_query("INSERT INTO `template3_link` (linkname, title,template_content_id) VALUES('$linkname','$temp3title','$temp_content_id')");

			}

				}

			

			

		}



	}

		if($Screen != 'screen4')

			{

				echo '<meta http-equiv="refresh" content="0;SubScreen1.php?screenid='.$PassId.'&screen='.$Screen.'&msg=Subscreen added successfully,if u want add another subscreen continue with this page" />';

		

			}

			else

			{

				echo '<meta http-equiv="refresh" content="0;transcare_manage.php" />';

			}

		

		

		

}

}

?>

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

<?php if(isset($_GET["msg"])){ ?> 

	<h2 style="border:#000; padding:10px; background-color: #B2DBB2;margin: 10px 184px;color: #626262;border-radius: 4px;"><?php echo $_GET["msg"]; ?></h2>

    <?php } ?>

    <!-- Sub Screens-->

  <div class="subScreenheader">   

        <div class="back">

                <a href="transcare_manage.php"></a>

        </div> 

        <div class="linkName">

            <p>Link Name</p>

            <input type="hidden" name="screenid" value="0" />

            <p class="linkLimit"><input type="text" name="linkname"  class="linkText"> <span>Note: Limit 20 Characters</span></p>

        </div>

        

        

		<div class="subScr1">

                <a href="#"></a>

        </div>

        

        

        <?php 

	

		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen2')

		{

		

		?>

       

		<div class="subScr2">

                <a href="#" ></a>

        </div>

        

        <?php

		}

		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen3')

		{

		?>

        

		<div class="subScr2">

                <a href="#" ></a>

        </div>

        <div class="subScr3">

                <a href="#" ></a>

        </div>

        <?php

		}

		?>

        

        

        

        

        <div class="addSubScr">

                <a href="#"></a>

        </div>

        

       

   </div> 

   <div class="subScreenContent">

		<div class="temSec">  

        	<div class="contentSecTitle">

        		<h3>Select a Template</h3>

        	</div>

            <div class="temSecContent"> 

                <div class="temSecLeft">

                <?php 

				$i=1;

				while($data=mysql_fetch_array($rows))

				{

					?>

                	<div class="imageTemplate">

                    	<img src="images/imageTemplate.jpg">

                        <p class="tempName">

                        <?php

						if($data["template_id"]==1)

						{

							?>

							 <input type="radio" name="TempName" value="<?php echo $data["template_id"] ?>" checked="checked" onchange="TempNameChange(this.value)"> <?php echo $data["template_name"]?></p>

                            

                             <?php

						}

						else

						{

						?>

                        <input type="radio" name="TempName" value="<?php echo $data["template_id"] ?>"  onchange="TempNameChange(this.value)"> <?php echo $data["template_name"]?></p>

                        <?php

						}

						?>

                    </div> 

                    <?php

					$i++;

				}

					?>

                    

                </div> 

                <div class="temSecRight">  

                    <div class="imageTemplatePreview">

                    	<h3 class="center">Preview</h3>

                    	<img src="images/imageTemplatePreview.jpg">

                        <p class="tempName center">Template Name</p>

                    </div>

                </div>

            </div> 

    	</div> 

           <!-----Template1--->

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

                        <label>Title</label> <input type="text" name="temp1title" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  -->

                    </div>

                    <div class="text-area">

                      <label style="padding-left:0">Description</label>  

                      <textarea  style="width: 100%;" rows="4" name="temp1desc" ></textarea>

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

                        

                <input type="text" id="template1_topimage" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span>

                     <input id="temp1" onchange="template1topimage(this)" name="template1image" type="file" class="upload" value="Browse">

                 </div>

                          

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img id="changetopimg" style="width:82px; height:82px;" src="images/uploadImg.jpg"><br><br>Current Image</p>

                             <!-- <p class="imageView4">filename.jpg</p>-->

                             <!-- <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate1topimg();"></a>

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

                    <div class="subSec1" id="appendClass1">  

                    

                        <div class="ses1">

                             <input type="hidden" id="temp1righthid" value="1" />  

                        <p id="temp1count1">1</p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template1_rightimage1" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp1_right1" onchange="template1rightimage(this,1)" name="template1topimage[]" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp1_currimg1"><br><br>Current Image</p>
<!--
                              <p class="imageView4">filename.jpg</p>
-->
                             <!-- <div class="deLete">

                                    <a href="javascript:void(0);"  onClick="removetemplate1rightfiles(1);"></a>

                              </div> -->

                        </div>

                        </div>

                     </div>

                 

                    

                 

                     <div class="addMore">

                            <a href="javascript:void(0);" onClick="addtemplate1rightfiles();"></a>

                     </div>

                 </div> 

        	</div> 

        </div>

        <!-----Template2 ---> 

          <div class="fillContent" id="subscreen2" style="display:none">       

           <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div>

            <div class="current-title"> 

                      <label>Current Title</label> <input type="text" class="fillTitleText" placeholder="Lorem Ipsum" name="temp2title"> <!-- <a href="#">Edit</a>-->  

            </div>

            <div class="fillSec">

                <div class="contentSecTitle">

                    <h3>Left Side</h3>

                </div>

                <div class="current-subtitle"><label>Sub Title</label> <input type="text" name="temp2subtitle" id="" value="" class="subtitle-text" placeholder="Lorem Ipsum"></div>

                <div class="subSec">

                              

                    <div class="subSec1">   

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template2topimg" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp2_topimg" onchange="template2topimage(this)" name="template2topimage" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="changetemp2topimg"><br><br>Current Image</p>

                             <!-- <p class="imageView4">filename.jpg</p>-->

                             <!-- <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate2topimage()"></a>

                              </div> -->

                        </div>

                     </div>

                    

                     

                 </div>

                <div class="current-textarea">  

                    <div class="text-area">

                       <label style="padding-left:0">Descrption</label><textarea rows="4" name="temp2desc"></textarea>

					</div>

                   

                </div> 

            </div> 

           <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right Side</h3>

                </div>

                <div class="subSec">                

                     <div id="template2rightfiles">               

                    <div class="subSec1" id="templateappendClass1">   

                    

                        <div class="ses1">

                             <input type="hidden" id="temp2righthid" value="1" />  

                        <p id="temp2count1">1</p>

                        </div>

                        <div class="contentSec2Left">

                        

                             <input type="text" id="template2_rightimage1" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp2_right1" onchange="template2rightimage(this,1)" name="template2rightimage[]" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp2_currimg1"><br><br>Current Image</p>

                              <!--<p class="imageView4">filename.jpg</p>-->

                             <!-- <div class="deLete">

                                    <a href="javascript:void(0);"  onClick="removetemplate2rightfiles(1);"></a>

                              </div> -->

                        </div>

                        </div>

                     </div>

                 

                    

                 

                     <div class="addMore" id="template2addbutton">

                            <a href="javascript:void(0);" onClick="addtemplate2rightfiles();"></a>

                     </div>

                     

                     

                     

                     

                      

                 </div> 

        	</div> 

        </div> 

        <!-----Template 3 ---->

             <div class="fillContent" id="subscreen3" style="display:none">    

            <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div> 

            <div class="fillSec"> 

                <div class="contentSecTitle">

                    <h3>Events</h3>

                </div>

                <div class="current-title"> 

                      <label>Current Title</label> <input type="text" name="temp3tittle" class="fillTitleText" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>-->  

                </div> 

				<div class="event-sec">     

                    <div class="ses1"> 

                        <p>1</p>

                    </div>

                    <div class="event-content">      

                       

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4"  name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                                  <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                      

                                                                         

                    </div> 

				</div>

                <div class="event-sec">   

                    <div class="ses1">

                        <p>2</p>

                    </div>

                    <div class="event-content">

                        

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label><textarea rows="4" name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                                  <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                       

                                                                         

                    </div> 

				</div>

                <div class="event-sec">    

                    <div class="ses1">

                        <p>3</p>

                    </div>

                    <div class="event-content">

                      

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                                  <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                      

                                                                         

                    </div> 

				</div>

                <div class="event-sec">   

                    <div class="ses1">

                        <p>4</p>

                    </div>

                    <div class="event-content">

                      

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                                  <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                     

                                                                         

                    </div> 

				</div>

                <div class="event-sec">   

                    <div class="ses1">

                        <p>5</p>

                    </div>

                    <div class="event-content">

                

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            </div>

                              <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                    

                                                                         

                    </div> 

				</div>

                <div class="event-sec">   

                    <div class="ses1">

                        <p>6</p>

                    </div>

                    <div class="event-content">

                      

                            <div class="event-title"><label>Event Name</label> <input type="text" name="eventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="template3description[]" ></textarea></div>

                            <div class="event-title"><label>Time</label> <input type="time" name="time[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                                 <div class="event-title"><label>Date</label> <input type="date" name="date[]" id="" value="" class="subtitle-text" placeholder="">

                            	</div>

                            <div class="event-title"><label>Place</label> <input type="text" name="temp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div>

                     

                                                                         

                    </div> 

				</div>

               			</div>

		</div>

        <!---- Template4--->

        <div class="fillContent" id="subscreen4" style="display:none">       

         <div class="mainTitle"> 

                <h3>Fill Content - Template D</h3> 

            </div> 

            <div class="fillSec">  

                <div class="contentSecTitle">

                    <h3>Sub Screen</h3>

                </div>

                <div class="current-title"> 

                      <label>Current Title</label> <input type="text" name="template4title" class="fillTitleText" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>  -->

                </div>

				<div class="event-sec">   

                    <div class="ses1">

                        <p>1</p>

                    </div>

                    <div class="event-content"> 

                      

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="" value="" class="subtitle-text" placeholder=""></div>

                       

                                                                         

                    </div> 

				</div>

                <div class="event-sec">   

                    <div class="ses1">

                        <p>2</p>

                    </div>

                    <div class="event-content">    

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label><textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="" value="" class="subtitle-text" placeholder=""></div>

                    

                                                                         

                    </div> 

				</div>

                <div class="event-sec">    

                    <div class="ses1">

                        <p>3</p>

                    </div>

                    <div class="event-content">

                       

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="User" value="" class="subtitle-text" placeholder=""></div>

                      

                                                                         

                    </div> 

				</div>

                <div class="event-sec">    

                    <div class="ses1">

                        <p>4</p>

                    </div>

                    <div class="event-content">

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label><textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="" value="" class="subtitle-text" placeholder=""></div>

                      

                                                                         

                    </div> 

				</div>

                <div class="event-sec">    

                    <div class="ses1">

                        <p>5</p>

                    </div>

                    <div class="event-content">

                       

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="" value="" class="subtitle-text" placeholder=""></div>

                                                                         

                    </div> 

				</div>

                <div class="event-sec">    

                    <div class="ses1">

                        <p>6</p>

                    </div>

                    <div class="event-content">

                       

                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description[]"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available[]" id="" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place[]" id="" value="" class="subtitle-text" placeholder=""></div>

                        

                                                                         

                    </div> 

				</div>

                </div>

                </div>

                 <!---- Template5--->

        <div class="fillContent" id="subscreen5" style="display:none">    

        <div class="mainTitle"> 

                <h3>Fill Content - Template E</h3> 

            </div>

            <div class="current-title">  

				<label>Main Title</label> <input type="text" class="fillTitleText" name="temp5title"placeholder="Lorem Ipsum"><!--  <a href="#">Edit</a>  -->

            </div>

            <div class="section2"> 

                <div class="contentSecTitle">

                    <h3>Banner Image</h3>

                </div>

                <div class="subSec">                

                    <div class="subSec1">  

                        <div class="contentSec2Left">

                                      <input type="text" id="template5banner" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp5_bannerimg" onchange="addtemplate5banner(this)" name="template5bannerimg" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="changetemp5banner"><br><br>Current Image</p>

                              <!--<p class="imageView4">filename.jpg</p>-->

                            <!--  <div class="deLete">

                                    <a href="" onClick="removetemplate5banner()"></a>

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

                      <label style="padding-left:0">Description</label>  <textarea rows="4" name="temp5desc" ></textarea>

					</div>

                    

                </div> 

            </div> 

        </div>

        

        <!------- Template6--->

        <div class="fillContent" id="subscreen6" style="display:none">   

        <div class="mainTitle">

                <h3>Fill Content - Template F</h3> 

            </div>

            <div class="current-title"> 

				<label>Main Title</label> <input type="text" class="fillTitleText" name="template6title" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>  -->

            </div>

            <div class="section2">  

                <div class="contentSecTitle">

                    <h3>Banner Image</h3>

                </div>

                <div class="subSec">                

                    <div class="subSec1">  

                        <div class="contentSec2Left">

                                      <input type="text" id="template6banner" value="" class="upLoadText">

                 <div class="fileUpload btn btn-primary">

                     <span class="uploadImage"></span> 

                     <input id="temp6_bannerimg" onchange="addtemplate6banner(this)" name="template6bannerimg" type="file" class="upload" value="Browse">

                 </div>

                        </div>

                        <div class="contentSecRight"> 

                              <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="changetemp6banner"><br><br>Current Image</p>

                             <!-- <p class="imageView4">filename.jpg</p>
-->
                             <!-- <div class="deLete">

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

                       <label style="padding-left:0">Desription</label>  <textarea rows="4" name="temp6desc" ></textarea>

					</div>

                    

                </div> 

            </div> 

            </div>

            <?php

if(isset($_GET["screenid"]))

{

	$screenid=$_GET["screenid"];

	$spage = $_GET["screen"];

}

?>

         <!-- <p class="innerText"><a href="#">Delete this Screen</a></p>-->

     

                  <div class="save" style="margin:40px 0;width: 204px;">

                   <input type="hidden" value="<?php echo $screenid?>" name="screenid" />

          <input type="hidden" value="<?php echo $spage?>" name="screenname" />

              <input type="submit" value="Save" name="Save" class="save_button">

         </div>

         <!--<div class="preview">

                            <a href="#"></a>

         </div> -->

        

        

        

                 

               

                

                

          

         





      

          

          

          

          

          

          

          

          

  

         

  </div>

</div> 

</form>

<?php

 include("admin-footer.php");



 ?>

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

<script type="text/javascript">

/*top image in template1*/

                bkLib.onDomLoaded(function() { 

				nicEditors.allTextAreas()

				 });                       

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

   function addtemplate1rightfiles (id){

		var id = $('#temp1righthid').val();

		var next = parseInt(id)+1;

				$('#template1rightfiles').append('<div class="subSec1" id="appendClass'+next+'"><div class="ses1"><p id="temp1count'+next+'">'+next+'</p></div><div class="contentSec2Left"><input type="text" id="template1_rightimage'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp1_right'+next+'" onchange="template1rightimage(this,'+next+')" name="template1topimage[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="temp1_currimg'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate1rightfiles('+next+')"></a></div> </div></div>');             

        $('#temp1righthid').val(next);

		

	}

	function removetemplate1topimg(id){

			$('#template1_topimage').val('');

			$('#changetopimg').attr('src','images/uploadImg.jpg');

		

	}

	function removetemplate1rightfiles(id)

	{


			var cid = $('#temp1righthid').val();

			if(cid > 1){

		$('#appendClass'+id).remove();

		var langCount=$('#temp1righthid').val();

		$('#temp1righthid').val(parseInt(langCount)-1);

		}

		else

		{

			$('#template1_rightimage1').val('');

			$('#temp1_currimg1').attr('src','images/uploadImg.jpg');

		}

	}

	

	/*top image in template2*/

	 $("#temp2_topimg").change(function() {

	   template2topimage(this);

   });

   

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

   



   function removetemplate2topimage(){

			$('#template2topimg').val('');

			$('#changetemp2topimg').attr('src','images/uploadImg.jpg');

		$('#temp2_topimg').val('');

	}

	/*template2 right files*/

	

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

   function addtemplate2rightfiles (id){

		var id = $('#temp2righthid').val();

		var next = parseInt(id)+1;

				$('#template2rightfiles').append('<div class="subSec1" id="templateappendClass'+next+'"><div class="ses1"><p id="temp2count'+next+'">'+next+'</p></div><div class="contentSec2Left"><input type="text" id="template2_rightimage'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp2_right'+next+'" onchange="template2rightimage(this,'+next+')" name="template2rightimage[]" type="file" class="upload" value="Browse"></div></div><div class="contentSecRight"> <p class="imageView3"><img id="temp2_currimg'+next+'" src="images/uploadImg.jpg" style="width:82px; height:82px;"><br><br>Current Image</p><p class="imageView4">filename.jpg</p><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate2rightfiles('+next+')"></a></div> </div></div>');             

        $('#temp2righthid').val(next);

		if(next==6)

		{

			$("#template2addbutton").hide();

		}

		else

		{

			$("#template2addbutton").show();

		}

		

	}

	

	function removetemplate2rightfiles(id)

	{

		

			var cid = $('#temp2righthid').val();

			

			if(cid > 1){

		$('#templateappendClass'+id).remove();

		var langCount=$('#temp2righthid').val();

		$('#temp2righthid').val(parseInt(langCount)-1);

		}

		else

		{

			$('#template2_rightimage1').val('');

			$('#temp2_currimg1').attr('src','images/uploadImg.jpg');

		}

	}

	

	/*banner image in template5*/ 

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

   



   function removetemplate5banner(){

			$('#template5banner').val('');

			$('#changetemp5banner').attr('src','images/uploadImg.jpg');

		

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

   



   function removetemplate6banner(){

			$('#template6banner').val('');

			$('#changetemp6banner').attr('src','images/uploadImg.jpg');

		

	}

	

	

	

	

	

	

</script>