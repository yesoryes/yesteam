// JavaScript Document
$(document).ready(function(e) {
    $('#pills-first a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
	/*DatePicker*/
	$('#datepicker').datepicker({
		changeYear: 'true',
		changeMonth: 'true',
		startDate: '07/16/1989',
		firstDay: 1
	});
	$('.calender-box').click(function(){
		$('#datepicker').datepicker('show'); 
		preventDefault();
	})
});