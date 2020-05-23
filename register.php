<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "demo");



if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}

// Declare variables
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date="";
$err_arr=array();

if(isset($_POST['reg_button'])){

// Registration form values

//First Name
$fname=strip_tags($_POST['reg_fname']);//remove html tags
$fname = str_replace(' ', '', $fname );//remove spaces
$fname = ucfirst(strtolower($fname) );//uppercase first letter
$_SESSION['reg_fname'] = $fname;//stores values for current seession
//Last Name
$lname=strip_tags($_POST['reg_lname']);//remove html tags
$lname = str_replace(' ', '', $lname );//remove spaces
$lname = ucfirst(strtolower($lname) );//uppercase first letter
$_SESSION['reg_lname'] = $lname;

//Email
$em=strip_tags($_POST['reg_email']);//remove html tags
$em = str_replace(' ', '', $em );//remove spaces
$_SESSION['reg_email'] = $em;


//Confirm Email
$em2=strip_tags($_POST['reg_email2']);//remove html tags
$em2 = str_replace(' ', '', $em );//remove spaces
$_SESSION['reg_email2'] = $em2;

//Password
$password=strip_tags($_POST['reg_password']);//remove html tags
$password = str_replace(' ', '', $password );//remove spaces

//Confirm password
$password2=strip_tags($_POST['reg_password2']);//remove html tags
$password2 = str_replace(' ', '', $password2 );//remove spaces

$date=date("Y-m-d"); //Current date

if($em == $em2){
     // Formats the email
    if(filter_var($em, FILTER_VALIDATE_EMAIL)){
    
        $em = filter_var($em, FILTER_VALIDATE_EMAIL);

        //Checks to see if the email already exists
        $e_check= mysqli_query($conn, "SELECT email FROM user WHERE email = '$em'" );

        // Count the number of rows
        $num_rows = mysqli_num_rows($e_check);
 
        if($num_rows>0){
            array_push($err_arr, "This email is already in use" );
          
        }


    }
    else{

        array_push($err_arr, "Invalid format" );
    }
}
    else{
        echo "Email does not match";
    }

    if(strlen($fname)> 40 || strlen($fname)<2){
        array_push($err_arr, "First name must be between 2-40 characters");
    }
    if(strlen($lname)> 40 || strlen($lname)<2){
        array_push($err_arr, "Last name must be between 2-40 characters");
    }
    if($password != $password2){

        array_push($err_arr,  "Passwords do not match");
    }else{
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($err_arr,   "Password must not contain special characters ex. !@#$");
        }
    }

    if(strlen($password>30||strlen($password) <5)){
        array_push($err_arr,   "Your password must be between 5-30 characters");
    }

}




if($password == $password2){

}else{
    echo "Email does not match";
}




   



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Register Form</title>
</head>
<body>
<form action="register.php" method="POST">
<div class="container">
  <div class="form-group">
    <label for="exampleInputFirstName">First Name</label>
    <input type="text" class="form-control" id="exampleInputFirstName" aria-describedby="FirstNameHelp" placeholder="First Name" name="reg_fname"
    value="<?php
    if(isset($_SESSION['reg_fname'])){
        echo $_SESSION['reg_fname'];

    }
    ?>"
    required
    >
  </div>
  <div class="form-group">
    <label for="exampleInputFirstName">Last Name</label>
    <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="LastNameHelp" placeholder="Last Name" name="reg_lname"
    value="<?php
    if(isset($_SESSION['reg_lname'])){
        echo $_SESSION['reg_lname'];

    }
    ?>"
    >
  </div>

  <div class="form-group">
    <label for="exampleInputLastName">Email address</label>
    <input type="email" class="form-control" id="exampleInputLastName" aria-describedby="EmailHelp" placeholder="Email" name="reg_email"
    value="<?php
    if(isset($_SESSION['reg_email'])){
        echo $_SESSION['reg_email'];

    }
    ?>"
    >
  </div>
  <div class="form-group">
    <label for="exampleInputLastName">Email address</label>
    <input type="email" class="form-control" id="exampleInputLastName" aria-describedby="EmailHelp" placeholder="Confirm Email" name="reg_email2"
    value="<?php
    if(isset($_SESSION['reg_email2'])){
        echo $_SESSION['reg_email2'];

    }
    ?>"

    
    >
  </div>

 
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"placeholder=" Password" name="reg_password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="reg_password2">
  </div>

  <button type="submit" class="btn btn-primary" name="reg_button" >Register</button>
</form>
</div>


    
</body>
</html>