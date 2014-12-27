
$(function () {
	var platform = navigator.platform.toLowerCase();
	var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
	var is_safari = navigator.userAgent.toLowerCase().indexOf('safari') > -1;
	
    if (platform.indexOf('win') == 0 || platform.indexOf('linux') == 0) {
		if (is_chrome || is_safari) {
			$.srSmoothscroll({
				easing: 'swing',
				//autoCoefficient: 1000,
				step: 200,
				scrollTarget: null,
				//speed: 100,
				direction: 'top'
			});
        }
    }
});
