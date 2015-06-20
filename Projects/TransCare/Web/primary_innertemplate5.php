<?php 
include("header.php");
$gettn = $_GET['dbname'];
$gettid = $_GET['tcid'];
if(isset($_GET['cur'])){
	$cur = $_GET['cur'];
}
$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");
$fetchdata=mysql_fetch_array($getdataquery);

$getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
$fetLogo = mysql_fetch_array($getLogo);
?>

<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">

<div id="elementp5"></div>
<div id="wrapper1">
    	<div class="container"> 
        	<header class="inner_head">
            	<div class="btn_back"><a href="javascript:history.go(-1);">Back</a></div>
                	<p><?php echo $fetchdata['title'] ?></p>	
            	<div class="logo1"><a href="index.html">
            	<img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>" 
            	 height="56"  alt="Transcare"/></a></div>
            </header>
			<div class="ip_container">
				<div class="inner_content inner_content5">
				<div id="scr-wrapper2"> 
					<div class="ip_content1 ip_content5 contentHolder" id="boxscroll"> 
                    	<p class="ip_img5"><img src="transcareadmin/<?php echo $fetchdata['bannerimage']; ?>" width="1602" height="245"  alt=""/></p> 
                    	<div class="ip_content2 ip_content5"> 
                        	<?php echo $fetchdata['description'] ?>
                            
                    	</div>
                       
                         
					</div>
				</div>
				</div>
			</div> 
        </div> 
             <?php
		$getsubscreen = mysql_query("SELECT * FROM  template_content  WHERE parentid = '$gettid'");
		$getlinkname = mysql_query("SELECT * FROM  template_content  WHERE parentid = 0");
		$fetchlinkname=mysql_fetch_array($getlinkname);
		?>
        <!-- <footer class="foo_ip">  
        	<div class="container">
            	<div style="margin:0 0 12px; overflow: hidden;">
                	<p><a href="#" class="foo_btn active"><?php echo $fetchlinkname['linkname']  ?></a></p>
                    <?php
					$i=1;
					while($fetchsubscreen=mysql_fetch_array($getsubscreen))
					{
						if($fetchsubscreen['template_id'] == 1)
						{
								?>
                         <p><a href="inner-template-1.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
                        <?php
					}
					else if($fetchsubscreen['template_id'] == 2)
					{
						?>
                         <p><a href="inner-template-2.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
                        <?php
					}
					else if($fetchsubscreen['template_id'] == 3)
					{
						?>
                        <p><a href="inner-template-3.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
                        <?php
					}
					else if($fetchsubscreen['template_id'] == 4)
					{
					?>
                      <p><a href="inner-template-4.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
                        <?php
					}
					else if($fetchsubscreen['template_id'] == 5)
					{
					?>
                      <p><a href="inner-template-5.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
                        <?php
					}
					else
					{
					?>
                 <p><a href="inner-template-6.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>
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



<script type="text/javascript" src="js/jquery.waterwheelCarousel.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/iscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script> 
<script>

$(function() {
    $("#elementp5").introLoader();
});
	$(document).ready(function () {
        var carousel = $("#carousel").waterwheelCarousel({
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });	
		
      });
	  
	  
	  //Jquery Popup
	  
	  jQuery(document).ready(function($){
	//open popup
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	
	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });
}); 
//bOX sCROLL
			$(document).ready(function() {
  
				var nice = $("html").niceScroll();  // The document page (body)
				
				$("#div1").html($("#div1").html()+' '+nice.version);
				
				$("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#FFF",boxzoom:true}); // First scrollable DIV
				
				$("#boxscroll1").niceScroll({cursorborder:"",cursorcolor:"#FFF",boxzoom:true});
			
				$("#boxscroll2").niceScroll("#contentscroll2",{cursorcolor:"#F00",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // Second scrollable DIV
				$("#boxframe").niceScroll("#boxscroll3",{cursorcolor:"#0F0",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // This is an IFrame (iPad compatible)
				
				$("#boxscroll4").niceScroll("#boxscroll4 .wrapper",{boxzoom:true});  // hw acceleration enabled when using wrapper
				

        /* iframe call */
        $(".btn_back").bind('tap', function(){
          window.parent.$('body').trigger('transMain');
        });


		  });


		$(document).ready(function ($) {
		
	loaded(); //iscroll
		

	var myScroll;
	function loaded () {
		myScroll = new IScroll('#scr-wrapper2', {
			scrollX: false,
			scrollY: true,
			momentum: false,
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






























