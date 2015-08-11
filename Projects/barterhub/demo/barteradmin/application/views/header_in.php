
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barterhub</title>
        <link type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>css/jquery-confirm.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
        <style>
    	.table
    	{
    		max-width:100%;
    		width:99%;
    		margin:5px;
    	}
        </style>
        <script src="<?php echo base_url(); ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>scripts/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>scripts/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>scripts/jquery-confirm.js"></script>
         <script src="<?php echo base_url(); ?>scripts/bootstrap-datepicker.js"></script>
         
        
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo-12.png"/></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li><a href="<?php echo base_url(); ?>account/changepass">ChangePassword </a></li>
                            <li><a href="<?php echo base_url(); ?>account/logout">Logout<i class="icon-lock"></i></a></li>
                        </ul>
                     </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
          <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
            		<div class="nav-collapse collapse navbar-inverse-collapse">
                      		 <ul class="nav pull-right" id="nav">
                      		 	<li <?php if($flag == 'home'){ echo "class='active'"; } ?>><a class="highlightTab" href="<?php echo base_url(); ?>">Home</a></li>
                      		 	<li <?php if($flag == 'masterentry'){ echo "class='active'"; } ?>><a class="highlightTab" href="<?php echo base_url(); ?>masterentry/enableLocation">Master Entry</a></li>
                      		 	<li <?php if($flag == 'users'){ echo "class='active'"; } ?>><a class="highlightTab" href="<?php echo base_url(); ?>users">Users</a></li>
                      		 	<li <?php if($flag == 'product'){ echo "class='active'"; } ?>><a class="highlightTab" href="<?php echo base_url(); ?>product">Posts</a></li>
                      		 	<li <?php if($flag == 'charity'){ echo "class='active'"; } ?>><a class="highlightTab" href="<?php echo base_url(); ?>charity">Charities</a></li>
                      		 </ul>	
                      </div>
                </div>
           </div>	