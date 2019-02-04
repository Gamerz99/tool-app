	$(document).ready(function() {
			
				jQuery.validator.addMethod("lettersonly", function(value, element) {
					return this.optional(element) || /^[a-z]+$/i.test(value);
					}, "Please enter only letters without space."); 
					
			// validate contact form on keyup and submit
			$("#form").validate({
			
			 errorElement: "span", 
			 
			 
			//set the rules for the fields
			rules: {
			
				name: {
					required: true,
					minlength: 5,
					maxlength:25,
					lettersonly: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5,
					maxlength:15
				},
				
				gender : {
					required :true
				},
				
				state : {
					required :true
				},
				
				terms : {
					required :true
				},	
				
			},
			//set messages to appear inline
			messages: {
			
				name: {
					required: "Name is required..",
				},
				
				password: {
				required: "Please provide a password.",
				minlength: "Your password must be at least 5 characters long",
				maxlength: "Password can not be more than 15 characters"
				},
				
				email: "Valid email is required.",
				
				terms: "You must agree to our terms.",
				gender: "Gender is required",
				state: "Select state"
				
				
				
			},
			
		errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

		});
	});