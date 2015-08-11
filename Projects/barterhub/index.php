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
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>
<script src="js/banheight.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>
<meta name="google-site-verification" content="D9QPnBdBs5OuI0V5KAFFkM3sCoe7Nujnd6EnGTHO5xc" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63227812-1', 'auto');
  ga('send', 'pageview');

</script>

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
       
      $message .= "<tr><td colspan=2>Dear ".$name.",<br /><br /> Thank you for contacting Barter Hub. Our team will get in touch with you shortly</br></br>Cheers !!! </br></br> Barter Hub Team </td></tr>";
       
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
<nav class="navbar navbar-inverse navbar-fixed-top normal scroll-me" id="menu-section" role="navigation">
   <div class="container">
    <div class="social_sites">
      <ul>
        <li><a href="https://www.facebook.com/barterhubindia" target=_blank class="fb"></a></li>
        <li><a href="https://twitter.com/barterhub_india" target=_blank class="twitter"></a></li>
        <li><a href="https://plus.google.com/102187770521595084388/about" target=_blank class="google"></a></li>
      </ul>
    </div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
      	<img src="images/mob-menu-span.png" alt="">
      </button>
      <div class="logo"> <a class="navbar-brand" href="#"><img src="images/barter_logo.jpg" alt="Barter Hub" /></a> </div>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right nav_menu nav_bar_menu">
        <li><a class="page-scroll" href="#home"><strong>Home Page</strong></a></li>
        <li><a class="page-scroll" href="#about"><strong>About</strong></a></li>
        <li><a class="page-scroll" href="#appfeature"><strong>App Features</strong></a></li>
        <li><a class="page-scroll" href="#whybarter"><strong>Why Barter</strong></a></li>
        <li><a class="page-scroll" href="#charity"><strong>Barter for Charity</strong></a></li>
        <li><a class="page-scroll" href="#faq"><strong>Faq's</strong></a></li>
        <li><a class="page-scroll" href="#contact"><strong>Contact us</strong></a></li>
      </ul>
    </div>
  </div>
</nav>
<!--MENU SECTION END-->
<div id="home" class="row center banner-home" style="overflow:hidden">
  <ul class="banner_images">
    <li class="item active">
      <div class="container_banner_text">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="google_play"><a href="#"></a></div>
          <h1>If I had my life to live over again, I would elect to be a trader of goods rather than a student of science. I think barter is a noble thing.</h1>
          <p class="byline">-Albert Einstein</p> 
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
        <p><sup><img src="images/quot.png" width="27" height="24" alt=""/></sup> We are an android app, enabling users to exchange their used mobile phones, electronics - laptops & tablets, Books and Games - Xbox &amp; PSP  <br> The service is currently available <span> in Mumbai.</span></p>
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
                    <p>A simple user interface enables you to list and exchange products easily.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="flip">
              <div class="card">
                <div class="face front rotateRight">
                  <div class="rotateLeft"> <img src="images/app2.png" width="82" height="72"  alt=""/>
                    <p>Product Listing</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p>A wide range of products listed by other users and dealers for you to choose from.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="flip">
              <div class="card">
                <div class="face front rotateRight">
                  <div class="rotateLeft"> <img src="images/app3.png" width="82" height="94"  alt=""/>
                    <p>Profile</p>
                  </div>
                </div>
                <div class="face back rotateRight">
                  <div class="rotateLeft">
                    <p>Edit and update your profile. View and manage your listing . </p>
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
                    <p>Available 24*7 for all your queries via email &amp; twitter.</p>
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
        <h1>Why <span>Barter Hub?</span></h1>
        <ul class="barter_services">
          <li>
            <div class="services_text">
              <h4>Product Appreciation</h4>
              <p>Selling used products; especially electronics is always heartbreaking as the price offered in most cases is embarrassing. Exchanging allows you to get appropriate value of your product.</p>
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
              <h4>Genuine users</h4>
              <p>OTP is compulsory for users to register. This ensures that most of the users on the platform are genuine.</p>
            </div>
          </li>
          <li>
            <div class="services_text">
              <h4>Genuine Postings</h4>
              <p>All the postings are monitored.</p>
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
        <p>Want to exchange your used clothes, furniture or any other product with smiles and blessings, this is the place. It allows you to donate your items to the closest NGO, orphan house, old age home or other non-profit organizations. Items needed by these organizations are also listed in some cases, you can donate or sponsor accordingly. Barter Hub neither charges you nor the organizations of using its platform.</p>
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
                    <p>Once you upload your product for exchange, you will have to give it a valuation in Barter points. (1 barter point = 1 INR) You can now choose the item from the product listing and send a request for exchange. Once the opposite user accepts the request you can get connected to him and initiate the exchange of the product.</p>
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
                    <p>Based on mutual consent both the parties are advised to conclude the manner in which they would like to clear the difference in value.  
*Barter Hub holds no responsibility in case of disputes.</p>
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
                    <p>Do I have to pay Barter Hub for listing my products?</p>                  
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
              <p><span>What’s App</span></p>
              <h4>+91 9930054979</h4>
            </div>
          </li>
          <li>
            <div class="git_text">
              <p><span>Twitter ID</span></p>
              <h4>barterhub_india</h4>
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
          <!--<li> <a href="sitemap.xml" onclick="lightbox_open();">Site Map</a>
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
          </li> -->
          <li> <a href="#" onclick="lightbox_open1();">Legal Disclaimer</a>
            <div id="light1"> <a href = "javascript:void(0)"  onclick="lightbox_close1()" class="close_box1"><img src="images/btn_close.png" alt=""/></a>
              <h1>Legal <span>Disclaimer</span></h1>
              <p>The information contained in this website is for general information purposes only. The information is provided by Barter Hub and while we endeavor to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.
</p>
<p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p>
<p>Through this website you are able to link to other websites which are not under the control of Barter Hub. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
</p>
<p>Every effort is made to keep the website up and running smoothly. However, Barter Hub takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</p>
            </div>
            <div id="fade1" onClick="lightbox_close1();"> </div>
          </li>
          <li> <a href="#" onclick="lightbox_open2();">Privacy Policy</a>
            <div id="light2"> <a href = "javascript:void(0)"  onclick="lightbox_close2()" class="close_box2"><img src="images/btn_close.png" alt=""/></a>
              <h1>Privacy <span>Policy</span></h1>
              <p>This policy explains how we, Barter Hub, a brand of Barter Hub Technologies Pvt. Ltd., use your personal information which you provide to us when using our platform, including but not limited to our mobile applications (apps).  
</p>
<h3 align="Center">Information</h3>
<p>
We collect personal information from you when you post your products on our mobile applications (apps). We also collect information when you complete any customer survey.</p>

<h3 align="Center">Mobile Device IDs</h3>
<p>
If you’re using our Service on mobile, we may use mobile device IDs (the unique identifier assigned to a device by the manufacturer), instead of cookies, to recognize you. We may do this to store your preferences and track your use of the Applications. Unlike cookies, device IDs cannot be deleted. Ad companies may use device IDs to track your use of the Applications, track the number of ads displayed, measure ad performance and display ads that are more relevant to you. Analytics companies may use device IDs to track information about usage of the Applications. 
</p>

<h3 align="Center">How will we use the information we collect from you?</h3>
<p>
Information that we collect from you is used to manage your account. We may also use your information to email you about other products or services that we think may be of interest to you. In process of servicing you we may send your information to credit reference and fraud prevention agencies. From time to time we may send your information to third parties which we consider may have goods or services which are of interest to you. If you do not wish to be contacted by third parties please email us at query@barterhub.in  </p>


<h3 align="Center">Access to your information</h3>
<p>
You have a right to request a copy of the information we hold on you at any time. Please email us if you would like to receive a copy of this information – query@barterhub.in There will be a small charge for processing this request.  </p>


<h3 align="Center">Other mobile applications</h3>
<p>
Our apps may have links to other website/apps. This privacy policy only applies to this mobile application. You should therefore read the privacy policies of the other website/apps when you are using those website/apps. </p>


<h3 align="Center">Contacting us</h3>
<p>
If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at: privacy@barterhub.in
.</p>
            </div>
            <div id="fade2" onClick="lightbox_close2();"> </div>
          </li>
        </ul>
        <p>Copyright &copy; 2015 Barter Hub Technologies Pvt. Ltd.  All rights reserved.</p>
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