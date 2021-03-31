<?php
session_start();

if(isset($_SESSION))
{

// Reading session variables to get the value of form data
	$name = $_SESSION["name"];
	$gender = $_SESSION["gender"];
	$email = $_SESSION["email"];
	$phone = $_SESSION["phone"];
	$skills = $_SESSION["skills"];
	$photo = $_SESSION["profile_pic"];
	$about = $_SESSION["about"];
	$address = $_SESSION["addr"];
	$education = $_SESSION["education"];
	$linkedin = $_SESSION["linkedin"];
	$github = $_SESSION["github"];

	if ($gender==1) 
	{
		$gender = "Male";
	}
	else
	{
		$gender = "Female";
	}

	$skills_str = "";
	foreach ($skills as $key => $value) {
		$skills_str = $skills_str . $value . ', ';
	}

	$edu_str = "";
	switch ($education) {
		case '10':
		$edu_str = $edu_str . "metric";
		break;

		case '12':
		$edu_str = $edu_str . "higher secondary";
		break;

		case '16':
		$edu_str = $edu_str . "graduate";
		break;

		case '19':
		$edu_str = $edu_str . "post graduate";
		break;
		
		default:
		$edu_str = $edu_str . "error";
		break;
	}

// Showing the data inputs by the user
	
	echo '
	<html>
	<head>
	<title>User Resume</title>
	<style>

	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 5px;
	}
	th {
		text-align: left;
	}
	caption {
		font-weight: bold;
		font-size: large;
		margin-bottom: 10px;
	}

	</style>
	</head>
	<body>

	<table style="width:100%">
	<caption>User Resume</caption>
	<tr>
	<th>Fields</th>
	<th>Your input</th>
	</tr>
	<tr>
	<td>Name</td>
	<td>'.$name.'</td>
	</tr>
	<tr>
	<td>Gender</td>
	<td>'.$gender.'</td>
	</tr>
	<tr>
	<td>Email</td>
	<td>'.$email.'</td>
	</tr>
	<tr>
	<td>Contact number</td>
	<td>'.$phone.'</td>
	</tr>
	<tr>
	<td>Skills</td>
	<td>'.$skills_str.'</td>
	</tr>
	<tr>
	<td>Profile Picture</td>
	<td><img src="../upload/'.$photo .'" width="200" height="200" /></td>
	</tr>
	<tr>
	<td>About</td>
	<td>'.$about.'</td>
	</tr>
	<tr>
	<td>Address</td>
	<td>'.$address.'</td>
	</tr>
	<tr>
	<td>Educational Qualification</td>
	<td>'.$edu_str.'</td>
	</tr>
	<tr>
	<td>Linkedin URL</td>
	<td>'.$linkedin.'</td>
	</tr>
	<tr>
	<td>Github URL</td>
	<td>'.$github.'</td>
	</tr>
	</table>

	</body>
	</html>
	';



	// Destroying session
	//session_destroy();
}

else
{
	echo "Session not set or destroyed";
}




?>