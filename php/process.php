<?php
	POST_start();

if(!isset($_POST["firstName"]))
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $skills = $_POST["skills"];
    $photo = $_POST["profile_pic"];
    $about = $_POST["about"];
    $address = $_POST["addr"];
    $education = $_POST["education"];
    $linkedin = $_POST["linkedin"];
    $github = $_POST["github"];

    echo "Your inputs:". "<br />";
	echo "-------------------------------------". "<br />";
	echo "Name: " . $name . "<br />";
	echo "Gender" . print_r($gender) . "<br />";
	echo "Email: " . $email . "<br />";
	echo "Phone: " . $phone . "<br />";
	echo "Skill: " . print_r($skills) . "<br />";
	echo "Photo: " . $photo ."<br/>";
	echo '<img src="/upload/'.$photo .'" alt="Random image" />'."<br /><br />";
	echo "About: " . $about . "<br />";
	echo "Address: " . $address . "<br />";
	echo "Education Qualification: " . $education . "<br />";
	echo "Linkedin url: ". $linkedin. "<br/>";
	echo "Github url: ". $github. "<br/>";
}

	

?>