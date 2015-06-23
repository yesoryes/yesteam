<?php
include("include/session.php");
if($session->logged_in)
{
header('Location:transcare_add.php');   
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>TransCare Admin</title>
    <link rel="icon" type="image/png" href="images/favi.png" sizes="18x16">
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/desktop.css" type="text/css" rel="stylesheet"> 
    <link href="css/old.css" type="text/css" rel="stylesheet"> 

</head>

<body>
	
    
    <div class="container">  
        <div class="login-logo">Admin Panel</div>
        <div class="login-content"> 
            <h4>Login Area</h4>
            <form role="form" method="post" action="process.php">
                <div class="username">
                  <label for="User">User Name</label>
                  <input type="text" placeholder="Username" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>" class="user" autofocus >
                  <div style="  margin-left: 165px;"><?php echo $form->error("user"); ?></div>
                </div>
                <div class="password">                            
                  <label for="pass">Password</label>
                  <input type="password" placeholder="Password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>" class="pass">
                  <div style="  margin-left: 165px;"><?php echo $form->error("pass"); ?></div>
                </div>
            
                <div class="login-submit">
                <input type="hidden" name="sublogin" value="1">
                   <input class="loginscript" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                </div> 
            </form>  
      </div> 
    </div>
    
    
    
    
    <!--<!--<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Meme Admin</h3>
                    </div>
                    <div class="panel-body">
                    
                        <form role="form" method="post" action="process.php">
                            <fieldset>
                                <div class="form-group">
               <input type="text" class="form-control" placeholder="Username" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>" autofocus><br><?php echo $form->error("user"); ?>
                                </div>
                                <div class="form-group">
               <input class="form-control" placeholder="Password" type="password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>"><br><?php echo $form->error("pass"); ?>
                                </div>
                               <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                           Change this to a button or input when using this as a form 
                                <input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Core Scripts - Include with every page -->
  <!--  <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>-->

    <!-- SB Admin Scripts - Include with every page 
    <script src="js/sb-admin.js"></script>-->

</body>

</html>
