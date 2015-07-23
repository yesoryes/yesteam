$(document).ready(function() {
    var fullHeight = $(window).height();
	
	$(".about, .services, .contact, .portfolio").css({
		height: fullHeight,
	})
	
	
	/*Portfolio Filter Menu*/	
	$('.filter_list_button').click(function() {
		var ul=jQuery('body').find('ul.filter-menu');
		if (ul.hasClass('closed')) {
			ul.slideDown(500);
			ul.removeClass('closed');
			$('.mob-menu-filter').css({
				background: 'url(img/mobile_filter_close.png) no-repeat 0px',
				width: '26px',
				height: '26px',
			})
		} else {
			ul.slideUp(500);
			ul.addClass('closed');
			$('.mob-menu-filter').css({
				background: 'url(img/mobile_filter.png) no-repeat 0px',
				width: '26px',
				height: '26px',
		
			})
		}
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