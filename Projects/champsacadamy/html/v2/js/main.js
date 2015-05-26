// JavaScript Document

$( document ).ready(function() {
	//Accordian
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
	
	//View Hover
	$(".programs p a").hover(function () {
		$(this).addClass("hvr-sweep-to-right");
	});  
	
	//Read More Hover
	$('.activity div a').hover(function () {
		$(this).addClass('hvr-sweep-to-left');
	})
	
	
	/*Parallex*/
	//window.onload = function() {
	skrollr.init({
		forceHeight: false,
		smoothScrolling: true,
	});
	//};
})