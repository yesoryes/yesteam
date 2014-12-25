$(document).ready(function(){

/****************
Delcare and store your tweens and/or timelines in a variable and always set them paused.
REMEMBER THE VARIABLE NAME. THAT IS VERY IMPORTANT!!!!
The duration of the tweens is irrelevant since you are using
a scrolling position to set their progress, just use 1 BUT NEVER USE 0!!!!
*****************/
var center =  ((($(window).width() - $("div#cont2").outerWidth()) / 2) + $(window).scrollLeft());
console.log(center);

var tl1 = new TimelineMax({paused:true});
tl1.append( TweenMax.staggerTo($("div#cont1 p"), 1, {css:{autoAlpha:0}}, 0.05) );
tl1.append( TweenLite.to($("div#cont1"), 1, {css:{left:'-1000px', autoAlpha:0}}) );

var tl2 = new TimelineMax({paused:true});
tl2.append( TweenLite.fromTo($("div#cont2"), 1, {css:{left:'-2000px', autoAlpha:0}}, {css:{left:center, autoAlpha:1}}) );
tl2.append( TweenMax.staggerFrom($("div#cont2 p"), 1, {css:{autoAlpha:0}}, 0.15) );
var tl2_1 = new TimelineMax({paused:true});
tl2_1.append( TweenMax.staggerTo($("div#cont2 p"), 0.5, {css:{autoAlpha:0}}, 0.1) );
tl2_1.append( TweenLite.to($("div#cont2"), 1, {css:{scaleX:0.01, scaleY:0.01, autoAlpha:0}}) );

var tl3 = new TimelineMax({paused:true});
tl3.append( TweenLite.from($("div#cont3"), 1, {css:{top:'1000px', autoAlpha:0}}) );
tl3.append( TweenMax.staggerFrom($("img.horImg"), 1, {css:{autoAlpha:0, scaleX:0.01, scaleY:0.01}}, 0.15) );
var tl3_1 = new TimelineMax({paused:true});
tl3_1.append( TweenMax.staggerTo($("div#cont3 img"), 1, {css:{scaleX:0.01, scaleY:0.01}}, 0.1) );
tl3_1.append( TweenLite.to($("div#cont3"), 1, {css:{left:'-1000px'}}) );

var tl4 = new TimelineMax({paused:true});
tl4.append( TweenLite.fromTo($("div#cont4"), 1, {css:{left:'2500px', scaleX:0.01, scaleY:0.01}}, {css:{left:center, scaleX:1, scaleY:1}}) );
tl4.append( TweenMax.staggerFrom($("div#cont4 input"), 1, {css:{scaleX:0.01, scaleY:0.01, transformOrigin:'top center'}}, 0.1) );
tl4.insert( TweenLite.from($("div#cont4 textarea"), 1, {css:{scaleX:0.01, autoAlpha:0, transformOrigin:'left'}, delay:1.5}) );
/*************************
SCROLL BREAKDOWN
This particular function has a simple work and that is to get the values of several important things to make the scroll
controlling tween work.
This function will trigger every time you scroll the window, whether is with the scrollbar, mouse wheel, scrollbar arrows,
keyboard arrow and page up and page down.

GETVERT
The variable getVert is going to return the actual vertical position of the element's scroll bar, in this particular case
the window element, but making a little change you can make this any DOM element. The most common used elements for this
are window and div, and keep in mind that there are several scroll plugins and libraries around the internet in order to
customize a div scroll bar, so you can give it a personal flavor.

GETHOR
The variable getHor returns the actual position of the horizontal of the element's scroll bar

SETTING THE SCROLL POSITION
If you are interested in setting the scroll position you can use Jack's ScrollToPlugin.
*************************/
$(window).scroll(function()
{
	var getVert = $(this).scrollTop();
	console.log(getVert);
	var getHor = $(this).scrollLeft();
		
	function scrollTween(startPoint, endPoint, tweenName, type)	
	{
		var progressNumber;
		if(type == 'vertical')
		{
			progressNumber = (1 / (endPoint - startPoint)) * (getVert - startPoint);
		}
		else if (type == 'horizontal')
		{
			progressNumber = (1 / (endPoint - startPoint)) * (getHor - startPoint);
		}
		if (progressNumber >= 0 && progressNumber <= 1)
		{
			tweenName.progress(progressNumber);
		}
		else if(progressNumber < 0)
		{
			tweenName.progress(0);
		}
		else if(progressNumber > 1)
		{
			tweenName.progress(1);
		}
	}
	scrollTween(0, 600, tl1, 'vertical');
	
	scrollTween(500, 1100, tl2, 'vertical');
	scrollTween(1200, 1800, tl2_1, 'vertical');
	
	scrollTween(1600, 2200, tl3, 'vertical');
	scrollTween(2330, 3000, tl3_1, 'vertical');
	
	scrollTween(2750, 3500, tl4, 'vertical');
	/*********************
	SCROLLTWEEN FUNCTION BREAKDOWN
	This is quite simple, the function works for both vertical and horizontal scrolling and needs 4 arguments to work.
	
	START
	The first argument is the start point, you can set this by a number but i strongly suggest to set it with the offset.top or offset.left
	property of an object (http://api.jquery.com/offset/), otherwise you are going to loose a lot of time seting up this point.
	
	END
	The second argument works just like start, and i suggest you use the offset property of an object to set this.
	
	TWEEN
	Remember the first comment in this file, this is where the name of the variable comes in handy, you create your Tween
	and store it in a variable, then when you call the function you just give the variable name and Javascript does the rest for you :D
	
	TYPE
	This determines whether the scroll that triggers the tween will be vertical or horizontal. This is a string so remember to use quotation
	marks, whether single or double quotation is irrelevant, they just have to be the same, so for no reason use this "horizontal', if you 
	started with double quotation, finish with double.
	**********************/
});

});