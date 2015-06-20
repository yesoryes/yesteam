<?php 

  include("header.php");

  

  $gettn = $_GET['dbname'];

  $gettid = $_GET['tcid'];

?>

<link href="css/main.css" rel="stylesheet" type="text/css">

<link rel="Stylesheet" type="text/css" href="css/carousel.css">



<?php 

$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$fetquerytab = mysql_fetch_array($getdataquery);

 ?>

<div id="wrapper1">
  <div class="container">
  
    <header class="inner_head">
      <div class="btn_back"><a href="#">Back</a></div>
      <p><?php echo $fetquerytab['title']; ?></p>
      <div class="logo1"><img src="img/logo1.png" width="147" height="56"  alt="Transcare"/></div>
    </header>
    
    <div class="ip_container">
      <div class="inner_content">
        <h1><?php echo $fetquerytab['title']; ?></h1>
        <div id="scr-wrapper1">
          <div class="ip_content1 scroller" id="scroller1">
            <p class="ip_img"><img src="transcareadmin/<?php echo $fetquerytab['topimage']; ?>" width="446" height="407"  alt=""/></p>
            <div class="ip_content2 content2"> 
              <p class="ip_para_margin"><?php echo $fetquerytab['description']; ?>.</p>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="vertical_caurosel">
      <div id="scr-wrapper" class="scr-wrapper">
        <ul id="scroller" class="scroller">
                <?php 

 //echo "SELECT * FROM template1_carousel WHERE template_content_id = '$gettid'";

  $getCar = mysql_query("SELECT * FROM template1_carousel WHERE template_content_id = '$gettid'");

  while($fetchCar = mysql_fetch_array($getCar)){

  ?>
          <li>
            <div class="ip2_caurosel"><a href="#"  data-reveal-id="myModal">

              <p class="img_caurosel"><img src="transcareadmin/<?php echo $fetchCar['template1_rightimages'];?>"  width="117" height="144"  alt=""/></p>
              <p><?php echo $fetchCar['temp1imgcaption'];?></p>
              </a> </div>
          </li>
          <?php
        }
        ?>

        </ul>
      </div>
    </div>
    
    <!--PopUP Content-->
    <div id="myModal" class="reveal-modal">
      <div class="popup_container">
        <h1>Lorem Ipsum</h1>
        <div id="scr-wrapper8">
        <div class="popup_text scroller">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        </div>
      </div>
      <a class="close-reveal-modal"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
    <div id="myModal1" class="reveal-modal img_popup">
      <div class="popup_container">
        <h1>Lorem Ipsum</h1>
        <div class="contentHolder"  id="boxscroll1">
          <p><img src="img/img_popup1.jpg" width="640" height="500"  alt=""/></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
      </div>
      <a class="close-reveal-modal"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
    <div id="myModal2" class="reveal-modal video_popup">
      <div class="popup_container video_popup">
        <h1>Lorem Ipsum</h1>
        <div class="">
          <p><img src="img/videoImage.jpg"  alt=""/></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
      </div>
      <a class="close-reveal-modal"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
  </div>
</div>
   <?php

    $getsubscreen = mysql_query("SELECT * FROM  template_content  WHERE parentid = '$gettid'");

    $getlinkname=mysql_query("SELECT * FROM  template_content  WHERE parentid = 0");

  $fetchlinkname=mysql_fetch_array($getlinkname);

    ?>
<footer class="foo_ip">
  <div class="container">
    <div style="margin:0 0 12px; overflow: hidden;">
      <p><a href="#" class="foo_btn active"><?php echo $fetchlinkname['linkname'] ?></a></p>
      <?php

          $i=1;

          while($fetchsubscreen=mysql_fetch_array($getsubscreen))

          {

            if($fetchsubscreen['template_id'] == 1)

            {

                ?>

                         <p><a href="inner-template-1.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 2)

          {

            ?>

                         <p><a href="inner-template-2.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 3)

          {

            ?>

                        <p><a href="inner-template-3.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 4)

          {

          ?>

                      <p><a href="inner-template-4.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else if($fetchsubscreen['template_id'] == 5)

          {

          ?>

                      <p><a href="inner-template-5.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

          }

          else

          {

          ?>

                 <p><a href="inner-template-6.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&scid=<?php echo $fetchsubscreen['parentid']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                 <?php 

          }

          ?>

                        <?php

            $i++;

          }

           ?>
    </div>
  </div>
</footer>
</div>


<script type="text/javascript" src="js/jquery.min.js"></script>  
<script src="js/jquery.reveal.js"></script>
<script src="js/iscroll.js"></script> 
<script>
$(document).ready(function () {

  loaded(); //iscroll
  
  /* iframe call */
  $(".btn_back").click(function(){
    window.parent.$('body').trigger('transMain');
  });

  
  var myScroll;
  function loaded () {
    
    myScroll = new IScroll('#scr-wrapper', {
      scrollX: false,
      scrollY: true,
      momentum: false,
      snap: true,
      snapSpeed: 400,
      keyBindings: true,
      mouseWheel: true,
      scrollbars: true,
      click: true,
    });
    
    myScroll = new IScroll('#scr-wrapper1', {
      scrollbars: true,
      mouseWheel: true,
      interactiveScrollbars: true,
      shrinkScrollbars: 'scale',
      //fadeScrollbars: true,
      click: true,
    });
    myScroll = new IScroll('#scr-wrapper8', {
      scrollbars: true,
      mouseWheel: true,
      interactiveScrollbars: true,
      shrinkScrollbars: 'scale',
      //fadeScrollbars: true,
      click: true,
    });
  }
  document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

});

</script>

<?php 

include("footer.php");

?>