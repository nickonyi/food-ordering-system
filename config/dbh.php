<?php

session_start();
ini_set('display_errors',1);
define('SITEURL','http://localhost/food-ordering-system/');
$dbservername = "localhost";
$dbusername ="root";
$dbpassword="";
$dbname= "food-order";

$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname); //database connection
if(!$conn){
    die("connection failed  ".mysqli_connect_error());
}
?>