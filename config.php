<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php 
$dbServername = "localhost";
$db_user = "admin";
$db_password = "password123";
$db_name = "ecommerce";

// $db = mysqli_connect($dbServername, $db_user, $db_password, $db_name);

$db = new PDO("mysql:host=$dbServername;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);

#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);