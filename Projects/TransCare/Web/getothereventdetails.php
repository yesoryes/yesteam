<?php 
include('connect.php');

    if(isset($_POST['cont'])){
          $id = $_POST['cont'];
          $att = $_POST['att'];
       $getevent1 = mysql_query("SELECT * FROM `template3event` WHERE date = '$id' AND tl3_id = '$att'");
       $getcou=mysql_num_rows($getevent1)
          //$items = array();
               ?>
         <div id="scr-wrapper6">
         <div id="owl-demo1" class="owl-carousel">
            <!--<ul  class="scroller6">-->
            <?php 
            if($getcou > 0){ 
            $i = 1;
            while($fetevent = mysql_fetch_array($getevent1)){ ?>
              <div class="slide myModalFunc" data-fun="<?php echo $i; ?>"><a>
                <div class="details_1">
                  <div class="displayelement"><?php echo date('d M', strtotime($fetevent['date'])); ?></div>
                  <h1><?php echo $fetevent['eventname']; ?></h1>

                  <p><?php echo substr($fetevent['description'], 0, 100); ?></p>
                  <ul>
                    <li class="event_time"><?php echo $fetevent['time']; ?></li>
                    <li class="event_place"><?php echo $fetevent['place']; ?></li>
                  </ul>
                </div>
                </a>
              </div>
              <?php 
              $i++;
              } ?>
              <?php }else{ ?>
            <div>There is no event on current date</div>
          <?php } ?>
            <!--</ul>-->
            </div>
          </div>
            <?php
    $getpopupdata = mysql_query("SELECT * FROM `template3event` WHERE date = '$id'");
    $j=1;
    while($fetchpopupdata=mysql_fetch_array($getpopupdata)) 
    {
    ?>
    <div class="backdropajx"></div>
          <div id="myModalfu<?php echo $j; ?>" class="modal_box popbox">

      <div class="popup_container">
        <h1><?php echo $fetchpopupdata["eventname"] ?></h1>
        <div class="displayelement"><?php echo date('d M', strtotime($fetchpopupdata['date'])); ?></div>
        <div id="pop-wrapper">
        <div class="popup_text scroller">
        <div class="vertical-scroll scr_calendar1 boxscrollajax">
        <div class="" id="">
        <p><?php echo $fetchpopupdata["description"] ?></p>
        </div>
              <ul>
                <?php
    
                       if($fetchpopupdata['time'] != "")
    
                       {
    
                        ?> <li class="event_time"><?php echo $fetchpopupdata['time']?></li>
    
                                        <?php
    
                       } 
    
                       if($fetchpopupdata['place'] != "")
    
                       {
    
                      ?>
    
                      <li class="event_place"><?php echo $fetchpopupdata['place']?></li>
    
                      <?php
    
                       } ?>
              </ul>
         </div>
        </div>
        </div>
      </div>
      <a class="close-reveal-modal close" onclick="close_box(<?php echo $j; ?>);"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
       <?php 
    $j++;
    } ?>
            <?php 
    }
?>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script src="js/jquery.nicescroll.min.js"></script> 
<script src="js/jquery-nicescroll-plus.js"></script>  
<script type="text/javascript" src="js/owl.carousel.min.js"></script>  
<script>
	function close_box(id) {
		$('.backdropajx').animate({'opacity':'0'}, 300, 'linear');
		$('.backdropajx, #myModalfu'+id).css('display','none');
		
	} 
	
	$('.myModalFunc').bind('tap', function(e) { 
	//alert("hello");
	var id = $(this).attr('data-fun');
	
		$('.backdropajx').animate({'opacity':'0.5'}, 300, 'linear');
		$('.backdropajx, #myModalfu'+id).css('display','block')
	
	 });
   $(document).ready(function() {
      $(".boxscrollajax").niceScroll({
		   cursorborder:"",
		  cursorcolor:"#323232",
		  boxzoom:true, 
		  touchbehavior: true,
		  preventmultitouchscrolling: false  
	  }); // First scrollable DIV .getNiceScroll();
	  $(".boxscrollajax").getNiceScroll();

      $("#owl-demo1").owlCarousel({
      autoPlay: false,
      items : 2,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
      });
   });  
</script>