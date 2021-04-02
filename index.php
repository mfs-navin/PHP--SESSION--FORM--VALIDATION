<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Bootstrap css-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Registration Page</title>
</head>
<body>
	<div class="container-fluid" id="main_container">
		<br>
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<!--Header-->      
					<header class="card-header">
						<a href class="float-right btn btn-outline-primary my-1">Log In</a>
						<h4 class="card-title my-2">Registration</h4>
					</header>
					<article class="card-body">
						<!--Form Body-->       
						<form  id="signup" class="form" method="post"  enctype="multipart/form-data" >

							<!--Name Field-->		
							<div class="row form-group">
								<div class="col">
									<label  for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name">
									<span class="error" id="error_name">This field is required</span>
								</div>														
							</div>
							<!--Gender Field-->		
							<div class="form-group">
								<label>Gender</label>
								<div>
									<label><input type="radio" name="gender" value="1"> Male</label>
								</div>
								<div>
									<label><input type="radio" name="gender" value="2"> Female</label>
								</div>
								<span class="error" id="error_gender">Please select your gender</span>
							</div>
							<!--Email Field-->		
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email">
								<span class="error" id="error_email">A valid email address is required</span>
							</div>
							<!--Contact Number Field-->		
							<div class="form-group">
								<label for="phone">Contact Number</label>
								<input type="text" class="form-control"  name="phone" id="phone">
								<span class="error" id="error_phone">This field is required</span>
							</div>
							<!--Skills Field-->		
							<div class="form-group">
								<label>Skills</label>
							</div>
							<div class="form-group" id="skill_checkbox">
								<label class="checkbox-inline" for="c++"><input type="checkbox" name="skills[]" class="checkboxvar" value="c++" id="c++"> C++ </label>
								<label class="checkbox-inline" for="java"><input type="checkbox" name="skills[]" class="checkboxvar" value="java" id="java"> Java </label>
								<label class="checkbox-inline" for="python"><input type="checkbox" name="skills[]" class="checkboxvar" value="python" id="python"> Python </label>
								<label class="checkbox-inline" for="html"><input type="checkbox" name="skills[]" class="checkboxvar" value="html" id="html"> HTML </label>
								<label class="checkbox-inline" for="php"><input type="checkbox" name="skills[]" class="checkboxvar" value="php" id="php"> PHP</label>
								<br>
								<span class="error" id="error_skills">Please select atleast one skill</span>
							</div> 
							<!--Profile Picture Field-->		
							<div class="form-group">
								<label for="profile_pic">Upload Profile Photo:</label>
								<input type="file" class="form-control" name="profile_pic" id="profile_pic">
								
								<input type="button" class="mt-2" name="upload" value="Upload" id="upload">
								<span class="error">Please upload a profile photo</span>
							</div>
							<!--User About Field-->		
							<div class="form-group">
								<label for="about">About</label>
								<textarea class="form-control" rows="3" name="about" placeholder="Enter something about yourself." id="about"></textarea>
								<span class="error" id="error_about">This field is required</span>
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address">
								<span class="error" id="error_address">This field is required</span>
							</div>
							<!--Educational Qualification Field-->		
							<div class="form-group">
								<label for="education">Educational Qualification</label>
								<div class="dropdown">
									<select id="education" class="form-control" name="education">
										<option value="0">Select</option>
										<option value="10">Metric</option>
										<option value="12">Higher Secondary</option>
										<option value="16">Graduate</option>
										<option value="19">Post Graduate</option>
									</select>
									<span class="error" id="error_edu">Please select a option</span>	
								</div>
							</div>
							<!--Professional Links Field-->		
							<div class="form-group">
								<label for="links">Professional Links:</label>
								<br>
								<input type="text" class="form-control" name="linkedin" placeholder="LinkedIn link" id="linkedin">
								<span class="error" id="error_linkedin">This field is required</span>
								<br>
								<input type="text" class="form-control" name="github" placeholder="Github" id="github">
								<span class="error" id="error_github">This field is required</span>
							</div>
							<!--Register button-->		
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="register" id="register">Register</button>
								
							</div>
						</form>
						<div>

							<!--Server Side validation--> 

							<!-- To check if the server side validation is working or not please comment out line number 395 which includes "js/register.js" as scipt -->   

							<?php
							if(isset($_POST["register"]))
							{
								$error_list = array();

								function validate($var, $element_name)
								{
									switch ($element_name)
									{

								 	// Name validation
										case 'name':
											if (!preg_match('/^[A-Za-z ]+$/', $var)) 
												array_push($GLOBALS['error_list'], "Your name should only contain alphabets");

											if (strlen($var) < 3) 
												array_push($GLOBALS['error_list'], "Your name should be more than 3 characters");

											break;

									//Email Validation
										case 'email':
									
											if (!filter_var($var, FILTER_VALIDATE_EMAIL)) 
												array_push($GLOBALS['error_list'], "Please enter a valid email address");
												
											break;

										case 'phone':
											if (!preg_match('/^[0-9]+$/', $var)) 
												array_push($GLOBALS['error_list'], "There should be only numbers");
												

											if (strlen($var) != 10)
												array_push($GLOBALS['error_list'], "Your phone number should be 10 digits long");

										case 'about':
											if (strlen($var) < 10)
												array_push($GLOBALS['error_list'], "About section should be more than 10 characters");
												
											break;

										case 'address':
											if (strlen($var) < 8)
												array_push($GLOBALS['error_list'], "Address section should be more than 8 characters");
												
											break;

										case 'education':
											if ($var == '0')
												array_push($GLOBALS['error_list'], "Please choose your educational qualification");
											
											break;
													
										case 'linkedin':
											if (!preg_match("/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)+[a-zA-Z]*/i",$var))
												array_push($GLOBALS['error_list'], "Please enter a valid Linkedin url");
											
											break;

										case 'github':
											if (!preg_match("/((https?:\/\/)?((www|\w\w)\.)?github\.com\/)+[a-zA-Z]*/i",$var))
												array_push($GLOBALS['error_list'], "Please enter a valid Github url");

											break;

									//MIME type file validation    
										case 'photo':	
											if(!empty($var["name"]))
											{

				                            //user has browsed a file to upload
												if($var["error"] == 0)
												{

				                            //no errors with the file

				                            //alloweed file type array
													$allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");

													if((in_array($var["type"], $allowed_types)))
													{
				                                        //correct file type

				                                        //get the dot position
														$dot_pos = strrpos($var["name"], ".");

				                                        //from dot position to the end is the extension
														$extension = substr($var["name"], $dot_pos);

														// separating filename and extension name
														$file_name = explode('.', $var["name"]);

				                                        //use date function to get random number
														$random_name = $file_name[0].date("YmdHis").rand(100,999);

				                                        //add date function value with extension to get unique new file name
														$new_name = $random_name . $extension;


														if($var["size"] < 200000)
														{
															$uploaded = move_uploaded_file($var["tmp_name"],
																"upload/" . $new_name);

															if($uploaded)
															{
																return $new_name;
															}
															else
															{
																array_push($GLOBALS['error_list'], "File could not be uploaded");
															}   
														}
														else
														{
															array_push($GLOBALS['error_list'], "File should be less than 20KB " . "<br />" . "Your file size: " . $var["size"]. "<br />");
														}
													}
													else
													{
				                                     //invalid file type
														array_push($GLOBALS['error_list'], "Please upload JPG or PNG files");
														$error = true;
													}
												}
												else
												{
				                                //error with the file uploading
													array_push($GLOBALS['error_list'], "There are some errors with the file");
												}
											}
											break;

										
										default:
											array_push($GLOBALS['error_list'], "There are some errors");
											break;
									}
								}

	                        // Declaring variables to store form data and to validate
								$name = $_POST["name"];
								$gender = '';
								$email = $_POST["email"];
								$phone = $_POST["phone"];
								$skills = '';
								$photo = '';
								$about = $_POST["about"];
								$address = $_POST["address"];
								$education = $_POST["education"];
								$linkedin = $_POST["linkedin"];
								$github = $_POST["github"];

								$is_empty = false;
								

                            // Checking if the required fields are empty
								if (empty($name) || empty($email) || empty($phone) || empty($about) || empty($address) || empty($education) || empty($linkedin) || empty($github) || empty($_FILES["profile_pic"]["name"]))  
								{

									array_push($error_list, "One or more input fields are empty. <br/> Please provide input for all required fields.<br/> Please click upload button after uploading a profile picture if not.");

									$is_empty = true;
								}

 								else
								{
									$gender = $_POST["gender"];
									$skills = $_POST['skills'];

								// Name Validation
									$name = filter_var($name, FILTER_SANITIZE_STRING);
									validate($name, "name", $error_list);

								// Email Validation
									$email = filter_var($email, FILTER_SANITIZE_URL);
									validate($email, "email", $error_list);

								// Contact Number Validation
									$phone = filter_var($phone, FILTER_SANITIZE_STRING);
									validate($phone, "phone", $error_list);

								// About Validation
									$about = filter_var($about, FILTER_SANITIZE_STRING);
									validate($about, "about", $error_list);

								// Address Validation
									$address = filter_var($address, FILTER_SANITIZE_STRING);
									validate($address, "address", $error_list);

								// Education Validation
									validate($education, "education", $error_list);

								// Professional link validation
									$linkedin = filter_var($linkedin, FILTER_SANITIZE_URL);
									validate($linkedin, "linkedin", $error_list);
									
									$github = filter_var($github, FILTER_SANITIZE_URL);
									validate($github, "github", $error_list);

								// Profile Picture validation
									$profile_pic = $_FILES["profile_pic"];
									$photo = validate($profile_pic, "photo", $error_list);
								}

								if(!$is_empty && empty($error_list))
								{
	                            /// Creating session variables
									$_SESSION["name"] = $name;
									$_SESSION["gender"] = $gender;
									$_SESSION["email"] = $email ;
									$_SESSION["phone"] = $phone;
									$_SESSION["skills"] = $skills;
									$_SESSION["profile_pic"] = $photo;
									$_SESSION["about"] = $about;
									$_SESSION["addr"] = $address;
									$_SESSION["education"] = $education;
									$_SESSION["linkedin"] = $linkedin;
									$_SESSION["github"] = $github;

									echo "<script>location.href='php/output.php';</script>";
									exit;
								}
								else
								{
									foreach ($error_list as $key => $value) {
										echo $value . "<br/>";
									}
								}
							}
							?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>

	<!--Script to use jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Script for client side validation -->
    <script src="js/client_validation.js"></script>
   
</body>
</html>