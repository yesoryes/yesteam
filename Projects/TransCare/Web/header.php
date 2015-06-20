<?php

/*ini_set('display_errors', true);
ini_set('safe_mode', false);
ini_set('allow_url_fopen', true);
ini_set('allow_url_include', true);
*/

include("connect.php");
$selectDb = mysql_query("SELECT * FROM `site_setting`");
$fetselect = mysql_fetch_array($selectDb);
$namebgcolor = $fetselect['bg_image'];
$bgColor = 'background: url(transcareadmin/'.$namebgcolor.') no-repeat center 0px;';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TransCare</title>
<link href="css/idle.css" type="text/css" rel="stylesheet">
<link href="css/reset.css" type="text/css" rel="stylesheet">
<link href="css/carousel_vertical.css" type="text/css" rel="stylesheet">
<style type="text/css">
	/*.bgColor
	{
		<?php echo $bgColor; ?>
	}*/
</style>


<script type="text/javascript" src="js/jquery.min.js"></script> 
<!--<script src="js/slider.jquery.js"></script>-->
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<!--<script type="text/javascript" src="js/jquery.slicebox.js"></script>-->

<script src="js/jquery.mobile-events.min.js"></script>
  
<script>
	function clearIframe(){
		//alert("hello");
		iframe_element.src = "about:blank";
	}
	
	
</script>

</head>
<body>