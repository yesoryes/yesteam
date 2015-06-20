
<?php 
    include("header.php");
?>
<link href="css/reset.css" type="text/css" rel="stylesheet">
<link href="css/introLoader.css" type="text/css" rel="stylesheet">
<style type="text/css">
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background: black;
    }
    .wrapper {
    width: 1920px;
        height: 1080px;
    overflow: hidden;
        -webkit-transform-origin: 0 0;
        -moz-transform-origin: 0 0;
        -ms-transform-origin: 0 0;
        -o-transform-origin: 0 0;
        -transform-origin: 0 0;
    }
    .container {
width:6000px;
    }
    .container iframe, section {
        width: 1920px;
        height: 1080px;
        float:left;
        display:block;
        border: none;
		color:red;
    }
	
    
</style>

<div id="element"></div>
    <div class="wrapper">
   
        <div id="container" class="container">
        <section style="<?php echo $bgColor; ?>">
            <iframe id="idle" src="idle.php" class=""></iframe>
            </section>
            <section style="<?php echo $bgColor; ?>">
            <iframe id="dashboard" src="dashboard.php" class="" style="<?php echo $bgColor; ?>"></iframe>
            </section>
            <section style="<?php echo $bgColor; ?>">
            <iframe id="inner-template" src="" class="" style="<?php echo $bgColor; ?>"></iframe>
            </section>
        </div>
    </div> 
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/spin.min.js"></script>
    <script type="text/javascript" src="js/jquery.introLoader.js"></script>
    <script type="text/javascript">

    $(function() {
    $("#element").introLoader();
});


        function allResize() {
            var vWidth = $('html').width();
            var vHeight = $('html').height();
            var vW = (vWidth/1920);
            var vH = (vHeight/1080);
            $('.wrapper').css({
              '-webkit-transform' : 'scale('+vW+','+vH+')',
              '-moz-transform'    : 'scale('+vW+','+vH+')',
              '-ms-transform'     : 'scale('+vW+','+vH+')',
              '-o-transform'      : 'scale('+vW+','+vH+')',
              'transform'         : 'scale('+vW+','+vH+')'
            });
        };
        allResize();

        $(window).resize(function() {
            allResize();
        });

            
   $(document).ready(function() {

            $('body').bind('transMain', function(){
				$("#dashboard").css({display: "block"});
				$("#idle").css({display: "none"});

				$(".container").animate({marginLeft: "-1920px"});
					document.getElementById('inner-template').src = "about:blank";
					
				
                
            });
getLocation();//get geolocation of the current place
$('body').bind('transInner', function(event, innerPage){
//$("#inner-template").attr('src','blank.html');

$("#idle").css({display: "none"});
$("#dashboard").css({display: "none"});
                $("#inner-template").attr('src',innerPage);
				
//$("#inner-template").css({display: "block"});
       $(".container").animate({marginLeft: "-3840px"});
                //alert(innerPage);
   });


});



    function getLocation() {
        if (navigator.geolocation)
        {
        navigator.geolocation.getCurrentPosition(showPosition);
        } 
            }

function showPosition(position) {
        var lat=position.coords.latitude;
    var longs=position.coords.longitude;
       document.cookie="latitude="+lat;
    document.cookie="longitude="+longs;
}





    </script>
 <?php 
    include("footer.php");
?>