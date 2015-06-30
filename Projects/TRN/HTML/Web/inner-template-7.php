<?php 

  include("header.php");

  

  $gettn = $_GET['dbname'];

  $gettid = $_GET['tcid'];

  if(isset($_GET['cur'])){
    $cur = $_GET['cur'];
  }

  $getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
$fetLogo = mysql_fetch_array($getLogo);
 

?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">





<?php 

$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$fetquerytab = mysql_fetch_array($getdataquery);

 ?>
<div id="elementp1"></div>
<div id="wrapper1">
  <div class="container">
  
    <header class="inner_head">
      <div class="btn_back"><a href="javascript:history.go(-1);">Back</a></div>
      <p><?php echo $fetquerytab['title']; ?></p>
      <div class="logo1"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>" height="56"  alt="Transcare"/></div>
    </header>
    
    <div class="ip_container">
      <div class="inner_content" style="margin:50px 0 0;">
        <h1><?php echo $fetquerytab['title']; ?></h1>
        
          <div class="ip_content1">

            <p class="ip_img"><img src="transcareadmin/<?php echo $fetquerytab['image']; ?>" width="446" height="407"  alt=""/></p>
            <div id="scr-wrapper1">
            <div class="ip_content2 content2 scroller"> 
              <p class="ip_para_margin"><?php echo $fetquerytab['description']; ?></p>
             
            </div>
          </div>
        </div>
      </div>
    </div>
      
      
       <div class="vertical_caurosel">
       <div id="scr-wrapper" class="scr-wrapper">
        <ul id="scr-vertical" class="" style=" width: 400px;  height: 768px; position:absolute; overflow: hidden; z-index:1;">
          <?php
                $i=1; 

         echo "SELECT * FROM template7_carousal WHERE template_content_id = '$gettid'";

          $getCar = mysql_query("SELECT * FROM template7_carousal WHERE template_content_id = '$gettid'");

          while($fetchCar = mysql_fetch_array($getCar)){

          ?>
       
        <li class="" data-fun="<?php echo $fetchCar['id']; ?>" style="cursor:pointer">
          <div class="ip2_caurosel">
        <a href="#"  data-reveal-id="myModal<?=$i?>">
        <?php 
              if($fetchCar['contentchecked'] == "Pdf")
              {
            ?>
            <p class="img_caurosel"><img src="img/img_-caurosel1.jpg"></p>
            <?php
              }
              else if($fetchCar['contentchecked'] == "Image")
              {

            ?>
            <p class="img_caurosel"><img src="transcareadmin/<?php echo $fetchCar['template7_rightimages'];?>"/></p>
            <?php
              }
              else if($fetchCar['contentchecked'] == "Video")
              {

            ?>
            <p class="img_caurosel"> <img src="img/videoIcon.jpg"  width="117" alt=""/></p>
             <?php
            }
            ?>
        
        <p><?php echo $fetchCar['Imagecaption'];?></p></a></div></li>
        <?php
          $i++;
        }
        ?>
        </ul>
       </div>
    </div>
        
   <?php
    $j=1;
    //echo "SELECT * FROM template7_carousal WHERE template_content_id = '$gettid'";
     $getcaptioncontent = mysql_query("SELECT * FROM template7_carousal WHERE template_content_id = '$gettid'");
     
  while($fetchcaptioncontent = mysql_fetch_array($getcaptioncontent)){

  ?>
    
    <div id="myModal<?=$j?>" class="reveal-modal">
    <?php 

    if($fetchcaptioncontent['contentchecked'] == "Pdf") 
    {
?>
      <div class="popup_container">
        <h1><?php echo $fetchcaptioncontent['Imagecaption']; ?></h1>
        <div id="scr-wrapper8">
        <div class="popup_text scroller">
          
          <iframe name="myiframe" width="700" height="1000"  alt="" id="myiframe" src="transcareadmin/<?php echo $fetchcaptioncontent['template7_rightimages'];?>"> 
          </iframe>
        </div>
        </div>
      </div>
      <a class="close-reveal-modal"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a>
      <?php
    }
    else if( $fetchcaptioncontent['contentchecked'] == "Image")
    {
      ?>
           <div class="popup_container">
        <h1><?php echo $fetchcaptioncontent['Imagecaption']; ?></h1>
        <div class="contentHolder"  id="boxscroll1">
          <p><img src="transcareadmin/<?php echo $fetchcaptioncontent['template7_rightimages'];?>" width="640" height="500"  alt=""/></p>
          <p></p>
        </div>
      </div>
      <a class="close-reveal-modal"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a>
      <?php
    }
    else if( $fetchcaptioncontent['contentchecked'] == "Video")
    {
      ?>
<div class="popup_container video_popup">
        <h1><?php echo $fetchcaptioncontent['Imagecaption']; ?></h1>
        <div class="">
          <iframe width="560" id="playerid<?=$j?>" height="315" src="<?php echo $fetchcaptioncontent['template7_rightimages'] ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <a class="close-reveal-modal" href="javascript:void(0);" onclick="remover(<?=$j?>);"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> 
      <?php
    }
    ?>
       </div>
   
    <?php
    $j++;
  }
  ?> 
</div>
</div>
   <?php

    $getsubscreen = mysql_query("SELECT * FROM  template_content  WHERE parentid = '$gettid'");

    $getlinkname=mysql_query("SELECT * FROM  template_content  WHERE parentid = 0");

  $fetchlinkname=mysql_fetch_array($getlinkname);

    ?>



<footer class="foo_ip">
      <div class="container">
        <div class="footer_menu">


        <?php
        

            $sel = mysql_query("SELECT * FROM template_content WHERE id =  '$cur' ");
            $row = mysql_fetch_array($sel);
            $getparenidcount = mysql_query("SELECT * FROM template_content WHERE parentid = '$cur'");
         $getsubscreencount= mysql_num_rows($getparenidcount);

            ?>

        <?php 
        if ($cur != '' && $getsubscreencount > 0 )
        {
        ?>    

            <div <?php if($row['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="inner-template-<?=$row['template_id']?>.php?dbname=<?php echo $row['table_name']; ?>&tcid=<?php echo $row['id']; ?>&cur=<?php echo $row['id']; ?>" class="foo_btn"><?php echo $row['linkname']; ?></a>
            </div>
            <div class="btn_right"></div>
            </div> 

        <?php
        }
        //echo "SELECT * FROM template_content WHERE parentid = '$cur'";
        
        $sel1 = mysql_query("SELECT * FROM template_content WHERE parentid = '$cur'");
            while ($row1 = mysql_fetch_array($sel1)) {

            ?>  

            <div <?php if($row1['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="inner-template-<?=$row1['template_id']?>.php?dbname=<?php echo $row1['table_name']; ?>&tcid=<?php echo $row1['id']; ?>&cur=<?php echo $cur; ?>" class="foo_btn"><?php echo $row1['linkname']; ?></a> 
            </div>
            <div class="btn_right"></div>
            </div> 
            <?php
               
            }

            ?>




          <!-- <p><a href="#" class="foo_btn active"><?php echo $fetgetrel['linkname']; ?></a></p> -->
          
        </div>
      </div>
    </footer>
</div>


 
<script src="js/jquery.reveal.js"></script>
<script src="js/iscroll.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/carousel.js"></script> 
<script>

$("#demo").carousel3d({
  mode:'3d',
  items:'div',
  autoPlay:false,
  autoPlayInterval:3000,
  //spacing:20,
  navigation:false,
  orientation:'V',
  //sensivity: 150,
  perspective:3000,
  //step: 2,
  responsive: false,
});

  function close_box() {
    $('.backdrop').animate({'opacity':'0'}, 300, 'linear');
    $('.backdrop, .popbox').css('display','none')
    var video = $("#playerid").attr("src");
    $("#playerid").attr("src","");
    $("#playerid").attr("src",video);
  }  
  /*$('.box a').on('tab', function() {
    $('.backdrop').animate({'opacity':'0.5'}, 300, 'linear');
    $('.backdrop, .popbox').css('display','block');
    alert();
  }) ; 
  $('.close').on('tab',function() {
    close_box()
  }) ;  
  $('.backdrop').on('tab',function() {
    close_box()
  });*/
  
  /*$('.box').click(function() {
    
    
  }) ; */
  
  
  $('.box').bind('tap', function(e) { 
  //alert("Clicked");
  var id = $(this).attr('data-fun');
    popupFunctionCall(id);
  
   });  


 
 

 function popupFunctionCall(pid){
  //alert("called");
  $.ajax({
     url:  'getPopUpDetail.php',
     type: 'POST',
     data: {pid: pid},
     success: function(html){
     //alert(html);
       $('#myModal').empty().html(html);
     $('.backdrop').animate({'opacity':'0.5'}, 300, 'linear');
    $('.backdrop, .popbox').css('display','block')
     },
     error: function(){
       alert("error");
     }  
  });
}
 
$(function() {
    $("#elementp1").introLoader();
});

 $(".btn_back").bind('tap', function(){
    window.parent.$('body').trigger('transMain');
  });

$(document).ready(function () {

  loaded(); //iscroll
  
  /* iframe call */
 
  var myScroll;
  var myScroll1;
  function loaded () {
    myScroll = new IScroll('#scr-vertical', {
      scrollX: false,
      scrollY: true,
      momentum: false,
      snap: true,
      snapSpeed: 400,
      keyBindings: true,
      mouseWheel: true,
      scrollbars: true,
      click: true,
    });
  
    myScroll = new IScroll('#scr-wrapper1', {
      scrollX: false,
      scrollY: true,
      momentum: false,
      snap: true,
      snapSpeed: 400,
      keyBindings: true,
      mouseWheel: true,
      scrollbars: true,
      click: true,
    });

    myScroll = new IScroll('#scr-wrapper8', {
      scrollX: false,
      scrollY: true,
      momentum: false,
      snap: true,
      snapSpeed: 400,
      keyBindings: true,
      mouseWheel: true,
      scrollbars: true,
      click: true,
    });
  }
  
   
  document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

});

</script>

<?php 

include("footer.php");

?>