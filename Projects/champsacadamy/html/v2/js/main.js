// JavaScript Document

$( document ).ready(function() {

/*Index Page*/	

/*Menu More Button*/
	var more = function() {  
		$('.more a').click(function() {	  
			$('.menu').animate({right: "0px" }, 200);	
			$('body').animate({right: "0"}, 200); 
			$('.bg, .main-nav ul').hide();
			
		});		  
		/* Then push them back */	  
		$('.more-close').click(function() {
		   $('.menu').animate({right: "-325px"}, 200);
		   $('body').animate({right: "0px"  }, 200); 
		   $('.bg, .main-nav ul').show(); 
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

/*End Index Page*/	
	
});/*End Document Ready*/