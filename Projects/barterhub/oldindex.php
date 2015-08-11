<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BarterHub</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/barter_logo.jpg" sizes="18x16">
<link href="css/reset.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.css.map">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css.map">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link href="css/desktop.css" type="text/css" rel="stylesheet">
<link href="css/media.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script> 
</head>
<!--<body>-->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<?php
error_reporting(0);
  session_start();

  //for submitted code
  
  if(isset($_POST['name'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $sub = $_POST['subject'];
      $desc = $_POST['description'];




      $to   = $email;
      $from = 'info@barterhub.in';
      $subject = "Contact";
     
      $headers = "From: " . strip_tags($from) . "\r\n";
      $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
      $headers .= "CC: info@phpgang.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


      $message = '<html><body>';
 
      $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
       
      $message .= "<tr><td>BARTER HUB</td></tr>";
       
      $message .= "<tr><td colspan=2>Dear ".$name.",<br /><br />We thank you for contact barterhub.</td></tr>";
       
      $message .= "<tr><td colspan=2 font='colr:#999999;'>".$desc."</td></tr>"; 
       
      $message .= "</table>";
       
      $message .= "</body></html>";

      //Mail send to user

      if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
      
      $msg="<span class='error_form error'>The Validation code does not match!</span>";
      
      }else{
        mail($to, $subject, $message, $headers);
        $msg = "<span class='' style='color:green;margin-bottom:10px;'>Your message has been send successfully</span>";
        
         $_POST['name'] = "";
      $_POST['email'] = "";
      $_POST['subject'] = "";
      }


  }

?>



<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
  <div class="container">
    <div class="social_sites">
      <ul>
        <li><a href="#" class="fb"></a></li>
        <li><a href="#" class="twitter"></a></li>
        <li><a href="#" class="google"></a></li>
      </ul>
    </div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
             <div class="logo">
                <a class="navbar-brand" href="#"><img src="images/barter_logo.jpg" alt=""/></a>
             </div>
      </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right nav_menu nav_bar_menu">
        <li><a class="page-scroll" href="#home">Home</a></li>
        <li><a class="page-scroll" href="#about">About</a></li>
        <li><a class="page-scroll" href="#appfeature">App Features</a></li>
        <li><a class="page-scroll" href="#whybarter">Why barter</a></li>
        <li><a class="page-scroll" href="#charity">Barter for charity</a></li>
        <li><a class="page-scroll" href="#faq">Faq</a></li>
        <li><a class="page-scroll" href="#contact">Contact us</a></li>
      </ul>
    </div>
  </div>
</div>
<!--MENU SECTION END-->
<div id="home" class="row center">
  <ul class="banner_images">
    <li class="item active">
      <div class="container_banner_text">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Life is a reciprocal <sup><img src="images/exchange.png" width="269" height="82"  alt=""/></sup>.</h1>
          <h1>to move forward, you have to give back.</h1>
          <p class="byline">~Opera Winfrey</p>
          <div class="google_play"><a href="#"></a></div>
          <div class="comming_soon">[Comming soon...]</div>
        </div>
      </div>
    </li>
  </ul>
</div>
<div id="about" class="barter_hub">
  <div class="container">
    <div class="row center">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>About <span>Barter Hub</span></h1>
        <p><sup><img src="images/quot.png" width="27" height="24" alt=""/></sup> We are an online product exchange platform. Currently only bartering mobile phones and charity                      items. <br>
          The service is available <span>only in Mumbai.</span></p>
      </div>
    </div>
  </div>
</div>
<div id="appfeature" class="app_features">
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>App <span>Features</span></h1>
        <ul class="diamond-grid">
          <li> 
            <div class="flip">
                <div class="card">
                    <div class="face front rotateRight">
                        <div class="rotateLeft">
                            <img src="images/app_ui.png" width="63" height="88"  alt=""/>
                            <p>Easy to Use UI</p>
                        </div>
                    </div>
                    <div class="face back rotateRight"> 
                        <div class="rotateLeft">
                            <p>A simple user interface enables you to exchange your products easily.</p>
                        </div>
                    </div>
                </div>
            </div>
          </li>
          <li> 
            <div class="flip">
                <div class="card">
                    <div class="face front rotateRight">
                        <div class="rotateLeft">
                            <img src="images/app2.png" width="82" height="72"  alt=""/>
                            <p>Product Listing</p>
                        </div>
                    </div>
                    <div class="face back rotateRight"> 
                        <div class="rotateLeft">
                            <p>Huge range of products listed for you to exchange.</p>
                        </div>
                    </div>
                </div>
            </div>
          </li>
          <li> 
            <div class="flip">
                <div class="card">
                    <div class="face front rotateRight">
                        <div class="rotateLeft">
                            <img src="images/app3.png" width="82" height="94"  alt=""/>
                            <p>About You</p>
                        </div>
                    </div>
                    <div class="face back rotateRight"> 
                        <div class="rotateLeft">
                            <p>Edit and update your profile. View your listing and requests for exchange. </p>
                        </div>
                    </div>
                </div>
            </div>
          </li>
          <li> 
            <div class="flip">
                <div class="card">
                    <div class="face front rotateRight">
                        <div class="rotateLeft">
                            <img src="images/app4.png" width="77" height="95"  alt=""/>
                            <p>Wallet</p>
                        </div>
                    </div>
                    <div class="face back rotateRight"> 
                        <div class="rotateLeft">
                            <p>Encash your barter points. Pay for the difference in value of the product. Buy barter points. All the activities can be completed without hassle.</p>
                        </div>
                    </div>
                </div>
            </div>
          </li>
          <li> 
            <div class="flip">
                <div class="card">
                    <div class="face front rotateRight">
                        <div class="rotateLeft">
                            <img src="images/app_ui.png" width="63" height="88"  alt=""/>
                            <p>Customer Service</p>
                        </div>
                    </div>
                    <div class="face back rotateRight"> 
                        <div class="rotateLeft">
                            <p>Available 24*7 for all your queries via email, phone, what’s app & twitter.</p>
                        </div>
                    </div>
                </div>
            </div>
          </li>          
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="whybarter" class="why_barter">
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Why <span>Barter?</span></h1>
        <ul class="barter_services">
          <li>
            <div class="services_text">
              <h4>Exchange Options</h4>
              <p>Users can exchange their products with any other listed product with mutual consent.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Secure</h4>
              <p>All the monetary transactions happen via Barter Hub, hence 0% probability of any scam.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Genuine Postings</h4>
              <p>All the postings are monitored. </p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Visible Dealer Badge</h4>
              <p>Dealers will have a separate badge; this will allow users to easily identify dealers.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>No Spam</h4>
              <p>All accounts are verified when signing up and monitored periodically.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Contact Security</h4>
              <p>Contact details are visible only if you accept the invitation from the opposite user.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Deletion</h4>
              <p>Hassle free removal of your postings.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="charity" class="barter_charity">
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Barter <span>for Charity</span></h1>
        <p>Want to exchange your used clothes, furniture or any other product with smiles and blessings, this is the place. It allows you to donate your items to the closest NGO,                             orphan house, old age home or other non-profit organizations. You can also donate using your Barter Points. Barter Hub neither charges you nor the charity houses for any of                           these transactions.</p>
      </div>
    </div>
  </div>
</div>
<div id="faq" class="faq">
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Frequently <span>Ask Questions</span></h1>
        <ul>
          <li id="3d_container1"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Why Barter?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Bartering is the oldest and the noblest method of trading. It appreciates your product and gives it self-worth. 
                      It reduces your cash dependency while giving you a product of your choice.</p>
                      <a href = "javascript:void(0)"  onclick="myFunction1()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li id="3d_container2"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>How does this work:</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Once you upload your product for exchange, you will have to give it a valuation in Barter points. (1 barter point = 1 INR) You can now choose the                                       item from the product listing and send a request for exchange. Once the opposite user accepts the request you can get connected to him and                                         initiate the exchange of the product.</p>
                    <a href = "javascript:void(0)"  onclick="myFunction2()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
            </li>
          <li id="3d_container3">  
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>What if there is a difference in the value of product? Do I have to pay in cash?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>To avoid conflicts between the parties, we don’t advice any upfront cash payment. You should buy barter points, which you can transfer to the                                               other party. The other party can encash the barter points only after 7 days. This allows you to return the product in case there are any                                      issues within 7 days.</p>
                    <a href = "javascript:void(0)"  onclick="myFunction3()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
             </li>
          <li id="3d_container4">  
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Are there any charges for buying barter points?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>No</p>
                    <a href = "javascript:void(0)"  onclick="myFunction4()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
            </li>
          <li id="3d_container5"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Are there any charges for enchasing barter points?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>No</p>
                    <a href = "javascript:void(0)"  onclick="myFunction5()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
           </li>
          <li id="3d_container6"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Do I have to pay Barter Hub for listing my products? </p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>No</p>
                    <a href = "javascript:void(0)"  onclick="myFunction6()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
           </li>
          <li id="3d_container7"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Can I encash my barter points anytime?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>You can encash you barter points only after 7 days from when you received the points or bought it.</p>
                    <a href = "javascript:void(0)"  onclick="myFunction7()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
         </li>
          <li id="3d_container8"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Will the money directly come to my bank account?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Yes, the money will be deposited directly in the bank account provided by you.</p>
                    <a href = "javascript:void(0)"  onclick="myFunction8()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li id="3d_container9"> 
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Do I have to deliver my product?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>You can have a mutual arrangement with the other party for logistics.</p>
                    <a href = "javascript:void(0)"  onclick="myFunction9()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
            </li>
          <li id="3d_container10">  
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>How does barter for charity works?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Barter for charity allows you to donate any item to the closest possible Non-profit organizations like NGO, Orphan Houses, Old age homes, etc…                                                                         You can either deliver the items yourself or ask the organization for pick up. Barter Hub doesn’t charge you for the exchange.</p>
                     <a href = "javascript:void(0)"  onclick="myFunction10()" class="close_3dContainer"><img src="images/close.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
           </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="contact" class="git">
  <div class="container">
    <div class="row center">
      <h1>Get <span>In Touch</span></h1>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <form method="post" action="" role="form" class="errormessage bor-rad"  id="contactForm" name="contactForm">
        <!-- Form sumbmitted success message -->
         <?php if(isset($msg)){
           echo $msg;
          } ?>
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="<?php if(isset($_POST['subject'])){ echo $_POST['subject']; } ?>">
          </div>
          <div class="input-group">
            <textarea class="form-control custom-control" id="description" name="description" style="resize:none;height: 170px;"></textarea>
          </div>
          <div style="text-align: left;" class=""><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="height: 49px;margin-top: 8px;margin-bottom: 10px;"><a style="color:#BBD1FC;" class="rCaptcha" href="javascript:void(0)" onclick="refreshCaptcha();"><img src="images/refresh.png"></a>
          <div class="form-group">
          <input type="hidden" name="get_auto_code" id="autoGenerator" />
          <input id="code" class="form-control" value="" type="text" name="captcha_code" placeholder="" />
          </div>
          </div>
          <button type="submit" class="btn btn-default">SUBMIT</button>
        </form>
        
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <ul class="git_contact">
          <li>
            <div class="git_text">
              <p><span>Phone</span></p>
              <h4>+91 0987654321</h4>
            </div>
          </li>
          <li>
            <div class="git_text">
              <p><span>Whats app</span></p>
              <h4>+91 0987654321</h4>
            </div>
          </li>
          <li>
            <div class="git_text">
              <p><span>Twitter Page</span></p>
              <h4>barterhub@mumbai</h4>
            </div>
          </li>
        </ul>
        <div class="facebook_page">
          <div class="fb-page" data-href="https://www.facebook.com/behindwoods" data-width="376" data-height="230" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <ul class="footer_text">
          <li>
            <a href="#" onclick="lightbox_open();">Site Map</a>
                <div id="light">
                  <a href = "javascript:void(0)"  onclick="lightbox_close()" class="close_box"><img src="images/btn_close.png" alt=""/></a>
                    <h1>Site <span>Map</span></h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                    numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam.</p>
                 </div>
                <div id="fade" onClick="lightbox_close();">
                </div>
          </li>
          <li> <a href="#" onclick="lightbox_open1();">Legal Disclaimer</a>
              <div id="light1">
                  <a href = "javascript:void(0)"  onclick="lightbox_close1()" class="close_box1"><img src="images/btn_close.png" alt=""/></a>
                    <h1>Legal <span>Disclaimer</span></h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                    numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam.</p>
                 </div>
                <div id="fade1" onClick="lightbox_close1();">
                </div>
          </li>
          <li> <a href="#" onclick="lightbox_open2();">Privacy Policy</a>
              <div id="light2">
                  <a href = "javascript:void(0)"  onclick="lightbox_close2()" class="close_box2"><img src="images/btn_close.png" alt=""/></a>
                    <h1>Privacy <span>Policy</span></h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                    numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam.</p>
                 </div>
                <div id="fade2" onClick="lightbox_close2();">
                </div>
          </li>
        </ul>
        <p>Copyright &copy; 2015 BarterHub.  All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>


<!-- FAQ 3D Flip Close box -->


<script>
   function myFunction1()
  {
    document.getElementById('3d_container1').style.display='none'; 
    }
  function myFunction2()
  {
    document.getElementById('3d_container2').style.display='none'; 
    }
  function myFunction3()
  {
    document.getElementById('3d_container3').style.display='none'; 
    }
  function myFunction4()
  {
    document.getElementById('3d_container4').style.display='none'; 
    }
  function myFunction5()
  {
    document.getElementById('3d_container5').style.display='none'; 
    }
  function myFunction6()
  {
    document.getElementById('3d_container6').style.display='none'; 
    }
  function myFunction7()
  {
    document.getElementById('3d_container7').style.display='none'; 
    }
  function myFunction8()
  {
    document.getElementById('3d_container8').style.display='none'; 
    }
  function myFunction9()
  {
    document.getElementById('3d_container9').style.display='none'; 
    }
  function myFunction10()
  {
    document.getElementById('3d_container10').style.display='none'; 
    }
</script>

<!--light Box-->
<script>
window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}
</script>


<script>
function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';  
}
function lightbox_close(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
}
function lightbox_open1(){
    window.scrollTo(0,0);
    document.getElementById('light1').style.display='block';
    document.getElementById('fade1').style.display='block';  
}
function lightbox_close1(){
    document.getElementById('light1').style.display='none';
    document.getElementById('fade1').style.display='none';
}
function lightbox_open2(){
    window.scrollTo(0,0);
    document.getElementById('light2').style.display='block';
    document.getElementById('fade2').style.display='block';  
}
function lightbox_close2(){
    document.getElementById('light2').style.display='none';
    document.getElementById('fade2').style.display='none';
}
</script>

<!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
    
    <script>
    $( document ).ready(function() {
      
      /*$('.flip').click(function(){
        $(this).find('.card').addClass('flipped').mouseleave(function(){
          $(this).removeClass('flipped');
        });
        return false;
      });*/
      
      $(".flip").hover(function(){
        $(this).find('.card').addClass('flipped');
        }, function(){
        $(this).find('.card').removeClass('flipped');
      });
      //Focus after form submitted
      <?php if(isset($msg)){ ?>
        window.location.hash = '#contact';
      <?php } ?>
      
    });
    function refreshCaptcha(){
      // alert(w,h,c);

      // var dataString = 'width='+ w+'&height='+h+'&char='+c;
      // $.ajax({
      //     type: "POST",
      //     url: "CaptchaSecurityImages.php",
      //     data: dataString,
      //     cache: false,
      //     success: function (mresp) {
      //        $('#changecaptcha').attr('src',mresp);
   
      //     }
      // });

      var img = document.images['captchaimg'];
      img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
    $(document).ready(function(){
      var code = $('#ecode').text();
      $('#autoGenerator').val(code);
    });
  </script>
    
</body>
</html>