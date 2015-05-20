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
	};
})