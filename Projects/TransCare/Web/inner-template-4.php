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

<?php 

$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$gettitle = mysql_query("SELECT title FROM ".$gettn." WHERE template_content_id = '$gettid'");

$fetchtitle = mysql_fetch_array($gettitle);

?>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<style>
	#owl-demo .item{
        margin: 3px;
		width: 792px;
		float: left; 
    }
</style>
<div id="element4"></div>
<div id="wrapper1">
  <div class="container">
    <header class="inner_head">
      <div class="btn_back"><a href="#" onclick="clearIframe();">Back</a></div>
      <p><?php echo $fetchtitle['title']?></p>
      <div class="logo1"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>"  height="56"  alt="Transcare"/></div>
    </header>
    <div class="ip_container">
      <div class="inner_content5">
      <div class="acc_executive_right">
       <div id="owl-demo" class="owl-carousel">
        
                 
            
       <?php
       //echo "SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'";
       $link4temp = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

       $fetlink = mysql_fetch_array($link4temp);

       $link4id = $fetlink['id'];

       $geteven = mysql_query("SELECT * FROM `template4event` WHERE tl4_id = '$link4id'");

        $i=1;

        while($row=mysql_fetch_array($geteven))
        {           

          if($i == 1) { echo '<div class="item">'; }else{ echo ''; }

        ?>        
            <span class="anchor_acc_exective myModalFunction" data-fun="<?php echo $i; ?>"><a>
              <div class="acc_executive">
                <div class="acc_content">
                  <h3><?php echo $row['headername'] ?></h3>
                  <p><?php echo ucfirst(substr($row['description'], 0, 100)); ?></p>
                </div>
                <ul class="acc_details">
                  <li>Division</li>
                  <li><?php echo $row['division'] ?></li>
                  <li>Type</li>
                  <li><?php echo $row['type'] ?></li>
                  <li>Available</li>
                  <li><?php echo $row['available'] ?></li>
                  <li>Place</li>
                  <li><?php echo $row['place'] ?></li>
                </ul>
                <div class="acc_link"> <a href="#"><img src="img/acc_link.png"></a> </div>
              </div>
              </a> 
              </span> 
              <?php

              if($i % 3 == 0) { echo '</div><div class="item">'; }else{ echo ''; }
            
            $i++;
            }
            ?>
            
            
          
          
        </div>
        </div>
  
        
        
          <?php
          $getpopupdata = mysql_query("SELECT * FROM `template4event` WHERE tl4_id = '$link4id'");
          $j = 1;
          while($fetchdata=mysql_fetch_array($getpopupdata))
          {
            ?>
        <div id="myModal<?php echo  $j; ?>" class="modal_box popbox">
          <div class="popup_container  account_exe">
            <h1> <?php echo $fetchdata['headername'] ?></h1>
            <ul class="acc_details">
              <li>Division</li>
              <li><?php echo $fetchdata['division'] ?></li>
              <li>Type</li>
              <li><?php echo $fetchdata['type'] ?></li>
              <li>Available</li>
              <li><?php echo $fetchdata['available'] ?></li>
              <li>Place</li>
              <li><?php echo $fetchdata['place'] ?></li>
            </ul>
            <div class="account_exe contentHolder boxscroll"  id="">
              <p><?php echo $fetchdata['description'] ?></p>
            </div>
          </div>
          <a class="close-reveal-modal close" onclick="close_box(<?php echo $j; ?>);"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
          <?php 
          $j++;
        }
          ?>
      </div>
    </div>
  </div>
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
        if ($cur != '' && $getsubscreencount > 0)
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
<!-- <script src="js/iscroll.js"></script> -->
<script src="js/jquery.nicescroll.min.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script>

function close_box(id) {
	$('.backdrop').animate({'opacity':'0'}, 300, 'linear');
	$('.backdrop, #myModal'+id).css('display','none');
	
} 

$(function() {
    $("#element4").introLoader();
});

/*$(".anchor_acc_exective a").bind('tab', function(e) {
        
        $(".anchor_acc_exective a").trigger("click");
        e.preventDefault();
    });*/

$(document).ready(function() {

  $(".boxscroll").niceScroll({cursorborder:"",cursorcolor:"#323232",boxzoom:true}); // First scrollable DIV 

 $('.myModalFunction').bind('tap', function(e) { 
	//alert("hello");
	var id = $(this).attr('data-fun');
	
		$('.backdrop').animate({'opacity':'0.5'}, 300, 'linear');
		$('.backdrop, #myModal'+id).css('display','block')
	
	 }); 
/* iframe call */
        $(".btn_back").bind('tap', function(){
          window.parent.$('body').trigger('transMain');
        });
$("#owl-demo").owlCarousel({
	autoPlay: false,
	items : 2,
	itemsDesktop : [1199,3],
	itemsDesktopSmall : [979,3]
  });

});
</script>
  <?php 

include("footer.php");

?>