<?php
include("admin-header.php");
?>
<div class="container">
	<!-----Header Part--->
 <div class="header">
    	<div class="headerContent">
            <div class="indexLogo">
                    Admin Panel
            </div>
            <div class="indexLogout">
                <a href="loginScreen.html"></a>
            </div>
        </div>
 </div> 
    <!-- Sub Screens-->
  <div class="subScreenheader"> 
        <div class="back">
                <a href="transcare_manage.php"></a>
        </div> 
        <form method="post" action="">

        <div class="linkName">
            <p>Template Name</p>
            <p class="linkLimit"><input type="text" name="template_name"   class="linkText"> </p>
        </div>
        <div class="upLoad">
                           <input type="submit" value="Save" name="savetemplate"  class="addScreen" >
                         </div>
                         </form>
        </div>
        </div>
        <?php
		if(isset($_POST["savetemplate"]))
		{
			$templatename=$_POST["template_name"];
			
			if($templatename == '')
			{
				echo "Template name is required";
			}
			else
			{
			
				$query=mysql_query("INSERT INTO `templates`(template_name) values('$templatename')");
if($query)
{
echo "Templates Added Successfully";	
	echo '<meta http-equiv="refresh" content="0; url=transcare_manage.php" />';
}

			}
	
		}
		
		?>
		