$(document).ready(function($) {
	
		// Init controller
		var controller = new ScrollMagic({
		  globalSceneOptions: {
			duration: $('section').height(),
			//triggerHook: .025,
			//triggerHook: 1,
			triggerHook: 'onProgress',
			reverse: true
		  }
		});
				
		// Change behaviour of controller
		// to animate scroll instead of jump
		controller.scrollTo(function(target) {
		
		  TweenMax.to(window, 0.5, {
			scrollTo : {
			  y : target,
			  autoKill : true // Allow scroll position to change outside itself
			},
			ease : Cubic.easeInOut
		  });
		
		});
		
		//  Bind scroll to anchor links
		$(document).on("click", "a[href^=#]", function(e) {
		  var id = $(this).attr("href");
		
		  if($(id).length > 0) {
			e.preventDefault();
		
			// trigger scroll
			controller.scrollTo(id);
		
			// If supported by the browser we can also update the URL
			if (window.history && window.history.pushState) {
			  //history.pushState("", document.title, id);
			}
		  }
		
		});
		
		
		//Tweens
		//var tween1 = TweenMax.from("#anim-services", 1, {x: -500});
		var tween2 = TweenMax.from("#anim-services", 1, {scale:5, alpha:0});
		
		//  ScrollScenes
		new ScrollScene({triggerElement: '#home'})
										.setClassToggle('#anchor1', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#home");
											}
											})
										.addTo(controller);
		new ScrollScene({triggerElement: '#portfolio'})
										.setClassToggle('#anchor2', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#portfolio");
											}
											})
										.addTo(controller);
		new ScrollScene({triggerElement: '#aboutus'})
										.setClassToggle('#anchor3', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#aboutus");
											}
											})
										.addTo(controller);
		new ScrollScene({triggerElement: '#services'})
										.setClassToggle('#anchor4', 'active')
										//.setPin("##anim-services")
										//.duration(400)
										//.triggerHook(1)
										.setTween(tween2)
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#services");
											}
											})
										.addTo(controller);
		new ScrollScene({triggerElement: '#contactus'})
										.setClassToggle('#anchor5', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#contactus");
											}
											})
										.addTo(controller);
		
		
		
		
		
});