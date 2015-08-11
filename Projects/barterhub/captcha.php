<?php
	session_start();
	//echo "hi how are u";
	include("phptextClass.php");	
	
	/*create class object*/
	$phptextObj = new phptextClass();	
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#f3f4f7','#000',120,40,10,25);	
 ?>