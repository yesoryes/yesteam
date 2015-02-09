$(document).ready(function($) {
	
		// Init controller
		var animController = new ScrollMagic();
		var navController = new ScrollMagic();
				
		// Animation will be ignored and replaced by scene value in this example
		var tween = TweenMax.to('#anim-contact', 0.5, {
			//backgroundColor: 'rgb(255, 39, 46)',
			scale: 5,
			rotation: 360
		});
		
		// Create the Scene and trigger when visible
		var animScene = new ScrollScene({
			triggerElement: '#contactus',
			triggerHook: .9,
			//duration: 300, /* How many pixels to scroll / animate */
			duration: $('section').height()/2,
		})
		.setTween(tween)
		.addTo(animController);
		
		// Create the Scene and trigger when visible
		var navScene = new ScrollScene({
			triggerElement: '#contactus',
			//triggerHook: .9,
			//duration: 300, /* How many pixels to scroll / animate */
			duration: $('section').height(),
		})
		.setClassToggle('#anchor5', 'active')
		.addTo(navController);
		
		// Add debug indicators fixed on right side
		animScene.addIndicators();
		//navScene.addIndicators();
		
		
		
});