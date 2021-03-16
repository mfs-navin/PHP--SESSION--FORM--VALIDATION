
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
		session_start();
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

?>