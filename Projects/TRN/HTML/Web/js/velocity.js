// JavaScript Document

/*Home*/
 	//Image Light Right
	function img_light_r() {
		$('.img_light_r').velocity(
		{
		top: 50,
		opacity: 1,
		},
		500);
	};
	
	img_light_r()
	
	//Image Light Right
	function img_light_l() {
		$('.img_light_l').velocity(
		{
		top: 80,
		opacity: 1,
		},
		500);
	};
	img_light_l();	
	
	//Image Stool
	$(".img_stool").mouseenter(function(){
		$('.hover_myclients').addClass('hover_myclients_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	})
	.mouseleave(function(){
		$('.hover_myclients').removeClass('hover_myclients_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
	});
	
	//img_stool();
	
	//Text
	function bg_home() {
		$('.bg_home').velocity(
		
		"fadeIn", { delay: 500, duration: 1500 }
		);	
	};	
	
	$(".bg_home").load(function(){
		bg_home()
	});
	
	
		//Image Stand
		$('.img_stand').velocity(
		{
		bottom: -5,
		},
		500);
		
		
		$(".img_stand").mouseenter(function(){
		$('.hover_whoam').addClass('hover_whoam_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(0deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
		})
		.mouseleave(function(){
		$('.hover_whoam').removeClass('hover_whoam_show');
		//$('.hover_myShots img').css({ transform: 'rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'right', cursor: 'pointer'});
		});
	
	
	
	
	//for img_door
	
	function img_door_animIn() {
		$('.img_doorInner a').attr("src", "img/doorInner.jpg");
		$('.img_doorInner a img').css({ transform: 'perspective( 600px ) rotateY(70deg)', transition: '.5s linear transform', transformOrigin: 'left', cursor: 'pointer'});
	};
	function img_door_animout() {
		$('.img_doorInner a').attr("src", "img/doorInner.jpg");
		$('.img_doorInner a img').css({transform: 'rotateY(-0deg)', transition: '.5s linear transform', transformOrigin: 'left', cursor: 'pointer'});
	};

		//MouseOver
		
		$(".img_door, .img_doorInner")
			.hover(function () {			
				img_door_animIn();
			})
			.mouseout(function () {
				img_door_animout();			
			}
		);
		
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
	
/*End Home*/

/*Who Am I*/
	//Image Light Right
	function whoam_rays() {
		$('.whoam_rays').velocity(
		{
		top: 90,
		opacity: 1,
		},
		1000);
	};
	whoam_rays();
	
	//View Blog
	function img_myblog() {
 		 $(".img_myblog").effect( "shake", {times:4}, 1000 );
	};
	$(".img_door, .img_doorInner")
			.hover(function () {			
				img_myblog();
			})
			
	
	
/*End Who Am I*/



/*My Studio*/
	function mystudio_rays() {
		$('.mystudio_rays').velocity(
		{
		top: 40,
		zIndex: 0	
		},
		1000);
	};
	mystudio_rays();
	
	$(".projector").mouseenter(function(){
		$(".tooltip").addClass('hover_tool_show');
		
	})
	.mouseleave(function(){
		$(".tooltip").removeClass('hover_tool_show');
		
	});
	$(".projector").click(function(){
		
		$(".mystudio_rays").fadeToggle();
		$(".projector").toggleClass("active");
	});
/*End My Studio*/
