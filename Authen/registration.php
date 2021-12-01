<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php 
        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");
?>

<?php
  $fname = filter_var($_GET['fname'],FILTER_SANITIZE_STRING);
  $lname = filter_var($_GET['lname'],FILTER_SANITIZE_STRING);
  $email = filter_var($_GET['email'],FILTER_SANITIZE_STRING);
  $pass =  filter_var($_GET['password'],FILTER_SANITIZE_STRING);


$email = trim($email);
$pass = trim($pass);
 $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
$sql = "INSERT INTO Users(Fname,Lname, email, password)VALUES('$fname','$lname','$email','$pass_hashed');";
 // Redirect to another page

if($conn ->query($sql) == TRUE){
  // header('location: http://localhost/useraccounts/signup.html');
  echo "Registered";
} 
else {
   echo "Error registering";
}   
 
?>