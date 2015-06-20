<?php

include("admin-header.php");
$getelement = $_GET['scid'];

$gettbe = $_GET['tn'];
$get_template_id = $_GET['temp_id'];
if(isset($_POST['editSave'])){

$linkId = $_POST['updatelinkname'];

$linkname = mysql_real_escape_string($_POST['elinkname']);
$createdOn = date('Y-m-d H:i:s');

if($linkname != ""){

$quers = mysql_query("UPDATE template_content SET linkname = '$linkname' WHERE id = '$linkId'");
}


if(isset($_POST['template1']))
{

  $title = mysql_real_escape_string($_POST['etemp1title']);

  $desc = mysql_real_escape_string($_POST['etemp1desc']);

  $temp1id = $_POST['template1id'];

   $temp_contentid=$_POST['hiddencarousaltemplate1'];
        if($temp_contentid == "")
  {
   
$temp_contentid=$getelement;
  }

  //Update template1 link 
  $uptemp = mysql_query("UPDATE template1_link SET linkname = '$linkname',title = '$title', description = '$desc' WHERE template1_id = '$temp1id'");

  if($_FILES['template1image']['size'] > 0)

  {

     $tmpFilePath = $_FILES['template1image']['tmp_name'];

     if ($tmpFilePath != "")

     {    

       $tempremove = $_POST['gettopImage1'];
       if($tempremove != "")
       {
    unlink($tempremove);
       }

       $temppath = "template1image/"; // create folder 

       $tempName = $_FILES['template1image']['name'];

       $tempN = $temppath.$tempName;

       if(move_uploaded_file($_FILES['template1image']['tmp_name'], $tempN)){

       $qur = mysql_query("UPDATE template1_link SET topimage = '$tempN' WHERE template1_id = '$temp1id'");

       }

     }


  }

  for($i=1; $i <= $_POST["hiddentemplateid"]; $i++) 
  {
    $choosefile=$_POST["edittemplate1choose".$i];

    $id=$_POST["tlid".$i];

    if($choosefile == "Image")  
    {
       if( $_FILES['edittemplate1addrgtimage'.$i]['size']==0)
      {
        
       $paname= $_POST['hiddenedittemplate1rgtimgs'.$i];

      }
      else  if( $_FILES['edittemplate1addrgtimage'.$i]['size'] > 0)
      {
        $path = "template1topimage/"; // create folder 
        $unimgrightfiles = $_POST['deleteCarImg'.$i];

        unlink($unimgrightfiles);

        $name = $_FILES['edittemplate1addrgtimage'.$i]['name'];

        $paname = $path.$name;
       $movefiles= move_uploaded_file($_FILES['edittemplate1addrgtimage'.$i]['tmp_name'], $path.$name);
      }
$template1imgname=mysql_real_escape_string($_POST["editimagecaption".$i]);
           
         $template1topimagequery=mysql_query("UPDATE  `template1_carousel` SET
         template1_rightimages='$paname',temp1imgcaption='$template1imgname',contentchecked='$choosefile' WHERE template1_rightid='$id'");
    
      }

    else if($choosefile == "Pdf")
    {
        if( $_FILES['edittemplate1addpdf'.$i]['size']==0)
      {
        
       $paname= $_POST['hiddenedittemplate1pdf'.$i];

      }
      else if( $_FILES['edittemplate1addpdf'.$i]['size'] > 0)
      {
        $path = "template1pdffile/"; // create folder 
        $unimgrightfiles = $_POST['deleteCarpdf'.$i];

        unlink($unimgrightfiles);

        $name = $_FILES['edittemplate1addpdf'.$i]['name'];

        $paname = $path.$name;
       $movefiles= move_uploaded_file($_FILES['edittemplate1addpdf'.$i]['tmp_name'], $path.$name);
      }
        $template1imgname=mysql_real_escape_string($_POST["editpdfcaption".$i]);
       
        $template1topimagequery=mysql_query("UPDATE  `template1_carousel` SET
        template1_rightimages='$paname',temp1imgcaption='$template1imgname',
        contentchecked='$choosefile' WHERE template1_rightid='$id'");
    
    }  
    else if($choosefile == "Video")
    {

    $videourl=$_POST["edittemplate1addvideo".$i];
    $videcaption=mysql_real_escape_string($_POST["editvideocaption".$i]); 

    $template1topimagequery=mysql_query("UPDATE  `template1_carousel` SET 
      template1_rightimages='$videourl',temp1imgcaption='$videcaption',
    contentchecked='$choosefile' WHERE template1_rightid='$id'"); 

    }
  
}

for($i=1; $i <= $_POST["newcountval"]; $i++) 
{

$choosefile=$_POST["Imagecontent".$i];


if($choosefile == "Image")
{

   if($_FILES['template1addrgtimage'.$i]['size'] > 0)
   {
      $path = "template1topimage/"; // create folder 

      $name = $_FILES['template1addrgtimage'.$i]['name'];

      $paname = $path.$name;

      $template1imgname=mysql_real_escape_string($_POST["imagecaption".$i]);

      if(move_uploaded_file($_FILES['template1addrgtimage'.$i]['tmp_name'], $path.$name))
      {

      

      $template1topimagequery=mysql_query("INSERT INTO `template1_carousel` 
        (template1_rightimages,temp1imgcaption,template_content_id,contentchecked) 
        VALUES('$paname','$template1imgname','$temp_contentid','$choosefile')");

      }
  }


}
else if($choosefile == "Pdf")
{


  if($_FILES['template1addpdf'.$i]['size'] > 0)
  {

    $path = "template1pdffile/"; // create folder 

    $name = $_FILES['template1addpdf'.$i]['name'];

    $paname = $path.$name;

    $template1imgname=mysql_real_escape_string($_POST["pdfcaption".$i]);


       if(move_uploaded_file($_FILES['template1addpdf'.$i]['tmp_name'], $path.$name)) 

       { 

      $template1topimagequery=mysql_query("INSERT INTO `template1_carousel`
       (template1_rightimages,temp1imgcaption,template_content_id,contentchecked) 
       VALUES('$paname','$template1imgname','$temp_contentid','$choosefile')");

       }

  }
 
}
else if($choosefile == "Video")
{


    $videourl=$_POST["template1addvideo".$i];
    $videcaption=mysql_real_escape_string($_POST["videocaption".$i]);


    $template1topimagequery=mysql_query("INSERT INTO `template1_carousel` 
     (template1_rightimages,temp1imgcaption,template_content_id,contentchecked) 
       VALUES('$videourl','$videcaption','$temp_contentid','$choosefile')");

    
    
}
  
}

}

//Update template 2

if(isset($_POST['template2']))
{

  $title = mysql_real_escape_string($_POST['etemp2title']);

  $subtitle1 = mysql_real_escape_string($_POST['etemp2subtitle']);

  $desc1 = mysql_real_escape_string($_POST['etemp2desc']);

  $temp1id = $_POST['template1id'];
//   $temp_content_id=$_POST['hiddencarousaltemplate2'];
//       if($temp_content_id == "")
//   {
   
// $temp_content_id=$getelement;
//   }

  $uptemp = mysql_query("UPDATE template2_link SET linkname = '$linkname', title = '$title', 
    subtitle = '$subtitle1', description = '$desc1' WHERE template2_id = '$temp1id'");

  if($_FILES['etemplate2topimage']['size']>0)

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
  //update template2 link right images with multimple time
//   for($i=1; $i <= $_POST["hiddentemplate2id"]; $i++) 
//   {
   
//     $template2choosefile=$_POST["edittemplate2choose".$i];

//     $id=$_POST["tl2id".$i];

//     if($template2choosefile == "Image") 
//     {
// if($_FILES['edittemplate2addrgtimage'.$i]['size'] ==  0)
// {

// $paname=$_POST['hiddenedittemplate2rgtimgs'.$i];

// }
// else if($_FILES['edittemplate2addrgtimage'.$i]['size'] > 0)
// {

//         $name=$_FILES['edittemplate2addrgtimage'.$i]['name'];
//         $path = "template2rightimage/"; // create folder 
//         $paname = $path.$name;
//         $movetemp2files=move_uploaded_file($_FILES['edittemplate2addrgtimage'.$i]['tmp_name'], $path.$name);
//   }   
//         $template2imgname=mysql_real_escape_string($_POST["edittemplate2imagecaption".$i]);

        
//          $template2topimagequery=mysql_query("UPDATE  `template2_carousal` SET
//           template2_rightimages='$paname',Imagecaption='$template2imgname',
//          contentchecked='$template2choosefile' WHERE id='$id'");
    
//     }
//     else if($template2choosefile == "Pdf")
//     {
//       if($_FILES['edittemplate2addpdf'.$i]['size'] == 0)
//       {
// $paname=$_POST['hiddenedittemplate2pdffiles'.$i];
//       }
//       else if($_FILES['edittemplate2addpdf'.$i]['size']>0)
//       {
//         $path = "template2pdffile/"; // create folder 

//         $name = $_FILES['edittemplate2addpdf'.$i]['name'];

//         $paname = $path.$name;
//         $template2movepdf=move_uploaded_file($_FILES['edittemplate2addpdf'.$i]['tmp_name'], $path.$name);
//       }

//         $template2imgname=mysql_real_escape_string($_POST["edittemplate2pdfcaption".$i]);

        
//         $template1topimagequery=mysql_query("UPDATE  `template2_carousal` SET 
//         template2_rightimages='$paname',Imagecaption='$template2imgname',
//         contentchecked='$template2choosefile' WHERE id='$id'");
      
 
//     }
//     else if($template2choosefile == "Video")
//     {

//     $template2videourl=$_POST["edittemplate2addvideo".$i];
//     $template2videcaption=mysql_real_escape_string($_POST["edittemplate2videocaption".$i]); 

//     $template1topimagequery=mysql_query("UPDATE  `template2_carousal`
//      SET template2_rightimages='$template2videourl',Imagecaption='$template2videcaption',
//     contentchecked='$template2choosefile' WHERE id='$id'"); 

//     }
  
// }

// for($i=1; $i <= $_POST["newtemplate2countval"]; $i++) 
// {

// $choosetemp2file=$_POST["Imagecontenttwotemp".$i];

// if($choosetemp2file == "Image")
// {
//    if($_FILES['template2addrgtimage'.$i]['size'] > 0)
//    {
//       $path = "template2rightimage/"; // create folder 

//       $name = $_FILES['template2addrgtimage'.$i]['name'];

//       $temp2imgname = $path.$name;

//       $template2imgcaption=mysql_real_escape_string($_POST["template2imagecaption".$i]);

//       if(move_uploaded_file($_FILES['template2addrgtimage'.$i]['tmp_name'], $path.$name))
//       {

      

//       $template1topimagequery=mysql_query("INSERT INTO `template2_carousal` 
//         (template2_rightimages,Imagecaption,template_content_id,contentchecked) 
//         VALUES('$temp2imgname','$template2imgcaption','$temp_content_id','$choosetemp2file')");

//       }
//   }


// }
// else if($choosetemp2file == "Pdf")
// {


//   if($_FILES['template2addpdf'.$i]['size'] > 0)
//   {

//     $path = "template2pdffile/"; // create folder 

//     $name = $_FILES['template2addpdf'.$i]['name'];

//     $paname = $path.$name;

//     $template2pdfcaption=mysql_real_escape_string($_POST["template2pdfcaption".$i]);
  


//        if(move_uploaded_file($_FILES['template2addpdf'.$i]['tmp_name'], $path.$name)) 

//        { 
  

//       $template1topimagequery=mysql_query("INSERT INTO `template2_carousal`
//          (template2_rightimages,Imagecaption,template_content_id,contentchecked)
//        VALUES('$paname','$template2pdfcaption','$temp_content_id','$choosetemp2file')");

//        }

//   }
 
// }
// else if($choosetemp2file == "Video")
// {

//     $temp2videourl=$_POST["template2addvideo".$i];
 

//     $temp2videcaption=mysql_real_escape_string($_POST["template2videocaption".$i]);


//     $template1topimagequery=mysql_query("INSERT INTO `template2_carousal` 
//          (template2_rightimages,Imagecaption,template_content_id,contentchecked)
//        VALUES('$temp2videourl','$temp2videcaption','$temp_content_id','$choosetemp2file')");

    
    
// }
  
// }

}



//Update template 3



if(isset($_POST['template3']))
{

  $title = mysql_real_escape_string($_POST['etemp3tittle']);
  $template3templatecontentid=$_POST["hiddentemp3tempcontentid"];
  $template3=mysql_query("UPDATE `template3_link` SET linkname='$linkname',title = '$title' WHERE id = '$template3templatecontentid'");

				if($_POST["hiddentemp3value"] > 0)
				{
						for($i=0; $i<count($_POST["eeventname"]); $i++) 

						{

						$temp3id=$_POST["template3id"][$i];

						$eventname=mysql_real_escape_string($_POST["eeventname"][$i]);

						$temp3description=mysql_real_escape_string($_POST["etemplate3description"][$i]);

						$time=$_POST["etime"][$i];

						$temp3place=mysql_real_escape_string($_POST["etemp3place"][$i]);

						$date=$_POST["edate"][$i];

						$template3=mysql_query("UPDATE `template3event` SET  eventname = '$eventname',description = '$temp3description', time = '$time',date = '$date', place = '$temp3place' WHERE te_id = '$temp3id'");


						}
				}

if($_POST["hiddenaddtemplate3id"]-1 > 0)
{
				if(count($_POST["aeeventname"]) > 0)
				{

							for($i=0; $i<count($_POST["aeeventname"]); $i++) 

							{

							$aeventname=mysql_real_escape_string($_POST["aeeventname"][$i]);
							$atemp3description=mysql_real_escape_string($_POST["aetemplate3description"][$i]);

							$atime=$_POST["aetime"][$i];

							$atemp3place=mysql_real_escape_string($_POST["aetemp3place"][$i]);

							$adate=$_POST["aedate"][$i];

							if($aeventname != "" || $atemp3description != "" || $atime != "" || $atemp3place != "" ||  $adate != "")

							{
							$template3=mysql_query("INSERT INTO `template3event` ( tl3_id, eventname, description, time, date, place, created_on)VALUES('$template3templatecontentid','$aeventname','$atemp3description','$atime','$adate','$atemp3place','$createdOn')");

							}
							else
							{

							}
							}
				}

}
 
}


//Update template 4



if(isset($_POST['template4']))
{

  $title = mysql_real_escape_string($_POST['etemplate4title']);
 
$template4templatecontentid=$_POST["hiddentemp4tempcontentid"];
 $template4=mysql_query("UPDATE `template4_link` SET linkname='$linkname',title = '$title' WHERE id = '$template4templatecontentid'");
if($_POST["hiddentemp4value"] > 0)
{
  for($i=0; $i<count($_POST["eheadername"]); $i++) 

    {

      $temp4id=$_POST["template4id"][$i];

      $headername=mysql_real_escape_string($_POST["eheadername"][$i]);

         $description=mysql_real_escape_string($_POST["etemp4description"][$i]);

           $division=mysql_real_escape_string($_POST["eDivision"][$i]);

           $type=mysql_real_escape_string($_POST["eType"][$i]);

             $available=mysql_real_escape_string($_POST["eAvailable"][$i]);

             $place=mysql_real_escape_string($_POST["ePlace"][$i]);

             $template3=mysql_query("UPDATE `template4event` 
              SET  headername = '$headername',description = '$description',
               division = '$division',type = '$type',available= '$available', place = '$place'
                WHERE te_id = '$temp4id'");

    }
}

if($_POST["hiddenaddtemplate4id"]-1 > 0)
{
  if(count($_POST["aeheadername"]) > 0 )
  {
      for($i=0; $i<count($_POST["aeheadername"]); $i++) 

    {

      $aheadername=mysql_real_escape_string($_POST["aeheadername"][$i]);

         $adescription=mysql_real_escape_string($_POST["aetemp4description"][$i]);

           $adivision=mysql_real_escape_string($_POST["aeDivision"][$i]);

           $atype=mysql_real_escape_string($_POST["aeType"][$i]);

             $aavailable=mysql_real_escape_string($_POST["aeAvailable"][$i]);

             $aplace=mysql_real_escape_string($_POST["aePlace"][$i]);

             if($aheadername != "" || $adescription != "" || $adivision !="" || $atype !="" || $aavailable !="" ||$aplace!= "")

             {

        $template4=mysql_query("INSERT INTO `template4event` (tl4_id, headername, description, division, type, available, place, created_on) 
         VALUES('$template4templatecontentid','$aheadername','$adescription','$adivision','$atype','$aavailable','$aplace','$createdOn')");

    }

    else

    {

    }


  }

  }

}

}





//Update template 5


if(isset($_POST['template5'])){
  $title = mysql_real_escape_string($_POST['etemp5title']);

  $desc1 = mysql_real_escape_string($_POST['etemp5desc']);

  $temp5id = $_POST['template5id'];

  $uptemp = mysql_query("UPDATE template5_link SET linkname = '$linkname',title = '$title', description = '$desc1'
   WHERE temp5_id = '$temp5id'");


  if(isset($_FILES['etemplate5bannerimg']['name']))

  {

    $tempfilesize=$_FILES['etemplate5bannerimg']['size'];

    if($tempfilesize>0)

    {

     $tmpFilePath = $_FILES['etemplate5bannerimg']['tmp_name'];

     if ($tmpFilePath != "")

     {    
       $tempremove = $_POST['gettopImage5'];
      
       if($tempremove != "")
       {
unlink($tempremove);
       }

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
  

  $title = mysql_real_escape_string($_POST['etemplate6title']);

  $desc1 = mysql_real_escape_string($_POST['temp6desc']);

  $temp6id = $_POST['template6id'];

  $uptemp = mysql_query("UPDATE template6_link SET linkname = '$linkname',title = '$title', description = '$desc1'
   WHERE temp6_id = '$temp6id'");

  

  if(isset($_FILES['template6bannerimg']['name']))

  {

    $tempfilesize=$_FILES['template6bannerimg']['size'];

    if($tempfilesize>0)

    {

     $tmpFilePath = $_FILES['template6bannerimg']['tmp_name'];

     if ($tmpFilePath != "")

     {    

       $tempremove = $_POST['gettopImage6'];
if($tempremove!= "")
{
       unlink($tempremove);
}

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

  $message = "Template updated sucessfully";

}



}







?>


<script type="text/javascript">
  
$(document).ready(function(){
  $('.jqte-test').jqte();
});

</script>
<style>
.addSubscreenButton{
  color: #FFFFFF;
  font-size: 16px;
  background: #000;
  padding: 15px 10px;
  text-decoration: none;
  border: 1px solid #000;
}
</style>
<form method="post" action="" enctype="multipart/form-data">

<div class="container">

  <!-- Header Part-->

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

         <div>
            
        <ul class="subscreenAdd">

          <li id="subclass1" class="activesub"><a href="subscreen_edit.php?scid=<?php echo $fetctlink['id']; ?>&tn=<?php echo $fetctlink['table_name']; ?>&temp_id=<?php echo $fetctlink['template_id']; ?>">Subscreen 1</a></li>
          <?php 
           $geteTemp = mysql_query("SELECT * FROM template_content WHERE parentid = '$getelement' ORDER BY `template_content`.`id` ASC");
            $getCount = mysql_num_rows($geteTemp);
               $i = 2;
          if($getCount > 0){
         
          while($fetGetetemp = mysql_fetch_array($geteTemp)){ ?>
          <li id="subclass<?php echo $i; ?>"><a onclick="showsubscreen(<?php echo $fetGetetemp['id']; ?>,<?php echo $i; ?>);">Subscreen <?php echo $i; ?></a></li>
          <?php 
          $i++;
        }
          }
           $subcount=$i;
            ?>

          
        </ul>
<?php
if($subcount < 7)
{
?>
  <div style="float:right;"><a href="addExtraSubscreen.php?screenid= <?php echo $getelement; ?> &&screen=screen<?php echo $subcount;?>" class="addSubscreenButton">Add subscreen</a></div>
<?php
}
?>
        </div>


    

   </div> 

   <div id="content1">

    <div class="subScreenContent">
      <div class="linkName">

            <p>Link Name</p>

            <p class="linkLimit">

            <input type="hidden" name="updatelinkname" value="<?php echo $getelement; ?>">

            <input type="text" name="elinkname"  class="linkText" value="<?php echo $fetctlink['linkname']; ?>"> 

            <span>Note: Limit 20 Characters</span></p>

        </div>
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

                      <label>Description</label>  <textarea rows="4" class="jqte-test" name="etemp1desc"><?php echo $fetquery['description']; ?></textarea>

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

                        <input type="hidden" name="gettopImage1" value="<?php echo $fetquery['topimage']; ?>">

                              <p class="imageView3"><img id="changetopimg" style="width:82px; height:82px;" src="<?php echo $fetquery['topimage']; ?>"><br><br>Current Image</p>

                              <!--<p class="imageView4">filename.jpg</p>

                              <div class="deLete">

                                    <a href="javascript:void(0);" onclick="eremovetemplate1topimg();"></a>

                              </div> -->

                        </div>

                     </div> 

                 </div>

            </div>



            <input type="hidden" id="temp1righthid" name="hiddenaddtemplateid" value="1" /> 
            <input type="hidden" id="newcountval" name="newcountval"  />    

           <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right - Files</h3>

                </div>

                <div class="subSec">  

                <div id="template1rightfiles"> 
                <?php 

                  $getimage = mysql_query("SELECT * FROM template1_carousel WHERE template_content_id = '$getelement'");

          $countIm = mysql_num_rows($getimage);

          $i = 1;

          while($fetcImg = mysql_fetch_array($getimage)){
            if($i==1)
            {
              ?>
               <input type="hidden"  name="hiddencarousaltemplate1" value="<?php echo $fetcImg["template_content_id"]?>">
              <?php
            }

                ?>
             

                    <div class="subSec1" id="appendtemplate1class<?php echo $i;?>">
                    

                        <div class="ses1">                            
 
                        <p id="temp1count<?php echo $i;?>"><?php echo $i;?></p>

                        <input type="hidden" value="<?php echo $fetcImg["template1_rightid"]?>" name="tlid<?php echo $i;?>">

                        </div>
                        
                        <div class="" style="clear:both"></div>
                        <div class="contentSec2Left">
                        <?php 
                        if($fetcImg["contentchecked"] == "Image")
                        {
                          ?>
<label >Image</label>
<div style="clear:both;"></div>
<input type="hidden" name="edittemplate1choose<?php echo $i;?>" value="Image" id="edittemplate1option<?php echo $i;?>">

              <?php
                        }
                        else if($fetcImg["contentchecked"] == "Pdf")
                        {
                          ?>
            <label >Pdf</label>
            <div style="clear:both;"></div>
            <div style="clear:both;"></div>
            <input type="hidden" name="edittemplate1choose<?php echo $i;?>" value="Pdf" id="edittemplate1option<?php echo $i;?>">
                          <?php
                        }
                         else if($fetcImg["contentchecked"] == "Video")
                         {
                        ?>
                <label >Video<span>(Please provide embed youtube url)</span></label>
                <div style="clear:both;"></div>
                <input type="hidden" name="edittemplate1choose<?php echo $i;?>" value="Video" id="edittemplate1option<?php echo $i;?>">
                        <?php
                    }
                        ?>
                         
                        </div>
 <?php 
                        if($fetcImg["contentchecked"] == "Image")
                        {
                          ?>
                        <div >
              <div class="contentSec2Left">
             
                   <input type="text" id="edittemplate1_rightimage<?php echo $i; ?>" name="hiddenedittemplate1rgtimgs<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>" class="upLoadText">
         
                              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 
              <input type="hidden" name="deleteCarImg<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>">
              <input id="edittemp1_right<?php echo $i; ?>" onchange="edittemplate1rightimage(this,<?php echo $i; ?>)" name="edittemplate1addrgtimage<?php echo $i; ?>" type="file" class="upload">

              </div>
              <div class="fill-title">

              <label class="imgCaption"> caption</label>
              <div style="clear:both;"></div>
              <input type="text" name="editimagecaption<?php echo $i; ?>" value="<?php echo $fetcImg["temp1imgcaption"];?>" class="fillTitleText"> <!--<a href="#"></a>  -->

              </div>

              </div>

              <div class="contentSecRight"> 

              <p class="imageView3"><img src="<?php echo $fetcImg["template1_rightimages"];?>" style="width:82px; height:82px;" id="edittemp1_currimg<?php echo $i; ?>"><br><br>Current Image</p>
              <!--
              <p class="imageView4">filename.jpg</p>
              -->
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["template1_rightid"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>
                        </div>
                        <?php
                    }
                    else if($fetcImg["contentchecked"] == "Pdf")
                    {
          ?>


                        <div >
                            
              <div class="contentSec2Left">



              <input type="text" id="edittemplate1_pdf<?php echo $i; ?>" name="hiddenedittemplate1pdf<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>" class="upLoadText">

  
              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 
              <input type="hidden" name="deleteCarpdf<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>">
              <input id="edittemp1_right<?php echo $i; ?>" onchange="edittemplate1rightimage(this,<?php echo $i; ?>)" 
              name="edittemplate1addpdf<?php echo $i; ?>" type="file" class="upload" value="Browse">

              </div>
              <div class="fill-title"> 

              <label class="imgCaption">caption</label>
              <div style="clear:both;"></div>
              <input type="text" name="editpdfcaption<?php echo $i; ?>" id="" value="<?php echo $fetcImg["temp1imgcaption"];?>" class="fillTitleText" style="margin-bottom:10px"> <!--<a href="#"></a>  -->

              </div>

              </div>
                <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["template1_rightid"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>

                        </div>
                        <?php
                    }
                     else if($fetcImg["contentchecked"] == "Video")
                    {
                    
                    ?>

                        <div  >
                          
                          <div class="contentSec2Left fill-title" style="padding-top: 10px;"> 

              <label class="imgCaption">Video Url<span>(please provide embed youtube url)</span></label>
              <div style="clear:both;"></div>
              <input type="text" name="edittemplate1addvideo<?php echo $i; ?>"  value="<?php echo $fetcImg["template1_rightimages"];?>" class="fillTitleText"> <!--<a href="#"></a>  -->

              </div>
              <div class="contentSec2Left fill-title" style="padding-bottom: 10px;"> 

              <label class="imgCaption"> Caption</label> <br>
              <input type="text"   name="editvideocaption<?php echo $i; ?>" id="" value="<?php echo $fetcImg["temp1imgcaption"];?>" class="fillTitleText" > 
              


              </div>
 <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["template1_rightid"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>
                        </div>
<?php
}
?>

  
                      

                        </div>

                    

          
                 <?php 
                 $i++;
             }
                 ?>
 </div>
                    
             <input type="hidden" id="temp1updateid" name="hiddentemplateid" value="<?php echo $countIm;?>">

           

                     <div class="addMore">

                            <a href="javascript:void(0);" onClick="addtemplate1rightfiles();"></a>

                     </div>

                 </div>

          </div> 

        </div>

        <?php }

    if($get_template_id == 2){

      $query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

      $fetquery = mysql_fetch_array($query);

     ?>

        <!--Template2 --> 

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

                       <label>Descrption</label><textarea rows="4" class="jqte-test" name="etemp2desc"><?php echo $fetquery['description']; ?></textarea>

          </div>

                   

                </div> 

            </div> 

           
       
              <input type="hidden" id="temp2righthid" name="hiddenaddtemplate2id" value="1" /> 
            <input type="hidden" id="newtemplate2countval" name="newtemplate2countval"  />  
<!-- <div class="section2">

                <div class="contentSecTitle">

                    <h3>Right - Files</h3>

                </div>

                <div class="subSec">  

                <div id="template2rightfiles"> 
                  <?php

            $i = 1;

            $getimage = mysql_query("SELECT * FROM template2_carousal WHERE template_content_id = '$getelement'");

            $counttemplate2Im = mysql_num_rows($getimage);

            while($fetcImg = mysql_fetch_array($getimage)){
              if($i==1)
              {
                ?>
                <input type="hidden"  name="hiddencarousaltemplate2" value="<?php echo $fetcImg["template_content_id"]?>">
                <?php
              }

          ?>
             

                    <div class="subSec1" id="appendtemplate2class<?php echo $i;?>">
                    

                        <div class="ses1">                            
 
                        <p id="temp2count<?php echo $i;?>"><?php echo $i;?></p>

                        <input type="hidden" value="<?php echo $fetcImg["id"]?>" name="tl2id<?php echo $i;?>">

                        </div>
                        
                        <div class="" style="clear:both"></div>
                        <div class="contentSec2Left">
                        <?php 
                        if($fetcImg["contentchecked"] == "Image")
                        {
                          ?>
<label >Image</label>
<div style="clear:both;"></div>
<input type="hidden" name="edittemplate2choose<?php echo $i;?>" id="edittemplate2option<?php echo $i;?>" value="Image">

              <?php
                        }
                        else if($fetcImg["contentchecked"] == "Pdf")
                        {
                          ?>
            <label >Pdf</label>
            <div style="clear:both;"></div>
            <input type="hidden" name="edittemplate2choose<?php echo $i;?>" value="Pdf" id="edittemplate2option<?php echo $i;?>">
                          <?php
                        }
                         else if($fetcImg["contentchecked"] == "Video")
                         {
                        ?>
                <label >Video<span>(please provide embed youtube url)</span></label>
                <div style="clear:both;"></div>
                <input type="hidden" name="edittemplate2choose<?php echo $i;?>" value="Video" id="edittemplate2option<?php echo $i;?>">
                        <?php
                    }
                        ?>
                         
                        </div>
 <?php 
                        if($fetcImg["contentchecked"] == "Image")
                        {
                          ?>
                        <div >
              <div class="contentSec2Left">
             
        <input type="text" id="edittemplate2_rightimage<?php echo $i; ?>" name="hiddenedittemplate2rgtimgs<?php echo $i; ?>" value="<?php echo $fetcImg["template2_rightimages"];?>" class="upLoadText">
  
                              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 

              <input id="edittemp2_right<?php echo $i; ?>" onchange="edittemplate2rightimage(this,<?php echo $i; ?>)" name="edittemplate2addrgtimage<?php echo $i; ?>" type="file" class="upload">

              </div>
              <div class="fill-title">

              <label class="imgCaption"> caption</label>
              <div style="clear:both;"></div>
              <input type="text" name="edittemplate2imagecaption<?php echo $i; ?>" value="<?php echo $fetcImg["Imagecaption"];?>" class="fillTitleText"> 

              </div>

              </div>

              <div class="contentSecRight"> 

              <p class="imageView3"><img src="<?php echo $fetcImg["template2_rightimages"];?>" style="width:82px; height:82px;" 
              id="edittemp2_currimg<?php echo $i; ?>"><br><br>Current Image</p>
            
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>
                        </div>
                        <?php
                    }
                    else if($fetcImg["contentchecked"] == "Pdf")
                    {
          ?>


                        <div >
                            
              <div class="contentSec2Left">



              <input type="text" id="edittemplate2_pdf<?php echo $i; ?>" name="hiddenedittemplate2pdffiles<?php echo $i; ?>" value="<?php echo $fetcImg["template2_rightimages"];?>" class="upLoadText">

  
              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 

              <input id="edittemp2_right<?php echo $i; ?>" onchange="edittemplate2rightimage(this,<?php echo $i; ?>)"
              name="edittemplate2addpdf<?php echo $i; ?>" type="file" class="upload" value="Browse">

              </div>
              <div class="fill-title"> 

              <label class="imgCaption">caption</label>
              <div style="clear:both;"></div>
              <input type="text" name="edittemplate2pdfcaption<?php echo $i; ?>" id="" 
              value="<?php echo $fetcImg["Imagecaption"];?>" class="fillTitleText"
               style="margin-bottom:10px"> 

              </div>

              </div>
                <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>

                        </div>
                        <?php
                    }
                     else if($fetcImg["contentchecked"] == "Video")
                    {
                    
                    ?>

                        <div  >
                          
                          <div class="contentSec2Left fill-title" style="padding-top: 10px;"> 

              <label class="imgCaption">Video Url</label> <br>
              <input type="text" name="edittemplate2addvideo<?php echo $i; ?>"  
              value="<?php echo $fetcImg["template2_rightimages"];?>" class="fillTitleText"> 

              </div>
              <div class="contentSec2Left fill-title" style="padding-bottom: 10px;"> 

              <label class="imgCaption"> Caption <span>(please provide embed youtube url)</span></label>
              <div style="clear:both;"></div>
              <input type="text"   name="edittemplate2videocaption<?php echo $i; ?>" id="" class="fillTitleText" value="<?php echo $fetcImg["Imagecaption"];?>" >
  
             


              </div>
 <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>,<?php echo $i; ?>);"></a>

              </div> 

              </div>
                        </div>
<?php
}
?>

  
                      

                        </div>

                    
         
                 <?php 
                 $i++;
             }
                 ?>
 </div>
                    
   <input type="hidden" id="temp2updateid" name="hiddentemplate2id" value="<?php echo $counttemplate2Im;?>">

                 

                     <div class="addMore">

                            <a href="javascript:void(0);" onClick="addtemplate2rightfiles();"></a>

                     </div>

                 </div>

          </div>  -->


        </div> 

        <?php } 

     if($get_template_id == 3){

      $query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");
      $fetquery = mysql_fetch_array($query);
    
    ?>

        <!--Template 3 -->

        <input type="hidden" name="template3" value="template3">
<input type="hidden" name="hiddentemp3tempcontentid" value="<?php echo $fetquery['id'];?>" >
             <div class="fillContent" id="subscreen3">    

            <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div> 
   <input type="hidden" id="addtemp3count" name="hiddenaddtemplate3id" value="1" />
            <div class="fillSec"> 

                <div class="contentSecTitle">

                    <h3>Events</h3>

                </div>

                <div class="current-title"> 

               

                      <label>Current Title</label> <input type="text" value="<?php echo $fetquery['title']; ?>" name="etemp3tittle" class="fillTitleText" placeholder="Lorem Ipsum">  <!--<a href="#">Edit</a>-->  

                </div> 
                <div id="template3addmore"> 

                <?php  

$getMultiple = mysql_query("SELECT * FROM template3event WHERE tl3_id = ".$fetquery['id']."");
$i = 1;
$temp3count=mysql_num_rows($getMultiple);
while($fetchMulti = mysql_fetch_array($getMultiple)){

   
                ?>

                  <input type="hidden" name="template3id[]" value="<?php echo $fetchMulti['te_id']; ?>">
                  
      <div class="event-sec" id="edittemplate3appendClass<?php echo $i; ?>">      

                    <div class="ses1"> 

                        <p ><?php echo $i; ?></p>

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
                      <div class="deLete">

              <a href="javascript:void(0);" onClick="editremovetemplate3(<?php echo $fetchMulti['te_id']; ?>,<?php echo $i; ?>)"></a>

                              </div> 

        </div>

        <?php 

        $i++;

        } ?>
       
        <input type="hidden" id="temp3hiddenvalue" value="<?php echo  $temp3count; ?>" name="hiddentemp3value"/>
        <input type="hidden" id="nextvalcount" value=""/>
      
  </div>
    <div class="addMore" id="template2addbutton">

                            <a href="javascript:void(0);" onClick="addtemplate3morefiles()"></a>

                     </div>
                    </div>

    </div>

        <?php }

     if($get_template_id == 4){

      $query = mysql_query("SELECT * FROM ".$gettbe." WHERE template_content_id = ".$getelement."");

      $fetquery = mysql_fetch_array($query);

     ?>

        <!-- Template4-->

        <input type="hidden" name="template4" value="template4">
<input type="hidden" name="hiddentemp4tempcontentid" value="<?php echo $fetquery['id'];?>" >
        <div class="fillContent" id="subscreen4">       

         <div class="mainTitle"> 

                <h3>Fill Content - Template D</h3> 

            </div> 
<input type="hidden" id="addtemp4count" name="hiddenaddtemplate4id" value="1" />
            <div class="fillSec">  

                <div class="contentSecTitle">

                    <h3>Sub Screen</h3>

                </div>

                <div class="current-title"> 

                      <label>Current Title</label> <input type="text" name="etemplate4title" class="fillTitleText" placeholder="Lorem Ipsum" value="<?php echo $fetquery['title'] ?>">  <!--<a href="#">Edit</a>  -->

                </div>
 <div id="template4addmore"> 
                 <?php  

                $getMultipletemp4 = mysql_query("SELECT * FROM template4event WHERE tl4_id = ".$fetquery['id']."");

        $i = 1;
$temp4count=mysql_num_rows($getMultipletemp4);
                while($fetchMultitemplate4 = mysql_fetch_array($getMultipletemp4)){

                ?>

                <input type="hidden" name="template4id[]" value="<?php echo $fetchMultitemplate4['te_id']; ?>">
 
        <div class="event-sec" id="editappendtemplate4class<?php echo $i ?>">     

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
<div class="deLete">

<a href="javascript:void(0);" onClick="editremovetemplate4(<?php echo $fetchMultitemplate4['te_id']; ?>,<?php echo $i ?>)"></a>

</div> 
        </div>

                <?php

        $i++;

        }?>
        </div>
        <input type="hidden" id="temp4hiddenvalue" value="<?php echo  $temp4count; ?>" name="hiddentemp4value"/>
        <input type="hidden" id="template4nextvalcount" value=""/>
      
  </div>
    <div class="addMore" id="template2addbutton">

                            <a href="javascript:void(0);" onClick="addtemplate4morefiles()"></a>

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

                        <input type="hidden" name="gettopImage5" value="<?php echo $fetquery['bannerimage']; ?>">

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

                      <label>Description</label>  <textarea rows="4" class="jqte-test" name="etemp5desc" ><?php echo $fetquery['description']; ?></textarea>

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

                        <input type="hidden" name="gettopImage6" value="<?php echo $fetquery['bannerimage']; ?>"> 

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

                       <label>Desription</label>  <textarea rows="4" class="jqte-test" name="temp6desc"><?php echo $fetquery['description']; ?></textarea>

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
   <div id="ajaxContent"></div>

</div>

</form>

<!-- <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> -->

<script type="text/javascript">

/*top image in template1*/

    //             bkLib.onDomLoaded(function() { 

        // nicEditors.allTextAreas()

        //  });        

//template 1 Top images

  //Right files dyanamic function

  function addtemplate1rightfiles (){

    var id = $('#temp1righthid').val();
//alert(id);
    var next = parseInt(id)+1;

    $('#temp1righthid').val(next);

    $('#template1rightfiles').append('<div class="subSec1" id="newappendtemplate1class'+id+'"><div class="ses1"><input type="hidden" id="temp1righthid" value="1" /><p id="temp1count'+id+'">'+id+'</p></div><h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Select your option:</h2><div class="" style="clear:both"></div><div class="contentSec2Left"><input type="radio" checked="checked" name="Imagecontent'+id+'" onclick="rightfilefunction('+id+',1);" value="Image"> <span class="rstyle">Image</span><input type="radio" name="Imagecontent'+id+'" onclick="rightfilefunction('+id+',2);" value="Pdf"> <span class="rstyle">PDF</span><input type="radio" name="Imagecontent'+id+'" onclick="rightfilefunction('+id+',3);" value="Video"> <span class="rstyle">Video</span></div><div id="imageidcontent'+id+'"><div class="contentSec2Left"><input type="text" id="template1_rightimage'+id+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp1_right'+id+'" onchange="template1rightimage(this,'+id+')" name="template1addrgtimage'+id+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">caption</label> <div style="clear:both;"></div><input type="text" name="imagecaption'+id+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div></div><div class="contentSecRight"><p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp1_currimg'+id+'"><br><br>Current Image</p><!--<p class="imageView4">filename.jpg</p>--><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+id+');"></a></div></div></div><div id="pdfidcontent'+id+'" style="display:none;"><div class="contentSec2Left"><input type="text" id="template1_pdf'+id+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp1_right'+id+'" onchange="template1rightimage(this,'+id+')" name="template1addpdf'+id+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">caption</label> <div style="clear:both;"></div><input type="text" name="pdfcaption'+id+'" id="" value="" class="fillTitleText" style="margin-bottom:10px"> <!--<a href="#"></a>  --></div></div><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+id+');"></a></div></div><div id="videoidcontent'+id+'" style="display:none;"><div class="contentSec2Left fill-title" style="padding-top: 10px;"><label class="imgCaption">Video Url<span>(please provide embed youtube url)</span></label> <br><input type="text" name="template1addvideo'+id+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="contentSec2Left fill-title" style="padding-bottom: 10px;"><label class="imgCaption">caption</label> <div style="clear:both;"></div><input type="text" name="videocaption'+id+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="deLete"><a href="javascript:void(0);"  onClick="removetemplate1rightfiles('+id+');"></a></div></div></div>');            


        //$('#temp1righthid').val(next);
        $('#temp1count').val(id);
        $('#newcountval').val(id); 

  }
  function removetemplate1rightfiles(id)

  {
      var cid = $('#temp1righthid').val();     
    var langCount=$('#temp1righthid').val();
        $('#temp1righthid').val(parseInt(langCount)-1);
        $('#template1_rightimage'+id).val('');
        $('#template1addvideo'+id).val('');
        $('#temp1_right'+id).val('');
        $('#template1_pdf'+id).val('');
        $('#imagecaption'+id).val('');
        $('#pdfcaption'+id).val('');
        $('#videocaption'+id).val('');
      $('#temp1_currimg'+id).attr('src','images/uploadImg.jpg');
      $('#newappendtemplate1class'+id).remove();
    

  }
  function addtemplate2rightfiles (){

    var id = $('#temp2righthid').val();
//alert(id);
    var next = parseInt(id)+1;

    $('#temp2righthid').val(next);

$('#template2rightfiles').append('<div class="subSec1" id="newappendtemplate2class'+id+'"><div class="ses1"><input type="hidden" id="temp2righthid" value="1" /><p id="temp2count'+id+'">'+id+'</p></div><h2 class="contentSec2Left" style="margin-top: 10px;font-weight: 500;margin-bottom: 10px;">Select your option:</h2><div class="" style="clear:both"></div><div class="contentSec2Left"><input type="radio" checked="checked" name="Imagecontenttwotemp'+id+'" onclick="rightfilefunctiontwo('+id+',1);" value="Image"> <span class="rstyle">Image</span><input type="radio" name="Imagecontenttwotemp'+id+'" onclick="rightfilefunctiontwo('+id+',2);" value="Pdf"> <span class="rstyle">PDF</span><input type="radio" name="Imagecontenttwotemp'+id+'" onclick="rightfilefunctiontwo('+id+',3);" value="Video"> <span class="rstyle">Video</span></div><div id="imageidcontenttwo'+id+'"><div class="contentSec2Left"><input type="text" id="template2_rightimage'+id+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp2_right'+id+'" onchange="template2rightimage(this,'+id+')" name="template2addrgtimage'+id+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">Image caption</label><div style="clear:both;"></div> <input type="text" name="template2imagecaption'+id+'" id="" value="" class="fillTitleText"></div></div><div class="contentSecRight"><p class="imageView3"><img src="images/uploadImg.jpg" style="width:82px; height:82px;" id="temp2_currimg'+id+'"><br><br>Current Image</p><div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+id+')"></a></div></div></div><div id="pdfidcontenttwo'+id+'" style="display:none;"><div class="contentSec2Left"><input type="text" id="template2_pdf'+id+'" value="" class="upLoadText"><div class="fileUpload btn btn-primary"><span class="uploadImage"></span><input id="temp2_right'+id+'" onchange="template2rightimage(this,'+id+')" name="template2addpdf'+id+'" type="file" class="upload" value="Browse"></div><div class="fill-title"><label class="imgCaption">Pdf caption</label><div style="clear:both;"></div> <input type="text" name="template2pdfcaption'+id+'" id="" value="" class="fillTitleText"></div></div><div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+id+')"></a></div></div><div id="videoidcontenttwo'+id+'" style="display:none;"><div class="contentSec2Left fill-title" style="padding-top: 10px;"><label class="imgCaption">Video Url <span>(please provide embed youtube url)</span></label> <br><input type="text" name="template2addvideo'+id+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="contentSec2Left fill-title" style="padding-bottom: 10px;"><label class="imgCaption">Video Caption</label> <div style="clear:both;"></div><input type="text" name="template2videocaption'+id+'" id="" value="" class="fillTitleText"> <!--<a href="#"></a>  --></div><div class="deLete"><a href="javascript:void(0);" onclick="removetemplate2rightfiles('+id+')"></a></div></div></div>');             


        //$('#temp1righthid').val(next);
        $('#temp2count').val(id);
        $('#newtemplate2countval').val(id); 

  }
  function removetemplate2rightfiles(id)

  {

        var cid = $('#temp2righthid').val();       
        var langCount=$('#temp2righthid').val();
        $('#temp2righthid').val(parseInt(langCount)-1);
        $('#template2_rightimage'+id).val('');
        $('#template2addvideo'+id).val('');
        $('#temp2_right'+id).val('');
        $('#template2_pdf'+id).val('');
        $('#template2imagecaption'+id).val('');
        $('#template2pdfcaption'+id).val('');
        $('#template2videocaption'+id).val('');
        $('#temp2_currimg'+id).attr('src','images/uploadImg.jpg');
         $('#newappendtemplate2class'+id).remove();
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



  function showsubscreen(id,ai){

    var cont = id;
    

    var dataString = 'cont='+ cont;
 
    $.ajax({
            type: "POST",
            url: "getsubscreen.php",
            data: dataString,
            cache: false,
            success: function (mresp) {
              
              

              if(ai === 2 ){
                $('#subclass'+ai).addClass("activesub");
                $('#subclass1').removeClass("activesub");
                $('#subclass3').removeClass("activesub");
                $('#subclass4').removeClass("activesub");
                $('#subclass5').removeClass("activesub");
                $('#subclass6').removeClass("activesub");
                $('#content1').remove();
                $('#ajaxContent').html(mresp);

              }
              else if(ai === 3){
                $('#subclass'+ai).addClass("activesub");
                $('#subclass1').removeClass("activesub");
                $('#subclass2').removeClass("activesub");
                $('#subclass4').removeClass("activesub");
                $('#subclass5').removeClass("activesub");
                $('#subclass6').removeClass("activesub");
                $('#content1').remove();
                $('#ajaxContent').html(mresp);
              }
              else if(ai === 4){
                $('#subclass'+ai).addClass("activesub");
                $('#subclass1').removeClass("activesub");
                $('#subclass2').removeClass("activesub");
                $('#subclass3').removeClass("activesub");
                $('#subclass5').removeClass("activesub");
                $('#subclass6').removeClass("activesub");
                $('#content1').remove();
                $('#ajaxContent').html(mresp);
              }
              else if(ai === 5){
                $('#subclass'+ai).addClass("activesub");
                $('#subclass1').removeClass("activesub");
                $('#subclass2').removeClass("activesub");
                $('#subclass3').removeClass("activesub");
                $('#subclass4').removeClass("activesub");
                $('#subclass6').removeClass("activesub");
                $('#content1').remove();
                $('#ajaxContent').html(mresp);
              }
              else if(ai === 6){
                $('#subclass'+ai).addClass("activesub");
                $('#subclass1').removeClass("activesub");
                $('#subclass2').removeClass("activesub");
                $('#subclass3').removeClass("activesub");
                $('#subclass4').removeClass("activesub");
                $('#subclass5').removeClass("activesub");
                $('#content1').remove();
                $('#ajaxContent').html(mresp);
              }
         
            }
        });

  }


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
   
function editremovetemplate1rightfiles(id,appendid)
  {
    $.ajax({
        url: "deletesubscreen.php",
        type: "post",
        data: {template1rghtimg:id},
        success: function(data){
          //alert(data);
      if(data==1)
      {
        $('#appendtemplate1class'+appendid).remove();
      }
        },
        error:function(data){
      
        }
    });
  
  }
  
  
  
  
  function editremovetemplate2rightfiles(id,appendid)
  {
    $.ajax({
        url: "deletesubscreen.php",
        type: "post",
        data: {imageid:id},
        success: function(data){
      if(data==1)
      {
        $('#appendtemplate2class'+appendid).remove();
      }
        },
        error:function(data){

           
        }
    });
  
  }

   function editremovetemplate3(id,appendid)
  {
    
    $.ajax({
        url: "deletesubscreen.php",
        type: "post",
        data: {template3id:id},
        success: function(data){
      if(data==1)
      {
        $('#edittemplate3appendClass'+appendid).remove();
      }
        },
        error:function(data){
  
           
        }
    });
  
  }

   function aeditremovetemplate3(id)
  {
   
        $('#template3appendClass'+id).remove();
    
  }

     function editremovetemplate4(id,appendid)
  {
    
    $.ajax({
        url: "deletesubscreen.php",
        type: "post",
        data: {template4id:id},
        success: function(data){
      if(data==1)
      {
        $('#editappendtemplate4class'+appendid).remove();
      }
        },
        error:function(data){
  
           
        }
    });
  
  }
   

/*Right files in template1*/

  function template1rightimage(input,id) {
    // alert("welcome add");
    // alert(input.value);
    // alert(id);

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

   /*Right files in template1 add another*/

   function edittemplate1rightimage(input,id) {
    // alert("welcome add");
    // alert(input.value);
    // alert(id);

    var selectedvalue = $('#edittemplate1option'+id).val();

    if(selectedvalue == "Image")
    { 
$('#edittemplate1_rightimage'+id).val(input.value);
    }
    else if(selectedvalue == "Pdf")
    {
      $('#edittemplate1_pdf'+id).val(input.value);
    }

     if (input.files && input.files[0]) {

       var reader = new FileReader();

       reader.onload = function(e) {

         $('#edittemp1_currimg'+id).attr('src', e.target.result);

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

    
     var selectedvalue = $('input:radio[name=Imagecontenttwotemp'+id+']:checked').val();

    if(selectedvalue == "Image")
    { 
$('#template2_rightimage'+id).val(input.value);
    }
    else if(selectedvalue == "Pdf")
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



function edittemplate2rightimage(input,id) {

     var selectedvalue = $('#edittemplate2option'+id).val();

    if(selectedvalue == "Image")
    { 
$('#edittemplate2_rightimage'+id).val(input.value);
    }
    else if(selectedvalue == "Pdf")
    {
      $('#edittemplate2_pdf'+id).val(input.value);
    }

     if (input.files && input.files[0]) {

       var reader = new FileReader();

       reader.onload = function(e) {

         $('#edittemp2_currimg'+id).attr('src', e.target.result);

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
/*addmore template3 events*/
 function addtemplate3morefiles (){
  
  var preval = $('#temp3hiddenvalue').val();

  var nextval = $('#nextvalcount').val();

  var cont;

  if(nextval == '')
  {
    cont = parseInt(preval) + 1;
  }
  else
  {
    cont = parseInt(nextval) + 1;
  }

  $('#nextvalcount').val(cont);

    var id = $('#addtemp3count').val();

    var next = parseInt(id)+1;

    $('#template3addmore').append('<div class="event-sec" id="newtemplate3appendClass'+id+'"><div class="ses1"><input type="hidden" id="temp3hiddenvalue" value="1" name="hiddentemp3value"/><p id="temp3count'+cont+'">'+cont+'</p></div><div class="event-content"> <div class="event-title"><label>Event Name</label> <input type="text" name="aeeventname[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div><div class="event-title"><label>Description</label> <textarea rows="4"  name="aetemplate3description[]" ></textarea></div><div class="event-title"><label>Time</label> <input type="time" name="aetime[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Date</label> <input type="date" name="aedate[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Place</label> <input type="text" name="aetemp3place[]" id="" value="" class="subtitle-text" placeholder="Place Name"></div><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate3files('+id+')"></a></div></div></div>'); 

    $('#addtemp3count').val(next);
   

  }
    function removetemplate3files(id)

  {
   $('#newtemplate3appendClass'+id).remove();

  }
  /*addmore template4 events*/
 function addtemplate4morefiles (){
  
  var preval = $('#temp4hiddenvalue').val();

  var nextval = $('#template4nextvalcount').val();

  var cont;

  if(nextval == '')
  {
    cont = parseInt(preval) + 1;
  }
  else
  {
    cont = parseInt(nextval) + 1;
  }

  $('#template4nextvalcount').val(cont);

    var id = $('#addtemp4count').val();

    var next = parseInt(id)+1;

$('#template4addmore').append('<div class="event-sec" id="newtemplate4appendClass'+id+'"><div class="ses1"><input type="hidden" id="temp4hiddenvalue" value="1" name="hiddentemp4value"/><p id="temp4count'+cont+'">'+cont+'</p></div><div class="event-content" ><div class="event-title"><label>Header Name</label> <input type="text" name="aeheadername[]" id="" value="" class="subtitle-text" placeholder="Account Executive"></div><div class="event-title"><label>Description</label> <textarea rows="4" name="aetemp4description[]"></textarea></div><div class="event-title"><label>Division</label> <input type="text" name="aeDivision[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Type</label> <input type="text" name="aeType[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Available</label> <input type="text" name="aeAvailable[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="event-title"><label>Place</label> <input type="text" name="aePlace[]" id="" value="" class="subtitle-text" placeholder=""></div><div class="deLete"><a href="javascript:void(0);" onClick="removetemplate4files('+id+')"></a></div></div></div>'); 
    $('#addtemp4count').val(next);
   

  }
  function removetemplate4files(id)

  {
     $('#newtemplate4appendClass'+id).remove();
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