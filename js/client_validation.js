$(document).ready(function()
{

	function nameValidation()
	{
		var input = $(this);
		var is_name = input.val();
		var error = false;

		if(is_name.length < 3)
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass("error").addClass("error_show").text("Should be more than 3 Characters");
		}

		else if(is_name.length>=3)
		{
			if (/^[A-Za-z ]+$/.test(is_name)) 
			{
				error = false;
				input.removeClass("invalid").addClass("valid");
				input.next().removeClass("error_show").addClass("error");
			}
			else
			{
				error=true;
				input.removeClass("valid").addClass("invalid");
				input.next().removeClass("error").addClass("error_show").text("Should not contain any number");
			}
		}
		else
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass("error").addClass("error_show").text("Should be less than 10 Characters");

		}
		return error;

	}

	function emailValidation($email)
	{
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		var error = false;

		if(is_email)
		{
			error=false;
			input.removeClass("invalid").addClass("valid");
			input.next().removeClass('error_show').addClass('error');
		}
		else
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show');
		}
		return error;
	}

	function phoneValidation($phone)
	{
		var input = $(this);
		var is_phone = input.val();
		var error = false;

		if(is_phone.match(/^[0-9]+$/) == null)
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("There should be only numbers");
		}
		else if( is_phone.length != 10)
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("Contact number should be of 10 digits");
		}
		else
		{
			error = false;
			input.removeClass("invalid").addClass("valid");
			input.next().removeClass("error_show").addClass("error");
		}
		return error;
	}

	function addressValidation($address)
	{
		var input = $(this);
		var is_name = input.val();
		var error = false;

		if(is_name.length < 10)
		{
			error=true;
			input.removeClass("valid").addClass("invalid");
			input.next().removeClass('error').addClass('error_show').text("Should be more than 10 Characters");
		}
		else
		{
			if (is_name.match(/^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/)!=null) 
			{
				error = false;
				input.removeClass("invalid").addClass("valid");
				input.next().removeClass("error_show").addClass("error");
			}
			else{
				error=true;
				input.removeClass("valid").addClass("invalid");
				input.next().removeClass('error').addClass('error_show').text("Should be alphanumberic.");
			}
		}
		return error;
	}

	function educationQualificationValidation($educationValue)
	{
		var education = $(this);
		var education_value = education.val();
		var error = false;

		if( education_value == 0)
		{
			error=true;
			education.removeClass("valid").addClass("invalid");
			education.next().removeClass("error").addClass("error_show");
		}
		else
		{
			error=false;
			education.removeClass("invalid").addClass("valid");
			education.next().removeClass("error_show").addClass("error");
		}
		return error;
	}

	function aboutValidation($about)
	{
		var about = $(this);
		var is_about = about.val();
		var error = false;

		if( is_about.length >= 10)
		{
			if ( $.trim( is_about ) == '' )
			{
				error=true;
				about.removeClass("valid").addClass("invalid");
				about.next().removeClass("error").addClass("error_show").text("Please enter some text.");
			}
			else
			{
				error=false;
				about.removeClass("invalid").addClass("valid");
				about.next().removeClass("error_show").addClass("error");
			}
		}
		else
		{
			error=true;
			about.removeClass("valid").addClass("invalid");
			about.next().removeClass("error").addClass("error_show").text("Should be more than 10 Characters");
		}

		return error;
	}

	function linkedinValidation($linkedin)
	{
		var link = $(this);
		var is_link = link.val();
		var error = false;

		if( is_link.match(/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)+[a-zA-Z]*/i)==null)
		{
			error=true;
			link.removeClass("valid").addClass("invalid");
			link.next().removeClass("error").addClass("error_show").text("Enter a valid Linkedin Profile url");
		}
		else
		{
			error=false;
			link.removeClass("invalid").addClass("valid");
			link.next().removeClass("error_show").addClass("error");
		}
		return error;
	}

	function githubValidation($github)
	{
		var link = $(this);
		var is_link = link.val();
		var error = false;

		if( is_link.match(/((https?:\/\/)?((www|\w\w)\.)?github\.com\/)+[a-zA-Z]*/i)==null)
		{
			error=true;
			link.removeClass("valid").addClass("invalid");
			link.next().removeClass("error").addClass("error_show").text("Enter a valid Github profile url");
		}
		else
		{
			error=false;
			link.removeClass("invalid").addClass("valid");
			link.next().removeClass("error_show").addClass("error");
		}
		return error;
	}

	function profilePictureValidation($photo)
	{
		$(this).data('clicked', true);

		var file = $("#profile_pic")[0].files;
		var error = false;

		if (file["length"]>0){
			var fileType = file[0]["type"];

			var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

			if ($("#profile_pic").val()) 
			{
				if ($.inArray(fileType, validImageTypes) < 0) {
					error=true;

					$("#profile_pic").removeClass('valid').addClass('invalid');
					$("#upload").next().removeClass('error').addClass('error_show').text('Please select only an image with format gif, jpeg, jpg or png');
				}
				else{
					error=false;
					$("#profile_pic").removeClass('invalid').addClass('valid');
					$("#upload").next().removeClass('error_show').addClass('error');
				}
			}
		}
		return error;
	}

	function genderValidation()
	{
		var error = false;

		if($("input:radio[name='gender']").is(":checked")){

			error = false;
			$("#error_gender").removeClass('error_show').addClass('error');
		}
		else{

			error=true;
			$("#error_gender").removeClass('error').addClass('error_show');
		}

		return error;
	}

	function skillsValidation()
	{
		var error = false;

		if($("input:radio[name='gender']").is(":checked"))
		{
			error = false;
			$("#error_gender").removeClass('error_show').addClass('error');
		}
		else
		{
			error=true;
			$("#error_gender").removeClass('error').addClass('error_show');
		}
		return error;
	}

	var name_err = gender_err = email_err = phone_err = skills_err = photo_err = about_err = address_err = edu_err = linkedin_err = github_err= true;

//Name
	name_err = $('#name').keyup(nameValidation);

//Email
	email_err = $('#email').keyup(emailValidation);

//Contact Number
	phone_err = $('#phone').keyup(phoneValidation);

//Address
	address_err = $('#address').keyup(addressValidation);

//Educational Qualification
	edu_err = $('#education').change(educationQualificationValidation);

//About
	about_err = $('#about').keyup( aboutValidation);

//Professional Links
	linkedin_err = $("#linkedin").keyup(linkedinValidation);

	github_err = $("#github").keyup(githubValidation);

/// File MIME type validation
	photo_err = $("#upload").click(profilePictureValidation);

// Gender validation
	gender_err = $("form input:radio").change(genderValidation);


//Skills validation
	skills_err = $("form input:checkbox").change(skillsValidation);
	

// Validation on submitting form
	$("#register").click(function(event)
	{
		console.log("gender", gender_err);
		console.log("skills", skills_err);
		if( !name_err.hasClass('valid'))
		{
			$('#error_name').removeClass('error').addClass('error_show');
		}

		if( !gender_err.hasClass('valid'))
		{
			$('#error_gender').removeClass('error').addClass('error_show');
		}

		if( !email_err.hasClass('valid'))
		{
			$('#error_email').removeClass('error').addClass('error_show');
		}

		if( !phone_err.hasClass('valid'))
		{
			$('#error_phone').removeClass('error').addClass('error_show');
		}

		if( !skills_err.hasClass('valid'))
		{
			$('#error_skills').removeClass('error').addClass('error_show');
		}

		if( !address_err.hasClass('valid'))
		{
			$('#error_address').removeClass('error').addClass('error_show');
		}

		if( !edu_err.hasClass('valid'))
		{
			$('#error_edu').removeClass('error').addClass('error_show');
		}

		if( !about_err.hasClass('valid'))
		{
			$('#error_about').removeClass('error').addClass('error_show');
		}

		if( !linkedin_err.hasClass('valid'))
		{
			$('#error_linkedin').removeClass('error').addClass('error_show');
		}

		if( !github_err.hasClass('valid'))
		{
			$('#error_github').removeClass('error').addClass('error_show');
		}


	  //File Validation
	  if(!$('#upload').data('clicked')) 
	  {
	  	photo_err=true;
	  	$("#profile_pic").removeClass("valid").addClass("invalid");
	  	$("#upload").next().removeClass('error').addClass('error_show').text('Please select an image to upload and click on Upload button');
	  }
	  

	  if(name_err || gender_err || email_err|| phone_err || photo_err || about_err ||addr_err || edu_err || linkedin_err || github_err || error_check){
	  	event.preventDefault();
	  }


	});
});