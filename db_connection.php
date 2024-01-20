<?php

$servername = 'localhost';
$username = "root";;
$password = "";
$db_name = "db_signupform";

$con = mysqli_connect($servername, $username, $password, $db_name);

if(!$con){
    die("Connection failed: ". mysqli_connect_error());
}

?>