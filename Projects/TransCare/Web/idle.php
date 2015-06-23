<?php
//error_reporting(0);
include("header.php");
$getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
$fetLogo = mysql_fetch_array($getLogo);
//$newlocation=getPlaceName($_COOKIE[latitude],$_COOKIE[longitude]);
?>
<link href="css/idle.css" type="text/css" rel="stylesheet">
<link href="css/reset.css" type="text/css" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script src="js/slider.jquery.js" type="text/javascript"></script>
	
    
    <header class="idle_header">
        	<div class="container">
            
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
       $C = $temperature-273 ;
?>
                <div class="header_right">
                <p class="weather"><?php echo round($C);?>&deg;C</p>
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
        <ul class="home-slider" id="slider"> 
        <?php
            $quer = mysql_query("SELECT * FROM rotate_image_idle");
            while($fetchquer = mysql_fetch_array($quer)){
        ?>
            <li><a href="#"><img src="transcareadmin/<?php echo $fetchquer['rotate_image_idle']; ?>" class="img1"></a></li>
     <?php } ?>

        </ul>
        <div class="click">
            <a href="#"><img src="img/click.png" class="" alt=""></a>
        </div>
    </div> 
    <footer class="foo_Home">
        <div class="container-idle">
            <marquee><?php echo $fetLogo['ticker_text']; ?></marquee><br>
            </div>
        </footer>

    <script type="text/javascript">
        $(document).ready(function() {
            onload=display_ct();
            /* iframe call */

            $("a").click(function(){
                window.parent.$('body').trigger('transMain');
                //alert("call clicked");



            });

            $(window).ready(function(){

                $('.caption').find('span').hide();

            });

      });
 var $slider = $( '#slider' );
 
 $slider.lateralSlider( {
} );

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


   