<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<!-- DEBUGGING MODE -->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>
<!-- END OF DEBUGGING MODE -->


<?php
require('root_credentials.php');
?>




<?php
$product_id = $_POST['product_ID']; // coming from a hidden field not needing user input
$product_name = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$type = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
$price = filter_var($_POST['price'],FILTER_VALIDATE_FLOAT);
$size = filter_var($_POST['size'],FILTER_SANITIZE_STRING);
$colour = filter_var($_POST['colour'],FILTER_SANITIZE_STRING);

?>


<?php
    if(!isset($product_name) || !isset($description) || !isset($type) || !isset($price) || !isset($size) || !isset($colour)) 
        {
            echo "<H2> A required field is missing from the product update</H2>";
        }
    else 
        {
            $sql = "UPDATE Products SET Title ='$product_name', Description = '$description',
                    Type = '$type', Price = '$price', size = '$size', colour = '$colour'
                    WHERE ProductID = $product_id;";

            if($conn ->query($sql) == TRUE)
            {
                echo "<h3> Records Successfully Updated!</h3>";

            }

            else {
                echo "<h3>An Error has occured, Item not Updated<h3>";
            }

        }

?>

