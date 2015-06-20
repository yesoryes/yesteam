<?php 

	include("header.php");

	

	$gettn = $_GET['dbname'];

	$gettid = $_GET['tcid'];
    $cur = $_GET['cur'];

    $getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
    $fetLogo = mysql_fetch_array($getLogo);

    ?>

<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">

<?php 

$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$fetquerytab = mysql_fetch_array($getdataquery);

 ?>


<div id="elementp6"></div>
	<div id="wrapper1">

    	<div class="container"> 

        	<header class="inner_head"> 

            	<div class="btn_back"><a href="javascript:history.go(-1);">Back</a></div>

                	<p><?php echo $fetquerytab['title']; ?></p>	

            	<div class="logo1"><a href="index.html">
                <img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>"  height="56"  alt="Transcare"/></a></div>

            </header>

			<div class="ip_container">  

            	<div class="inner_content5"> 

                    <div class="inner_contentLeft contentHolder" id="scr-wrapper3">
                    	<div class="scroller">

                        <p><?php echo $fetquerytab['description']; ?></p>

                     	</div>

                    </div>

                    <div class="inner_contentRight">

                        <img src="transcareadmin/<?php echo $fetquerytab['bannerimage']; ?>" class="inner_image6" style="width:554px; height:665px;">

                    </div>                  

                </div>

                  <?php

		$getsubscreen = mysql_query("SELECT * FROM  template_content  WHERE parentid = '$gettid'");

		?>

       <!-- <footer class="foo_ip">   

        	<div class="container">

            	<div style="margin:0 0 12px; overflow: hidden;">

                	<p><a href="#" class="foo_btn active">Overview</a></p>

                    <?php

					$i=1;

					while($fetchsubscreen=mysql_fetch_array($getsubscreen))

					{

						if($fetchsubscreen['template_id'] == 1)

						{

								?>

                         <p><a href="inner-template-1.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

					}

					else if($fetchsubscreen['template_id'] == 2)

					{

						?>

                         <p><a href="inner-template-2.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

					}

					else if($fetchsubscreen['template_id'] == 3)

					{

						?>

                        <p><a href="inner-template-3.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

					}

					else if($fetchsubscreen['template_id'] == 4)

					{

					?>

                      <p><a href="inner-template-4.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

					}

					else if($fetchsubscreen['template_id'] == 5)

					{

					?>

                      <p><a href="inner-template-5.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                        <?php

					}

					else

					{

					?>

                 <p><a href="inner-template-6.php?dbname=<?php echo $fetchsubscreen['table_name']; ?>&tcid=<?php echo $fetchsubscreen['id']; ?>" class="foo_btn"><?php echo $fetchsubscreen['linkname']; ?></a></p>

                 <?php 

					}

					?>

                        <?php

						$i++;

					}

					 ?>

                </div>

            </div>

        </footer>-->

        


			</div> 

            

		</div> 
         <footer class="foo_ip">
          <div class="container">
            <div class="footer_menu">


                <?php
                
                //echo "SELECT * FROM primary_template_content WHERE id =  '$cur' ";
                $sel = mysql_query("SELECT * FROM primary_template_content WHERE id =  '$cur' ");
                $row = mysql_fetch_array($sel);
                 $getparenidcount = mysql_query("SELECT * FROM primary_template_content WHERE parentid = '$cur'");
         $getsubscreencount= mysql_num_rows($getparenidcount);
                ?>

                <?php 
                if ($cur != '' && $getsubscreencount > 0)
                {
                ?>      

                <div <?php if($row['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row['template_id']?>.php?dbname=<?php echo $row['tablename']; ?>&tcid=<?php echo $row['id']; ?>&cur=<?php echo $row['id']; ?>" class="foo_btn"><?php echo $row['linkname']; ?></a>
                </div>
                <div class="btn_right"></div>
                </div> 

                <?php
                }
                //echo "SELECT * FROM template_content WHERE parentid = '$cur'";
                
                $sel1 = mysql_query("SELECT * FROM primary_template_content WHERE parentid = '$cur'");
                while ($row1 = mysql_fetch_array($sel1)) {

                ?>  

                <div <?php if($row1['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row1['template_id']?>.php?dbname=<?php echo $row1['tablename']; ?>&tcid=<?php echo $row1['id']; ?>&cur=<?php echo $cur; ?>" class="foo_btn"><?php echo $row1['linkname']; ?></a>
                </div>
                <div class="btn_right"></div>
                </div> 

                <?php
                     
                }

                ?>




              <!-- <p><a href="#" class="foo_btn active"><?php echo $fetgetrel['linkname']; ?></a></p> -->
              
            </div>
          </div>
        </footer> 

    </div> 

    

    
    
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/spin.min.js"></script>
    <script type="text/javascript" src="js/jquery.introLoader.js"></script> 
    <script src="js/iscroll.js"></script>
    <script type="text/javascript">
$(function() {
    $("#elementp6").introLoader();
});
        $(document).ready(function() {                

            loaded ();

            /* iframe call */

            $(".btn_back").bind('tap', function(){

              window.parent.$('body').trigger('transMain');

            });
            var myScroll;
        function loaded () {
            myScroll = new IScroll('#scr-wrapper3', {
                scrollX: false,
                scrollY: true,
                momentum: false,
                keyBindings: true,
                mouseWheel: true,
                scrollbars: true,
                click: true,
            });
            
          
        }
        document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);



        });

    </script>

    

<?php 

	include("footer.php");

?>