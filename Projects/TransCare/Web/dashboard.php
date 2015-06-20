<?php
error_reporting(0);
include("header.php");
$getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
$fetLogo = mysql_fetch_array($getLogo);
$newlocation=getPlaceName($_COOKIE[latitude],$_COOKIE[longitude]);
?>
    

<link href="css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link href="css/introLoader.css" type="text/css" rel="stylesheet">
<div id="elementdashboard"></div>
<div id="wrapper">
    
        <header class="dash_header">
        	<div class="container">
            <div class="logo"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>" width="276" height="130"  alt=""/></div>
                <?php
function getPlaceName($latitude, $longitude)
{
    $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='
           .$latitude.','.$longitude.'&sensor=false');
    $output= json_decode($geocode);
    //Here "formatted_address" is used to display the address in a user friendly format.
    for($j=0;$j<count($output->results[0]->address_components);$j++)
    {
        if($output->results[0]->address_components[$j]->types[0] == "locality")
        {
        $location= $output->results[0]->address_components[$j]->long_name;
        }
    }

return $location;
}

$xml = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q='$newlocation'");
$output= json_decode($xml);
       $temperature = round($output->main->temp_max);
       $C = ($temperature - 273.15)* 1.8000 + 32.00;
	   $icon=$output->weather[0]->icon;
	   $iconformat=$icon.'.png';

?>
                <div class="header_right">
                	<?php
                	if($iconformat == ".png" )
                	{
                		?>
                		<p style="float: left"><img src="img/head_weather.png" ><?php echo round($C);?>&deg;F</p>
                		<?php
                		
                	}
					else {
						?>
						<p style="float: left"><img src="img/<?php echo $iconformat ?>" ><?php echo round($C);?>&deg;F</p>
						<?php
						
					}
					?>
                
                    <div class="time" >
                    <?php
                        date_default_timezone_set('Asia/Calcutta');
                        ?>
                    <ul>
                        <li class="bg_white" id="hour"></li>
                            <li>:</li>
                            <li class="bg_white" id="mins"></li>
                        </ul>
                        <p><?php echo date("d"); ?><br><span><?php echo date("M"); ?></span></p>   
                    </div>
                </div>
                
                </div><!--Container-->
            </header> 
            
             
            <div class="container">
            <section class="content">
            <div class="banner">
                    <ul id="sb-slider" class="sb-slider">
                    <?php 

                        $query = mysql_query("SELECT * FROM rotate_image_main");

                        while($fetquery = mysql_fetch_array($query)){

                    ?>

         <li><img src="transcareadmin/<?php echo $fetquery['rotate_image_main']; ?>" style="width:603px; height:603px"  alt=""/></li>  

                        <?php } ?> 
                                                       
                    </ul>
                </div>
                                
                <div class="sec_menu">
                <div id="scr-wrapper4">
                <ul class="scroller">
            <?php               
           $gettemp1 = mysql_query("SELECT * FROM template_content WHERE parentid = 0 ");
                    if(mysql_num_rows($gettemp1) > 0){
                        while($fetchTemp1 = mysql_fetch_array($gettemp1)){
                        if($fetchTemp1['template_id'] == 1){
                        ?>
                    <li><a href="#" data="inner-template-1.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
                         <?php 
                        }
                        else if($fetchTemp1['template_id'] == 2){
                        ?>
                   <li><a href="#" data="inner-template-2.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
                   <?php 
                        }
                        else if($fetchTemp1['template_id'] == 3){
                        ?>
            <li><a href="#" data="inner-template-3.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
               <?php 
                        }
                        else if($fetchTemp1['template_id'] == 4){
                        ?>
                <li><a href="#" data="inner-template-4.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
                 <?php 
                        }
                        else if($fetchTemp1['template_id'] == 5){
                        ?>
            <li><a href="#" data="inner-template-5.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
               <?php 
                        }
                        else{
                        ?>
<li><a href="#" data="inner-template-6.php?dbname=<?php echo $fetchTemp1['table_name']; ?>&tcid=<?php echo $fetchTemp1['id']; ?>&cur=<?php echo $fetchTemp1['id']; ?>"><?php echo $fetchTemp1['linkname']; ?></a></li>
                          <?php 
                        }
                        } 
                    }  ?>
                    </ul>
                    </div>                         
                </div>
                


             <div class="primary_menu">
                <ul>
                <?php
                    $getstyle = mysql_query("SELECT * FROM primary_template_content  WHERE parentid = 0 ORDER BY id ASC");
                while($fetstyle = mysql_fetch_array($getstyle)){
                              
                        if($fetstyle['template_id'] == 1){
                     ?>
<li><a href="#" data="primary_innertemplate1.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>" >
                    <?php echo $fetstyle['linkname']; ?></a></li>
                    <?php 
                        }
                        else if($fetstyle['template_id'] == 2){
                        ?>
<li><a href="#" data="primary_innertemplate2.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>" >
<?php echo $fetstyle['linkname'];?></a></li>
 <?php 
                        }
                        else if($fetstyle['template_id'] == 3){
                        ?>
<li><a href="#" data="primary_innertemplate3.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>" >
                 <?php echo $fetstyle['linkname'];?></a></li>
<?php 
                        }
                        else if($fetstyle['template_id'] == 4){
                        ?>
<li><a href="#" data="primary_innertemplate4.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>" >
                         <?php echo $fetstyle['linkname']; ?></a></li>
                         <?php 
                        }
                        else if($fetstyle['template_id'] == 5){
                        ?>
 <li><a href="#" data="primary_innertemplate5.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>" >
                        <?php echo $fetstyle['linkname']; ?></a></li>
                        <?php 
                        }
                        else{
                        ?>
<li><a href="#" data="primary_innertemplate6.php?dbname=<?php echo $fetstyle['tablename']; ?>&tcid=<?php echo $fetstyle['id']; ?>&cur=<?php echo $fetstyle['id']; ?>">
                        <?php echo $fetstyle['linkname']; ?></a></li>
                            <?php }  }?>
                    </ul>
                </div>





            </section>      
        </div>
        
        <footer class="foo_Home">
        <div class="container">
            <marquee><?php echo $fetLogo['ticker_text']; ?></marquee><br>
            </div>
        </footer>
    </div>

<script type="text/javascript" src="js/jquery.min.js"></script>   
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<script type="text/javascript" src="js/jquery.slicebox.js"></script>
<script src="js/iscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script>
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(function() {

    $("#elementdashboard").introLoader();
});




$(function() {

var Page = (function() {

var $navArrows = $( '#nav-arrows' ).hide(),
$navDots = $( '#nav-dots' ).hide(),
$nav = $navDots.children( 'span' ),
$shadow = $( '#shadow' ).hide(),
slicebox = $( '#sb-slider' ).slicebox( {
onReady : function() {

$navArrows.show();
$navDots.show();
$shadow.show();

},
onBeforeChange : function( pos ) {

$nav.removeClass( 'nav-dot-current' );
$nav.eq( pos ).addClass( 'nav-dot-current' );

}
} ),
init = function() {

initEvents();
},
initEvents = function() {

// add navigation events
$navArrows.children( ':first' ).on( 'click', function() {

slicebox.next();
return false;

} );

$navArrows.children( ':last' ).on( 'click', function() {
slicebox.previous();
return false;

} );

$nav.each( function( i ) {
$( this ).on( 'click', function( event ) {
var $dot = $( this );
if( !slicebox.isActive() ) {

$nav.removeClass( 'nav-dot-current' );
$dot.addClass( 'nav-dot-current' );
}
slicebox.jump( i + 1 );
return false;
} );
} );

};

return { init : init };

})();

Page.init();

});
//bOX sCROLL
$(document).ready(function() {
     onload=display_ct();
loaded();   
/* iframe call */
$("a").bind('tap click', function(){
	window.parent.$('body').trigger('transInner',[$(this).attr('data')]);
});
var myScroll;
function loaded () {
myScroll = new IScroll('#scr-wrapper4', {
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
function display_c(){

var refresh=1000; // Refresh rate in milli seconds

mytime=setTimeout('display_ct()',refresh)

}



function display_ct() {

var strcount

var x = new Date(),

  hour =  x.getHours(),

  minute =  x.getMinutes();

  if (hour   > 12) { hour = hour - 12;      }

   if (hour   == 0) { hour = 12;             }

   if (hour   < 10) { hour   = "0" + hour;   }

   if (minute < 10) { minute = "0" + minute; }

document.getElementById('hour').innerHTML = hour;

document.getElementById('mins').innerHTML = minute;





tt=display_c();

}

</script>

<?php 

include("footer.php");

?>
