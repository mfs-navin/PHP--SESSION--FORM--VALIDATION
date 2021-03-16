<?php
	session_start();

if(!isset($_SESSION["firstName"]))
{
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

    echo "Your inputs:". "<br />";
	echo "-------------------------------------". "<br />";
	echo "Name: " . $name . "<br />";
	echo "Gender" . print_r($gender) . "<br />";
	echo "Email: " . $email . "<br />";
	echo "Phone: " . $phone . "<br />";
	echo "Skill: " ;
	foreach ($skills as $key => $value) {
		echo $value . ', ';
	}
	echo "<br/>";
	echo "Photo: " . $photo ."<br/>";
	echo '<img src="/upload/'.$photo .'" alt="Random image" />'."<br /><br />";
	echo "About: " . $about . "<br />";
	echo "Address: " . $address . "<br />";
	echo "Education Qualification: " . $education . "<br />";
	echo "Linkedin url: ". $linkedin. "<br/>";
	echo "Github url: ". $github. "<br/>";
}

	

?>