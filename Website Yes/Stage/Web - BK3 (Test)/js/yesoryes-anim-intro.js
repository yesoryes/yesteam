
$('#intro-coin-yes').css('display', 'none');
$('#link-replay').css('display', 'none');


var t1 = new TimelineMax({onComplete:loop1});
t1
//.to("#intro-coin-yes", .1, {alpha:0})
.fromTo("#intro-hand",.2, {top:15}, {top:25, ease:Linear.easeNone}, "lp1")
.fromTo("#intro-hand",.2, {top:25}, {top:15, ease:Linear.easeNone})
;
function loop1()
{
  t1.gotoAndPlay("lp1");
}

$( "#intro-hand" ).mouseover(function() {
 t1.pause();
});
$( "#intro-hand" ).mouseout(function() {
  t1.resume();
});
$( "#intro-hand" ).click(function() {
  $( "#intro-hand" ).off();
  var t2 = new TimelineMax({onComplete:loop2});
  t2
  .fromTo("#intro-hand",.2, {top:25}, {top:58, ease:Linear.easeNone})
	.to("#intro-text",.2, {alpha:0}, "-=.2")
	.to("#intro-arrow",.2, {alpha:0}, "-=.4")
  ;
  function loop2()
  {
    press1();
		$('#intro-hand').css('cursor', 'default');
  }
});

function press1(){
	var t3 = new TimelineMax({onComplete:loop3});
	t3
	//.to("#question",.15, {top:-125, ease:Linear.easeNone}, "lp3")
	.to("#intro-hand",.15, {top:125, ease:Linear.easeNone}, "lp3")
	.to("#intro-rect",.2, {rotation:10}, "lp3")
	.fromTo("#intro-coin",1.5, {top:232}, {scaleX:1.5, scaleY:1.5, rotation:480, top:-550}, "-=.3")
	.to("#intro-rect",.2, {alpha:0}, "-=.9")
	.to("#intro-triangle",.2, {alpha:0}, "-=.9")
	.to("#intro-hand",.2, {alpha:0}, "-=.9")
	.to("#intro-coin",.2, {alpha:0}, "-=.0")
	;
	function loop3()
  {
		step2();
  }
}

function step2(){
	$('#intro-coin-yes').css('display', 'inline');
	var t4 = new TimelineMax({onComplete:loop4});
	t4
	.fromTo("#intro-coin-yes",1.5, {alpha:1, scaleX:0.5, scaleY:0.5, rotationX:480, top:-1000}, {scaleX:1, scaleY:1, rotationX:0, top:-10}, "-=.3")
	;
	function loop4()
  {
		$('#link-replay').css('display', 'inline');
		TweenLite.fromTo($('#link-replay'), 1.5, {css:{opacity:0}},{css:{opacity:.5}});
  }
}
$('#link-replay').mouseover(function() {
	TweenLite.to($('#link-replay'), .2, {css:{opacity:1}});	
});
$('#link-replay').mouseout(function() {
  TweenLite.to($('#link-replay'), .2, {css:{opacity:.5}});
});
$('#link-replay').click(function() {
  location.reload();
});