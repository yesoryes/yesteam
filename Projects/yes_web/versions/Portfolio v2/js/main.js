$(document).ready(function() {
	
	$(window).on('resize',function(){location.reload();});
	
    var fullHeight = $(window).height();
	
	$(".home, .about, .services, .contact, .portfolio, .overlay-portfolio, .body").css({
		height: fullHeight,
	})
	
	// scroll
	$(function() {
		$.scrollify({
			section : ".scrollify",
			sectionName : "section-name",
			easing: "easeOutExpo",
			scrollSpeed: 1100,
			offset : 0,
			scrollbars: true,
			before:function(id) {
				if ($('.nav-desktop ul li a').hasClass('active-scroll')) {
					$('.nav-desktop ul li a').removeClass('active-scroll');
				}
				if ($('.nav-mobile ul li a').hasClass('mob-active-scroll')) {
					$('.nav-mobile ul li a').removeClass('mob-active-scroll');
				}
				$('.nav-desktop ul li a:eq('+id+')').addClass('active-scroll').focus();
				$('.nav-mobile ul li a:eq('+id+')').addClass('mob-active-scroll');
			},
		});
	});
	
	/* Menu Click */
	$('.nav-desktop ul li a').click(function(){
		$.scrollify("move",$(this).attr('href'));
	});
	$('.nav-mobile ul li a').click(function(){
		$.scrollify("move",$(this).attr('href'));
	});
	
	//carousal
	$("#myCarousel1").on('slide.bs.carousel', function (ev) {
		$("#testimonialImg00").hide();
		$("#testimonialImg01").hide();
		$("#testimonialImg02").hide();
		$("#testimonialImg03").hide();
		if ($('#caroCount li:eq('+0+')').hasClass('active')) {
			$("#testimonialImg01").show();
		};
		if ($('#caroCount li:eq('+1+')').hasClass('active')) {
			$("#testimonialImg02").show();
		};
		if ($('#caroCount li:eq('+2+')').hasClass('active')) {
			$("#testimonialImg03").show();
		};
		if ($('#caroCount li:eq('+3+')').hasClass('active')) {
			$("#testimonialImg00").show();
		};
		
		//console.log($('#caroCount li:eq('+2+')').attr('data-slide-to'));
		//curCar.fadeOut();
           //alert("vv"+ev.class);
    });
	
	/*home*/
	$('#intro-coin-yes').css('display', 'none');
	$('#link-replay').css('display', 'none');
	//$('#menu-container').css('display', 'none');
	$('#menu-container').css('opacity', '0');
	
	var t1 = new TimelineMax({onComplete:loop1});
	t1
	//.to("#intro-coin-yes", .1, {alpha:0})
	.fromTo("#intro-hand",.2, {top:15}, {top:25, ease:Linear.easeNone}, "lp1")
	.fromTo("#intro-hand",.2, {top:25}, {top:15, ease:Linear.easeNone})
	;
	function loop1()
	{
	  t1.gotoAndPlay("lp1");
	}
	
	$( "#intro-hand" ).mouseover(function() {
	 t1.pause();
	});
	$( "#intro-hand" ).mouseout(function() {
	  t1.resume();
	});
	$( "#intro-hand" ).click(function() {
	  $( "#intro-hand" ).off();
	  var t2 = new TimelineMax({onComplete:loop2});
	  t2
	  .fromTo("#intro-hand",.2, {top:25}, {top:58, ease:Linear.easeNone})
		.to("#intro-text",.2, {alpha:0}, "-=.2")
		.to("#intro-arrow",.2, {alpha:0}, "-=.4")
	  ;
	  function loop2()
	  {
		press1();
			$('#intro-hand').css('cursor', 'default');
	  }
	});
	
	function press1(){
		var t3 = new TimelineMax({onComplete:loop3});
		t3
		//.to("#question",.15, {top:-125, ease:Linear.easeNone}, "lp3")
		.to("#intro-hand",.15, {top:125, ease:Linear.easeNone}, "lp3")
		.to("#intro-rect",.2, {rotation:10}, "lp3")
		.fromTo("#intro-coin",1.5, {top:232}, {scaleX:1.5, scaleY:1.5, rotation:480, top:-550}, "-=.3")
		.to("#intro-rect",.2, {alpha:0}, "-=.9")
		.to("#intro-triangle",.2, {alpha:0}, "-=.9")
		.to("#intro-hand",.2, {alpha:0}, "-=.9")
		.to("#intro-coin",.2, {alpha:0}, "-=.0")
		;
		function loop3()
	  {
			step2();
	  }
	}
	
	function step2(){
		$('#intro-coin-yes').css('display', 'inline');
		var t4 = new TimelineMax({onComplete:loop4});
		t4
		.fromTo("#intro-coin-yes",1.5, {alpha:1, scaleX:0.5, scaleY:0.5, rotationX:480, top:-1000}, {scaleX:1, scaleY:1, rotationX:0, top:-10}, "-=.3")
		;
		function loop4()
	  {
			$('#link-replay').css('display', 'inline');
			TweenLite.fromTo($('#link-replay'), 1.5, {css:{opacity:0}},{css:{opacity:.5}});
			//$('#menu-container').css('display', 'inherit');
			TweenLite.fromTo($('#menu-container'), 3, {css:{opacity:0}},{css:{opacity:1}});		
	  }
	}
	$('#link-replay').mouseover(function() {
		TweenLite.to($('#link-replay'), .2, {css:{opacity:1}});	
	});
	$('#link-replay').mouseout(function() {
	  TweenLite.to($('#link-replay'), .2, {css:{opacity:.5}});
	});
	$('#link-replay').click(function() {
	  location.reload();
	});
	/**/
	
	
	
	
	
	/*Portfolio Filter Menu*/	
	$('.filter_list_button').click(function() {
		var ul=jQuery('body').find('ul.filter-menu');
		if (ul.hasClass('closed')) {
			ul.slideDown(500);
			ul.removeClass('closed');
			$('.mob-menu-filter').css({
				background: 'url(images/mobile_filter_close.png) no-repeat 0px',
				width: '26px',
				height: '26px',
			});
			
		} else {
			ul.slideUp(500);
			ul.addClass('closed');
			$('.mob-menu-filter').css({
				background: 'url(images/mobile_filter.png) no-repeat 0px',
				width: '26px',
				height: '26px',
		
			})
		}
	});
	$('.body').click(function() {
		$('.mob-filter').hide();
		$('.mob-menu-filter').css({background: 'url(images/mobile_filter.png) no-repeat 0px',})
	})
	
	
	
	/*Services Quality Image Hover*/
	$('.knowledge').hover(function (){
		$('img.f1').attr('src', 'images/f1_hover.gif');
	},
	function (){
		$('img.f1').attr('src', 'images/f1.png');
	});
	$('.concept-prototype').hover(function (){
		$('img.f2').attr('src', 'images/f2_hover.gif');
	},
	function (){
		$('img.f2').attr('src', 'images/f2.png');
	});
	$('.visual').hover(function (){
		$('img.f3').attr('src', 'images/f3_hover.gif');
	},
	function (){
		$('img.f3').attr('src', 'images/f3.png');
	});
	$('.knowledge-gathering').hover(function (){
		$('img.f4').attr('src', 'images/f4_hover.gif');
	},
	function (){
		$('img.f4').attr('src', 'images/f4.png');
	});
	$('.concept-prototype-1').hover(function (){
		$('img.f5').attr('src', 'images/f5_hover.gif');
	},
	function (){
		$('img.f5').attr('src', 'images/f5.png');
	});
	$('.online-promotion').hover(function (){
		$('img.f6').attr('src', 'images/f6_hover.gif');
	},
	function (){
		$('img.f6').attr('src', 'images/f6.png');
	});
	
	/* Forms */
	$(".contact-app").click(function(){
		$(".contact-form").slideDown(700).css({
		   'display' : 'block',
		});
		$(".contact-enquiry").css ({
			background: '#fff',
			'z-index': '100'
		}, 1000)
		/*$(".contact-enquiry.mobile-contact").css ({
			background: '#b4b4b4',
			
		})*/
		
		$(".contact-app").delay(700).css({
		   'display' : 'none',
		   //'visibility': 'hidden' 
		});
	});
	$(".cancel-btn").click(function(){
		
		$(".contact-form").slideUp(700).css({
			display : 'none',
	   });
	   $(".contact-enquiry").css ({
			background: 'none'
	   }, 3000);
	   /*$(".contact-enquiry.mobile-contact").delay(3000).css ({
			background: 'none'
		})*/
		$(".contact-app").delay(7000).css({
			'display' : 'block',
			//'visibility': 'visible',
			'transition': '5s all'
	   });
	});		
	  
	//Form
	$( '.input-field' ).focus(function() {
		$( this ).next( 'label' ).addClass('focused');
		$( this ).parent().find( '.focused-border' ).addClass('focused');
	});		
	$( '.input-field' ).blur(function() {
		 if( $(this).val().length === 0 ) {
			$( this ).next( 'label' ).removeClass('focused');
			$( this ).parent().find( '.focused-border' ).removeClass('focused');
		 }
	});	
	/*Conatact Form*/	
	
	/*Map*/	
	$(".click-map").click(function(){
		$(".map-expand").fadeIn('slow').css({
		   'visibility' : 'visible',
		   'transition': '5s all'
		});		
		$(".click-map").delay(1000).css({
		   'visibility' : 'hidden',
		});
	});
	$('.map-backdrop').click(function(){
		$(".map-expand").fadeOut('fast').css({
		   'visibility' : 'hidden'
		});
		$(".click-map").delay(1000).css({
		   'visibility' : 'visible'
		});
	})
	
	
	
	// Porfolio isotope
	
	function isotope(destroy) {
		$('.iso_portfolio').isotope('destroy')
	};
	
	var $isoPort = $('.iso_portfolio').isotope({
		itemSelector: '.iso_portfolio li',
		layoutMode: 'masonryHorizontal',
		resizesContainer: true,
    	masonryHorizontal: {
      		rowHeight:0,
    	}
	
	});
	
	/*Window resize isotope*/
	$(window).on("resize", function(){
		isotope(destroy);
	});
	
	$('#port-filter a').click(function(){
		$('.iso_portfolio').isotope({ filter: $(this).attr('data-sec')});
		$('.iso_portfolio').css({'left': 0});
		
	});
	
	$('.port-prv').css({'display': 'none'});
	$('.port-nxt').css({'display': 'none'});
	if ($('.iso_portfolio').width()-100 > $('.portfolio-warp').width()) {
		$('.port-nxt').css({'display': 'block'});
	}
	$isoPort.on( 'arrangeComplete', function( event, filteredItems ) {
		//console.log( filteredItems.length );
		$('.port-prv').css({'display': 'none'});
		$('.port-nxt').css({'display': 'none'});
		if ($('.iso_portfolio').width()-120 > $('.portfolio-warp').width()) {
			//$('.port-nxt').fadeIn('fast');
			$('.port-nxt').css({'display': 'block'});
		};
	});

	var portAnim = false;
	$('.iso_portfolio').on('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd',function(){
		portAnim = false;
	});
 
	$('.port-nxt').click(function(){
		//$('.iso_portfolio').css({'left': '0px'});
		//alert($('.portfolio-warp').width()+", "+$('.iso_portfolio').position().left);
		var portTar = $('.iso_portfolio').position().left - $('.portfolio-warp').width();
		if (portTar > -$('.iso_portfolio').width() && !portAnim) {
			$('.iso_portfolio').css({'left': portTar});
			portAnim = true;
			$('.port-prv').fadeIn('fast');
		};
		if (portTar-$('.portfolio-warp').width() > -$('.iso_portfolio').width()) {
			$('.port-nxt').fadeIn('fast');
		} else {
			$('.port-nxt').fadeOut('fast');
		};
	});
	
	$('.port-prv').click(function(){
		var portTar = $('.iso_portfolio').position().left + $('.portfolio-warp').width();
		if (portTar <= 0 && !portAnim) {
			$('.iso_portfolio').css({'left': portTar});
			portAnim = true;
			$('.port-nxt').fadeIn('fast');
		};
		if (portTar+$('.portfolio-warp').width() <= 0) {
			$('.port-prv').fadeIn('fast');
		} else {
			$('.port-prv').fadeOut('fast');
		};
	});
	
	
	
	
	/*Form Validation*/
	function sendContact() {
		var valid;	
		valid = validateContact();
		if(valid) {
			jQuery.ajax({
				url: "enquiry.php",
				data:'userName='+$("#userName").val()+'&userEmail='+
				$("#userEmail").val()+'&subject='+
				$("#subject").val()+'&content='+
				$(content).val(),
				type: "POST",
				success:function(data){
					$("#mail-status").html(data);
				},
				error:function (){}
			});
		}
	}
	function validateContact() {
		var valid = true;	
		$(".demoInputBox").css('background-color','');
		$(".info").html('');
		if(!$("#userName").val()) {
			$("#userName-info").html("(required)");
			valid = false;
		}
		if(!$("#userEmail").val()) {
			$("#userEmail-info").html("(required)");
			valid = false;
		}
		if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
			$("#userEmail-info").html("(invalid)");
			valid = false;
		}
		if(!$("#subject").val().match(/^({0~9})/)) {
			$("#subject-info").html("(required)");
			valid = false;
		}
		if(!$("#content").val()) {
			$("#content-info").html("(required)");
			valid = false;
		}
		return valid;
	};
/*End Form Validation*/


	$('#myCarousel2').on('bind swipeleft', function() {
      $(this).carousel('prev');
    });
   $('#myCarousel2').on('bind swipeleft', function() {
      $(this).carousel('next');
   });
});