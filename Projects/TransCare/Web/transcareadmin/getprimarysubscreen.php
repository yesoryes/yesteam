<?php 
include('connect.php');

    if(isset($_POST['cont'])){

        $sid = $_POST['cont'];
        //echo "SELECT * FROM template_content WHERE id = '$id'";
        $query1 = mysql_query("SELECT * FROM `primary_template_content` WHERE id = '$sid'");
        

        $fetquery = mysql_fetch_array($query1);

        //print_r($fetquery);

        //echo "hello".$fetquery['template_id'];

        ?>
        <div class="subScreenContent">
        <div class="linkName">

            <p>Link Name</p>

            <p class="linkLimit">

            <input type="hidden" name="updatelinkname" value="<?php echo $sid; ?>">

            <input type="text" name="elinkname"  class="linkText" value="<?php echo $fetquery['linkname']; ?>"> 

            <span>Note: Limit 20 Characters</span></p>

        </div>

           <?php 

           

           if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 1){ 

           

            $query = mysql_query("SELECT * FROM ".$fetquery['tablename']." WHERE template_content_id = ".$fetquery['id']."");
 
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

                    <input type="hidden" name="template1id" value="<?php echo $fetquery['id']; ?>">

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

                  $getimage = mysql_query("SELECT * FROM primary_template1_carousal WHERE template_content_id = '$sid'");

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

                        <input type="hidden" value="<?php echo $fetcImg["id"]?>" name="tlid<?php echo $i;?>">

                        </div>
                        
                        <div class="" style="clear:both"></div>
                        <div class="contentSec2Left">
                        <?php 
                        if($fetcImg["contentchecked"] == "Image")
                        {
                          ?>
<label >Image</label>
<input type="hidden" name="edittemplate1choose<?php echo $i;?>" value="Image" id="edittemplate1option<?php echo $i;?>">

              <?php
                        }
                        else if($fetcImg["contentchecked"] == "Pdf")
                        {
                          ?>
            <label >Pdf</label>
            <input type="hidden" name="edittemplate1choose<?php echo $i;?>" value="Pdf" id="edittemplate1option<?php echo $i;?>">
                          <?php
                        }
                         else if($fetcImg["contentchecked"] == "Video")
                         {
                        ?>
                <label >Video</label>
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
        <input type="hidden" name="edittemplate1images<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>" class="upLoadText">
                              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 

              <input id="edittemp1_right<?php echo $i; ?>" onchange="edittemplate1rightimage(this,<?php echo $i; ?>)" name="edittemplate1addrgtimage<?php echo $i; ?>" type="file" class="upload">

              </div>
              <div class="fill-title">

              <label class="imgCaption"> caption</label> <br>
              <input type="text" name="editimagecaption<?php echo $i; ?>" value="<?php echo $fetcImg["temp1imgcaption"];?>" class="fillTitleText"> <!--<a href="#"></a>  -->

              </div>

              </div>

              <div class="contentSecRight"> 

              <p class="imageView3"><img src="<?php echo $fetcImg["template1_rightimages"];?>" style="width:82px; height:82px;" id="edittemp1_currimg<?php echo $i; ?>"><br><br>Current Image</p>
              <!--
              <p class="imageView4">filename.jpg</p>
              -->
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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



              <input type="text" id="edittemplate1_pdf<?php echo $i; ?>" name="hiddenedittemplate1pdffiles<?php echo $i; ?>" value="<?php echo $fetcImg["template1_rightimages"];?>" class="upLoadText">

  
              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 

              <input id="edittemp1_right<?php echo $i; ?>" onchange="edittemplate1rightimage(this,<?php echo $i; ?>)" 
              name="edittemplate1addpdf<?php echo $i; ?>" type="file" class="upload" value="Browse">

              </div>
              <div class="fill-title"> 

              <label class="imgCaption">caption</label> <br>
              <input type="text" name="editpdfcaption<?php echo $i; ?>" id="" value="<?php echo $fetcImg["temp1imgcaption"];?>" class="fillTitleText" style="margin-bottom:10px"> <!--<a href="#"></a>  -->

              </div>

              </div>
                <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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
              <input type="text" name="edittemplate1addvideo<?php echo $i; ?>"  value="<?php echo $fetcImg["template1_rightimages"];?>" class="fillTitleText"> <!--<a href="#"></a>  -->

              </div>
              <div class="contentSec2Left fill-title" style="padding-bottom: 10px;"> 

              <label class="imgCaption"> Caption</label> <br>
              <input type="text" class="fillTitleText"   name="editvideocaption<?php echo $i; ?>" value="<?php echo $fetcImg["temp1imgcaption"];?>" > 
           

              </div>
 <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate1rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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

        <?php 
    }

        if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 2){

            $query = mysql_query("SELECT * FROM ".$fetquery['tablename']." WHERE template_content_id = ".$fetquery['id']."");
 
            $fetquery = mysql_fetch_array($query);

         ?>

        <!--Template2 --> 

        <input type="hidden" name="template2" value="template2">

        

         <div class="fillContent" id="subscreen2">         

           <div class="mainTitle">

                <h3>Fill Content - Template D</h3> 

            </div>

            <input type="hidden" name="template1id" value="<?php echo $fetquery['id']; ?>">

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

            $getimage = mysql_query("SELECT * FROM primary_template2_carousal WHERE template_content_id = '$sid'");

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
<input type="hidden" name="edittemplate2choose<?php echo $i;?>" id="edittemplate2option<?php echo $i;?>" value="Image">

              <?php
                        }
                        else if($fetcImg["contentchecked"] == "Pdf")
                        {
                          ?>
            <label >Pdf</label>
            <input type="hidden" name="edittemplate2choose<?php echo $i;?>" value="Pdf" id="edittemplate2option<?php echo $i;?>">
                          <?php
                        }
                         else if($fetcImg["contentchecked"] == "Video")
                         {
                        ?>
                <label >Video</label>
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
             
        <input type="text" id="edittemplate2_rightimage<?php echo $i; ?>" name="hiddenedittemplate2rgtimages<?php echo $i; ?>" value="<?php echo $fetcImg["template2_rightimages"];?>" class="upLoadText">
  
                              <div class="fileUpload btn btn-primary">

              <span class="uploadImage"></span> 

              <input id="edittemp2_right<?php echo $i; ?>" onchange="edittemplate2rightimage(this,<?php echo $i; ?>)" name="edittemplate2addrgtimage<?php echo $i; ?>" type="file" class="upload">

              </div>
              <div class="fill-title">

              <label class="imgCaption"> caption</label> <br>
              <input type="text" name="edittemplate2imagecaption<?php echo $i; ?>" value="<?php echo $fetcImg["Imagecaption"];?>" class="fillTitleText"> <!--<a href="#"></a>  

              </div>

              </div>

              <div class="contentSecRight"> 

              <p class="imageView3"><img src="<?php echo $fetcImg["template2_rightimages"];?>" style="width:82px; height:82px;" 
              id="edittemp2_currimg<?php echo $i; ?>"><br><br>Current Image</p>
            
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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

              <label class="imgCaption">caption</label> <br>
              <input type="text" name="edittemplate2pdfcaption<?php echo $i; ?>" id="" 
              value="<?php echo $fetcImg["Imagecaption"];?>" class="fillTitleText"
               style="margin-bottom:10px"> 
              </div>

              </div>
                <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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

              <label class="imgCaption"> Caption</label> <br>
              <input type="text" class="fillTitleText"   name="edittemplate2videocaption<?php echo $i; ?>" id="" value="  <?php echo $fetcImg["Imagecaption"];?>" >
       
              


              </div>
 <div class="contentSecRight"> 

              
          <div class="deLete">

              <a href="javascript:void(0);"  onClick="editremovetemplate2rightfiles(<?php echo $fetcImg["id"]; ?>);"></a>

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

        <?php 
    } 

         if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 3){

            $query = mysql_query("SELECT * FROM primary_template3 WHERE template_content_id = ".$fetquery['id']."");
 
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

$getMultiple = mysql_query("SELECT * FROM primary_template3_event WHERE tl3_id = ".$fetquery['id']."");
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

         if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 4){

            $query = mysql_query("SELECT * FROM primary_template4 WHERE template_content_id = ".$fetquery['id']."");
 
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

$getMultipletemp4 = mysql_query("SELECT * FROM primary_template4_event WHERE tl4_id = ".$fetquery['id']."");

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

                if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 5){

                    $query = mysql_query("SELECT * FROM ".$fetquery['tablename']." 
                      WHERE template_content_id =".$fetquery['id']." ");
 
                    $fetquery = mysql_fetch_array($query);

                 ?>

                 <!-- Template5-->

                 <input type="hidden" name="template5" value="template5">

        <div class="fillContent" id="subscreen5">    

        <div class="mainTitle"> 

                <h3>Fill Content - Template E</h3> 

            </div>

            <input type="hidden" name="template5id" value="<?php echo $fetquery['id']; ?>">

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


        <?php 
    }

        if(!empty($fetquery["template_id"]) && $fetquery["template_id"] == 6){
            //echo "SELECT * FROM ".$fetquery['table_name']." WHERE template_content_id = ".$fetquery['id']."";
            $query = mysql_query("SELECT * FROM ".$fetquery['tablename']." WHERE template_content_id = ".$fetquery['id']."");
 
            $fetquery = mysql_fetch_array($query);

         ?>

        <!-- Template6-->

        <input type="hidden" name="template6" value="template6">
 <div class="fillContent" id="subscreen6">    

        <div class="mainTitle">

                <h3>Fill Content - Template F</h3> 

            </div>

            <input type="hidden" name="template6id" value="<?php echo $fetquery['id']; ?>">

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
        <?php 
    }
?>