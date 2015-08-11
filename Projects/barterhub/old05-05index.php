<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BarterHub</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/faviBarterHub.png" sizes="16x13">
<link href="css/reset.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link href="css/desktop.css" type="text/css" rel="stylesheet">
<link href="css/media.css" type="text/css" rel="stylesheet">
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
       
      $message .= "<tr><td colspan=2>Dear ".$name.",<br /><br />Thank you for contacting us.<br /> Our representative will get in touch with you shortly. <br /> Happy Bartering !!! <br /> Cheers, <br />BARTER HUB</td></tr>";
       
     // $message .= "<tr><td colspan=2 font='colr:#999999;'>".$desc."</td></tr>"; 
       
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
<nav class="navbar navbar-inverse navbar-fixed-top normal scroll-me" id="menu-section" role="navigation">
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
      <div class="logo"> <a class="navbar-brand" href="#"><img src="images/barter_logo.jpg" alt=""/></a> </div>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right nav_menu nav_bar_menu">
        <li><a class="page-scroll" href="#home">HOME</a></li>
        <li><a class="page-scroll" href="#about">ABOUT</a></li>
        <li><a class="page-scroll" href="#appfeature">APP FEATURES</a></li>
        <li><a class="page-scroll" href="#whybarter">WHY BARTER</a></li>
        <li><a class="page-scroll" href="#charity">BARTER FOR CHARITY</a></li>
        <li><a class="page-scroll" href="#faq">FAQ</a></li>
        <li><a class="page-scroll" href="#contact">CONTACT US</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--MENU SECTION END-->
<div id="home" class="row center">
  <ul class="banner_images">
    <li class="item active">
      <div class="container_banner_text">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="google_play"><a href="#"></a></div>
          <h1>If I had my life to live over again, I would elect to be a trader of goods rather than a student of science. I think barter is a noble thing.</h1>
          <p class="byline">- Albert Einstein</p>
          <div class="coming_soon">[Coming soon...]</div>
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
        <p><sup><img src="images/quot.png" width="27" height="24" alt=""/></sup> We are an online product exchange platform. Currently only bartering mobile phones and charity items. <br>
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
                  <div class="rotateLeft"> <img src="images/app_ui.png" width="63" height="88"  alt=""/>
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
                  <div class="rotateLeft"> <img src="images/app2.png" width="82" height="78"  alt=""/>
                    <p>Product Listing</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p></br>Huge range of products listed for you to exchange.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="flip">
              <div class="card">
                <div class="face front rotateRight">
                  <div class="rotateLeft"> <img src="images/app3.png" width="82" height="90"  alt=""/>
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
                  <div class="rotateLeft"> <img src="images/app4.png" width="75" height="90"  alt=""/>
                    <p>Wallet</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p>Encash your barter points.Pay for the difference in value of the product.Buy barter points.All the activities can be completed without hassle.</p>
                  </div>
                </div>
              </div>
            </div>
          </li> 
          <li>
            <div class="flip">
              <div class="card">
                <div class="face front rotateRight">
                  <div class="rotateLeft"> <img src="images/app_charity.png" width="63" height="88"  alt=""/>
                    <p>Barter for Charity</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p>Exchange your used items with happiness by donating them at the closest Non - profit house.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="flip">
              <div class="card">
                <div class="face front rotateRight">
                  <div class="rotateLeft"> <img src="images/app_ui.png" width="63" height="88"  alt=""/>
                    <p>Customer Service</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p>Available 24*7 for all your queries via email, phone, what’s app &amp; twitter.</p>
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
              <p>Can exchange your products locally. All accounts are verified when signing up and monitored periodically. Users can exchange their products with any other listed product only with mutual consent.</p>
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
              <p>We don’t spam your email or phone.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Contact Security</h4>
              <p>Contact details are visible only if you accept the invitation from the opposite user. Hence no fake calls.</p>
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
        <blockquote>&quot;Buy laughter with tears and you'll be rich forever.&quot;</blockquote>
        <p class="byline2">&ndash; Michael Bassey Johnson
          </h3>
        <p>Want to exchange your used clothes, furniture or any other product with smiles and blessings, this is the place. It allows you to donate your items to the closest NGO,                             orphan house, old age home or other non-profit organizations. You can also donate using your Barter Points. Barter Hub neither charges you nor the charity houses for any of                           these transactions.</p>
      </div>
    </div>
  </div>
</div>
<div id="faq" class="faq">
  <div class="row center">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Frequently <span>Asked Questions</span></h1>
        <ul>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Is it compulsory for me to buy barter points to pay the difference in price of product?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>No it isn’t compulsory. However, it’s advisable to transact using barter points as it gives you a chance to evaluate the product and solve issues (if any) amicably.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>What is the minimum and maximum barter points that I can buy?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Minimum 100 AND Maximum of 9999 can be bought.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>What are the minimum and maximum barter points that I can encash?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Minimum 100 AND Maximum of 9999 barter points can be encashed</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div id="f1_container">
              <div id="f1_card" class="shadow">
                <div class="front face">
                  <div class="text_mid">
                    <p>Can I buy barter points without listing any product?</p>
                  </div>
                </div>
                <div class="back face">
                  <div class="text_mid">
                    <p>Yes you can.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
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
              <h4>+91 9930054979</h4>
            </div>
          </li>
          <li>
            <div class="git_text">
              <p><span>Whats app</span></p>
              <h4>+91 9930054979</h4>
            </div>
          </li>
          <li>
            <div class="git_text">
              <p><span>Twitter Page</span></p>
              <h4>barter_hub</h4>
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
          <li> <a href="#" onclick="lightbox_open();">Site Map</a>
            <div id="light"> <a href = "javascript:void(0)"  onclick="lightbox_close()" class="close_box"><img src="images/btn_close.png" alt=""/></a>
              <h1>Site <span>Map</span></h1>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam.</p>
            </div>
            <div id="fade" onClick="lightbox_close();"> </div>
          </li>
          <li> <a href="#" onclick="lightbox_open1();">Legal Disclaimer</a>
            <div id="light1"> <a href = "javascript:void(0)"  onclick="lightbox_close1()" class="close_box1"><img src="images/btn_close.png" alt=""/></a>
              <h1>Legal <span>Disclaimer</span></h1>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam.</p>
            </div>
            <div id="fade1" onClick="lightbox_close1();"> </div>
          </li>
          <li> <a href="#" onclick="lightbox_open2();">Privacy Policy</a>
            <div id="light2"> <a href = "javascript:void(0)"  onclick="lightbox_close2()" class="close_box2"><img src="images/btn_close.png" alt=""/></a>
              <h1>Privacy <span>Policy</span></h1>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 
                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro 
                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non 
                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam.</p>
            </div>
            <div id="fade2" onClick="lightbox_close2();"> </div>
          </li>
        </ul>
        <p>Copyright &copy; 2015 BarterHub.  All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!--- Header Slide up and down js---> 

<script>
      $(window).scroll(function() {
      if ($(document).scrollTop() > 10) {
      $('.navbar').addClass('shrink');
       $('.social_sites ul').slideUp();
       
      }
      else {
      $('.navbar').removeClass('shrink');
        $('.social_sites ul').slideDown(); 
       }
      });
</script> 
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