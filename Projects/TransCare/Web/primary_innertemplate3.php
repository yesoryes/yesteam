<?php 

include("header.php");

 
$gettn = $_GET['dbname'];

$gettid = $_GET['tcid'];
//echo $gettid = $_GET['tcid'].','.$gettn = $_GET['dbname'];


if(isset($_GET['cur'])){
    $cur = $_GET['cur'];
}

$items = '';

  $date = date("Y-m-d");
          $selq = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

          $fetselq = mysql_fetch_array($selq);

          $linkId1 = $fetselq['id'];
          //echo "SELECT * FROM `primary_template3_event` WHERE tl3_id = '$linkId1'";
          $getevent1 = mysql_query("SELECT * FROM `primary_template3_event` WHERE tl3_id = '$linkId1'");
         
          //$items = array();
          while($fetcgetevent1 = mysql_fetch_array($getevent1)){
              $items .= date('d-F', strtotime($fetcgetevent1['date'])).':'.$fetcgetevent1['date'].',';
            
          }
         
           $event_date = substr($items, 0, -1);
           
        // $event_dates = explode(',', $event_date);

         $Event_count = substr_count($event_date  , ',');

$getLogo = mysql_query("SELECT * FROM site_setting WHERE s_id = 1");
$fetLogo = mysql_fetch_array($getLogo);


$getdataquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$getvalue= mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");

$gettitle = mysql_query("SELECT title FROM ".$gettn." WHERE template_content_id = '$gettid'");

$count=mysql_num_rows($getdataquery);

$fetchvalue =mysql_fetch_array($getvalue);

$fetchtitle = mysql_fetch_array($gettitle);

?>



<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<style>
	#owl-demo2 .item{
        margin: 3px;
		width: 792px;
		float: left; 
    }
</style>
<div id="classEvent" style="display:none;"><img src="css/spinners/circle-simple_light.gif" /></div>
<div id="element3"></div>
<div id="wrapper1">
<div class="container">
<header class="inner_head">
<div class="btn_back"><a href="javascript:history.go(-1);" onclick="clearIframe();">Back</a></div>
<p><?php echo $fetchtitle['title']?></p>
<div class="logo1"><img src="transcareadmin/<?php echo $fetLogo['logo_image']; ?>"  height="56"  alt="Transcare"/></div>
</header>
    <div class="ip_container">
    <div  id="scr-wrapper7">
      <div class="events scroller6">

        <input type="hidden" id="hiddenmonth">
        <input type="hidden" id="hiddendate">
         <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script language="javascript">
        <!--
        // fill the month table with column headings
        function day_title(day_name){
        document.write("<TD ALIGN=center WIDTH=35>"+day_name+"</TD>")
        }
        // fills the month table with numbers
        function fill_table(month,month_length,arr)
        { 
        day=1
        // begin the new month table
        document.write("<DIV CLASS='calender slide1'><P>"+month+"   "+year+"</P>")
        document.write("<TABLE width='240'><TR>")
        
        // column headings
        day_title("S")
        day_title("M")
        day_title("T")
        day_title("W")
        day_title("T")
        day_title("F")
        day_title("S")
        // pad cells before first day of month
        document.write("</TR><TR>")
        for (var i=1;i<start_day;i++){
        document.write("<TD>")
        }
        // fill the first week of days
        for (var i=start_day;i<8;i++){
     
         if(day<10){
          
 var alval = '0'+day+'-'+month;
  
    }
    else{
       var alval = day+'-'+month;
    }
    var test="<?php echo $event_date?>";
       var todaydate="<?php echo $date ?>";
       todaydate= '"'+todaydate+'"';
var neweventvalue=test.split(",");
var codes = newCodes(neweventvalue,alval);
var ress = codes.res;
var id = codes.id;
var cc='"'+id+'"';
  var getcurrentmonth= $('#hiddenmonth').val();
            var getcurrentdate=$('#hiddendate').val();
  if(ress)
          {
         
                  if(getcurrentmonth === month)
                  {
                          if(getcurrentdate == day )
                          {

                          document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='color:rgb(65, 255, 0);border: 1px solid #fff; height:23px;' data-events="+todaydate+">"+day+"</a></TD>")
                          }
                          else
                          {
                             document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='border: 1px solid #fff; height:23px;' data-events="+cc+">"+day+"</a></TD>")
 
                          }
                        
                  } 
                  else
                  {
                     document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='border: 1px solid #fff; height:23px;' data-events="+cc+">"+day+"</a></TD>")
 
                  }
                  
          }


          else
          {
             
                    if(getcurrentmonth === month)
                    {
                              if(getcurrentdate == day )
                              {

                              document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='color:#fff;border: 1px solid #2EC33D; height:23px; background-color: #31D742;' data-events="+todaydate+">"+day+"</a></TD>")
                              }
                              else
                              {

                              document.write("<TD ALIGN=center>"+day+"</TD>")
                              }
                    } 
                  else
                  {
                   document.write("<TD ALIGN=center>"+day+"</TD>")
                  }
          }



        day++
        }
        document.write("<TR>")
        // fill the remaining weeks
        while (day <= month_length) {
          var test="<?php echo $event_date?>";
       var todaydate="<?php echo $date ?>";
       todaydate= '"'+todaydate+'"';
var neweventvalue=test.split(","); //split event dates in date-month



           
  for (var i=1;i<=7 && day<=month_length;i++)
  {
    if(day<10){
 var alval = '0'+day+'-'+month;
    }
    else{
       var alval = day+'-'+month;
    }

    
var newalval=  year+'-'+month+'-'+day;

            var getcurrentmonth= $('#hiddenmonth').val();
            var getcurrentdate=$('#hiddendate').val();


//var ress=GetResult(neweventvalue,alval);
var codes = newCodes(neweventvalue,alval);
var ress = codes.res;
var id = codes.id;
var cc='"'+id+'"';

          //if(neweventvalue.indexOf(alval)!==-1)          
          if(ress)
          {
         
                  if(getcurrentmonth === month)
                  {
                          if(getcurrentdate == day )
                          {

                          document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='color:rgb(65, 255, 0);border: 1px solid #fff; height:23px;' data-events="+todaydate+">"+day+"</a></TD>")
                          }
                          else
                          {
                             document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='border: 1px solid #fff; height:23px;' data-events="+cc+">"+day+"</a></TD>")
 
                          }
                        
                  } 
                  else
                  {
                     document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='border: 1px solid #fff; height:23px;' data-events="+cc+">"+day+"</a></TD>")
 
                  }
                  
          }


          else
          {
             
                    if(getcurrentmonth === month)
                    {
                              if(getcurrentdate == day )
                              {

                              document.write("<TD class='displayEvent'><a href='javascript:void(0);' style='color:#fff;border: 1px solid #2EC33D; height:23px; background-color: #31D742;' data-events="+todaydate+">"+day+"</a></TD>")
                              }
                              else
                              {

                              document.write("<TD ALIGN=center>"+day+"</TD>")
                              }
                    } 
                  else
                  {
                   document.write("<TD ALIGN=center>"+day+"</TD>")
                  }
          }

           
         
  
         day++
        }
         
      
        document.write("</TR><TR>")
        // the first day of the next month
        start_day=i
        }
        document.write("</TR></TABLE></DIV>")
        }
        // end hiding -->

var newCodes=function(neweventvalue,alval){
  var ress=false;
  var id=0;
  for(var i=0;i<neweventvalue.length;i++){
var cc=neweventvalue[i].split(":");
if(cc[0]==alval){
ress=true;
id=cc[1];
break;
}
}
return {
        res: ress,
        id: id
    };  
}
function getEventDetails(id)
{
	
	
  var attr=<?php echo $linkId1 ?>;

	$('#element3').css('display', 'block');
	$('#classEvent').css('display', 'block');
    var dataString = 'cont='+ id +'&att=' + attr;

 
    $.ajax({
            type: "POST",
            url: "getothereventdetailsprimary.php",
            data: dataString,
            cache: false,
            success: function (mresp) {
           $('#element3').css('display', 'none');
			   $('#classEvent').css('display', 'none');
              $('#scr-wrapper6').remove();              
             $('#newEventDetails').html(mresp);

              

         
            }
        });


}


        </script>

        <script language="javascript">

        // CAHNGE the below variable to the CURRENT YEAR
        var d = new Date();
        var n = d.getFullYear();

        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";

        var mm = month[d.getMonth()];

        var dd=d.getDate();
        today = mm+'/'+dd+'/'+n;

        year=n

        var leap = ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
        var add = 0;
        if(leap == true ){
        add = 1;
        }
        //alert(add);
        var month23 = new Array(<?='"'.$event_date.'"'?>);

        //console.log(month23[0]);
        
         //var array = [<?php $vall ?>];

         var kar = "25-April";

         //var pausecontent = [];
         //

         //var pausecontent = new Array('Hai');

         //alert(pausecontent);



        $('#hiddenmonth').val(mm);
        $('#hiddendate').val(dd);
        // first day of the week of the new year
        today= new Date(mm+"1, "+year)
        start_day = today.getDay() + 1   
        // fill_table("January",31, kar)
        // fill_table("February",28+add, kar)
        // fill_table("March",31, kar)
        // fill_table("April",30, kar)
        // fill_table("May",31, kar)
        // fill_table("June",30, kar)
        // fill_table("July",31, kar)
        // fill_table("August",31, kar)
        // fill_table("September",30, kar)
        // fill_table("October",31, kar)
        // fill_table("November",30, kar)
        // fill_table("December",31, kar)
        var monthdays = new Array();
        monthdays[0] = 31;
        monthdays[1] = 28 + add;
        monthdays[2] = 31;
        monthdays[3] = 30;
        monthdays[4] = 31;
        monthdays[5] = 30;
        monthdays[6] = 31;
        monthdays[7] = 31;
        monthdays[8] = 30;
        monthdays[9] = 31;
        monthdays[10] = 30;
        monthdays[11] = 31;
        
        var newnumber = d.getUTCMonth();
        for (var i = newnumber ; i < 12 ; i++)
        {
          
            var currrmonth = month[i];
            var monthday = monthdays[i];
            fill_table(currrmonth, monthday, kar)
            if(i == 11 )
            {
                for (var newvalue = 0 ; newvalue < newnumber ; newvalue++)
                {
                  today= new Date("January 1, "+year)
                    start_day = today.getDay() + 1 ;
                    var currrmonthnext = month[newvalue];
                    var monthdaynext = monthdays[newvalue];
                    fill_table(currrmonthnext, monthdaynext, kar)
                }
               
            }
        }
        </script>

        
      </div>
      </div>
      
      <div id="indicator2" >
        <div id="dotty2"></div>
      </div>

      <?php 

      $date = date("Y-m-d");
      //echo "SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'";
      $linkquery = mysql_query("SELECT * FROM ".$gettn." WHERE template_content_id = '$gettid'");
      $fetlinkquery = mysql_fetch_array($linkquery);

      $linkId = $fetlinkquery['id'];

      //echo "SELECT * FROM `template3event` WHERE tl3_id = '$linkId' AND date = '$date'";

      $getevent = mysql_query("SELECT * FROM `primary_template3_event` WHERE tl3_id = '$linkId' AND date = '$date'");

      $getcou = mysql_num_rows($getevent);


      ?>
      
      <div class="venue">
        <div class="venue_details" id="newEventDetails">
        
          <div id="owl-demo2" class="owl-carousel">
            
            <?php 
            if($getcou > 0){ 
            $i = 1;
            while($fetevent = mysql_fetch_array($getevent)){ ?>
            <div class="item myModalFunction"  data-fun="<?php echo $i; ?>">
              <a>
                <div class="details_1" style="width: 735px;">
                  <div class="displayelement"><?php echo date('d M', strtotime($fetevent['date'])); ?></div>
                  <h1><?php echo $fetevent['eventname']; ?></h1>
                  <p><?php echo substr($fetevent['description'], 0, 100); ?></p>
                  <ul>
                    <li class="event_time"><?php echo $fetevent['time']; ?></li>
                    <li class="event_place"><?php echo $fetevent['place']; ?></li>
                  </ul>
                </div>
                </a>
              </div>
              <?php 
              $i++;
              } ?>
              <?php }else{ ?>
            <div>There is no event on current date</div>
          <?php } ?>
            
          </div>
          
        
        </div>
        </div>
      </div>
      
    </div>
    
    <!--IMG POPUP-->
    <div class="backdrop"></div>
    <?php
    $getpopupdata = mysql_query("SELECT * FROM `primary_template3_event` WHERE tl3_id = '$linkId' AND date = '$date'");
    $j=1;
    while($fetchpopupdata=mysql_fetch_array($getpopupdata)) 
    {
    ?>
    
    <div id="myModal<?php echo $j; ?>" class="modal_box popbox">

      <div class="popup_container">
        <h1><?php echo $fetchpopupdata["eventname"] ?></h1>
        <div class="displayelement"><?php echo date('d M', strtotime($fetchpopupdata['date'])); ?></div>
        <div class="popup_text contentHolder scr_calendar2 boxscroll" style="margin: 0 0 0 200px;">
        <div class="" id="">
          <p><?php echo $fetchpopupdata["description"] ?></p>
          </div>
          <ul>
            <?php

                   if($fetchpopupdata['time'] != "")

                   {

                    ?> <li class="event_time"><?php echo $fetchpopupdata['time']?></li>

                                    <?php

                   } 

                   if($fetchpopupdata['place'] != "")

                   {

                  ?>

                  <li class="event_place"><?php echo $fetchpopupdata['place']?></li>

                  <?php

                   } ?>
          </ul>
        </div>
      </div>
      <a class="close-reveal-modal close" onclick="close_box(<?php echo $j; ?>);"><img src="img/btn_close.png" width="65" height="65"  alt=""/></a> </div>
    <?php 
    $j++;
    } ?>
    <!--End--> 
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

            <div <?php if($row['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row['template_id']?>.php?dbname=<?php echo $row['tablename']; ?>&tcid=<?php echo $row['id']; ?>&cur=<?php echo $row['id']; ?>" class="foo_btn"><?php echo $row['linkname']; ?></a></div> 
            <div class="btn_right"></div>
            </div>
        <?php
        }
        //echo "SELECT * FROM template_content WHERE parentid = '$cur'";
        
        $sel1 = mysql_query("SELECT * FROM primary_template_content WHERE parentid = '$cur'");
            while ($row1 = mysql_fetch_array($sel1)) {

            ?>  

            <div <?php if($row1['id'] == $gettid) { ?>class="btn_active" <?php } ?>><div class="btn_left"><a href="primary_innertemplate<?=$row1['template_id']?>.php?dbname=<?php echo $row1['tablename']; ?>&tcid=<?php echo $row1['id']; ?>&cur=<?php echo $cur; ?>" class="foo_btn"><?php echo $row1['linkname']; ?></a></div>  
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

  <script type="text/javascript" src="js/jquery.min.js"></script> 
<script src="js/jquery.reveal.js"></script>
<script src="js/iscroll.js"></script> 
<script src="js/jquery.nicescroll.min.js"></script>  
<script src="js/jquery-nicescroll-plus.js"></script>  
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/spin.min.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>  
<script src="js/jquery.mobile-events.min.js" type="text/javascript"></script>
<script>
$(function() {
    $("#element3").introLoader();
});

function close_box(id) {
		$('.backdrop').animate({'opacity':'0'}, 300, 'linear');
		$('.backdrop, #myModal'+id).css('display','none');
		
	} 
	

$(document).ready(function() {
 
  $("#owl-demo2").owlCarousel({
		autoPlay: false,
		items : 2,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
	  });
	$(".boxscroll").niceScroll({
	
		cursorborder:"",
		  cursorcolor:"#323232",
		  boxzoom:true, 
		  touchbehavior: true,
		  preventmultitouchscrolling: false
	}); // First scrollable DIV
	$(".boxscroll").on("scrollstart",function(){
	 // $(".boxscroll").text("");
	});
	
  $(".displayEvent a").bind('tap click', function(e) {
		var id = $(this).attr('data-events');
    //var att=
		//alert(id);
		getEventDetails(id);
		 
	});
	
  $('.myModalFunction').bind('tap click', function(e) { 
	//alert("hello");
	var id = $(this).attr('data-fun');
	
		$('.backdrop').animate({'opacity':'0.5'}, 300, 'linear');
		$('.backdrop, #myModal'+id).css('display','block')
	
	 }); 
    loaded ();
    
    //fullscreen jquery
    $(".btn_back").bind('tap', function(){
          window.parent.$('body').trigger('transMain');
    });
    
    var myScroll;

    function loaded () {
     
      
      myScroll = new IScroll('#scr-wrapper7', {
        scrollX: true,
        scrollY: false,
        momentum: false,
        snap: true,
        snapSpeed: 400,
        keyBindings: true,
		click: true,
        indicators: {
          el: document.getElementById('indicator2'),
          resize: false
        }        
        
      });	  
	 
    }
    
    document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
     

});


</script>

