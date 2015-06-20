
<?php
  include("connect.php");
    
    

    if(isset($_POST['cid'])){
      $getid = $_POST['cid'];
      $getcaptioncontent = mysql_query("SELECT * FROM `template1_carousel` WHERE template1_rightid = '$getid'");
    }else
    {
      $getpid = $_POST['pid'];
      $getcaptioncontent = mysql_query("SELECT * FROM `primary_template1_carousal` WHERE id = '$getpid'");
    }

    //echo "SELECT * FROM template1_carousel WHERE template1_rightid = '$getid'";
   
     //$getcaptioncontent = mysql_query("SELECT * FROM `template1_carousel` WHERE template1_rightid = '$getid'");

     
     
     $count = mysql_num_rows($getcaptioncontent);
     if($count > 0){
  $fetchcaptioncontent = mysql_fetch_array($getcaptioncontent);
  ?>
    <!--PopUP Content-->
    <?php 

    if($fetchcaptioncontent['contentchecked'] == "Pdf") 
    {
?>
      <div class="popup_container">
        <h1><?php echo $fetchcaptioncontent['temp1imgcaption']; ?></h1>
        <div id="scr-wrapper8">
        <div class="popup_text scroller">
          
          <iframe name="myiframe" width="700" height="1000"  alt="" id="myiframe" src="transcareadmin/<?php echo $fetchcaptioncontent['template1_rightimages'];?>"> 
          </iframe>
        </div>
        </div>
      </div>
      <a class="close-reveal-modal close" onclick="close_box();"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a>
      <?php
    }
    else if( $fetchcaptioncontent['contentchecked'] == "Image")
    {
      ?>
           <div class="popup_container">
        <h1><?php echo $fetchcaptioncontent['temp1imgcaption']; ?></h1>
        <div class="contentHolder"  id="boxscroll1">
          <p><img src="transcareadmin/<?php echo $fetchcaptioncontent['template1_rightimages'];?>"  alt=""/></p>
          
        </div>
      </div>
      <a class="close-reveal-modal close" onclick="close_box();"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a>
      <?php
    }
    else if( $fetchcaptioncontent['contentchecked'] == "Video")
    {
      ?>
<div class="popup_container video_popup">
        <h1><?php echo $fetchcaptioncontent['temp1imgcaption']; ?></h1>
        <div class="">
          <iframe width="560" id="playerid" height="315" src="<?php echo $fetchcaptioncontent['template1_rightimages'] ?>" autoplay=0 frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <a class="close-reveal-modal close" onclick="close_box();"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> 
      <?php
    }
  }
    ?>
   
    