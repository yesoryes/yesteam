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

<link href="css/main.css" rel="stylesheet" type="text/css">

<link rel="Stylesheet" type="text/css" href="css/carousel.css">

<link href="css/introLoader.css" type="text/css" rel="stylesheet">



<?php 


$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$fetquerytab = mysql_fetch_array($getdataquery);


 ?>
<div id="elementp2"></div>
<div id="wrapper1">
  <div class="container">
  
    <header class="inner_head">
      <div class="btn_back"><a href="javascript:history.go(-1);">Back</a></div>
      <p><?php echo $fetquerytab['title']; ?></p>
      <div class="logo1"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>"  height="56"  alt="Transcare"/></div>
    </header>
    
    <div class="ip_container">
      <div class="inner_content" style="width:1628px;">
        <h1><?php echo $fetquerytab['subtitle']; ?></h1>
        
          <div class="ip_content1 ">
            <p class="ip_img"><img src="transcareadmin/<?php echo $fetquerytab['image']; ?>" width="446" height="407"  alt=""/></p>
            
            <div id="scr-wrapper1" style="width:1180px">
              <div class="ip_content2 content2 scroller" > 
              	<p class="ip_para_margin"><?php echo $fetquerytab['description']; ?>.</p>             
              </div>              
           </div>
           
        </div>
      </div>
    </div>
    
    </div>
    
    
    
    <div class="vertical_caurosel">
      <div id="scr-wrapper" class="scr-wrapper">
        <ul id="scroller" class="scroller">
                <?php 

                $i=1; 

  $getCar = mysql_query("SELECT * FROM primary_template2_carousal WHERE template_content_id = '$gettid'");

  while($fetchCar = mysql_fetch_array($getCar)){

  ?>
          <li>
            <div class="ip2_caurosel"><a href="#"  data-reveal-id="myModal<?=$i?>">

              <p class="img_caurosel">
                 <?php 
              if($fetchCar['contentchecked'] == "Pdf")
              {
?>
<img src="img/img_-caurosel1.jpg"  width="117" height="144"  alt=""/>
<?php
              }
              else if($fetchCar['contentchecked'] == "Image")
              {

?>
<img src="transcareadmin/<?php echo $fetchCar['template2_rightimages'];?>"  width="117" height="144"  alt=""/>
<?php
              }
              else if($fetchCar['contentchecked'] == "Video")
              {

                ?>
                <img src="img/videoIcon.jpg"  width="117" height="144"  alt=""/>
                <?php
              }
              ?>



              </p>
              <p><?php echo $fetchCar['Imagecaption'];?></p>
              </a> </div>
          </li>
          <?php
          $i++;
        }
        ?>

        </ul>
      </div>
    </div>
    
    <?php
    $j=1;
     $getcaptioncontent = mysql_query("SELECT * FROM primary_template2_carousal WHERE template_content_id = '$gettid'");
    
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
          
          <iframe name="myiframe" width="700" height="1000"  alt="" id="myiframe" src="transcareadmin/<?php echo $fetchcaptioncontent['template2_rightimages'];?>"> 
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
          <p><img src="transcareadmin/<?php echo $fetchcaptioncontent['template2_rightimages'];?>" width="640" height="500"  alt=""/></p>
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
          <iframe width="560" id="playerid<?=$j?>" height="315" src="<?php echo $fetchcaptioncontent['template2_rightimages'] ?>" frameborder="0" allowfullscreen></iframe>
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
  ?> -->
   
    

   <?php

    $getsubscreen = mysql_query("SELECT * FROM  template_content  WHERE parentid = '$gettid'");

    $getlinkname=mysql_query("SELECT * FROM  template_content  WHERE parentid = 0");

  $fetchlinkname=mysql_fetch_array($getlinkname);

    ?>
<!-- <footer class="foo_ip">
  <div class="container">
    <div style="margin:0 0 12px; overflow: hidden;">
      <p><a href="#" class="foo_btn active"><?php echo $fetchlinkname['linkname'] ?></a></p>
      <?php

          $i=1;

          while($fetchsubscreen=mysql_fetch_array($getsubscreen))

          {

            if($fetchsubscreen['template_id'] == 1)

            {

                ?>

                         <p><a href="inner-template-1.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 2)

          {

            ?>

                         <p><a href="inner-template-2.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 3)

          {

            ?>

                        <p><a href="inner-template-3.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 4)

          {

          ?>

                      <p><a href="inner-template-4.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 5)

          {

          ?>

                      <p><a href="inner-template-5.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else

          {

          ?>

                 <p><a href="inner-template-6.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                 <?php 

          }

          ?>

                        <?php

            $i++;

          }

           ?>
    </div>
  </div>
</footer> -->

<footer class="foo_ip">
      <div class="container">
        <div class="footer_menu">


        <?php
        

            $sel = mysql_query("SELECT * FROM primary_template_content WHERE id =  '$cur' ");
            $row = mysql_fetch_array($sel);
             $getparenidcount = mysql_query("SELECT * FROM primary_template_content WHERE parentid = '$cur'");
         $getsubscreencount= mysql_num_rows($getparenidcount);

            ?>

        <?php 
        if ($cur != '' && $getsubscreencount > 0)
        {
        ?>    

            <div <?php if($row['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row['template_id']?>.php?dbname=<?php echo $row['tablename']; ?>&tcid=<?php echo $row['id']; ?>&cur=<?php echo $row['id']; ?>" class="foo_btn"><?php echo $row['linkname']; ?></a>
            </div>
            <div class="btn_right"></div>
            </div> 

        <?php
        }
        //echo "SELECT * FROM template_content WHERE parentid = '$cur'";
        
        $sel1 = mysql_query("SELECT * FROM primary_template_content WHERE parentid = '$cur'");
            while ($row1 = mysql_fetch_array($sel1)) {

            ?>  

            <div <?php if($row1['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row1['template_id']?>.php?dbname=<?php echo $row1['tablename']; ?>&tcid=<?php echo $row1['id']; ?>&cur=<?php echo $cur; ?>" class="foo_btn"><?php echo $row1['linkname']; ?></a>  
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
<script>
 function remover(id)
 {
var video = $("#playerid"+id).attr("src");
$("#playerid"+id).attr("src","");
$("#playerid"+id).attr("src",video);
 }
$(function() {
    $("#elementp2").introLoader();
});

$(".btn_back").bind('tap', function(){
    window.parent.$('body').trigger('transMain');
  });
  
$(document).ready(function () {

  loaded(); //iscroll
  
  /* iframe call */
  
  var myScroll;
  function loaded () {
    
    myScroll = new IScroll('#scr-wrapper', {
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
    	
    // myScroll = new IScroll('#scr-wrapper1', {
    //   scrollbars: true,
    //   mouseWheel: true,
    //   interactiveScrollbars: true,
    //   shrinkScrollbars: 'scale',
    //   //fadeScrollbars: true,
    //   click: true,
    // });
    // myScroll = new IScroll('#scr-wrapper8', {
    //   scrollbars: true,
    //   mouseWheel: true,
    //   interactiveScrollbars: true,
    //   shrinkScrollbars: 'scale',
    //   //fadeScrollbars: true,
    //   click: true,
    // });
  }
  document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

});

</script>

<?php 

include("footer.php");

?>