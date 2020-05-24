<?php

// Declare variables
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date = ""; //Sign up date
$err_arr=array();

if(isset($_POST['register_button'])){

	//Registration form values

	//First name
	$fname = strip_tags($_POST['reg_fname']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['reg_fname'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['reg_lname']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['reg_lname'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['reg_email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['reg_email'] = $em; //Stores email into session variable

	//email 2
	$em2 = strip_tags($_POST['reg_email2']); //Remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2)); //Uppercase first letter
	$_SESSION['reg_email2'] = $em2; //Stores email2 into session variable

	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html tags
    $password2 = strip_tags($_POST['reg_password2']); //Remove html tags date("Y-m-d"); //Current date
    
    $date = date("Y-m-d"); //Current date


	if($em == $em2) {
		//Check if email is in valid format 
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($conn, "SELECT email FROM user WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($err_arr, "Email already in use");
			}

		}
		else {
			array_push($err_arr, "Invalid email format");
		}


	}
	else {
		array_push($err_arr, "Emails don't match");
	}


	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($err_arr, "Your first name must be between 2 and 25 characters");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($err_arr,  "Your last name must be between 2 and 25 characters");
	}

	if($password != $password2) {
		array_push($err_arr,  "Your passwords do not match");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($err_arr, "Your password can only contain english characters or numbers");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($err_arr, "Your password must be betwen 5 and 30 characters");
	}


	if(empty($err_arr)) {
		$password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
		}

		//Profile picture assignment
		$rand = rand(1, 2); //Random number between 1 and 2

		if($rand == 1)
			$profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
		else if($rand == 2)
			$profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";


            $query = mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
            echo "Error: " . mysqli_error($conn);

		array_push($err_arr, "<span style='color: #14C800;'>You're all set! Goahead and login!</span>");

		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
	}
 
}


?>