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
<div id="element1"></div>
<div id="wrapper1">
  <div class="container">
  
    <header class="inner_head">
      <div class="btn_back"><a href="#" onclick="clearIframe();">Back</a></div>
      <p><?php echo $fetquerytab['title']; ?></p>
      <div class="logo1"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>"  height="56"  alt="Transcare"/></div>
    </header>
    
    <div class="ip_container">
      <div class="inner_content" style="margin: -100px 0 0;">
        <h1><?php echo $fetquerytab['title']; ?></h1>
        
          <div class="ip_content1 ">
            <p class="ip_img"><img src="transcareadmin/<?php echo $fetquerytab['topimage']; ?>" width="446" height="407"  alt=""/></p>
            <div id="scr-wrapper1">
            <div class="ip_content2 content2 scroller"> 
              <p class="ip_para_margin"><?php echo $fetquerytab['description']; ?></p>
             
            </div>
          </div>
        </div>

      </div>
      
           <section class="car" id="demo">
          <?php
                $i=1; 

         //echo "SELECT * FROM template1_carousel WHERE template_content_id = '$gettid'";

          $getCar = mysql_query("SELECT * FROM template1_carousel WHERE template_content_id = '$gettid'");

          while($fetchCar = mysql_fetch_array($getCar)){

          ?>
       
        <div class="box" data-fun="<?php echo $fetchCar['template1_rightid']; ?>" style="cursor:pointer"><section class="boxIn">
        
        <?php 
              if($fetchCar['contentchecked'] == "Pdf")
              {
            ?>
            <img src="img/img_-caurosel1.jpg">
            <?php
              }
              else if($fetchCar['contentchecked'] == "Image")
              {

            ?>
            <img src="transcareadmin/<?php echo $fetchCar['template1_rightimages'];?>"/>
            <?php
              }
              else if($fetchCar['contentchecked'] == "Video")
              {

            ?>
             <img src="img/videoIcon.jpg"  width="117" alt=""/>
             <?php
            }
            ?>
        
        <p><?php echo $fetchCar['temp1imgcaption'];?></p></section></div>
        <?php
          $i++;
        }
        ?>
        </section>




    </div>
  </div>
   <div class="backdrop"></div>
    <div id="myModal" class="modal_box popbox">
      
      </div>
</div>
   

<?php 
  $getsub = mysql_query("SELECT * FROM `template_content` WHERE parentid = '$gettid'");
  $getrelavent = mysql_query("SELECT * FROM `template_content` WHERE id = '$gettid'");
  $fetgetrel = mysql_fetch_array($getrelavent);

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

            <div <?php if($row1['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left">
            <a href="inner-template-<?=$row1['template_id']?>.php?dbname=<?php echo $row1['table_name']; ?>&tcid=<?php echo $row1['id']; ?>&cur=<?php echo $cur; ?>" class="foo_btn"><?php echo $row1['linkname']; ?></a>
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

<!-- <script type="text/javascript" src="js/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="js/jquery-1.11.2.js"></script>  -->


<!--<script src="js/jquery.reveal.js"></script>-->
<script src="js/iscroll.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
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
	
	var id = $(this).attr('data-fun');
		popupFunctionCall(id);
	
	 });  


 
 

 function popupFunctionCall(id){
  //alert("Helo");
  $.ajax({
     url:  'getPopUpDetail.php',
     type: 'POST',
     data: {cid: id},
     success: function(html){
       $('#myModal').empty().html(html);
	   
	   $('.backdrop').animate({'opacity':'0.5'}, 300, 'linear');
		$('.backdrop, .popbox').css('display','block')
     },
     error: function(){
       alert("error");
     }  
  }); 
}
 $(".btn_back").bind('tap', function(){
    window.parent.$('body').trigger('transMain');
  });

$(function() {
    $("#element1").introLoader();
});





$(document).ready(function () {

  loaded(); //iscroll
  
  var myScroll;
  function loaded () {
    
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