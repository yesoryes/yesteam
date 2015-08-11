$(document).ready(function(){

	jQuery.validator.addMethod("validEmail", function(value, element) 
	{
		return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
	}, "Please enter valid email.");
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please"); 
	//validation for login
	$("#signin").validate({
		rules: {
				password: {
					required: true
				},
				email: {
					required: true,
					validEmail: true
				},
			},
		messages: {
				password: {
					required: "Please provide a password",
				},
				email: {
					required: "Please enter email address",
					email: "Please enter a valid email address"
				},
			}
	});
	//validation for enable location
	jQuery.validator.addMethod('selectOption', function (value) {
	        return (value != '0');
	    }, "Choose the option");
	
	$("#enable_location").validate({
		
		rules: {
				state: {
					selectOption: true,
				},
				city: {
					required: true,
					lettersonly: true,
				},
				pincode: {
					required: true,
					number: true
				},
			},
		messages: {
				
				city: {
					required: "Please enter city",
					
				},
				pincode: {
					required: "Please enter pincode",
				},
			}
	});
	$('#enableLocation').on('click', function() {
		$("#enable_location").valid();
	});

	//Validate category
	$("#category").validate({
		
		rules: {
				category_name: {
					required: true,
				},
				
			},
		messages: {
				
				category_name: {
					required: "Please enter name",
					
				},
			}
	});
	$('#category_validate').on('click', function() {
		$("#category").valid();
	});
	//Sub category to validate

	$("#sub_category_done").validate({
		
		rules: {
				categoryId: {
					selectOption: true,
				},
				SubCategory: {
					required: true,
				},
				
			},
		messages: {
				
				
				SubCategory: {
					required: "Please enter name",
				},
			}
	});
	$('#sub_category_validate').on('click', function() {
		$("#sub_category_done").valid();
	});

	//Validate edit category
	$("#ecategory").validate({
		
		rules: {
				category_name: {
					required: true,
				},
				
			},
		messages: {
				
				category_name: {
					required: "Please enter name",
					
				},
			}
	});
	
	//Edit Sub category to validate

	$("#subcategory_done").validate({
		
		rules: {
				categoryId: {
					selectOption: true,
				},
				subCategory: {
					required: true,
				},
				
			},
		messages: {
				
				
				subCategory: {
					required: "Please enter name",
				},
			}
	});
	//Charity validation 
	$("#charity_validation").validate({
		
		rules: {
				charity_name: {
					required: true,
				},
				reg_no: {
					required: true,
				},
				contact_person: {
					required: true,
				},
				
				contact_no: {
					required: true,
				},
				address: {
					required: true,
				},
				
			},
		messages: {
				
				
				charity_name: {
					required: "Please enter charity name",
				},
				reg_no: {
					required: "Please register number",
				},
				contact_person: {
					required: "Please enter person name",
				},
				
				contact_no: {
					required: "Please enter contact number",
				},
				address: {
					required: "Address required",
				},
			}
	});

	//Charity Edit page validation 
	$("#charity_validation_edit").validate({
		
		rules: {
				charity_name: {
					required: true,
				},
				reg_no: {
					required: true,
				},
				contact_person: {
					required: true,
				},
				
				contact_no: {
					required: true,
				},
				address: {
					required: true,
				},
				
			},
		messages: {
				
				
				charity_name: {
					required: "Please enter charity name",
				},
				reg_no: {
					required: "Please register number",
				},
				contact_person: {
					required: "Please enter person name",
				},
				
				contact_no: {
					required: "Please enter contact number",
				},
				address: {
					required: "Address required",
				},
			}
	});
	//validate country master to page.
	$("#country").validate({
		
		rules: {
				country_name: {
					required: true,
					lettersonly:true
				},
				
			},
		messages: {
				
				
				country_name: {
					required: "Please enter name",
				},
			}
	});
	$('#countryValidate').on('click', function() {
		$("#country").valid();
	});

	//validate country master to page.
	$("#stateId").validate({
		
		rules: {
				country_id: {
					selectOption: true,
				},
				state_name: {
					required: true,
					lettersonly:true
				},
			},
		messages: {
				
				
				state_name: {
					required: "Please enter state name",
				},
			}
	});

	//Change password validation in page
	$("#changePass").validate({
		
		rules: {
				currentpassword: {
					required: true,
				},
				newpassword: {
					required: true,
				},
				confirmpassword: {
					required: true,
					equalTo: "#newpassword"
				},
			},
		messages: {
				currentpassword: {
					required: "Please enter current password",
				},
				newpassword: {
					required: "Please enter new password",
				},
				confirmpassword: {
					required: "Please enter confirm password",
					equalTo: "Please enter the same password as above"
				},
			}
	});
	
});