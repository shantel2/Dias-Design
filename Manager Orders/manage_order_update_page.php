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
$order_id = filter_var($_GET['order_id'],FILTER_VALIDATE_INT); // coming from a hidden field not needing user input

if(isset($order_id)){
    $sql = "SELECT * FROM Orders WHERE OrderID = $order_id;";
    $fetch = $conn ->query($sql);
    $order_info = $fetch->fetchAll(PDO::FETCH_ASSOC);
    $items_orderID = $order_info[0]["ProductID"];
    $quantity =  $order_info[0]["quantity"];
    $order_total = $order_info[0]["total_cost"];
    $user_id = $order_info[0]["UserID"];
    $status =  $order_info[0]["status"];
    
}
else{
    echo "There was an issue in selecting the order";
}

    function get_customer_name($user_id){
        include 'root_credentials.php';
        $name =$conn->query("SELECT Fname,Lname FROM Users WHERE UserID = $user_id;");
        $names_fetched = $name->fetchAll(PDO::FETCH_ASSOC);
        return $names_fetched[0]["Fname"]. " ".$names_fetched[0]["Lname"];


    }
    
    function get_customer_email($user_id){
        include 'root_credentials.php';
        $email =$conn->query("SELECT email FROM Users WHERE UserID = $user_id;");
        $email_fetched = $email->fetchAll(PDO::FETCH_ASSOC);
        return $email_fetched[0]["email"];


    }

    function get_item_ordered($product_id){
        include 'root_credentials.php';
        $product =$conn->query("SELECT Title FROM Products WHERE ProductID = $product_id;");
        $product_fetched = $product->fetchAll(PDO::FETCH_ASSOC);
        return $product_fetched[0]["Title"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Update Page</title>
</head>
<body>
    <h1>Update Order</h1>

    <div>
        <p>Order ID: <?=$order_id?></p> <br>
    </div>

    <div class="">
        <p>Customer Name: <?=get_customer_name($user_id)?></p> <br>
    </div>

    <div class="">
        <p>Customer email: <?=get_customer_email($user_id)?></p> <br>
    </div>

    <div class="">
        <p>Item Ordered: <?=get_item_ordered($items_orderID)?></p> <br>
    </div>
    <div class="">
        <p>Quantity: <?=$quantity?></p> <br>
    </div>

    <div class="">
        <p>Order Total: $ <?=$order_total?></p> <br>
    </div>

    <div>
        <form action="manage_order_update_service.php" method="POST">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option <?php if($status == 'Pending'){echo(" selected ");}?> value="Pending">Pending</option>
                <option <?php if($status == 'Started'){echo(" selected ");}?> value="Started">Started</option>
                <option <?php if($status == 'Paid'){echo(" selected ");}?> value="Paid">Paid</option>
                <option <?php if($status == 'In Progress'){echo(" selected ");}?> value="In Progress">In Progress</option>
                <option <?php if($status == 'Completed'){echo(" selected ");}?> value="Completed">Completed</option>
                <option <?php if($status == 'Out-for-Delivery'){echo(" selected ");}?> value="Out-for-Delivery">Out-for-Delivery</option>
                <option <?php if($status == 'Delivered'){echo(" selected ");}?> value="Delivered">Delivered</option>
                <option <?php if($status == 'Cancelled'){echo(" selected ");}?> value="Cancelled">Cancelled</option>
            </select>
            <input type="hidden" name="order_ID" value="<?=$order_id?>">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>




