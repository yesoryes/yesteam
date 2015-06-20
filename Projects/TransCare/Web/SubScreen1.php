<?php

include("admin-header.php");

$rows=mysql_query("SELECT * FROM templates");

$count=mysql_num_rows($rows);

 

?>





<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="nicEdit.js"></script> -->

<script>

$(document).ready(function(){
	$('.jqte-test').jqte();
});
	
	
	

$(function() {
				$("#element").introLoader();
            });


/*Editor text*/
// bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });



function TempNameChange(value,tempname,tempimg)

{



		

	if(value=="1")

	{

		$('#subscreen1').css('display','block');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);

	}

	else if(value=="2")

	{

		$('#subscreen2').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);

	}

	else if(value=="3")

	{

		$('#subscreen3').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen2').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);

	}

	else if(value=="4")

	{

		

		$('#subscreen4').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen5').css('display','none');

		$('#subscreen6').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);


	}

	else if(value=="5")

	{

		$('#subscreen5').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen6').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);

	}

	else

	{

		$('#subscreen6').css('display','block');

		$('#subscreen1').css('display','none');

		$('#subscreen2').css('display','none');

		$('#subscreen3').css('display','none');

		$('#subscreen4').css('display','none');

		$('#subscreen5').css('display','none');

		$('#bindtemplatename').text(tempname);

		$('#bindtemplateimage').attr('src', tempimg);

	}

}

</script>



<?php

if(isset($_POST["Save"]))

{

$screenid=$_POST["screenid"];

$screenname=$_POST["screenname"];

$linkname=mysql_real_escape_string($_POST["linkname"]);

$title=mysql_real_escape_string($_POST["temp1title"]);

$description=mysql_real_escape_string($_POST["temp1desc"]);

$temp2title=mysql_real_escape_string($_POST["temp2title"]);

$temp2subtitle=mysql_real_escape_string($_POST["temp2subtitle"]);

$temp2desc=mysql_real_escape_string($_POST["temp2desc"]);

$temp5title=mysql_real_escape_string($_POST["temp5title"]);

$temp5desc=mysql_real_escape_string($_POST["temp5desc"]);

$templateid=$_POST["TempName"];

$temp4title=mysql_real_escape_string($_POST["template4title"]);

$temp3title=mysql_real_escape_string($_POST["temp3tittle"]);

$temp6title=mysql_real_escape_string($_POST["template6title"]);

$temp6desc=mysql_real_escape_string($_POST["temp6desc"]);

$createdOn = date('Y-m-d H:i:s');




if($linkname=="" )

{

	$errormsg = "fill all details";

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

  	

		$PassId = $screenid;

		

		$Screen = 'screen4';

 		

	}

	elseif($screenid != 0 && $screenname == 'screen4')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

  	

		$PassId = $screenid;

		

		$Screen = 'screen5';

 		

	}
	elseif($screenid != 0 && $screenname == 'screen5')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

  	

		$PassId = $screenid;

		

		$Screen = 'screen6';

 		

	}
	elseif($screenid != 0 && $screenname == 'screen6')

	{

		

	$addtablecontent = mysql_query("INSERT INTO `template_content` (parentid,template_id,linkname,table_name,screen,created_on) VALUES('$screenid','$templateid','$linkname','$tablename','$screenname','$createdOn')");

  	

		$PassId = '';

		

		$Screen = 'screen7';

 		

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


if($_POST["TempName"] == 1)
{

	if($_FILES['template1image']['size'] > 0)
	{
				

				$tmpFilePath = $_FILES['template1image']['tmp_name'];

				$temp1topimgpath = "template1image/"; // create folder 

				$temp1topimgname = $_FILES['template1image']['name'];

				$temp1target = $temp1topimgpath.$temp1topimgname;

				$movefiles=move_uploaded_file($_FILES['template1image']['tmp_name'],$temp1target);

				$template1imagequery = mysql_query("INSERT INTO $tablename (linkname,title,description,topimage,template_content_id) VALUES('$linkname','$title','$description','$temp1target','$temp_content_id')");

	   		
	
    }
    else 
    {

    	$template1imagequery = mysql_query("INSERT INTO $tablename 
    		(linkname,title,description,template_content_id) 
    		VALUES('$linkname','$title','$description','$temp_content_id')");
    }
}

if($_POST["TempName"] == 1)
{

	for($i=1; $i <= $_POST["hiddentemplateid"]; $i++) 
{


$choosefile=$_POST["Imagecontent".$i];
if($choosefile == "Image")
{

	

   if(isset($_FILES['template1addrgtimage'.$i]['name']))
   {
			$path = "template1topimage/"; // create folder 

			$name = $_FILES['template1addrgtimage'.$i]['name'];

			$paname = $path.$name;

			$template1imgname=mysql_real_escape_string($_POST["imagecaption".$i]);

			if(move_uploaded_file($_FILES['template1addrgtimage'.$i]['tmp_name'], $path.$name))
			{

			

			$template1topimagequery=mysql_query("INSERT INTO `template1_carousel` 
			(template1_rightimages,temp1imgcaption, template_content_id,contentchecked)
			VALUES('$paname','$template1imgname', '$temp_content_id','$choosefile')");

			}
	}


}
else if($choosefile == "Pdf")
{


	if(isset($_FILES['template1addpdf'.$i]['name']))
	{

		$path = "template1pdffile/"; // create folder 

		$name = $_FILES['template1addpdf'.$i]['name'];

		$paname = $path.$name;

		$template1imgname=mysql_real_escape_string($_POST["pdfcaption".$i]);


		   if(move_uploaded_file($_FILES['template1addpdf'.$i]['tmp_name'], $path.$name)) 

		   { 

			$template1topimagequery=mysql_query("INSERT INTO `template1_carousel`
			(template1_rightimages,temp1imgcaption, template_content_id,contentchecked)
			 VALUES('$paname','$template1imgname', '$temp_content_id','$choosefile')");

		   }

	}
 
}
else if($choosefile == "Video")
{


		 $videourl=$_POST["template1addvideo".$i];

		$videcaption=mysql_real_escape_string($_POST["videocaption".$i]);


		$template1topimagequery=mysql_query("INSERT INTO `template1_carousel`
		 (template1_rightimages,temp1imgcaption, template_content_id,contentchecked)
		  VALUES('$videourl','$videcaption', '$temp_content_id','$choosefile')");

		
		
}
	
}


}

	
 if($_POST["TempName"] == 2)
 {
 
for($i=1; $i <= $_POST["hiddentemplate2id"]; $i++) 
{

$choosetemp2file=$_POST["Imagecontenttwotemp".$i];
 

if($choosetemp2file == "Image")
{

  

   if(isset($_FILES['template2addrgtimage'.$i]['name']))
   {
      $path = "template2rightimage/"; // create folder 

      $name = $_FILES['template2addrgtimage'.$i]['name'];

      $temp2imgname = $path.$name;

      $template2imgcaption=mysql_real_escape_string($_POST["template2imagecaption".$i]);

      if(move_uploaded_file($_FILES['template2addrgtimage'.$i]['tmp_name'], $path.$name))
      {

      

      $template1topimagequery=mysql_query("INSERT INTO `template2_carousal` 
        (template2_rightimages,Imagecaption,template_content_id,contentchecked) 
        VALUES('$temp2imgname','$template2imgcaption','$temp_content_id','$choosetemp2file')");

      }
  }


}
else if($choosetemp2file == "Pdf")
{


  if(isset($_FILES['template2addpdf'.$i]['name']))
  {

    $path = "template2pdffile/"; // create folder 

    $name = $_FILES['template2addpdf'.$i]['name'];

    $paname = $path.$name;

    $template2pdfcaption=mysql_real_escape_string($_POST["template2pdfcaption".$i]);
  


       if(move_uploaded_file($_FILES['template2addpdf'.$i]['tmp_name'], $path.$name)) 

       { 
  

      $template1topimagequery=mysql_query("INSERT INTO `template2_carousal`
          (template2_rightimages,Imagecaption,template_content_id,contentchecked) 
       VALUES('$paname','$template2pdfcaption','$temp_content_id','$choosetemp2file')");

       }

  }
 
}
else if($choosetemp2file == "Video")
{

 
     $temp2videourl=$_POST["template2addvideo".$i];

     $temp2videcaption=mysql_real_escape_string($_POST["template2videocaption".$i]);




 
    $template1topimagequery=mysql_query("INSERT INTO `template2_carousal` 
       (template2_rightimages,Imagecaption,template_content_id,contentchecked) 
       VALUES('$temp2videourl','$temp2videcaption','$temp_content_id','$choosetemp2file')");

    
    
}
  
}

 }
if($_POST["TempName"] == 2)
 {
 	if($_FILES['template2topimage']['size'] > 0)

	{

	   $tmpFilePath = $_FILES['template2topimage']['tmp_name'];

	   if ($tmpFilePath != "")

	   { 
		   $temp2topimgpath = "template2topimage/"; // create folder 

		   $temp2topimgname = $_FILES['template2topimage']['name'];

		   $temp2target = $temp2topimgpath.$temp2topimgname;

		   $template2movefiles= move_uploaded_file($_FILES['template2topimage']['tmp_name'],$temp2target);

		  $template2 = mysql_query("INSERT INTO `template2_link` (linkname,title,subtitle,image,description,template_content_id) VALUES('$linkname','$temp2title','$temp2subtitle','$temp2target','$temp2desc','$temp_content_id')");

	   }

	}
	else
	{
		 $template2 = mysql_query("INSERT INTO `template2_link` (linkname,title,subtitle,description,template_content_id) VALUES('$linkname','$temp2title','$temp2subtitle','$temp2desc','$temp_content_id')");

	}
 }

	if($_POST["TempName"] == 5)
 {
	if($_FILES['template5bannerimg']['size'] > 0)

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
	else
	{
		$template = mysql_query("INSERT INTO `template5_link` (linkname,title,description,template_content_id) VALUES('$linkname','$temp5title','$temp5desc','$temp_content_id')");

	}
 }

	if($_POST["TempName"] == 6)
 {

	if($_FILES['template6bannerimg']['size'] > 0)

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
	else
	{
		  $template = mysql_query("INSERT INTO `template6_link` (linkname,title,description,template_content_id) VALUES('$linkname','$temp6title','$temp6desc','$temp_content_id')");
	}

 }

	if($_POST["TempName"] == 4)

	{
		$save4link = mysql_query("INSERT INTO `template4_link` (linkname, title,template_content_id) VALUES('$linkname','$temp4title','$temp_content_id')");
		if($save4link){
			$get4InserId = mysql_insert_id();

		
		$get4Id = $_POST['template4autoid'];
		

		for($i=1; $i <= $get4Id; $i++) 

		{

			$headername=mysql_real_escape_string($_POST["headername".$i]);

			$description=mysql_real_escape_string($_POST["temp4description".$i]);

			$division=mysql_real_escape_string($_POST["Division".$i]);

			$type=mysql_real_escape_string($_POST["Type".$i]);

			$available=mysql_real_escape_string($_POST["Available".$i]);

			$place=$_POST["Place".$i];
	if($headername != "" || $description != "" || $division !="" || $type !="" || $available !="" ||$place!= "")

{
$tempeven4insert = mysql_query("INSERT INTO `template4event` (tl4_id, headername, description, division, type, available, place, created_on) VALUES('$get4InserId', '$headername', '$description', '$division', '$type', '$available', '$place', '$createdOn' )");
}

			// if($headername != "" || $description != "" || $division !="" || $type !="" || $available !="" ||$place!= "")

			// {

			//   $template4=mysql_query("INSERT INTO `template4_link` (linkname, title,headername,description,division,type,available,place,template_content_id) VALUES('$linkname','$temp4title','$headername','$description','$division','$type','$available','$place','$temp_content_id')");

			// }

			// else

			// {

			// 	if($i==0 )

			// 	{

			// 	$template4addtitle=mysql_query("INSERT INTO `template4_link` (linkname, title,template_content_id) VALUES('$linkname','$temp4title','$temp_content_id')");

			// 	}

			// }

		}
		}



	}

	if($_POST["TempName"] == 3)

	{

		

		// for($i=0; $i<count($_POST["eventname"]); $i++) 

		// {

		// 	$eventname=$_POST["eventname"][$i];
		// 	echo $eventname;
		// 	   $temp3description=$_POST["template3description"][$i];

		// 	     $time=$_POST["time"][$i];

		// 		   $temp3place=$_POST["temp3place"][$i];

		// 		   $date=$_POST["date"][$i];

		// 		if($eventname != "" || $temp3description != "" || $time != "" || $temp3place != "" ||  $date != "")

		// 		{

		// 			$template3=mysql_query("INSERT INTO `template3_link` (linkname, title,eventname,description,time,date,place,template_content_id) VALUES('$linkname','$temp3title','$eventname','$temp3description','$time','$date','$temp3place','$temp_content_id')");

		// 		}

		// 	// 	else

		// 	// 	{

		// 	// 		if($i==0 )

		// 	// {

		// 	// 			$template3addtitle=mysql_query("INSERT INTO `template3_link` (linkname, title,template_content_id) VALUES('$linkname','$temp3title','$temp_content_id')");

		// 	// }

		// 	// 	}

			

			

		// }

		

		$savelink = mysql_query("INSERT INTO `template3_link` (linkname, title,template_content_id) VALUES('$linkname','$temp3title','$temp_content_id')");
		
		if($savelink){

		$getInserId = mysql_insert_id();



		$get3Id = $_POST['template3autoid'];
		//echo $get3Id;

		for($i = 1; $i <= $get3Id; $i++){


		
			$event3name = mysql_real_escape_string($_POST['eventname'.$i]);
					$event3desc = mysql_real_escape_string($_POST['template3description'.$i]);
					$event3time = $_POST['time'.$i];
					$event3date = $_POST['date'.$i];
					$event3place = mysql_real_escape_string($_POST['temp3place'.$i]);
if($event3name != "" || $event3desc != "" || $event3time != "" || $event3date != "" ||  $event3place != "")
		{
$tempeveninsert = mysql_query("INSERT INTO `template3event` (tl3_id, eventname, description, time, date, place, created_on) VALUES('$getInserId', '$event3name', '$event3desc', '$event3time', '$event3date', '$event3place', '$createdOn' )");
		}


		}

		}



	}

		if($Screen != 'screen7')

			{

				echo '<meta http-equiv="refresh" content="0;SubScreen1.php?screenid='.$PassId.'&screen='.$Screen.'&msg=Subscreen added successfully,if u want add another subscreen continue with this page" />';

			}

			else

			{

				echo '<meta http-equiv="refresh" content="0;transcare_manage.php?subadd=subscreen added successfully" />';

			}

		

		

		

}

}

?>
<style type="text/css">
	
	ul.subscreenAdd{
		list-style: none;
		margin: 0;
		padding: 0;
	}
	ul.subscreenAdd li{
		  float: left;
		  margin-right: 9px;
		  margin-top: 10px;
	}
	ul.subscreenAdd li a{
		  display: inline-block;
		  padding: 8px 40px;
		  color: #000;
		  font-size: 15px;
		  border: 1px solid #D2D1D1;
		  border-radius: 6px 6px 0px 0px;
	}
	ul.subscreenAdd > .activesub{
		background-color: #ddd;
	}

</style>
<div id="element"></div>
 <form method="post" action="" enctype="multipart/form-data">

<div class="container">

	<!-----Header Part--->

 <div class="header">

    	<div class="headerContent">

            <div class="indexLogo">

                    <img src="images/transcareLogoMain.png">

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
<?php if(isset($errormsg)){ ?> 

  <h2 style="border:#000; padding:10px; background-color: #B2DBB2;margin-top: 10px;color: #626262;border-radius: 4px;">
  <?php echo $errormsg; ?></h2>

    <?php } ?>
  <div class="subScreenheader">   

        <div class="back">

                <a href="transcare_manage.php"></a>

        </div> 

       <!--  <div class="linkName">

            <p>Link Name</p><span style='color:red'>*Mandatory</span>

            <input type="hidden" name="screenid" value="0" />

            <p class="linkLimit"><input type="text" name="linkname"  class="linkText"> <span>Note: Limit 20 Characters</span></p>

        </div>
 -->
        

        

		<!-- <div class="subScr1">

                <a href="#"></a>

        </div> -->
        <?php 

	

		if($_GET["screenid"] == 0 && $_GET["screen"] == 'screen1')

		{

		

		?>
        <div>
        		
    		<ul class="subscreenAdd">
    			<li class="activesub"><a>Subscreen 1</a></li>
    			<li><a>Subscreen 2</a></li>
    			<li><a>Subscreen 3</a></li>
    		</ul>

        </div>

        

        

        <?php 
    }
	

		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen2')

		{
		?>
		<div>
        		
    		<ul class="subscreenAdd">
    			<li><a>Subscreen 1</a></li>
    			<li class="activesub"><a>Subscreen 2</a></li>
    			<li><a>Subscreen 3</a></li>
    		</ul>

        </div>
        

        <?php

		}

		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen3')

		{

		?>

		<div>
        		
    		<ul class="subscreenAdd">
    			<li><a>Subscreen 1</a></li>
    			<li><a>Subscreen 2</a></li>
    			<li class="activesub"><a>Subscreen 3</a></li>
    		</ul>

        </div>

        <?php

		}
		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen4')

		{

		?>
		<div>
        		
    		<ul class="subscreenAdd">
    			<li><a>Subscreen 1</a></li>
    			<li><a>Subscreen 2</a></li>
    			<li ><a>Subscreen 3</a></li>
    			<li class="activesub"><a>Subscreen 4</a></li>
    		</ul>

        </div>
         <?php

		}
		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen5')

		{

		?>
		<div>
        		
    		<ul class="subscreenAdd">
    			<li><a>Subscreen 1</a></li>
    			<li><a>Subscreen 2</a></li>
    			<li ><a>Subscreen 3</a></li>
    			<li ><a>Subscreen 4</a></li>
    			<li class="activesub"><a>Subscreen 5</a></li>
    		</ul>

        </div>
         <?php

		}
		if($_GET["screenid"] != 0 && $_GET["screen"] == 'screen6')

		{

		?>
		<div>
        		
    		<ul class="subscreenAdd">
    			<li><a>Subscreen 1</a></li>
    			<li><a>Subscreen 2</a></li>
    			<li ><a>Subscreen 3</a></li>
    			<li ><a>Subscreen 4</a></li>
    			<li ><a>Subscreen 5</a></li>
    			<li class="activesub"><a>Subscreen 6</a></li>
    		</ul>

        </div>

        <?php

		}
		?>

        

        

        


        

       

   </div> 

   <div class="subScreenContent">

       <div class="linkName" style="margin-bottom:10px;">

            <p>Link Name</p><span style='color:red;font-size:14px'>*Mandatory</span>

            <input type="hidden" name="screenid" value="0" />

            <p class="linkLimit"><input type="text" name="linkname"  class="linkText"> <span>Note: Limit 20 Characters</span></p>

        </div>

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

                    	<img src="<?php echo $data["template_image"] ?>" style="width:120px;height:120px" >

                        <p class="tempName">

                        <?php

						if($data["template_id"]==1)

						{

							?>

							 <input type="radio" name="TempName" value="<?php echo $data["template_id"] ?>" checked="checked" onchange="TempNameChange(this.value,'<?php echo $data["template_name"]?>','<?php echo $data["template_image"] ?>')"> <?php echo $data["template_name"]?></p>


                             <?php

						}

						else

						{

						?>

                        <input type="radio" name="TempName" value="<?php echo $data["template_id"] ?>"  onchange="TempNameChange(this.value,'<?php echo $data["template_name"]?>','<?php echo $data["template_image"] ?>')"> <?php echo $data["template_name"]?></p>

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

			<?php
			$i=1;
			$rows=mysql_query("SELECT * FROM templates");
			while($template1=mysql_fetch_array($rows))
			{
					if($template1["template_id"]==1)
					{
					?>
					<img src="<?php echo $template1["template_image"] ?>" id="bindtemplateimage">

					<p class="tempName center" id="bindtemplatename"><?php echo $template1["template_name"] ?></p>

					<?php

					}
			$i++;
			}
			?>

                    </div>

                </div>

            </div> 

    	</div> 


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

                      <textarea  id="editor1" style="width: 100%;" rows="4" name="temp1desc" class="jqte-test"></textarea>
                      <!-- <span name="span" class="jqte-test"><b>My contents are from <u><span style="color:rgb(0, 148, 133);">SPAN</span></u></b></span> -->


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

                             <input type="hidden" id="temp1righthid" value="1" name="hiddentemplateid"/>  

                        <p id="temp1count1">1</p>

                        </div>
                        <h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Select your option:</h2>
                        <div class="" style="clear:both"></div>
                        <div class="contentSec2Left">
                        	<input type="radio" checked="checked" name="Imagecontent1" onclick="rightfilefunction(1,1);" value="Image"> <span class="rstyle">Image</span>
                        	<input type="radio" name="Imagecontent1" onclick="rightfilefunction(1,2);" value="Pdf"> <span class="rstyle">PDF</span>
                        	<input type="radio" name="Imagecontent1" onclick="rightfilefunction(1,3);" value="Video"> <span class="rstyle">Video</span>
                        </div>

                        <div id="imageidcontent1">
							<div class="contentSec2Left">
							<input type="text" id="template1_rightimage1" value="" class="upLoadText">


							<div class="fileUpload btn btn-primary">

							<span class="uploadImage"></span> 

							<input id="temp1_right1" onchange="template1rightimage(this,1)" name="template1addrgtimage1" type="file" class="upload">

							</div>
							<div class="fill-title">

							<label class="imgCaption"> caption</label>
							<div style="clear:both;"></div>
							<input type="text" id="imagecaption1" name="imagecaption1" class="fillTitleText"> <!--<a href="#"></a>  -->

							</div>

							</div>

							<div class="contentSecRight"> 

							<p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp1_currimg1"><br><br>Current Image</p>
							<!--
							<p class="imageView4">filename.jpg</p>
							-->
							<div class="deLete">

							<a href="javascript:void(0);"  onClick="removetemplate1rightfiles(1);"></a>

							</div>

							</div>
                        </div>

                        <div id="pdfidcontent1" style="display:none;">
                        		
							<div class="contentSec2Left">



							<input type="text" id="template1_pdf1" value="" class="upLoadText">


							<div class="fileUpload btn btn-primary">

							<span class="uploadImage"></span> 

							<input id="temp1_right1" onchange="template1rightimage(this,1)" name="template1addpdf1" type="file" class="upload" value="Browse">

							</div>
							<div class="fill-title"> 

							<label class="imgCaption">caption</label>
							<div style="clear:both;"></div>
							<input type="text" name="pdfcaption1" id="pdfcaption1" value="" class="fillTitleText" style="margin-bottom:10px"> <!--<a href="#"></a>  -->

							</div>
						

							</div>
								<div class="deLete">

							<a href="javascript:void(0);"  onClick="removetemplate1rightfiles(1);"></a>

							</div>

                        </div>
                        <div id="videoidcontent1" class="videoDelete" style="display:none;">
                        	
                        	<div class="contentSec2Left fill-title" style="padding-top: 10px;"> 

							<label class="imgCaption">Video Url <span>(please provide embed youtube url)</span></label> <br>
							<input type="text" name="template1addvideo1" id="template1addvideo1" value="" class="fillTitleText"> <!--<a href="#"></a>  -->

							</div>
							<div class="contentSec2Left fill-title" style="padding-bottom: 10px;"> 

							<label class="imgCaption"> Caption</label>
							<div style="clear:both;"></div>
							<input type="text"  name="videocaption1" id="videocaption1" value="" class="fillTitleText" >

							</div>
							<div class="deLete">

							<a href="javascript:void(0);"  onClick="removetemplate1rightfiles(1);"></a>

							</div>

                        </div>

                        </div>

                     </div>

                 

                    

                 

                     <div class="addMore">

                            <a href="javascript:void(0);" onClick="addtemplate1rightfiles();"></a>

                     </div>
                     <div style="clear:both"></div>
                     <span style='color:red;font-size:14px'>You can add minimum 5 files and maximum 10</span>

                 </div> 

        	</div> 

        </div>

        

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

                       <label style="padding-left:0">Descrption</label><textarea rows="4" name="temp2desc" class="jqte-test"></textarea>

					</div>

                   

                </div> 

            </div> 
<!-- <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right Side</h3>

                </div>

                <div class="subSec">                

                     <div id="template2rightfiles">               

                    <div class="subSec1" id="templateappendClass1">  

                    

                        <div class="ses1">

                             <input type="hidden" id="temp2righthid" value="1" name="hiddentemplate2id"/>  

                        <p id="temp2count1">1</p>

                        </div>
                        <h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Select your option:</h2>
                        <div class="" style="clear:both"></div>
                        <div class="contentSec2Left">
                            <input type="radio" checked="checked" name="Imagecontenttwotemp1" onclick="rightfilefunctiontwo(1,1);" value="Image"> <span class="rstyle">Image</span>
                            <input type="radio" name="Imagecontenttwotemp1" onclick="rightfilefunctiontwo(1,2);" value="Pdf"> <span class="rstyle">Pdf</span>
                            <input type="radio" name="Imagecontenttwotemp1" onclick="rightfilefunctiontwo(1,3);" value="Video"> <span class="rstyle">Video</span>
                        </div>
                        <div id="imageidcontenttwo1">
                            <div class="contentSec2Left">
                            <input type="text" id="template2_rightimage1" value="" class="upLoadText">

                            <div class="fileUpload btn btn-primary"> 

                            <span class="uploadImage"></span> 

                            <input id="temp2_right1" onchange="template2rightimage(this,1)" name="template2addrgtimage1" type="file" class="upload" value="Browse">

                            </div>
                            <div class="fill-title"> 

                            <label class="imgCaption">Image caption</label> <div style="clear:both;"></div><input type="text" name="template2imagecaption1" id="template2imagecaption1" value="" class="fillTitleText"> 
                            </div>
                            </div>

                            <div class="contentSecRight"> 

                            <p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp2_currimg1"><br><br>Current Image</p>
                            <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate2rightfiles(1)"></a>

                              </div>
                            </div>
                        </div>
                        <div id="pdfidcontenttwo1" style="display:none;">
                            
                            <div class="contentSec2Left">
                            <input type="text" id="template2_pdf1" value="" class="upLoadText">

                            <div class="fileUpload btn btn-primary"> 

                            <span class="uploadImage"></span> 

                            <input id="temp2_right1" onchange="template2rightimage(this,1)" name="template2addpdf1" type="file" class="upload" value="Browse">

                            </div>
                            <div class="fill-title"> 

                            <label class="imgCaption">Pdf caption</label><div style="clear:both;"></div> <input type="text" name="template2pdfcaption1" id="template2pdfcaption1" value="" class="fillTitleText"> 
                            </div>
                            </div>
                             <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate2rightfiles(1)"></a>

                              </div>                      
                        </div>
                        <div id="videoidcontenttwo1" class="videoDelete" style="display:none;">
                            <div>
                                <div class="contentSec2Left fill-title" style="padding-top: 10px;"> 
    
                                <label class="imgCaption">Video Url <span>(please provide embed youtube url)</span></label> <br>
                                <input type="text"  name="template2addvideo1" id="template2addvideo1" value="" class="fillTitleText"> 
    
                                </div>
                                <div class="contentSec2Left fill-title" style="padding-bottom: 10px;"> 
    
                                <label class="imgCaption">Video Caption</label><div style="clear:both;"></div>
                                <input type="text" name="template2videocaption1" id="template2videocaption1" value="" class="fillTitleText"> 
    
                                </div>
                             </div>
                             <div class="deLete">

                                    <a href="javascript:void(0);" onclick="removetemplate2rightfiles(1)"></a>

                              </div>

                        </div>
                        
                        </div>

                     </div>

                 

                    

                 

                     <div class="addMore" id="template2addbutton">

                            <a href="javascript:void(0);" onClick="addtemplate2rightfiles();"></a>

                     </div>

                     

                     

                     

                     

                      

                 </div> 

            </div>  -->






      

        </div> 

        <!-- Template 3 -->

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

                <div id="template3Append">
				<div class="event-sec">     
                    <div class="ses1">
                    <input type="hidden" id="template3autoid" name="template3autoid" value="1"> 
                        <p>1</p>
                    </div>
                    <div class="event-content" id="template3appendclass1">      
                        <div class="event-title"><label>Event Name</label> <input type="text" name="eventname1" id="eventname1" value="" class="subtitle-text"></div>

                        <div class="event-title"><label>Description</label> <textarea rows="4"  name="template3description1" id="template3description1"></textarea></div>

                        <div class="event-title"><label>Time</label> <input type="time" name="time1" id="time1" value="" class="subtitle-text" placeholder="">

                        	</div>

                              <div class="event-title"><label>Date</label> <input type="date" name="date1" id="date1" value="" class="subtitle-text" placeholder="">

                        	</div>

                        <div class="event-title"><label>Place</label> <input type="text" name="temp3place1" id="temp3place1" value="" class="subtitle-text" placeholder="Place Name"></div>
						<div class="deLete">

                        	<a href="javascript:void(0);" onClick="removetemplate3files(1)"></a>
                        
                        </div>
                    </div> 

				</div>
				</div>
				<div class="addMore">
	                <a href="javascript:void(0);" onClick="addtemplate3files();"></a>
	             </div>
			</div>

		</div>


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
                <div id="temp4linkname">
				<div class="event-sec">   
                    <div class="ses1">
                    <input type="hidden" id="template4autoid" name="template4autoid" value="1">
                        <p>1</p>                                                          
                    </div>
                    <div class="event-content" id="template4appendclass1"> 
                            <div class="event-title"><label>Header Name</label> <input type="text" name="headername1" id="headername1" value="" class="subtitle-text" placeholder="Account Executive"></div>

                            <div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description1" id="temp4description1"></textarea></div>

                            <div class="event-title"><label>Division</label> <input type="text" name="Division1" id="Division1" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Type</label> <input type="text" name="Type1" id="Type1" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Available</label> <input type="text" name="Available1" id="Available1" value="" class="subtitle-text" placeholder=""></div>

                            <div class="event-title"><label>Place</label> <input type="text" name="Place1" id="Place1" value="" class="subtitle-text" placeholder=""></div>
                         <div class="deLete">

<a href="javascript:void(0);" onClick="removetemplate4files(1)"></a>

</div>
                    </div> 

				</div>
				</div>
				<div class="addMore">
	                <a href="javascript:void(0);" onClick="addtemplate4files();"></a>
	             </div>
                </div>

                </div>


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

                      <label style="padding-left:0">Description</label>  <textarea rows="4" name="temp5desc" class="jqte-test"></textarea>

					</div>

                    

                </div> 

            </div> 

        </div>

        

     

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

                       <label style="padding-left:0">Desription</label>  <textarea rows="4" name="temp6desc" class="jqte-test" ></textarea>

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



<script type="text/javascript">


/*top image in template1*/

                                  

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

   function rightfilefunction(id, cont){
   		if(cont == 1){
		   	$('#pdfidcontent'+id).hide();
		   	$('#videoidcontent'+id).hide(); 
		   	$('#imageidcontent'+id).show();
	   	}
	   	if(cont == 2){
		   	$('#pdfidcontent'+id).show();
		   	$('#videoidcontent'+id).hide(); 
		   	$('#imageidcontent'+id).hide();
	   	}
	   	if(cont == 3){
		   	$('#pdfidcontent'+id).hide();
		   	$('#videoidcontent'+id).show(); 
		   	$('#imageidcontent'+id).hide();
	   	}
   }

   function rightfilefunctiontwo(id, cont){
      if(cont == 1){
        $('#pdfidcontenttwo'+id).hide();
        $('#videoidcontenttwo'+id).hide(); 
        $('#imageidcontenttwo'+id).show();
      }
      if(cont == 2){
        $('#pdfidcontenttwo'+id).show();
        $('#videoidcontenttwo'+id).hide(); 
        $('#imageidcontenttwo'+id).hide();
      }
      if(cont == 3){
        $('#pdfidcontenttwo'+id).hide();
        $('#videoidcontenttwo'+id).show(); 
        $('#imageidcontenttwo'+id).hide();
      }
   }

   

    $("#temp1").change(function() {

	   template1topimage(this);

   });

  /*Right files in template1*/

	function template1rightimage(input,id) {
		var selectedvalue = $('input:radio[name=Imagecontent'+id+']:checked').val();

		if(selectedvalue == "Image")
		{	
$('#template1_rightimage'+id).val(input.value);
		}
		else if(selectedvalue == "Pdf")
		{

$('#template1_pdf'+id).val(input.value);
		}
		
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

		$('#template1rightfiles').append('<div class="subSec1" id="appendClass'+next+'"><div class="ses1"><input type="hidden" id="temp1righthid" value="1" /><p id="temp1count'+next+'">'+next+'</p></div><h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Select your option:</h2><div class="" style="clear:both"></div><div class="contentSec2Left"><input type="radio" checked="checked" name="Imagecontent'+next+'" onclick="rightfilefunction('+next+',1);" value="Image"> <span class="rstyle">Image</span><input type="radio" name="Imagecontent'+next+'" onclick="rightfilefunction('+next+',2);" value="Pdf"> <span class="rstyle">PDF</span><input type="radio" name="Imagecontent'+next+'" onclick="rightfilefunction('+next+',3);" value="Video"> <span class="rstyle">Video</span></div><div id="imageidcontent'+next+'"><div class="contentSec2Left"><input type="text" id="template1_rightimage'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp1_right'+next+'" onchange="template1rightimage(this,'+next+')" name="template1addrgtimage'+next+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">caption</label><div style="clear:both;"></div><input type="text" name="imagecaption'+next+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div></div><div class="contentSecRight"><p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp1_currimg'+next+'"><br><br>Current Image</p><!--<p class="imageView4">filename.jpg</p>--><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+next+');"></a></div></div></div><div id="pdfidcontent'+next+'" style="display:none;"><div class="contentSec2Left"><input type="text" id="template1_pdf'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp1_right'+next+'" onchange="template1rightimage(this,'+next+')" name="template1addpdf'+next+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">caption</label> <div style="clear:both;"></div><input type="text" name="pdfcaption'+next+'" id="" value="" class="fillTitleText" style="margin-bottom:10px"> <!--<a href="#"></a>  --></div></div><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+next+');"></a></div></div><div class="videoDelete" id="videoidcontent'+next+'" style="display:none;"><div class="contentSec2Left fill-title" style="padding-top: 10px;"><label class="imgCaption">Video Url <span>(please provide embed youtube url)</span></label> <br><input type="text" name="template1addvideo'+next+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="contentSec2Left fill-title" style="padding-bottom: 10px;"><label class="imgCaption">caption</label> <div style="clear:both;"></div><input type="text" name="videocaption'+next+'" id="" value="" class="fillTitleText"><!--<a href="#"></a>  --></div><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+next+');"></a></div></div></div>');             

        $('#temp1righthid').val(next);

		

	}

	function removetemplate1topimg(id){

			$('#template1_topimage').val('');

			$('#changetopimg').attr('src','images/uploadImg.jpg');

		

	}

	function addtemplate3files(){
		var id = $('#template3autoid').val();

		var next = parseInt(id)+1;

		$('#template3Append').append('<div class="event-sec"><div class="ses1"><p>'+next+'</p></div><div class="event-content" id="template3appendclass'+next+'"><div class="event-title"><label>Event Name</label> <input type="text" name="eventname'+next+'" id="" value="" class="subtitle-text"></div><div class="event-title"><label>Description</label> <textarea rows="4"  name="template3description'+next+'" ></textarea></div><div class="event-title"><label>Time</label> <input type="time" name="time'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Date</label> <input type="date" name="date'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Place</label> <input type="text" name="temp3place'+next+'" id="" value="" class="subtitle-text" placeholder="Place Name"></div><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate3files('+next+')"></a></div></div></div>');             

        $('#template3autoid').val(next);
	}
	

	function removetemplate3files(id)

	{
			var cid = $('#template3autoid').val();
			if(cid > 1){
				if(id==1)
				{
					$('#eventname1').val('');
					$('#template3description1').val('');
					$('#time1').val('');
					$('#date1').val('');
					$('#temp3place1').val('');

                
				}
				else
				{
      $('#template3appendclass'+id).remove();

		// var langCount=$('#template3autoid').val();

		// $('#template3autoid').val(parseInt(langCount)-1);

				}

		
		}

		else

		{

			 	$('#eventname1').val('');
					$('#template3description1').val('');
					$('#time1').val('');
					$('#date1').val('');
					$('#temp3place1').val('');
		}

	}


	function removetemplate4files(id)

	{
			var cid = $('#template4autoid').val();
			if(cid > 1){
				if(id==1)
				{
					$('#headername1').val('');
					$('#temp4description1').val('');
					$('#Division1').val('');
					$('#Type1').val('');
					$('#Available1').val('');
					$('#Place1').val('');
        
                
				}
				else
				{
      $('#template4appendclass'+id).remove();

		var langCount=$('#template4autoid').val();

		$('#template4autoid').val(parseInt(langCount)-1);

				}

		
		}

		else

		{

			 	$('#headername1').val('');
					$('#temp4description1').val('');
					$('#Division1').val('');
					$('#Type1').val('');
					$('#Available1').val('');
					$('#Place1').val('');
		}

	}

	/*Template 4 dyanamic work*/

	function addtemplate4files(){
		var id = $('#template4autoid').val();

		var next = parseInt(id)+1;

		$('#temp4linkname').append('<div class="event-sec"><div class="ses1"><p>'+next+'</p></div><div class="event-content" id="template4appendclass'+next+'"><div class="event-title"><label>Header Name</label> <input type="text" name="headername'+next+'" id="" value="" class="subtitle-text" placeholder="Account Executive"></div><div class="event-title"><label>Description</label> <textarea rows="4" name="temp4description'+next+'"></textarea></div><div class="event-title"><label>Division</label> <input type="text" name="Division'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Type</label> <input type="text" name="Type'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Available</label> <input type="text" name="Available'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Place</label> <input type="text" name="Place'+next+'" id="" value="" class="subtitle-text" placeholder=""></div><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate4files('+next+')"></a></div></div></div>');             

        $('#template4autoid').val(next);
	}



	function removetemplate1rightfiles(id)

	{
			var cid = $('#temp1righthid').val();
			if(cid > 1){
				if(id==1)
				{
            $('#template1_rightimage1').val('');
            $('#template1addvideo1').val('');
            $('#temp1_right1').val('');
            $('#template1_pdf1').val('');
            $('#imagecaption1').val('');
            $('#pdfcaption1').val('');
            $('#videocaption1').val('');
			$('#temp1_currimg1').attr('src','images/uploadImg.jpg');
				}
				else
				{
$('#appendClass'+id).remove();

		var langCount=$('#temp1righthid').val();

		$('#temp1righthid').val(parseInt(langCount)-1);

				}

		
		}

		else

		{

			 $('#template1_rightimage1').val('');
			  $('#template1addvideo1').val('');
            $('#temp1_right1').val('');
            $('#template1_pdf1').val('');
            $('#imagecaption1').val('');
            $('#pdfcaption1').val('');
            $('#videocaption1').val('');
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

		 var selectedtemp2value = $('input:radio[name=Imagecontenttwotemp'+id+']:checked').val();

    if(selectedtemp2value == "Image")
    { 
$('#template2_rightimage'+id).val(input.value);
    }
    else if(selectedtemp2value == "Pdf")
    {

      $('#template2_pdf'+id).val(input.value);      
    
    }

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

$('#template2rightfiles').append('<div class="subSec1" id="templateappendClass'+next+'"><div class="ses1"><input type="hidden" id="temp2righthid" value="1" /><p id="temp2count'+next+'">'+next+'</p></div><h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Slect your option:</h2><div class="" style="clear:both"></div><div class="contentSec2Left"><input type="radio" checked="checked" name="Imagecontenttwotemp'+next+'" onclick="rightfilefunctiontwo('+next+',1);" value="Image"> <span class="rstyle">Image</span><input type="radio" name="Imagecontenttwotemp'+next+'" onclick="rightfilefunctiontwo('+next+',2);" value="Pdf"> <span class="rstyle">PDF</span><input type="radio" name="Imagecontenttwotemp'+next+'" onclick="rightfilefunctiontwo('+next+',3);" value="Video"> <span class="rstyle">Video</span></div><div id="imageidcontenttwo'+next+'"><div class="contentSec2Left"><input type="text" id="template2_rightimage'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp2_right'+next+'" onchange="template2rightimage(this,'+next+')" name="template2addrgtimage'+next+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">Image caption</label><div style="clear:both;"></div> <input type="text" name="template2imagecaption'+next+'" id="" value="" class="fillTitleText"></div></div><div class="contentSecRight"><p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp2_currimg'+next+'"><br><br>Current Image</p> <div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+next+')"></a></div></div></div><div id="pdfidcontenttwo'+next+'" style="display:none;"><div class="contentSec2Left"><input type="text" id="template2_pdf'+next+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp2_right'+next+'" onchange="template2rightimage(this,'+next+')" name="template2addpdf'+next+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">Pdf caption</label><div style="clear:both;"></div> <input type="text" name="template2pdfcaption'+next+'" id="" value="" class="fillTitleText"></div></div> <div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+next+')"></a></div></div><div  id="videoidcontenttwo'+next+'" style="display:none;"><div class="contentSec2Left fill-title" style="padding-top: 10px;"><label class="imgCaption">Video Url <span>(please provide embed youtube url)</span></label><div style="clear:both;"></div><input type="text" name="template2addvideo'+next+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="contentSec2Left fill-title" style="padding-bottom: 10px;"><label class="imgCaption">Video Caption</label> <br><input type="text" name="template2videocaption'+next+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div> <div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+next+')"></a></div></div></div>');            

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
	if(id==1)
				{
            $('#template2_rightimage1').val('');
            $('#temp2_right1').val('');
            $('#template2addvideo1').val('');
            $('#template2_pdf1').val('');
            $('#template2imagecaption1').val('');
            $('#template2pdfcaption1').val('');
            $('#template2videocaption1').val('');
			$('#temp2_currimg1').attr('src','images/uploadImg.jpg');
				}
				else
				{
$('#templateappendClass'+id).remove();

var langCount=$('#temp2righthid').val();

$('#temp2righthid').val(parseInt(langCount)-1);

				}
}

else

{
             $('#template2_rightimage1').val('');
             $('#template2addvideo1').val('');
            $('#temp2_right1').val('');
            $('#template2_pdf1').val('');
            $('#template2imagecaption1').val('');
            $('#template2pdfcaption1').val('');
            $('#template2videocaption1').val('');
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