<?php
require 'config/config.php';
require 'includes/form_handlers/register_handlers.php';
require 'includes/form_handlers/login_handlers.php';

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
<div class="container">
<div class="row">
<div class="col-sm">
<h1>Signup</h1>
<form action="register.php" method="POST">
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
    <!-- Store the error message in an array -->
    <?php 

        if(in_array("First name must be between 2-40 characters", $err_arr)) echo "First name must be between 2-40 characters";
        
    ?>

  </div>
  <div class="form-group">
    <label for="exampleInputFirstName">Last Name</label>
    <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="LastNameHelp" placeholder="Last Name" name="reg_lname"
    value="<?php
    if(isset($_SESSION['reg_lname'])){
        echo $_SESSION['reg_lname'];

    }
    ?>"
    required>

        <!-- Store the error message in an array -->
    <?php 

           if(in_array("Last name must be between 2-40 characters", $err_arr)) echo "Last name must be between 2-40 characters";
    ?>




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
            <!-- Store the error message in an array -->
    <?php 

            if(in_array("This email is already in use", $err_arr)) echo "This email is already in use";
            else if(in_array("Invalid format", $err_arr)) echo "Invalid format";
            else if(in_array("Email does not match", $err_arr)) echo "Email does not match";

    ?>

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

<!-- Store the error message in an array -->
    <?php 

        if(in_array("Passwords do not match", $err_arr)) echo "Passwords do not match";
        else if(in_array( "Your password must be between 5-30 characters", $err_arr)) echo "Your password must be between 5-30 characters";
        else if(in_array("Password must not contain special characters ex. !@#$", $err_arr)) echo "Password must not contain special characters ex. !@#$";

   ?>


  </div>

  <button type="submit" class="btn btn-primary" name="register_button" value="Register">Submit</button>

  <?php if(in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span>", $err_arr)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span>"; ?>


</form>
</div>

<div class="col-sm">
</div>
<div class="col-sm">
<h1>Login</h1>
<!-- login section -->
<form action="register.php" method="POST">
  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login_em">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="login_pass">
  </div>
  <button type="submit" class="btn btn-primary" name="login_button">Submit</button>
</form>



</div>
</div>
</div>






    
</body>
</html>