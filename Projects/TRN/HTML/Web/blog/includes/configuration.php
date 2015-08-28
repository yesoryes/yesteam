<?php

switch($_SERVER['HTTP_HOST'])
{
    //Production server (please fill FB_* paramaters)
    //---------------------------------------------------->
    case 'localhost':
        define("SITEPATH", "http://localhost/ssb");
       break;
   default:
        define("SITEPATH", "http://$_SERVER[HTTP_HOST]/blog");
       break;
}

define("ABSOLUTEPATH", dirname(__FILE__));

//To define table prefix
define("TABLE_PREFIX", "ssb_");

//define constants for all tables in database
define("USERS", TABLE_PREFIX."users");
define("GLOBAL_CONFIGURATION", TABLE_PREFIX."global_configuration");
define("POSTS", TABLE_PREFIX."posts");
define("COMMENTS", TABLE_PREFIX."posts_comments");
define("SETTINGS", TABLE_PREFIX."settings");
		
?>