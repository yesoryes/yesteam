

$(document).ready(function(){





// Get Data
/*var project = [];
$('.portWarp img').each(function(index) {
	var img ="<div class='project'><div class='templates'><a href='#'><img src='"+ $('.portWarp').find('img:eq('+index+')').attr('src') +"' big='"+ $('.portWarp').find('img:eq('+index+')').attr('big') +"'></a></div><div class='templateHover'><a href='#'><img src='images/arrows.png'><h2>Website<br>Development</h2><div class='templateName'><h3>Be On The Scene</h3></div></a></div></div>";
	project.push(img);
});*/


var project = [];
$('#portfolioData ul').each(function(index) {
	var img ="<div class='project'><div class='templates'><a href='#'><img src='"+ $(this).children().eq(0).html() +"' big='"+ $(this).children().eq(1).html() +"' title='"+ $(this).children().eq(2).html() +"' caty='"+ $(this).children().eq(3).html() +"' desp='"+ $(this).children().eq(4).html() +"' link='"+ $(this).children().eq(5).html() +"'></a></div><div class='templateHover'><a href=javascript:void(0)><img src='images/arrows.png'><h2>Website<br>Development</h2><div class='templateName'><h3>Be On The Scene</h3></div></a></div></div>";
	project.push(img);
	//console.log("dd= "+$(this).children().eq(5).html());
});



function loadPort() {
	
	//Cont width
	
	var pWidth = 230; //$(".project").outerWidth(true)
	var pHeight = 203; //$(".project").outerHeight(true)

	$('.portfolio-container').css("width",$("#portfolio").width() +"px");
	$('.portfolio-container').css("height",$("#portfolio").height() +"px");
	
	var contWidth = $(".portfolio-contentArea").width()-pWidth-40;
	//$('.templateContent').css("max-width",contWidth +"px"); //foget why
	$('.templateContent').css("width",contWidth +"px");
	$('.portfolio-heading').css("width",contWidth +"px");
	$('.portfolio-footer').css("width",contWidth +"px");
	$('#screens').css("width",contWidth +"px");
	
	var contHeight = $("#portfolio").height() - $(".portfolio-header").outerHeight(true) - $(".portfolio-footer").outerHeight(true)-80;
	$('.templateContent').css("height",contHeight +"px");
	
	
	//Check count
	var perRow = parseInt($(".templateContent").width()/pWidth);
	var perCol = parseInt($(".templateContent").height()/pHeight);
	var perSlide = perRow*perCol;
	
	
	
	//Load into Array
	var proj = [];
	var tempArr = [];
	for (var i=0;i<project.length;i++) {
		tempArr.push(project[i]);
		if(tempArr.length>=perSlide) {
			proj.push(tempArr);
			tempArr=[];
		}
	};
	if(tempArr.length>0) {
		proj.push(tempArr);
		tempArr=[];
	}
	//console.table(proj);
	//console.log("proj="+proj[1].length);
	
	
	//Load images
	$('#portSlide0').remove();
	var curProj = 0;
	for (var i=0;i<proj.length;i++) {			
			var emptyTemplate = "<li class='templateContent' id='portSlide"+i+"'><div class='portWarp'></div></li>";
			$("#screens ul").append(emptyTemplate);
			for (var j=0;j<proj[i].length;j++) {
				var toApd = "#portSlide"+i+" .portWarp";
				$(toApd).append(project[curProj]);
				curProj++;
			}
	}
	
	
	

		//Call slider plug-in
		if(proj.length>1) {
			$('head').append('<link href="css/bjqs.css" type="text/css" rel="stylesheet">');
			$.getScript("http://yesoryes.co.in//tests/tmp1/bjqs-1.3.min.js", function() {
				$('#screens').bjqs({
					width       : contWidth,
					height      : contHeight,
					animduration : 350,
				  });
			});
			
		};
		
		//centering (here coz, plugin overwrite)
		$('.portWarp').css("width",(pWidth*perRow) +"px");
		$('.portWarp').css("height",(pHeight*perCol) +"px");

	

};
loadPort();

function clearPortfoio() {
	location.reload();
	/*$("#screens").html('');
	$("#screens").removeAttr('style');
	$(".portfolio-contentArea").removeAttr('style');
	$(".portfolio-heading").removeAttr('style');
	$(".portfolio-footer").removeAttr('style');
	var initTemplate = "<ul class='bjqs'><li class='templateContent' id='portSlide0'><div class='portWarp'></div></li></ul>";
	$("#screens").append(initTemplate);
	loadPort();
	bigPos();*/
}

var resizeTimer;
$( window ).resize(function() {
	clearTimeout(resizeTimer);
	if (!(navigator.userAgent.match(/msie/i) || navigator.userAgent.match(/trident/i)) ){ //checking IE
	    resizeTimer = setTimeout(clearPortfoio, 100);
	}
});


//Big Image
$(".project").click(function(){
  $('#bigImg').attr({src: $(this).children('.templates').children('a').children('img').attr('')});
  $('#bigImg').attr({src: $(this).children('.templates').children('a').children('img').attr('big')});
  $('#overlay').fadeIn('fast', function() {
    bigPos();
  });
});

var bigPosOn = false;
function bigPos() {
	bigPosOn = true;
	$('.descriptionContainer').css("opacity",0);
	$('.descriptionContainer').css("display","block");
	var bLeft = $('#bigImg').offset().left + $('#bigImg').width() - $('.description').outerWidth(true)/1.5;
	$('.descriptionContainer').css("position","absolute");
	$('.descriptionLink').css("height",$('.description').outerHeight(true));
	$('.descriptionContainer').css("height",$('.description').outerHeight(true));
	$('.descriptionContainer').css("left",bLeft-50 +"px");
	var bTop = $('#bigImg').height() - $('.description').outerHeight(true)/2.5;
	$('.descriptionContainer').css("top",bTop+50 +"px");
	$('#bigImg').css("top",-50 +"px");
	$('.descriptionContainer').css("opacity",1);
	$('.descriptionContainer').css("display","none");
	$('.descriptionContainer').fadeIn('slow');
};

$("#forClose").click(function(){
	bigPosOn = false;
	$('.descriptionContainer').fadeOut('fast');
	$("#overlay").fadeOut('fast');
});
$(window ).scroll(function() {
  if(bigPosOn) {
	  bigPosOn = false;
	  $('.descriptionContainer').fadeOut('fast');
	  $("#overlay").fadeOut('fast');
  }
});
$('body').keydown(function(e) {
    if (e.keyCode == 27) {
		bigPosOn = false;
		$('.descriptionContainer').fadeOut('fast');
       	$("#overlay").fadeOut('fast');
    }
});



//Over fx
$('.project').hover(
  function() {
   $(this).children('.templateHover').fadeIn('slow');
   $(this).children('.templates').children('a').children('img').addClass('animScale');
   $(this).children('.templateHover').find('.templateName').stop(true).animate({'bottom': 0}, {queue: false, duration: 300, easing:"swing"});
   $(this).children('.templateHover').children('a').stop(true).animate({'borderWidth': 10}, {queue: false, duration: 300, easing:"swing"});
   
  }, function() {
	$(this).children('.templateHover').fadeOut();
	$(this).children('.templates').children('a').children('img').removeClass('animScale');
	$(this).children('.templateHover').find('.templateName').stop(true).animate({'bottom': -40}, {queue: false, duration: 300, easing:"swing"});
   $(this).children('.templateHover').children('a').stop(true).animate({'borderWidth': 0}, {queue: false, duration: 300, easing:"swing"});
  }
);
 
/*$('.project').on('mouseenter mouseleave', function(e) {
    $('.project').children('.templates').children('a').children('img').trigger(e.type);
});*/




});

