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
					<header class="card-header">
						<a href class="float-right btn btn-outline-primary mt-1">Log In</a>
						<h4 class="card-title mt-2">Registration</h4>
					</header>
					<article class="card-body">
						<form  id="signup" class="form" method="post" action="php/process_post.php" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col">
									<label  for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name">
									<span class="error">This field is required</span>
								</div>														
							</div>
							
							<div class="form-group">
								<label class="form-check-inline">
									<input class="form-check-input" type="radio" id="male" name="male" value="male">
									<span class="form-check-label"> Male </span>
								</label>
								<label class="form-check-inline">
									<input class="form-check-input" type="radio" id="female" name="female" value="female">
									<span class="form-check-label"> Female </span>
								</label>
                                <br>
                                <span class="error" id="gender_error">Please select your gender</span>
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email">
								<span class="error">A valid email address is required</span>
							</div>
							<div class="form-group">
								<label for="phone">Contact Number</label>
								<input type="text" class="form-control"  name="phone" id="phone">
								<span class="error">This field is required</span>
							</div>
							
							<div class="form-group">
								<label>Skills</label>
							</div>
							<div class="form-group ml-5">
								<label class="checkbox-inline" for="c++"><input type="checkbox" name="skills" class="checkboxvar" value="c++" id="c++"> C++ </label>
								<label class="checkbox-inline" for="java"><input type="checkbox" name="skills" class="checkboxvar" value="java" id="java"> Java </label>
								<label class="checkbox-inline" for="python"><input type="checkbox" name="skills" class="checkboxvar" value="python" id="python"> Python </label>
								<label class="checkbox-inline" for="html"><input type="checkbox" name="skills" class="checkboxvar" value="html" id="html"> HTML </label>
								<label class="checkbox-inline" for="php"><input type="checkbox" name="skills" class="checkboxvar" value="php" id="php"> PHP</label>
								
								<span class="error">Please select atleast one skill</span>
							</div> 
							<div class="form-group">
								<label for="file">Upload Profile Photo:</label>
								
								<input type="file" class="form-control" name="profile_pic" id="file">
								<span class="error">Please upload a profile photo</span>
							</div>
							<div class="form-group">
								<label for="about">About</label>
								<textarea class="form-control" rows="3" name="about" placeholder="Enter something about yourself." id="about"></textarea>
								<span class="error">This field is required</span>
							</div>
							<div class="form-group">
								<label for="addr">Address</label>
								<input type="text" class="form-control" id="addr" name="addr">
								<span class="error">This field is required</span>
							</div>
							<div class="form-group">
								<label for="education">Educational Qualification</label>
								<div class="dropdown" id="drop_education" name="drop_education">
									<select id="education" class="form-control" name="education">
										<option value="0">Choose</option>
										<option value="metric">Metric</option>
										<option value="higher_secondary">Higher Secondary</option>
										<option value="graduate">Graduate</option>
										<option value="post_graduate">Post Graduate</option>
									</select>
									<span class="error">This field is required</span>	
								</div>
							</div>
						<!--
							<div class="form-group">
								<label>Interests</label>
								<select class="selectpicker" multiple id="my">
									<option>Mustard</option>
									<option>Ketchup</option>
									<option>Relish</option>
								</select>

							</div> -->

							<div class="form-group">
								<label for="links">Professional Links:</label>
								<br>
								<input type="text" class="form-control" name="linkedin" placeholder="LinkedIn link" id="linkedin">
                                <span class="error">This field is required</span>
								<input type="text" class="form-control" name="github" placeholder="Github" id="github">
                                <span class="error">This field is required</span>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Register</button>
								
							</div>
						</form>
                        <div>
                            <!--
                            <?php

                            if(isset($_POST["register"]))
                            {

                                $name = $_POST["name"];
                                $gender = '';
                                $email = $_POST["email"];
                                $phone = $_POST["phone"];
                                $skills = '';
                                $photo = '';
                                $about = $_POST["about"];
                                $address = $_POST["addr"];
                                $education = $_POST["education"];
                                $linkedin = $_POST["linkedin"];
                                $github = $_POST["github"];

                                $error = false;

// Name Validation
                                if ( empty($name))
                                {
                                    echo "Please enter your name" . "<br />";
                                    $error = true;
                                } 

                                elseif (!preg_match('/^[A-Za-z ]+$/', $name)) {
                                    echo "Your name should only contain alphabets" . "<br />";
                                    $error = true;
                                }

                                elseif (strlen($name) < 3) {
                                    echo "Your name should be more than 3 characters" . "<br />";
                                    $error = true;
                                }

// Gender Validation
                                if (empty($_POST["gender"])) {
                                    echo "Please choose your gender". "<br />";
                                    $error = true;
                                }
                                else{
                                    $gender = $_POST["gender"];
                                }


// Skills validation
                                if (empty($_POST["skills"])) {
                                    echo "Please choose atleast one skill" . "<br/>";
                                    $error = true;
                                }
                                else{
                                    $skills = $_POST['skills'];
                                }

//Email Validation
                                if (empty($email)) {

                                    echo "Please enter your email" . "<br />";
                                    $error = true;
                                }

                                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                    echo "Please enter a valid email address" . "<br />";
                                    $error = true;
                                }

// Contact Number Validation
                                if (empty($phone)) {
                                    echo "Please enter your contact number" . "<br />";
                                    $error = true;
                                }

                                elseif (!preg_match('/^[0-9]+$/', $phone)) {
                                    echo "There should be only numbers" . "<br />";
                                    $error = true;
                                }

                                if (strlen($phone) != 10) {
                                    echo "Your phone number should be 10 digits long" . "<br />";
                                    $error = true;
                                }

//File validation    
                                if(!empty($_FILES["profile_pic"]["name"]))
                                {
//user has browsed a file to upload
                                    if($_FILES["profile_pic"]["error"] == 0)
                                    {
//no errors with the file

//alloweed file type array
                                        $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");

                                        if((in_array($_FILES["profile_pic"]["type"], $allowed_types)))
                                        {
                //correct file type

                //get the dot position
                                            $dot_pos = strrpos($_FILES["profile_pic"]["name"], ".");

                //from dot position to the end is the extension
                                            $extension = substr($_FILES["profile_pic"]["name"], $dot_pos);

                //use date function to get random number
                                            $random_name = date("YmdHis");

                //add date function value with extension to get unique new file name
                                            $new_name = $random_name . $extension;


                                            if($_FILES["profile_pic"]["size"] < 200000)
                                            {
                                                $uploaded = move_uploaded_file($_FILES["profile_pic"]["tmp_name"],
                                                 "upload/" . $new_name);

                                                if($uploaded)
                                                {
                                                    $photo = $new_name;

                                                }
                                                else
                                                {
                                                    echo "File could not be uploaded". "<br />";
                                                    $error = true;
                                                }   
                                            }
                                            else
                                            {
                                                echo "File should be less than 20KB " . "<br />" . "Your file size: " . $_FILES["profile_pic"]["size"]. "<br />";
                                                $error = true;
                                            }
                                        }
                                        else
                                        {
                    //invalid file type
                                            echo "Please upload JPG or PNG files". "<br />";
                                            $error = true;
                                        }
                                    }
                                    else
                                    {
                //error with the file uploading
                                        echo "There are some errors with the file". "<br />";
                                        $error = true;
                                    }
                                }
                                else
                                {
            //error message for not selecting any file
                                    echo "Please browse a file to upload". "<br />";
                                    $error = true;
                                }

// About Validation
                                if (empty($about)) {
                                    echo "Please enter something about yourself" . "<br />";
                                    $error = true;
                                }

                                elseif (strlen($about) < 10) {
                                    echo "About section should be more than 10 characters" . "<br />";
                                    $error = true;
                                }

// Address Validation
                                if (empty($address)) {
                                    echo "Address field should not be empty" . "<br />";
                                    $error = true;
                                }

                                elseif (strlen($address) < 8) {
                                    echo "Address section should be more than 8 characters" . "<br />";
                                    $error = true;
                                }

// Education Validation
                                if ($education == '0') {
                                    echo "Please choose your educational qualification" . "<br />";
                                    $error = true;
                                }

// Professional link validation
                                if (empty($linkedin)) {
                                    echo "Please enter your Linkedin url". "<br/>";
                                    $error = true;
                                }

                                else{
                                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
                                        echo "Please enter a valid url". "<br/>";
                                        $error = 'true';
                                    }
                                }

                                if (empty($github)) {
                                    echo "Please enter your Github url" . "<br/>";
                                    $error = true;
                                }
                                else{
                                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
                                        echo "Please enter a valid url". "<br/>";
                                        $error = 'true';
                                    }
                                }

                                if(!$error)
                                {
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

                                    echo "<script>location.href='php/process.php';</script>";

                                    exit;
                                }
                            }

                            ?>-->
                        </div>
                    </article>
                </div>
            </div>
            <div class="form-group">

            </div>
        </div>
    </div>




    <!-- scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="js/register.min.js"></script>

</body>
</html>