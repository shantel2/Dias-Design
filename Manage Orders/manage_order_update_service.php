<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->





<?php
require('root_credentials.php');
?>




<?php
$order_id = $_POST['order_ID']; // coming from a hidden field not needing user input
$order_status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);
?>


<?php
    if(!isset($order_id) || !isset($order_status)) //checks to see if value is set 
        {
            echo "<H2> A required field is missing to update the product</H2>";
        }
    else 
        {
            $sql = "UPDATE Orders SET status ='$order_status' WHERE OrderID = $order_id;"; //updates the order status 

            if($conn ->query($sql) == TRUE)
            {
                echo "<script>alert('Record Successfully updated!');</script>";
                echo "<script> window.location.href = '../Manage Orders/manage_order_page.php'</script>";




            }

            else {
                echo "<h3>An Error has occured, Order Status not updated<h3>";
            }

        }

?>

