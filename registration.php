<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php 
  include_once 'config.php';
?>

<?php
  $fname = filter_var($_GET['fname'],FILTER_SANITIZE_STRING);
  $lname = filter_var($_GET['lname'],FILTER_SANITIZE_STRING);
  $email = filter_var($_GET['email'],FILTER_SANITIZE_STRING);
  $pass =  filter_var($_GET['password'],FILTER_SANITIZE_STRING);

  // $sql = "INSERT INTO Users(fname, lname, email, pass)VALUES(?,?,?,?,?)";
  // //$stmtinsert = $db->prepare($sql);
  // # $result = $stmtinsert->execute([$fname, $lname, $email, $password]);
  // $result = mysql_query($db, $sql

$sql = "INSERT INTO Users(Fname,Lname, email, password)VALUES('$fname','$lname','$email','$pass');";
 // Redirect to another page

if($db ->query($sql) == TRUE){
  header('location: http://localhost/useraccounts/signup.html');
} 
else {
  echo "Error: " . $sql . "<br>" . $db->error;
}   
 
?>