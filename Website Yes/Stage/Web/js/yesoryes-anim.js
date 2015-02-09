$(document).ready(function($) {
	
		// Init controller navController
		var navController = new ScrollMagic({
		  globalSceneOptions: {
			duration: $('section').height(),
			//triggerHook: .02,
			reverse: true
		  }
		});
				
		// to animate scroll instead of jump
		navController.scrollTo(function(target) {
		
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
			navController.scrollTo(id);
		
			// If supported by the browser we can also update the URL
			if (window.history && window.history.pushState) {
			  //history.pushState("", document.title, id);
			}
		  }
		});
		
		//  ScrollScenes navController
		new ScrollScene({triggerElement: '#home'})
										//.setPin("#home")
										.setClassToggle('#anchor1', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#home");
											}
											})
										.addTo(navController);
		new ScrollScene({triggerElement: '#portfolio'})
										//.setPin("#home")
										.setClassToggle('#anchor2', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#portfolio");
											}
											})
										.addTo(navController);
		new ScrollScene({triggerElement: '#aboutus'})
										//.setPin("#aboutus")
										.setClassToggle('#anchor3', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#aboutus");
											}
											})
										.addTo(navController);
		new ScrollScene({triggerElement: '#services'})
										//.setPin("#services")
										.setClassToggle('#anchor4', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#services");
											}
											})
										.addTo(navController);
		new ScrollScene({triggerElement: '#contactus'})
										//.setPin("#contactus")
										.setClassToggle('#anchor5', 'active')
										.on("enter", function (event) {
											if (window.history && window.history.pushState) {
											  history.pushState("", document.title, "#contactus");
											}
											})
										.addTo(navController);
		
		
		
		// Init controller animController1
		var animController1 = new ScrollMagic({
		  globalSceneOptions: {
			//duration: $('section').height()/2,
			//triggerHook: .025,
			reverse: true
		  }
		});
		
		
		new ScrollScene({triggerElement: '#services'})
										.setTween(TweenMax.from('#anim-services', 0.3, {
											alpha:0,
											scale:5,
											}))
										.addTo(animController1);
										
		new ScrollScene({triggerElement: '#contactus'})
										.setTween(TweenMax.from('#anim-contact', 0.3, {
											alpha:0,
											scale:.5,
											}))
										.addTo(animController1);
		
		
		





		
});