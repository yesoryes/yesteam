<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>/administrator/menu/ddcolortabs.css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>/administrator/menu/dropdowntabs.js"></script>
<div id="colortab" class="ddcolortabs">
<ul>

<li <?php if(current_file_name() == 'home.php') { echo "class='selected'";} ?>><a href="<?php echo SITEPATH; ?>/administrator/home.php" title="Home"><span>Home</span></a></li>

<li <?php if(current_file_name() == 'browse.php') { echo "class='selected'";} ?>><a href="<?php echo SITEPATH; ?>/administrator/post.php" title="Posts"><span>Posts</span></a></li>

<li <?php if(current_file_name() == 'globalsetting.php') { echo "class='selected'";} ?>><a href="<?php echo SITEPATH; ?>/administrator/globalsetting.php" title="Global Settings"><span>Global Settings</span></a></li>

<li <?php if(current_file_name() == 'changepassword.php') { echo "class='selected'";} ?>><a href="<?php echo SITEPATH; ?>/administrator/changepassword.php" title="Change Password"><span>Change Password</span></a></li>

<li <?php if(current_file_name() == 'logout.php') { echo "class='selected'";} ?>><a href="<?php echo SITEPATH; ?>/administrator/logout.php" title="Logout"><span>Logout</span></a></li>

</ul>
</div>

<!--1st drop down menu -->                                                
<!--<div id="dropmenu1_a" class="dropmenudiv_a" style="width: 150px;">
<a href="<?php echo SITEPATH; ?>/administrator/case.php" title="Manage Case"><span>Manage Case</span></a>

<a href="<?php echo SITEPATH; ?>/administrator/options.php" title="Manage Paper Parts"><span>Manage Paper Parts</span></a>

<a href="<?php echo SITEPATH; ?>/administrator/shipping.php" title="Manage Shipping"><span>Manage Shipping</span></a>

</div>

<div id="dropmenu2_a" class="dropmenudiv_a" style="width: 150px;">
<a href="<?php echo SITEPATH; ?>/administrator/coupons.php" title="Disk Price"><span>Disk Price</span></a>
</div>
-->
<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
//tabdropdown.init("colortab", 0);
tabdropdown.init("colortab");
</script>