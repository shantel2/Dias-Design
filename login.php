<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php 
  include_once 'config.php';
?>

<?php

//sanitize data funtion
function sanitize_input($data){
  $data = trim($data);
  $data =ucwords($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  return $data;
}

//get values from the login.html file
$email = filter_var($_GET['email'],FILTER_SANITIZE_STRING);
$pass =  filter_var($_GET['password'],FILTER_SANITIZE_STRING);

//prevent sql injects
$email = sanitize_input($email);
$pass = sanitize_input($pass);

//query info in database
$sql = "SELECT * FROM Users WHERE email = '$email' and password = '$pass';";                    
$q = $db ->query($sql);
//$result = mysql_fetch_array($sql);
$result = $q ->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);

if($result!= NULL) {
  echo 'Success';
} else {
  echo 'error';
}


///$sql = $db->query();
//$stmt =  $conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on c.country_code =s.code WHERE cs.name LIKE '%$country%'");

//header('location: http://localhost/useraccounts/login.html');
?>