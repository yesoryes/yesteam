// Parallax

$(document).ready(function() {
	
    function para() {
	
		var s;
		
		function setHeightKey() {
			
			/*IE smooth Scroll fix*/
			$('body').on("mousewheel", function () {
				
				event.preventDefault();
			
				var wheelDelta = event.wheelDelta;
			
				var currentScrollPosition = window.pageYOffset;
				window.scrollTo(0, currentScrollPosition - wheelDelta);
				//alert('indian');
			});
			/*End*/
			
			
			if(s){
				//alert(s);
				s.destroy();
			};
			
			var wHeight = "top:-"+($(document).height()-$(window).height())+"px;";
			
			/*$('#wrapper').removeAttr("data-0");
			$('#wrapper').removeAttr("data-2000");
			$('#wrapper').removeAttr("data-5000");
			$('#wrapper').removeAttr("data-6000");*/
			
			
			$('#wrapper').attr("data-0","top:0px; position:fixed;");
			$('#wrapper').attr("data-2000","top:0px;");
			$('#wrapper').attr("data-5000",wHeight);
			$('#wrapper').attr("data-6200",wHeight);
			
			//skrollr
			s = skrollr.init({
				smootScrolling: true,
				scale:3,
				forceHeight:true,
				render: function(data) {
					console.log(data.curTop/3);
				},
				beforerender: function(element, data) {
					//return data.curTop > data.lastTop;
					//console.log(element);
					//return data.direction == 'down';
				},
				
				keyframe: function(element, name, direction) {
				//keyframe: function(element) {
					//console.log("key= "+element);
					var fwd;
					if(direction=='down'){
						fwd=true;
					} else {
						fwd=false;
					}
					if(name=='data1750' || name=='data3250' || name=='data4450') { //for ToolTip
						if(fwd) {
							$(element).css({'left':'50%', 'opacity':'1',});
							
						} else {
							//s.destroy(element);
							$(element).css({'left':'60%', 'opacity':'0',});
							
						}
					}
				},
			});	
			
																	
		};
		setHeightKey();
	
		
		
		
		
		
		
		
		
		/*despcription START*/
		$(".door_trip").hover(function(){
			$(this).find('.door_img').addClass('fadeOut');
			$(this).find('.hover_effect').addClass('fadeIn');
			//$(this).find('.hover_effect').animate({top:-20});
		}, function(){
			$(this).find('.door_img').removeClass('fadeOut');
			$(this).find('.hover_effect').removeClass('fadeIn');
		});	
		/*despcription END*/
		
		
		var rs;
		$(window).resize(function(){
		  clearTimeout(rs);
		  rs = setTimeout(function(){
			// call your function
			console.log("resized");
			setHeightKey();
			//s.refresh($("html"));
		  },750);
		});			
		
		$("#skr_arrow").click(function(){
			//alert("ff");
			s.animateTo(2950*3,{duration:2000});
		});
	

	};
});
