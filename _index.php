<?php
require_once("vendor/autoload.php");




$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, null);
$dotenv->load();


var_dump($_ENV)


?>