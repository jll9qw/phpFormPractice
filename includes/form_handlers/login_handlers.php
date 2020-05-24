<?php

if(isset($_POST['login_button'])){

    //Makes sure email is in the right format
    $email = filter_var($_POST['login_em'], FILTER_SANITIZE_EMAIL);


    //Stores the email in the session
    $_SESSION['login_em']=$email;
    $password =  md5($_POST['login_pass']);//Checks password

    //Find the user 
    $check_databas_query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND  password= '$password' ");


    $check_login_query = mysqli_num_rows($check_databas_query);

    if($check_login_query==1){
        //use values returned by the query
        $row = mysqli_fetch_array($check_login_query);
        $username = $row['username'];
        $_SESSION['username']=$username;
        header("Location: index.php");
        exit();
    }

}



?>