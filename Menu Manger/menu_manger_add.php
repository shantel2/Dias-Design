<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php
$product_name = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
$description = filter_var($_GET['description'],FILTER_SANITIZE_STRING);
$type = filter_var($_GET['type'],FILTER_SANITIZE_STRING);
$price = filter_var($_GET['price'],FILTER_VALIDATE_FLOAT);
$size = filter_var($_GET['size'],FILTER_SANITIZE_STRING);
$colour = filter_var($_GET['colour'],FILTER_SANITIZE_STRING);
// var_dump($product_name,$description,$type, $price, $size, $colour)
?>




<?php
require('root_credentials.php');
?>


<?php
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

    if(!isset($product_name) || !isset($description) || !isset($type) || !isset($price) || !isset($size) || !isset($colour)) 
        {
            echo "<H2> A required field is missing from the product submission</H2>";
        }
    else 
        {
            $sql = "INSERT INTO Products(Title, Description, Type, Price, size, colour) VALUES ('$product_name','$description','$type',$price,'$size','$colour');";

            if($conn ->query($sql) == TRUE)
            {
                echo "<h3> Records Successfully Saved!</h3>";

            }

            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

?>




