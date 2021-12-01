<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php 
        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");
?>

<?php

session_start();

//get values from the login.html file
$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
$pass =  filter_var($_POST['password'],FILTER_SANITIZE_STRING);

//prevent sql injects
$email = trim($email);
$pass = trim($pass);

//query info in database
$sql = "SELECT * FROM Users WHERE email = '$email';";                    
$q = $conn ->query($sql);
//$result = mysql_fetch_array($sql);
$result = $q ->fetchAll(PDO::FETCH_ASSOC);

$password_hashed = $result[0]["password"];


if(password_verify($pass,$password_hashed)) {
  

  $_SESSION['uid'] = $result[0]["UserID"];
  echo "$_SESSION[uid]";
  // echo "<script> location.href = '../index.php'</script>";

} else {
  echo "<script>alert('Login Failed');</script>";
  echo "<script> location.href = 'login.html'</script>";

}


///$sql = $db->query();
//$stmt =  $conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on c.country_code =s.code WHERE cs.name LIKE '%$country%'");

//header('location: http://localhost/useraccounts/login.html');
?>