$(document).ready(function($) {
	
		// Init controller
		var controller = new ScrollMagic({
		  globalSceneOptions: {
			//duration: $('section').height(),
			//duration: $('section').height()/2,
			//triggerHook: .025,
			//triggerHook: 1,
			//triggerHook: 'onProgress',
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
		var tween2 = TweenMax.from("#anim-services", .3, {scale:5, alpha:0});
		
		//  ScrollScenes
		var sceneHome = new ScrollScene({triggerElement: '#home'})
										.duration($('section').height())
										.triggerHook(.5)
										.setClassToggle('#anchor1', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#home");
											  //console.log ("home");
											}
											})
										.addTo(controller);
		var scenePortfolio = new ScrollScene({triggerElement: '#portfolio'})
										.duration($('section').height())
										.triggerHook(.5)
										.setClassToggle('#anchor2', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#portfolio");
											  //console.log ("port");
											}
											})
										.addTo(controller);
		var sceneAboutus = new ScrollScene({triggerElement: '#aboutus'})
										.duration($('section').height())
										.triggerHook(.5)
										.setClassToggle('#anchor3', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#aboutus");
											}
											})
										.addTo(controller);
		var sceneServices = new ScrollScene({triggerElement: '#services'})
										.duration($('section').height())
										.triggerHook(.5)
										.setClassToggle('#anchor4', 'active')
										//.setPin("##anim-services")
										//.offset(50)
										//.on("change update", servicesrOn)
										//.off("change update", servicesrOff)
										.setTween(tween2)
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#services");
											}
											})
										.addTo(controller);
		var sceneContactus = new ScrollScene({triggerElement: '#contactus'})
										.duration($('section').height()/2)
										.triggerHook(.5)
										.setClassToggle('#anchor5', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#contactus");
											}
											})
										.addTo(controller);
		
		
		
		//sceneHome.addIndicators();
		//scenePortfolio.addIndicators();
		//sceneAboutus.addIndicators();
		//sceneServices.addIndicators();
		sceneContactus.addIndicators();
		
		
		function servicesrOn(event) {
        	console.log("Event fired ON! (" + event.type + ")");
		};
		function servicesrOff(event) {
        	console.log("Event fired OFF! (" + event.type + ")");
		};
		
});