// TRN JavaScripts


$(document).ready(function() {
	
	$("body").queryLoader2();
	
/* For Browser Height*/
	function resizeSlide() {
		var fullHeight = $(window).height();
		if($(window).width()<1300) {
			$("#wrapper, header").css({
				"width": ($(window).width()+(1380-$(window).width()))+"px",
				"transform": "scale("+($(window).width()/1400)+")",
				"transform-origin": "0px 0px",
			});
			var sResp = document.getElementsByClassName("wrapperC")[0].getBoundingClientRect();
			fullHeight = $(window).height()/(($(window).width()/1400));
			$("#wrapper").css({
				"height": sResp.height,
			});
		} else {
			$("#wrapper, header").css({
				"width": "100%",
				"height": "auto",
				"transform": "scale(1)",
				"transform-origin": "0px 0px",
			});
		};
		$(".home, .home_cont, .home_top, .home_bottom, .home_banner, .shot, .shot_banner, .shot_cont, .shot_top, .shot_bottom, .shot_gallery_banner, .shot_gallery_cont, .shot_gallery_top, .shot_gallery_bottom, .whoam_banner, .whoam_content, .whoam_top, .whoam_bottom, .whoam, .studio, .studio_banner, .studio_cont, .studio_top, .studio_bottom, .client_content, .client_top, .client_bottom, .myclients, .reachUs_banner, .reach_cont, .reach_top, .reach_bottom, .reachUs, .bro-height")
		.css({
				'height' : fullHeight,
		});
	};
	resizeSlide();
	$( window ).resize(function() {
		resizeSlide();
	});
/* End For Browser Height*/
	
	
/* Main Menu Hover*/	
	var didClick = false;
	$('nav ul li a').hover(function() {	
		menuActive(this);
	}, function() {
		if(!didClick)menuDeactive(this);
	});	
	
	function menuActive(id) {		
		$($(id).children()[1]).css({
			'opacity' : '1',
		});
		$($(id).children()[2]).css({
			'opacity' : '1',
		});
		$($(id).children()[3]).css({
			'opacity' : '1',
		});
		$($(id).children()[4]).css({
			'opacity' : '1',
		});
		$($(id).children()[3]).find('img')
		  .delay(200)
		  .queue(function (next) { 
			$(this).css('top', '-40px'); 
			next(); 
		});
	};
	function menuDeactive(id) {		
		$($(id).children()[4]).css({
			'opacity' : '0',
		});
		$($(id).children()[3]).find('img').css({
			'top' : '0px',
		});
		$($(id).children()[3])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
		$($(id).children()[2])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
		$($(id).children()[1])
		  .delay(500)
		  .queue(function (next) { 
			$(this).css('opacity', '0'); 
			next(); 
		});
	};
/*End Main Menu Hover */
	
/* Menu Click */
	$('nav ul li a').click(function(){
		$.scrollify("move",$(this).attr('href'));
		didClick=true;
	});
	function setActive(id) {
		$.scrollify("move",$(id).attr('href'));
	};
/*End Menu Click */
	
	
/*Move to Home Click */
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
/*End Move to Home Click */
	
/* Home Hover */
	$('.img_photos').hover(function() {
		$('.img_photos img').addClass('img_photos_addclass2');
		$('.hover_myShots').removeClass('hover_myShots_init');
	}, function() {
		$('.img_photos img').removeClass('img_photos_addclass2');
		$('.hover_myShots').addClass('hover_myShots_init');
	});
	$('.img_phone').hover(function() {
		$('.img_phone img').addClass('img_phone_addclass2');
		$('.hover_reachus').removeClass('hover_reachus_init');
	}, function() {
		$('.img_phone img').removeClass('img_phone_addclass2');
		$('.hover_reachus').addClass('hover_reachus_init');
	});
	$('.img_stool').hover(function() {
		$('.img_stool img').addClass('img_stool_addclass2');
		$('.hover_myclients').removeClass('hover_myclients_init');
	}, function() {
		$('.img_stool img').removeClass('img_stool_addclass2');
		$('.hover_myclients').addClass('hover_myclients_init');
	});
	$('.img_stand').hover(function() {
		$('.hover_whoam').removeClass('hover_whoam_init');
	}, function() {
		$('.hover_whoam').addClass('hover_whoam_init');
	});
	/*$(".img_stool").mouseenter(function(){
		$('.hover_myclients').addClass('hover_myclients_show');
	})
	.mouseleave(function(){
		$('.hover_myclients').removeClass('hover_myclients_show');
	});
	
	$(".img_stand").mouseenter(function(){
		$('.hover_whoam').addClass('hover_whoam_show');
		})
		.mouseleave(function(){
		$('.hover_whoam').removeClass('hover_whoam_show');
	});
	
	$(".img_photos").mouseenter(function(){
		$('.hover_myShots').addClass('hover_myShots_show');
	})
	.mouseleave(function(){
		$('.hover_myShots').removeClass('hover_myShots_show');
	});*/
/*End Home Hover*/
	
/*Phone*/
	$(".img_phone").mouseenter(function(){
		$('.hover_reachus').addClass('hover_reach_show');
	})
	.mouseleave(function(){
		$('.hover_reachus').removeClass('hover_reach_show');
	});
/*End Phone*/
	
	
/*Home Door*/
	function img_door_animIn() {
		$('.img_doorInner').attr("src", "img/doorInner.png");
		$('.img_doorInner img').css({ 
			'transform': 'perspective( 600px ) rotateY(-70deg)',
			'-webkit-transform': 'perspective( 600px ) rotateY(-70deg)', 
			'-o-transform': 'perspective( 600px ) rotateY(-70deg)', 
			'-ms-transform': 'perspective( 600px ) rotateY(-70deg)', 
			'-moz-transform': 'perspective( 600px ) rotateY(-70deg)',  
			'transition': '.5s linear transform', 
			'webkit-transition': '.5s linear transform', 
			'-o-transition': '.5s linear transform', 
			'-ms-transition': '.5s linear transform', 
			'-moz-transition': '.5s linear transform', 
			transformOrigin: 'left', 
			'-webkit-transform-origin': 'right',
			'-o-transform-origin': 'right',
			'-ms-transform-origin': 'right',
			'-moz-transform-origin': 'right',
			cursor: 'pointer'});
	};
	function img_door_animout() {
		$('.img_doorInner').attr("src", "img/doorInner.png");
		$('.img_doorInner img').css({
			'transform': 'rotateY(-0deg)',
			'-webkit-transform': 'rotateY(-0deg)', 		
			'-moz-transform': 'rotateY(-0deg)',
			'-ms-transform': 'rotateY(-0deg)',
			'transition': '.5s linear transform', 
			'webkit-transition': '.5s linear transform', 
			'-o-transition': '.5s linear transform', 
			'-ms-transition': '.5s linear transform', 
			'-moz-transition': '.5s linear transform', 
			transformOrigin: 'left', 
			cursor: 'pointer'});
	};	
	$(".img_doorInner, .img_door")
		.hover(function () {			
			img_door_animIn();
		})
		.mouseout(function () {
			img_door_animout();			
		}
	);
/*End Home Door*/
	
	
/* Hide elements */
	$('.shot img').hide();
	$('.shot.gallery img').show();
	
	$('.whoam img').hide();
	$('.about_para h1').hide();
	$('.about_para article').hide();
	
	$('.studio img').hide();
	
	$('.myclients img').hide();
	$('.clientlist_content').hide();
	
	$('.reachUs img').hide();
	$('.reachUs_para').hide();
	$('.address').hide();
	$('.location').hide();
	$('.enquiry').hide();
		
/* Page Scrollify */
	var samePage;
	var curMenu;
	$.scrollify({
		section : ".secScroll",
		sectionName : "section-name",
        easing: "easeOutExpo",
        scrollSpeed: 1100,
        offset : 0,
        scrollbars: true,
        before:function(id) {
				if(samePage != id){menuDeactive(curMenu)};
				switch (id) {
					case 0:
						if(samePage != id) {
							curMenu = $('.trn_home a');
							homeOut();
							setTimeout(homeIn,200);
							samePage = id;
						};
						break;
					case 1:
						if(samePage != id) {
							curMenu = $('.my_shots a');
							$('.shot img').show();
							samePage = id;
						};
						break;
					case 2:
						if(samePage != id) {
							curMenu = $('.who_am a');
							aboutOut();
							setTimeout(aboutIn,200);
							btnBack();
							samePage = id;
						};
						break;
					case 3:
						if(samePage != id) {
							curMenu = $('.my_studio a');
							studioOut();
							setTimeout(studioIn,200);
							samePage = id;
						};
						break;
					case 4:
						if(samePage != id) {
							curMenu = $('.my_clients a');
							clientsOut();
							setTimeout(clientsIn,200);
							samePage = id;
						};
						break;
					case 5:
						if(samePage != id) {
							curMenu = $('.reach_us a');
							reachOut();
							setTimeout(reachIn(),200);
							samePage = id;
						};
						break;
				};
				if(!didClick)menuActive(curMenu);
				didClick = false;
			},

	});
/*End Scrollify*/
	
//Home
	function homeIn() {
		$('.bg_home').addClass('animated fadeIn').show(),500;
		setTimeout("$('.img_light_l img').addClass('animated slideInDown').show()",300);
		setTimeout("$('.img_light_r img').addClass('animated slideInDown').show()",200);
		setTimeout("$('.img_photos img').addClass('animated zoomIn').show()",500)
		setTimeout("$('.img_phone img').addClass('animated zoomIn').show()",500)
		setTimeout("$('.img_stool img').addClass('animated slideInLeft').show()",600);
		//setTimeout("$('.img_stand img').addClass('animated slideInUp').show()",200);
		$('.img_stand img').show();
	};
	function homeOut() {
		$('.bg_home').removeClass('animated fadeIn').hide();
		$('.img_light_l img').removeClass('animated slideInDown').hide();
		$('.img_light_r img').removeClass('animated slideInDown').hide();
		$('.img_photos img').removeClass('animated zoomIn').hide();
		$('.img_phone img').removeClass('animated zoomIn').hide();
		$('.img_stool img').removeClass('animated slideInLeft').hide();
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
		setTimeout("$('.img_myblog img').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', $('.img_myblog img').removeClass('animated zoomIn'));",1500);
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
		$('.view_normal img, .view_cam img').show();
		$('.view_normal1 img, .view_cam1 img').show();
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
	};
	
// Clients
	function clientsIn() {
		$('.img_leftclients img').addClass('animated zoomIn').show();
		setTimeout("$('.img_rightclients img').addClass('animated zoomIn').show()",0);
		setTimeout("$('.myclients_left_rays img').addClass('animated flash').show()",300);
		setTimeout("$('.myclients_right_rays img').addClass('animated flash').show()",300);
		setTimeout("$('.img_clientlist img').addClass('animated zoomIn').show()",300);
		$('.slide img').show();
		setTimeout("$('.clientlist_content').addClass('animated zoomIn').show()",300);
	};
	function clientsOut() {
		$('.img_leftclients img').removeClass('animated zoomIn').hide();
		$('.img_rightclients img').removeClass('animated zoomIn').hide();
		$('.myclients_left_rays img').removeClass('animated flash').hide();
		$('.myclients_right_rays img').removeClass('animated flash').hide();
		$('.img_clientlist img').removeClass('animated zoomIn').hide();
		$('.slide img').hide();
		$('.clientlist_content').removeClass('animated zoomIn').hide();
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
	
	



/*MY Studio  Auto Scroll*/
	
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
/*End MY Studio  Auto Scroll*/
	


/*Fancy Box Gallery*/
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
		
/*End Fancy Box Gallery*/



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
	$('.img_fashion').on('tap', function() {
		//alert();
		//console.log('User tapped .img_fashion');
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
	/*Image Adv*/
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
	$('.img_adv').on('tap', function() {
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
	/*End Image Adv*/
	
	/*Image Interiors*/
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
	$('.img_interiors').on('tap', function() {
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
	/*End Image Interiors*/
	
	/*Image Life Style*/
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
	$('.img_life_style').on('tap', function() {
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
	/*End Image Life Style*/
	
	/*Image Industry*/
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
	$('.img_industry').on('tap', function() {
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
	/*End Image Industry*/
	
	/*Image Jewellery*/
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
	$('.img_jewellery').on('tap', function() {
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
	/*End Image Jewellery*/
	/*Image Food*/
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
	$('.img_food').on('tap', function() {
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
	/*End Image Food*/
	
	/*Image Hotel*/
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
			'-o-transform' : 'translateX(-100%)',
			
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
			'opacity' : '1'
		});	 
	});
	$('.img_hotel').on('tap', function() {
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
			'-o-transform' : 'translateX(-100%)',
			
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
			'opacity' : '1'
		});	 
	});
	/*End Image Hotel*/
	
	/*Image Corporate*/
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
	$('.img_corporate').on('tap', function() {
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
	/*End Image Corporate*/
	
	/*Image Automobile*/
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
	$('.img_automobile').on('tap', function() {
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
	/*End Image Automobile*/
/*End Shots Page Slide*/
	
/* Gallery Back Button */
	$('.btn_back').click(function(){
	
		btnBack();
				
	});
	$('.btn_back').on('tap', function() {
		btnBack();
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
	
/*End Gallery Back Button */	
	
/* Iscroll */
	loaded ();
	var myScroll;
		
	function loaded () {
		myScrollStudio = new IScroll('#wrapper_iscroll2', {
			scrollbars: true,
			mouseWheel: true,
			interactiveScrollbars: true,
			shrinkScrollbars: 'scale',
			fadeScrollbars: true
		});
	
	}	
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	
/*End Iscroll */
	

/* PopUp Box Reach us */
	$('.btn_enquiry').click(function() {
		$('.black_overlay').animate({'opacity':'0.5'}, 300, 'linear');
		$('.black_overlay, .white_content').css('display','block');
	}) ; 
	$('.close_box').click(function() {
		close_box();
	}) ;  
	$('.black_overlay').click(function() {
		close_box();
	});
	
	function close_box() {
		$('.black_overlay').animate({'opacity':'0'}, 300, 'linear');
		$('.black_overlay, .white_content').css('display','none');
		$('.black_overlay, #map').css('display','none');
	};
	$('.locate_img').click(function () {
		$('.black_overlay').animate({'opacity':'0.5'}, 300, 'linear');
		$('.black_overlay, #map').css('display','block');
	});
/*End PopUp Box Reach us */

/*Form Validation*/
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
	 		
			
/*Gallery Hover*/	 
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
/*End Gallery Hover*/
			

/*Home Page Clock*/	
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 3000);

 	/*Home Page Clock*/
	setInterval( function() {
	var seconds = new Date().getSeconds();
	var sdegree = seconds * 6;
	var srotate = "rotate(" + sdegree + "deg)";
	
	$("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
	  
	}, 1000 );
	
	
	setInterval( function() {
	var hours = new Date().getHours();
	var mins = new Date().getMinutes();
	var hdegree = hours * 30 + (mins / 2);
	var hrotate = "rotate(" + hdegree + "deg)";
	
	$("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
	  
	}, 1000 );
	
	
	setInterval( function() {
	var mins = new Date().getMinutes();
	var mdegree = mins * 6;
	var mrotate = "rotate(" + mdegree + "deg)";
	
	$("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
	  
	}, 1000 );
	
	curMenu = $('.trn_home a');
	menuActive(curMenu)
	
/* End Home Page Clock*/

/*Studio Button Hover*/
	//Studio
	$('.view_studio a').hover(function() {
		$('.view_normal img').css({
			transform:'scale(1) rotate(-50deg)',
			transition: '.5',
			'z-index': 2,
		});
		$('.view_cam').css({
			opacity: 1,
			'z-index': -0,
		});
	},
	function() {
		$('.view_normal img').css({
			transform:'scale(4) rotate(50deg)',
			transition: '.5',
		});
		$('.view_cam').css({
			opacity: 0,
			//'z-index': -0,
		});
	});
	
	//College
	$('.view_college a').hover(function() {
		$('.view_normal1 img').css({
			transform:'scale(1) rotate(-50deg)',
			transition: '.5',
			'z-index': 2,
		});
		$('.view_cam1').css({
			opacity: 1,
			'z-index': -0,
		});
	},
	function() {
		$('.view_normal1 img').css({
			transform:'scale(4) rotate(50deg)',
			transition: '.5',
		});
		$('.view_cam1').css({
			opacity: 0,
			//'z-index': -0,
		});
	});
/*End Studio Button Hover*/	
}); 	

