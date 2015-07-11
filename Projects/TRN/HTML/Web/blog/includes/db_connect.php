<?php

//To start output buffer
ob_start();
//Report all errors except E_NOTICE
error_reporting(1);
switch($_SERVER['HTTP_HOST'])
{
    //Production server (please fill FB_* paramaters)
    //---------------------------------------------------->
    case 'localhost':
	define("HOST_NAME", "localhost"); //Name of the Host
	define("MYSQL_USER", "npcom360_user"); //MYSQL User Name
	define("MYSQL_PASSWORD", "Indian360"); //MYSQL Password
	define("DATABASE_NAME", "npcom360_sstudioblog"); //Name of the Database
       break;
   default:
	define("HOST_NAME", "localhost"); //Name of the Host
	define("MYSQL_USER", "npcom360_user"); //MYSQL User Name
	define("MYSQL_PASSWORD", "Indian360"); //MYSQL Password
	define("DATABASE_NAME", "npcom360_sstudioblog"); //Name of the Database
       break;
}

//To connect database
$db_connect = mysql_connect(HOST_NAME, MYSQL_USER, MYSQL_PASSWORD);

if(!$db_connect)
{
        die("Database Connection Error: ".mysql_error());
}
else
{
        mysql_select_db(DATABASE_NAME, $db_connect) or die("Database Selection Error: ".mysql_error());
	}
?>