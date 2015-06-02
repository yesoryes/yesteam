// JavaScript Document

$( document ).ready(function() {
/*Index Page*/	

/* For Browser Height*/
	/*var fullHeight = $(window).height();
	$('.home-banner, .normal-home, .more, .another-school, .champs-school, .banner-seps').css ({
		height : fullHeight,
	});*/

/* End Browser Height*/

/*Menu More Button*/
	var more = function() {  
		$('.more a').click(function() {	  
			$('.menu').animate({right: "0px" }, 1500);	
			$('body').animate({right: "0"}, 1500); 
			$('.bg, .main-nav ul').slideUp(1500);
			
		});		  
		/* Then push them back */	  
		$('.more-close').click(function() {
		   $('.menu').animate({right: "-325px"}, 1500);
		   $('body').animate({right: "0px"  }, 1500); 
		   $('.bg, .main-nav ul').slideDown(1500);
		});
	};
	$(document).ready(more);
/*Menu More Button*/
	
/*Accordian*/
	(function($, d) {	
		
		$('#horizontal-accordian').liteAccordion({
				onTriggerSlide : function() {
					this.find('figcaption').fadeOut();
				},
				onSlideAnimComplete : function() {
					this.find('figcaption').fadeIn();
				},
				autoPlay : false,
				pauseOnHover : true,
				theme : 'stitch',
				rounded : true,
				enumerateSlides : true,
		})//find('figcaption:first').show();                
		
	})(jQuery, document);
/*End Accordian*/
	
/*Home Page Hover*/	
	//View Hover
	$(".programs p a").hover(function () {
		$(this).addClass("hvr-sweep-to-right");
	});	
	//Read More Hover
	$('.activity div a').hover(function () {
		$(this).addClass('hvr-sweep-to-left');
	})
/*End Home Page Hover*/
	
	
/*Parallex*/
	skrollr.init({
		forceHeight: false,
		smoothScrolling: true,
	});
/*End Parallex*/

/*preload Images*/
	function preload(arrayOfImages) {
		$(arrayOfImages).each(function(){
			$('<img/>')[0].src = this;
			// Alternatively you could use:
			// (new Image()).src = this;
		});
	}
	
	// Usage:
		
	preload([
		'img/imageName.jpg',
		'img/anotherOne.jpg',
		'img/blahblahblah.jpg'
	]);
/*End Preload images*/

/*End Index Page*/	
	
});/*End Document Ready*/