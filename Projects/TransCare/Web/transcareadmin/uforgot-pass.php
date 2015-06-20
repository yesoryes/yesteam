<?php
include('header.php');

$enqmsg=0;
if(isset($_POST['enquiry']))
{
@extract($_POST);



if($security!=$_SESSION['security_code'])
{
$enqmsg="Invalid Captcha";	
	
}
else
{

$sql=mysql_query("INSERT INTO `enquires`(name,email,phone,location,interest,comments) values('$name','$email','$number','$location','$course','$comment')");

if($sql)
{
$enqmsg="Enquiry Sent Successfully";	
}
}
	
}


?>
<script type="text/javascript">

$(document).ready(function(){
	//alert();
	var enqmsg='<?=$enqmsg?>';
	//alert(enqmsg);
	if(enqmsg!=0)
	{
	 $("#enqry_pop").css("display","block");	
		
	}
});

</script>
<body>
 
  
  <div style="background-color:#333; height:auto; width:100%; position:absolute; z-index:111; top:60px; display:none;" id="block_signin">
      <div class="container-fluid">
      		 <h1 class="text-center text-uppercase c_wit sign_hed">sign in</h1>
             <h6 class="pt5 text-uppercase c_wit f_s13">sign in with mail id</h6>
             <form onSubmit="return checkForm(this);"  action="process.php" name="regform" method="post">
             	<div class="col-lg-12 col-sm-12 col-xs-12 row">
                	<input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12" type="text" name="user" placeholder="Email address" onFocus="return goback" value="<?php echo $form->value("user"); ?>"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12" name="pass" value="<?php echo $form->value("pass"); ?>" type="password" placeholder="Passowrd"/>
                    <input type="hidden" name="sublogin" value="1">
                	<button type="submit" class="text-uppercase sign_btn">sign in</button>
                </div>
             </form>
             <div class="col-lg-12 col-sm-12 col-xs-12 row">
                 <span class="col-lg-4 pl0" style="color:red" id="email"><?php echo $form->error("user"); ?></span>
                 <span class="col-lg-4" style="color:red" id="password"><?php echo $form->error("pass"); ?></span>
             </div>
             <div class="col-lg-12 col-sm-12 col-xs-12 row">
             	<div class="col-lg-4 col-sm-4 col-xs-12 pl0">
                	<!--<p class="c_wit pt5 pull-left f_s11 pr15">Forgot Email?</p>-->
                    <a href="#"><p class=" mt5 c_wit pt5 f_s12 f_s11 text-uppercase">CREATE NEW ACCOUNT</p></a>
               	</div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                	<p class="c_wit pt5 pull-left pr15 f_s11 ml15">Forgot Passowrd?</p>
                    <a href="#"><p class="c_wit mt5 pt5 f_s12 f_s11 text-uppercase">Reset password</p></a>
               	</div>
             </div>
             <div class="col-lg-12  col-sm-12 col-xs-12 row pt35">
                <div class="col-lg-2 col-sm-2"></div>
                <div class=" col-lg-10 col-sm-10 col-xs-12">	
                    <a href="https://www.facebook.com/"><img class="pr15 col-lg-5 col-sm-5 col-xs-12" src="image/facebook.jpg"/></a>
                    <a href="#"><img class="col-lg-5 col-sm-5 col-xs-12" src="image/google.jpg"/></a>
                </div>
             </div>
       </div>
        <h6 class="pt15 pb25 text-uppercase c_wit f_s13 text-center">SIGN IN WITH SOCIAL MEDIA</h6>
  </div>
  <div style="background-color:#333; height:auto; width:100%; position:absolute; z-index:111; top:60px; display:none" id="block_courses">
      <div class="container-fluid cours">
      		 <h1 class="text-center text-uppercase c_wit sign_hed">Courses</h1>
             <div class="col-lg-3">
             	<h3>Personality Development</h3>
                <ul>
                	<li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>           
                </ul>
             </div>
             <div class="col-lg-3">
             	<h3>Personality Development</h3>
                <ul>
                	<li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>           
                </ul>
             </div>
             <div class="col-lg-3">
             	<h3>Personality Development</h3>
                <ul>
                	<li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>           
                </ul>
             </div>
             <div class="col-lg-3">
             	<h3>Personality Development</h3>
                <ul>
                	<li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>
                    <li><a>Business Communication</a></li>           
                </ul>
             </div>
       </div>
  </div>
  
  <!--<div style="background-color:#333; height:auto; width:100%; position:absolute; z-index:111; top:60px; display:none" id="block_enquiry">
      <div class="container-fluid">
      		 <h1 class="text-center text-uppercase c_wit sign_hed">Enquiry</h1>
             <h6 class="pt5 text-uppercase c_wit f_s13">SIGN UP WITH YOUR EMAIL ADDRESS</h6>
             <form name="signup" action="https://www.facebook.com/" onsubmit="return signForm(this);">
             	<div class="col-lg-12 col-sm-12 col-xs-12 row">
                	<input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="fname" type="text" placeholder="Enter your Name"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="lname" type="text" placeholder="Enter your location"/>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	<span class="col-lg-4 pl0" id="fname"></span>
                 		<span class="col-lg-4" id="lname"></span>
                    </div>
                	<input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="e_mail" type="text" placeholder="Email address"/>
                    <select style="height:50px; font-size:14px; font-weight:normal;color:#a9a9a9;" class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="c_mail" type="text" placeholder="">
                    	<option style="color:#333" value=" 3ds Max">3ds Max</option>
                        <option value="Office" >Office</option>
                        <option value="Cisco">Cisco</option>
                        <option value="Comp TIA">Comp TIA</option>
                    </select>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	<span class="col-lg-4 pl0" style="color:red" id="e_mail"></span>
                	    <span class="col-lg-4" style="color:red" id="c_mail"></span>
                    </div>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="pass" type="password" placeholder="Passowrd"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="conf_pass" type="password" placeholder="Confirm Passowrd"/>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	 <span class="col-lg-4 pl0" style="color:red" id="pass"></span>
                 		 <span class="col-lg-4" style="color:red" id="conf_pass"></span>
                    </div>
                	<button type="submit" class="text-uppercase sign_btn" style="height:190px; position:absolute;">Log in</button>
                </div>
             </form>
             <div class="col-lg-12 col-sm-12 col-xs-12 row">
                 <span class="col-lg-4 pl0" style="color:red" id="fname"></span>
                 <span class="col-lg-4" style="color:red" id="lname"></span>
                 <span class="col-lg-4 pl0" style="color:red" id="e_mail"></span>
                 <span class="col-lg-4" style="color:red" id="c_mail"></span>
                 <span class="col-lg-4 pl0" style="color:red" id="pass"></span>
                 <span class="col-lg-4" style="color:red" id="conf_pass"></span>
             </div>
             <!--<div class="col-lg-12 col-sm-12 col-xs-12 row">
             	<div class="col-lg-4 col-sm-4 col-xs-12 pl0">
                	<p class="c_wit pt5 pull-left f_s11 pr15">Forgot Email?</p>
                    <a href="#"><p class=" mt5 c_wit pt5 f_s12 f_s11 text-uppercase">CREATE NEW ACCOUNT</p></a>
               	</div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                	<p class="c_wit pt5 pull-left pr15 f_s11 ml15">Forgot Passowrd?</p>
                    <a href="#"><p class="c_wit mt5 pt5 f_s12 f_s11 text-uppercase">Reset password</p></a>
               	</div>
             </div>
             <div class="col-lg-12  col-sm-12 col-xs-12 row pt35">
                <div class="col-lg-2 col-sm-2"></div>
                <div class=" col-lg-10 col-sm-10 col-xs-12">	
                    <a href="#"><img class="pr15 col-lg-5 col-sm-5 col-xs-12" src="image/facebook.jpg"/></a>
                    <a href="#"><img class="col-lg-5 col-sm-5 col-xs-12" src="image/google.jpg"/></a>
                </div>
             </div>
       </div>
        <h6 class="pt15 pb25 text-uppercase c_wit f_s13 text-center">SIGN IN WITH SOCIAL MEDIA</h6>
  </div>-->
  <div style="background-color:#333; height:auto; width:100%; position:absolute; z-index:111; top:60px; display:none" id="block_signup">
      <div class="container-fluid">
      		 <h1 class="text-center text-uppercase c_wit sign_hed">sign up</h1>
            <!-- <h6 class="pt5 text-uppercase c_wit f_s13">SIGN UP WITH YOUR EMAIL ADDRESS</h6>-->
             <form name="signup" action="https://www.facebook.com/" onSubmit="return signForm();">
             	<div class="col-lg-12 col-sm-12 col-xs-12 row">
                	<input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="fname" type="text" placeholder="First Name"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="lname" type="text" placeholder="Last Name"/>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	<span class="col-lg-4 pl0" id="fname"></span>
                 		<span class="col-lg-4" id="lname"></span>
                    </div>
                	<input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="e_mail" type="text" placeholder="Email address"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="c_mail" type="text" placeholder="Confirm Email address"/>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	<span class="col-lg-4 pl0" style="color:red" id="e_mail"></span>
                	    <span class="col-lg-4" style="color:red" id="c_mail"></span>
                    </div>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="pass" type="password" placeholder="Passowrd"/>
                    <input class="carr_btn col-lg-4 col-sm-4 col-xs-12 mr12 mb15" name="conf_pass" type="password" placeholder="Confirm Passowrd"/>
                    <div class="col-lg-12 col-sm-12 col-xs-12 row error">
                    	 <span class="col-lg-4 pl0" style="color:red" id="pass"></span>
                 		 <span class="col-lg-4" style="color:red" id="conf_pass"></span>
                    </div>
                	<button type="submit" class="text-uppercase sign_btn" style="height:190px; position:absolute;">sign up</button>
                </div>
             </form>
             <div class="col-lg-12 col-sm-12 col-xs-12 row">
                 <span class="col-lg-4 pl0" style="color:red" id="fname"></span>
                 <span class="col-lg-4" style="color:red" id="lname"></span>
                 <span class="col-lg-4 pl0" style="color:red" id="e_mail"></span>
                 <span class="col-lg-4" style="color:red" id="c_mail"></span>
                 <span class="col-lg-4 pl0" style="color:red" id="pass"></span>
                 <span class="col-lg-4" style="color:red" id="conf_pass"></span>
             </div>
             <!--<div class="col-lg-12 col-sm-12 col-xs-12 row">
             	<div class="col-lg-4 col-sm-4 col-xs-12 pl0">
                	<p class="c_wit pt5 pull-left f_s11 pr15">Forgot Email?</p>
                    <a href="#"><p class=" mt5 c_wit pt5 f_s12 f_s11 text-uppercase">CREATE NEW ACCOUNT</p></a>
               	</div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                	<p class="c_wit pt5 pull-left pr15 f_s11 ml15">Forgot Passowrd?</p>
                    <a href="#"><p class="c_wit mt5 pt5 f_s12 f_s11 text-uppercase">Reset password</p></a>
               	</div>
             </div>-->
             <div class="col-lg-12  col-sm-12 col-xs-12 row pt35">
                <div class="col-lg-2 col-sm-2"></div>
                <div class=" col-lg-10 col-sm-10 col-xs-12">	
                    <a href="#"><img class="pr15 col-lg-5 col-sm-5 col-xs-12" src="image/facebook.jpg"/></a>
                    <a href="#"><img class="col-lg-5 col-sm-5 col-xs-12" src="image/google.jpg"/></a>
                </div>
             </div>
       </div>
        <h6 class="pt15 pb25 text-uppercase c_wit f_s13 text-center">SIGN IN WITH SOCIAL MEDIA</h6>
  </div>

<div class="col-lg-12 col-sm-12 col-xs-12 inner_banner">
	<h1>Forgot Password</h1> 
</div>

<div class="contain">
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12 col-md-offset-3" style="padding-bottom:20px">
          
            
<?php
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>New Password Generated</h1>";
      echo "<p>Your new password has been generated "
          ."and sent to the email <br>associated with your account. "
          ."<a href=\"index.php\">Main</a>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>New Password Failure</h1>";
      echo "<p>There was an error sending you the "
          ."email with the new password,<br> so your password has not been changed. "
          ."<a href=\"index.php\">Main</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<h1>Forgot Password</h1>
A new password will be generated for you and sent to the email address<br>
associated with your account, all you have to do is enter your
username.<br><br>
<?php echo $form->error("user"); ?>


<form role="form" method="post" action="process.php">
                            <fieldset>
                                <div class="form-group">
         <input type="text" class="form-control" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>" placeholder="Username">                                </div>
                               
                                <input type="hidden" name="subforgot" value="1">
<input type="submit" value="Get New Password" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>

<?php
}
?>
</div>
</div>
</div> 

</div>           
  
</div>       
    
   
            
        
<?php
include('footer.php');
?>