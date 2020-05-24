<?php
// require "vendor/autoload.php";
// use Symfony\process\Dotenv\Dotenv;


// $dotenv = new Dotenv();
// $dotenv->load(__DIR__.'/env');

// $dotenv->load(__DIR__.'/.env');
// $dbUser = $_ENV['DB_USER'];
// $host = $_ENV['DATABASE_REMOTE'];
// $pass = $_ENV['DATABASE_PASSWORD'];
// $port = $_ENV['PORT'];
// $connectionInfo=array();
// $conn = sqlsrv_connect($host, $port);
// if( $conn ){  
//      echo "Connection established.\n";  
// }  
// else  
// {  
//      echo "Connection could not be established.\n";  
//      die( print_r( sqlsrv_errors(), true));  
// }  
// 
// var connection;
// if (process.env.JAWSDB_URL) {
//     // Database is JawsDB on Heroku
//     connection = mysql.createConnection(process.env.JAWSDB_URL);
// } else {
//     // Database is local
//     connection = mysql.createConnection({
//         port: 3306,
//         host: 'localhost',
//         user: 'root',
//         password: '',
//         database: 'nameOfYour_db'
//     })
// };
 
require 'config/config.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Home</title>
    
</head>
<body>
<div>hello world</div>
    
</body>
</html>