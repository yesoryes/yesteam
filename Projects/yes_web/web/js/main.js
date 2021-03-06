$(document).ready(function() {
    var fullHeight = $(window).height();
	
	$(".home, .about, .services, .contact, .portfolio").css({
		height: fullHeight,
	})
	
	$(function() {
		$.scrollify({
			section : ".scrollify",
		});
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
			})
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
		$(".contact-form").slideDown(1500).css({
		   'display' : 'block',
		});
		$(".contact-enquiry.mobile-contact").css ({
			background: '#000',
		})
		
		$(".contact-app").delay(1000).css({
		   //'display' : 'none',
		   'visibility': 'hidden' 
		});
	});
	$(".cancel-btn").click(function(){
		
		$(".contact-form").slideUp(1000).css({
			//'display' : 'none',
	   });
	   $(".contact-enquiry.mobile-contact").delay(3000).css ({
			background: 'none'
		})
		$(".contact-app").delay(3000).css({
			//'display' : 'block',
			'visibility': 'visible',
			/*'transition': '5s all'*/
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
		   //'display' : 'none',
		   'visibility' : 'hidden',
		});
	});

});