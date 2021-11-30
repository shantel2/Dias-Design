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
$order_id = $_POST['order_ID']; // coming from a hidden field not needing user input
$order_status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);
?>


<?php
    if(!isset($order_id) || !isset($order_status)) 
        {
            echo "<H2> A required field is missing to update the product</H2>";
        }
    else 
        {
            $sql = "UPDATE Orders SET status ='$order_status' WHERE OrderID = $order_id;";

            if($conn ->query($sql) == TRUE)
            {
                echo "<h3> Record Successfully updated!</h3>";

            }

            else {
                echo "<h3>An Error has occured, Order Status not updated<h3>";
            }

        }

?>

