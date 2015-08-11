$(document).ready(function(){
	jQuery.validator.addMethod("validEmail", function(value, element) 
	{
		return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Please enter valid email.");
	
	
	$("#contactForm").validate({
	
		rules: {
				name: "required",
				email: {
					required: true,
					validEmail: true
				},
				subject: "required",
				captcha_code: "required",
			},
		messages: {
				name: "Please enter your name",
			    email: {
					required: "Please enter email address",
					email: "Please enter a valid email address"
				},
			    subject: "Please enter your subject",
			    captcha_code: "Enter your captcha"
				
			}
	});	
	
});