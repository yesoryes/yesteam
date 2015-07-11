<?php
	//To start session
	session_start();
	//Include Database connection file
	require_once(dirname(__FILE__).'/../../includes/db_connect.php');
	//Include Configuration file
	require_once(dirname(__FILE__).'/../../includes/configuration.php');
	//Include Configuration file
	require_once(dirname(__FILE__).'/../../includes/functions.php');
	//Include administrator extras file
	require_once(dirname(__FILE__).'/../../includes/adminstrator_extras.php');
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to Silverstudio's Photo blog</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="<?php echo SITEPATH; ?>/administrator/css/template.css" type="text/css" rel="stylesheet" media="screen,projection" />
<script language="javascript" src="<?php echo SITEPATH; ?>/administrator/js/scripts.js"></script>
</head>
<body>
<!-- Layout stránek -->
<div id="layout">
<!-- Hlavička -->
<div id="header">
  <h1 id="logo"><span dir="ltr" id=":185">Silverstudio's Photo blog</span> - <span class="nonhigh">Administration</span></h1>
  <hr class="noscreen" />
</div>
<!-- end/ Hlavička -->
<hr class="noscreen" />
<!-- Hlavní navigace -->
<div id="nav" class="box">
  <?php
if(user_exists())
{
	
	//Include menu file
	require_once(dirname(__FILE__).'/menu.php');
}

?>
</div>
<!-- end/ Hlavní navigace -->
<div id="container" class="box">
<!-- Obsah stránek-->
<div id="obsah" class="content box">
<div class="in">
<div>
<h1 class="pheading" align="left"><?php echo $heading_array[current_file_name()]; ?> </h1>