// TRN JavaScripts


// Home - Parallax

$(document).ready(function() {
	
	/* For Browser Height*/
	$('.bro-height').css({
			'height' : $( window ).height() 
	});
	$(".home, .home_cont, .home_top, .home_bottom, .home_banner, .shot, .shot_banner, .shot_cont, .shot_top, .shot_bottom, .shot_gallery_banner, .shot_gallery_cont, .shot_gallery_top, .shot_gallery_bottom, .whoam_banner, .whoam_content, .whoam_top, .whoam_bottom, .whoam, .studio, .studio_banner, .studio_cont, .studio_top, .studio_bottom, .client_content, .client_top, .client_bottom, .myclients, .reachUs_banner, .reach_cont, .reach_top, .reach_bottom, .reachUs").css({
			'height' : $( window ).height() 
	});
	
	
	/* Home Parallax 
	$('#homeStand').mouseParallax({moveFactorX:100, moveFactorY:100});
	$('#homeStandHover').mouseParallax({moveFactorX:100, moveFactorY:100});
	$('#homeLight_1').mouseParallax({moveFactorX:100, moveFactorY:50});
	$('#homeLight_2').mouseParallax({moveFactorX:100, moveFactorY:50});
	$('#homeBg').mouseParallax({moveFactorX:3, moveFactorY:5});*/
	
	/* Main Menu */
	$('nav ul li a').hover(function() {	
		$($(this).children()[1]).css({
			'opacity' : '1',
		});
		$($(this).children()[2]).css({
			'opacity' : '1',
		});
		$($(this).children()[3]).css({
			'opacity' : '1',
		});
		$($(this).children()[4]).css({
			'opacity' : '1',
		});
		$($(this).children()[3]).find('img')
		  .delay(200)
		  .queue(function (next) { 
			$(this).css('top', '-40px'); 
			next(); 
		});
	}, function() {
		$($(this).children()[4]).css({
			'opacity' : '0',
		});
		$($(this).children()[3]).find('img').css({
			'top' : '0px',
		});
		$($(this).children()[3])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
		$($(this).children()[2])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
		$($(this).children()[1])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
	});
	
	
	/* Menu Click */
	$('nav ul li a').click(function(){
		$.scrollify("move",$(this).attr('href'));
		//setActive(this);
	});
	function setActive(id) {
		$.scrollify("move",$(id).attr('href'));
	};
	
	
	
	/* Home Click */
	$('.img_photos').click(function() {
		$.scrollify("move","#Shots");
	});
	$('.img_phone').click(function() {
		$.scrollify("move","#ReachUs");
	});
	$('.img_stool').click(function() {
		$.scrollify("move","#Clients");
	});
	$('.img_stand').click(function() {
		$.scrollify("move","#WhoAmI");
	});
	$('.img_door, .img_doorInner').click(function() {
		$.scrollify("move","#Studio");
	});
	
	/* Home Hover */
	$('.img_photos').hover(function() {
		$('.img_photos img').addClass('img_photos_addclass1');
		$('.hover_myShots').removeClass('hover_myShots_init');
	}, function() {
		$('.img_photos img').addClass('img_photos_addclass2');
		$('.hover_myShots').addClass('hover_myShots_init');
	});
	$('.img_phone').hover(function() {
		$('.img_phone img').addClass('img_phone_addclass1');
		$('.hover_reachus').removeClass('hover_reachus_init');
	}, function() {
		$('.img_phone img').addClass('img_phone_addclass2');
		$('.hover_reachus').addClass('hover_reachus_init');
	});
	$('.img_stool').hover(function() {
		$('.img_stool img').addClass('img_stool_addclass1');
		$('.hover_myclients').removeClass('hover_myclients_init');
	}, function() {
		$('.img_stool img').addClass('img_stool_addclass2');
		$('.hover_myclients').addClass('hover_myclients_init');
	});
	$('.img_stand').hover(function() {
		$('.hover_whoam').removeClass('hover_whoam_init');
	}, function() {
		$('.hover_whoam').addClass('hover_whoam_init');
	});
	/*$('.img_door').hover(function() {
		$('.img_doorInner').attr("src", "img/doorInner.jpg");
		$('.img_doorInner img').addClass('img_door_addclass1');
	}, function() {
		$('.img_doorInner').attr("src", "img/doorInner.jpg");
		$('.img_doorInner img').addClass('img_door_addclass2');
	});*/
	$(".img_stool").mouseenter(function(){
		$('.hover_myclients').addClass('hover_myclients_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	})
	.mouseleave(function(){
		$('.hover_myclients').removeClass('hover_myclients_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	});
	
	$(".img_stand").mouseenter(function(){
		$('.hover_whoam').addClass('hover_whoam_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
		})
		.mouseleave(function(){
		$('.hover_whoam').removeClass('hover_whoam_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	});
	
	$(".img_photos").mouseenter(function(){
		$('.hover_myShots').addClass('hover_myShots_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	})
	.mouseleave(function(){
		$('.hover_myShots').removeClass('hover_myShots_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	});
	
	/*Phone*/
	$(".img_phone").mouseenter(function(){
		$('.hover_reachus').addClass('hover_reach_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	})
	.mouseleave(function(){
		$('.hover_reachus').removeClass('hover_reach_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	});
	
	
	//Home Door
	function img_door_animIn() {
		$('.img_doorInner').attr("src", "img/doorInner.jpg");
		$('.img_doorInner img').css({ transform: 'perspective( 600px ) rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'left', cursor: 'pointer'});
	};
	function img_door_animout() {
		$('.img_doorInner').attr("src", "img/doorInner.jpg");
		$('.img_doorInner img').css({transform: 'rotateY(-0deg)', transition: '.5s linear transform', transformOrigin: 'left', cursor: 'pointer'});
	};	
	$(".img_door, .img_doorInner")
		.hover(function () {			
			img_door_animIn();
		})
		.mouseout(function () {
			img_door_animout();			
		}
	);
	//End Home Door
	
	
	/* Hide elements */
	$('.shot img').hide();
	$('.shot.gallery img').show();
	
	$('.whoam img').hide();
	$('.about_para h1').hide();
	$('.about_para article').hide();
	
	$('.studio img').hide();
	//$('.my_studio_para').hide;
	
	$('.myclients img').hide();
	$('.clientlist_content').hide();
	
	$('.reachUs img').hide();
	$('.reachUs_para').hide();
	$('.address').hide();
	$('.location').hide();
	$('.enquiry').hide();
		
	/* Page Scroll */
	var samePage;
	$.scrollify({
		section : ".secScroll",
		sectionName : "section-name",
        easing: "easeOutExpo",
        scrollSpeed: 1100,
        offset : 0,
        scrollbars: true,
        before:function(id) {
				switch (id) {
					case 0:
						if(samePage != id) {
							homeOut();
							setTimeout(homeIn,200);
							samePage = id;
						};
						break;
					case 1:
						if(samePage != id) {
							//galleryOut();
							//setTimeout(galleryIn,200);
							$('.shot img').show();
							samePage = id;
						};
						break;
					case 2:
						if(samePage != id) {
							aboutOut();
							setTimeout(aboutIn,200);
							//$(this).load(location.href + '#shots');
							btnBack();
							samePage = id;
						};
						break;
					case 3:
						if(samePage != id) {
							studioOut();
							setTimeout(studioIn,200);
							samePage = id;
						};
						break;
					case 4:
						if(samePage != id) {
							clientsOut();
							setTimeout(clientsIn,200);
							samePage = id;
						};
						break;
					case 5:
						if(samePage != id) {
							reachOut();
							setTimeout(reachIn(),200);
							samePage = id;
						};
						break;
				};
			},

	});
	
	/*function autorefresh(){
		$('#refresh1').load(location.href + '#shots');
    }*/
	
	
	
		//Home
	function homeIn() {
		$('.img_umperla').addClass('animated zoomIn').show();
		setTimeout("$('.bg_home').addClass('animated fadeIn').show()",500);
		setTimeout("$('.img_light_l img').addClass('animated slideInDown').show()",300);
		setTimeout("$('.img_light_r img').addClass('animated slideInDown').show()",200);
		setTimeout("$('.img_photos img').addClass('animated zoomIn').show()",500)
		setTimeout("$('.img_phone img').addClass('animated zoomIn').show()",500)
		setTimeout("$('.img_stool img').addClass('animated slideInLeft').show()",600);
		//setTimeout("$('.img_clock img').addClass('animated zoomIn').show()",200);
		//setTimeout("$('.img_door img').addClass('animated zoomIn').show()",200);
		//setTimeout("$('.img_doorInner img').addClass('animated zoomIn').show()",200);
		setTimeout("$('.img_stand img').addClass('animated slideInUp').show()",200);
	};
	function homeOut() {
		$('.img_umperla').removeClass('animated zoomIn').hide();
		$('.bg_home').removeClass('animated fadeIn').hide();
		$('.img_light_l img').removeClass('animated slideInDown').hide();
		$('.img_light_r img').removeClass('animated slideInDown').hide();
		$('.img_photos img').removeClass('animated zoomIn').hide();
		$('.img_phone img').removeClass('animated zoomIn').hide();
		$('.img_stool img').removeClass('animated slideInLeft').hide();
		//$('.img_clock img').removeClass('animated zoomIn').hide();
		//$('.img_door img').removeClass('animated zoomIn').hide();
		//$('.img_doorInner img').removeClass('animated zoomIn').hide();
		$('.img_stand img').removeClass('animated slideInUp').hide();
	};
	
		// Gallery
	function galleryIn() {		
		$('.img_adv img').addClass('animated bounceInLeft').show();
		setTimeout("$('.img_fashion img').addClass('animated bounceInLeft').show()",200);
		setTimeout("$('.img_interiors img').addClass('animated bounceInLeft').show()",400);
		setTimeout("$('.img_life_style img').addClass('animated bounceInDown').show()",200);
		setTimeout("$('.img_industry img').addClass('animated bounceInUp').show()",400);
		setTimeout("$('.img_jewellery img').addClass('animated bounceInRight').show()",400);
		setTimeout("$('.img_food img').addClass('animated bounceInRight').show()",600);
		setTimeout("$('.img_hotel img').addClass('animated bounceInRight').show()",800);
		setTimeout("$('.img_corporate img').addClass('animated bounceInRight').show()",400);
		setTimeout("$('.img_automobile img').addClass('animated bounceInRight').show()",600);
		
	};
	function galleryOut() {
		$('.img_adv img').removeClass('animated bounceInLeft').hide();
		$('.img_fashion img').removeClass('animated bounceInLeft').hide();
		$('.img_interiors img').removeClass('animated bounceInLeft').hide();
		$('.img_life_style img').removeClass('animated bounceInDown').hide();
		$('.img_industry img').removeClass('animated bounceInUp').hide();
		$('.img_jewellery img').removeClass('animated bounceInRight').hide();
		$('.img_food img').removeClass('animated bounceInRight').hide();
		$('.img_hotel img').removeClass('animated bounceInRight').hide();
		$('.img_corporate img').removeClass('animated bounceInRight').hide();
		$('.img_automobile img').removeClass('animated bounceInRight').hide();
		
	};
	
		// About Us
	function aboutIn() {
		setTimeout("$('.whoam_rays img').addClass('animated fadeIn').show()",1700);
		setTimeout("$('.about_img img').addClass('animated zoomIn').show()",200);
		setTimeout("$('.img_myblog img').addClass('animated zoomIn').show()",400);
		setTimeout("$('.img_chair img').addClass('animated slideInUp').show()",600);
		setTimeout("$('.img_sofa img').addClass('animated slideInUp').show()",800);
		setTimeout("$('.img_standlight img').addClass('animated fadeIn').show()",1500);
		setTimeout("$('.about_para h1').addClass('animated slideInLeft').show()",200);
		setTimeout("$('.about_para article').addClass('animated slideInRight').show()",200);
	};
	function aboutOut() {
		$('.whoam_rays img').removeClass('animated fadeIn').hide();
		$('.about_img img').removeClass('animated zoomIn').hide();
		$('.img_myblog img').removeClass('animated zoomIn').hide();
		$('.img_chair img').removeClass('animated slideInUp').hide();
		$('.img_sofa img').removeClass('animated slideInUp').hide();
		$('.img_standlight img').removeClass('animated fadeIn').hide();
		$('.about_para h1').removeClass('animated slideInLeft').hide();
		$('.about_para article').removeClass('animated slideInRight').hide();
	};
	
	
		// My Studio
	function studioIn() {
		$('.mystudio_rays img').show();
		$('.img_self img').addClass('animated zoomIn').show();
		setTimeout("$('.img_black_sofa img').addClass('animated zoomIn').show()",200);
		setTimeout("$('.img_lighting_set img').addClass('animated fadeIn').show()",1000);
		setTimeout("$('.img_flicker img').addClass('animated fadeIn').show()",1000);
		setTimeout("$('.img_mac img').addClass('animated zoomIn').show()",700);
		setTimeout("$('.img_frame_1 img').addClass('animated rotateInDownRight').show()",600);
		setTimeout("$('.img_frame_2 img').addClass('animated rotateInDownLeft').show()",600);
		
		//setTimeout("$('.my_studio_para').addClass('animated zoomIn').show()",200);
	};
	function studioOut() {
		$('.mystudio_rays img').hide();
		$('.img_self img').removeClass('animated zoomIn').hide();
		$('.img_lighting_set img').removeClass('animated fadeIn').hide();
		$('.img_black_sofa img').removeClass('animated zoomIn').hide();
		$('.img_flicker img').removeClass('animated fadeIn').hide();
		$('.img_mac img').removeClass('animated zoomIn').hide();
		$('.img_frame_1 img').removeClass('animated rotateInDownRight').hide();
		$('.img_frame_2 img').removeClass('animated rotateInDownLeft').hide();
		
		//$('.my_studio_para').removeClass('animated zoomIn').hide();
	};
	
		// Clients
	function clientsIn() {
		$('.img_leftclients img').addClass('animated zoomIn').show();
		setTimeout("$('.img_rightclients img').addClass('animated zoomIn').show()",0);
		setTimeout("$('.myclients_left_rays img').addClass('animated flash').show()",300);
		setTimeout("$('.myclients_right_rays img').addClass('animated flash').show()",300);
		setTimeout("$('.img_clientlist img').addClass('animated pulse').show()",300);
		$('.slide img').show();
		setTimeout("$('.clientlist_content').addClass('animated pulse').show()",300);
	};
	function clientsOut() {
		$('.img_leftclients img').removeClass('animated zoomIn').hide();
		$('.img_rightclients img').removeClass('animated zoomIn').hide();
		$('.myclients_left_rays img').removeClass('animated flash').hide();
		$('.myclients_right_rays img').removeClass('animated flash').hide();
		$('.img_clientlist img').removeClass('animated pulse').hide();
		$('.slide img').hide();
		$('.clientlist_content').removeClass('animated pulse').hide();
	};
	
		// Reach Us
	function reachIn() {
		$('.reach_rays img').addClass('animated flash').show();
		setTimeout("$('.img_reachtable img').addClass('animated zoomIn').show()",200);
		setTimeout("$('.reachUs_para').addClass('animated fadeIn').show()",200);
		setTimeout("$('.address').addClass('animated slideInLeft').show()",200);
		setTimeout("$('.location').addClass('animated zoomIn').show()",200);
		setTimeout("$('.locate_img img').addClass('animated zoomIn').show()",200);
		setTimeout("$('.enquiry').addClass('animated slideInRight').show()",200);
	};
	function reachOut() {
		$('.reach_rays img').removeClass('animated flash').hide();
		$('.img_reachtable img').removeClass('animated zoomIn').hide();
		$('.reachUs_para').removeClass('animated fadeIn').hide();
		$('.address').removeClass('animated slideInLeft').hide();
		$('.location').removeClass('animated zoomIn').hide();
		$('.locate_img img').removeClass('animated zoomIn').hide();
		$('.enquiry').removeClass('animated slideInRight').hide();
	};
	
	
});


	/* MY Studio */
	
		/* Auto Scroll */
		var myIntervalStudio;
		var isScrolling = false;
		function autoScrollStudio() {
			myScrollStudio.scrollBy(0, -1);
			if (myScrollStudio.y < -600) {
				myScrollStudio.scrollTo(0, 350);
			};
		};
		
	$(".projector").mouseenter(function(){
		$(".tooltip").addClass('hover_tool_show');
		
	})
	.mouseleave(function(){
		$(".tooltip").removeClass('hover_tool_show');
		
	});
	$(".projector").click(function(){
		$(".mystudio_rays").fadeToggle();
		$(".projector").toggleClass("active");
		
		if (!isScrolling) {
			myIntervalStudio = setInterval(autoScrollStudio, 40);
			isScrolling = true;
			
		} else {
			clearInterval(myIntervalStudio);
			isScrolling = false;
		}
	});
	
	
	


/*Gallery POPUP*/
/*Gallery*/
$(document).ready(function() {
	/*
	 *  Simple image gallery. Uses default settings
	 */
	$('.fancybox').fancybox();
	$('.fancybox1').fancybox();
	$('.fancybox2').fancybox();
	$('.fancybox3').fancybox();
	$('.fancybox4').fancybox();
	$('.fancybox5').fancybox();
	$('.fancybox6').fancybox();
	$('.fancybox7').fancybox();
	$('.fancybox8').fancybox();
	
	/*
	 *  Different effects
	 */
	// Change title type, overlay closing speed
	$(".fancybox-effects-a").fancybox({
		helpers: {
			title : {
				type : 'outside'
			},
			overlay : {
				speedOut : 0
			}
		}
	});
	

	// Disable opening and closing animations, change title type
	$(".fancybox-effects-b").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none',

		helpers : {
			title : {
				type : 'over'
			}
		}
	});

	// Set custom style, close if clicked, change title type and overlay color
	$(".fancybox-effects-c").fancybox({
		wrapCSS    : 'fancybox-custom',
		closeClick : true,

		openEffect : 'none',

		helpers : {
			title : {
				type : 'inside'
			},
			overlay : {
				css : {
					'background' : 'rgba(238,238,238,0.85)'
				}
			}
		}
	});

	// Remove padding, set opening and closing animations, close if clicked and disable overlay
	$(".fancybox-effects-d").fancybox({
		padding: 0,

		openEffect : 'elastic',
		openSpeed  : 150,

		closeEffect : 'elastic',
		closeSpeed  : 150,

		closeClick : true,

		helpers : {
			overlay : null
		}
	});

	/*
	 *  Button helper. Disable animations, hide close button, change title type and content
	 */

	$('.fancybox-buttons').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',

		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,

		helpers : {
			title : {
				type : 'inside'
			},
			buttons	: {}
		},

		afterLoad : function() {
			this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});


	/*
	 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
	 */

	$('.fancybox-thumbs').fancybox({
		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,
		arrows    : false,
		nextClick : true,

		helpers : {
			thumbs : {
				width  : 50,
				height : 50
			}
		}
	});

	/*
	 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
	*/
	$('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});

	/*
	 *  Open manually
	 */

});


/* Shots Page Slide */
	$(".img_fashion").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.fashion').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_adv").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.adv').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_interiors").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.interiors').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_life_style").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.style').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_jewellery ").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.industry').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_industry").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.jewellery').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_food").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.food').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_hotel").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.hotel').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_corporate").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.corporate').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	$(".img_automobile").click(function(){
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(-100%)',
			'-webkit-transform' : 'translateX(-100%)',
			'-ms-transform' : 'translateX(-100%)',
			'-moz-transform' : 'translateX(-100%)',
			'-o-transform' : 'translateX(-100%)'
		});
	
		$('.shot_gallery_banner.automobile').css({
			'transition' : 'all 1.0s ease-in-out',			
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(100%)',
			'-webkit-transform' : 'translateX(100%)',
			'-moz-transform' : 'translateX(100%)',
			'-ms-transform' : 'translateX(100%)',
			'-o-transform' : 'translateX(100%)',
		});	 
	});
	
		/* Gallery Back Button */
	$('.btn_back').click(function(){
	
		$('.myshots_page').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(0%)',
			'-webkit-transform' : 'translateX(0%)',
			'-moz-transform' : 'translateX(0%)',
			'-ms-transform' : 'translateX(0%)',
			'-o-transform' : 'translateX(0%)',
		});
		
		$('.shot_gallery_banner').css({
			'transition' : 'all 1.0s ease-in-out',
			'-webkit-transition' : 'all 1.0s ease-in-out',
			'-ms-transition' : 'all 1.0s ease-in-out',
			'-moz-transition' : 'all 1.0s ease-in-out',
			'-o-transition' : 'all 1.0s ease-in-out',
			'transform' : 'translateX(0%)',
			'-webkit-transform' : 'translateX(0%)',
			'-moz-transform' : 'translateX(0%)',
			'-ms-transform' : 'translateX(0%)',
			'-o-transform' : 'translateX(0%)',
		});
				
	});
	
	function btnBack() {		
			$('.myshots_page').css({
				'transition' : 'all 1.0s ease-in-out',
				'-webkit-transition' : 'all 1.0s ease-in-out',
				'-ms-transition' : 'all 1.0s ease-in-out',
				'-moz-transition' : 'all 1.0s ease-in-out',
				'-o-transition' : 'all 1.0s ease-in-out',
				'transform' : 'translateX(0%)',
				'-webkit-transform' : 'translateX(0%)',
				'-moz-transform' : 'translateX(0%)',
				'-ms-transform' : 'translateX(0%)',
				'-o-transform' : 'translateX(0%)',
			});
			
			$('.shot_gallery_banner').css({
				'transition' : 'all 1.0s ease-in-out',
				'-webkit-transition' : 'all 1.0s ease-in-out',
				'-ms-transition' : 'all 1.0s ease-in-out',
				'-moz-transition' : 'all 1.0s ease-in-out',
				'-o-transition' : 'all 1.0s ease-in-out',
				'transform' : 'translateX(0%)',
				'-webkit-transform' : 'translateX(0%)',
				'-moz-transform' : 'translateX(0%)',
				'-ms-transform' : 'translateX(0%)',
				'-o-transform' : 'translateX(0%)',
			});
					
		
	};
	
	
	
/* Iscroll */
loaded ();
var myScroll;

//alert ("scroll");

function loaded () {
	myScroll = new IScroll('#wrapper_iscroll', {
		scrollbars: true,
		mouseWheel: true,
		interactiveScrollbars: true,
		shrinkScrollbars: 'scale',
		fadeScrollbars: true
	});

	myScrollStudio = new IScroll('#wrapper_iscroll2', {
		scrollbars: true,
		mouseWheel: true,
		interactiveScrollbars: true,
		shrinkScrollbars: 'scale',
		fadeScrollbars: true
	});

}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);





/* PopUp Box Reach us */
function myFunction1() {
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
}
function myFunction2() {
   	document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
}
function myFunction3() {
   	document.getElementById('map').style.display='block';
    document.getElementById('fade').style.display='block';
}
function myFunction4() {
   	document.getElementById('map').style.display='none';
    document.getElementById('fade').style.display='none';
}
	
	
/* Contact Form */
/*$(document).ready(function() {
	$("#submit").click(function() {
		var name = $("#name").val();
		var email = $("#email").val();
		var details = $("#User").val();
		var contact = $("#phone_num").val();
		$("#returnmessage").empty(); // To empty previous error/success message.
		// Checking for blank fields.
		if (name == '' || email == '' || contact == '') {
		alert("Please Fill Required Fields");
		} else {
		// Returns successful data submission message when the entered information is stored in database.
		$.post("contact_form.php", {
			name1: name,
			email1: email,
			details1: details,
			contact1: contact
		}, function(data) {
			$("#returnmessage").append(data); // Append returned message to message paragraph.
			if (data == "Your Query has been received, We will contact you soon.") {
			$("#form")[0].reset(); // To reset form fields on success.
		}
		});
		}
	});
});*/
function sendContact() {
    var valid;	
    valid = validateContact();
    if(valid) {
        jQuery.ajax({
            url: "contact_mail.php",
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
        //$("#userName").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#userEmail").val()) {
        $("#userEmail-info").html("(required)");
        //$("#userEmail").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#userEmail-info").html("(invalid)");
        //$("#userEmail").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#subject").val().match(/^({0~9})/)) {
        $("#subject-info").html("(required)");
        //$("#subject").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#content").val()) {
        $("#content-info").html("(required)");
        //$("#content").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}

 $(document).ready(function(){
			$('.img_fashion').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_interiors').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_adv').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_industry').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_jewellery').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_food').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_hotel').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_automobile').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
			$('.img_corporate').hover(function() {
				$(this).addClass('transition1');
 
			}, function() {
				$(this).removeClass('transition1');
			});
		  });
		  

/*	// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery("#preloader").delay(1000).fadeOut("slow");
})*/


$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		//$('h1').css('color','#222222');
	}, 3000);
	
});