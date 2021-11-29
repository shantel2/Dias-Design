<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<!-- DEBUGGING MODE -->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>
<!-- END OF DEBUGGING MODE -->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    
    <title>Document</title>
</head>
<body>

<?php
    require('root_credentials.php');
    function get_email($user_id){
        include 'root_credentials.php';
        $name =$conn->query("SELECT email FROM Users WHERE UserID = $user_id;");
        $email= $name->fetchAll(PDO::FETCH_ASSOC);
        return $email[0]["email"];
    }


    function get_product_name($product_id){
        include 'root_credentials.php';
        $name =$conn->query("SELECT Title FROM Products WHERE ProductID = $product_id;");
        $product_title = $name->fetchAll(PDO::FETCH_ASSOC);
        return $product_title[0]["Title"];
    }

    function invoice_available($order_id){
        include 'root_credentials.php';
        $invoice = $conn->query("SELECT file_name FROM Invoices WHERE OrderID = $order_id;");
        $file_name = $invoice->fetchAll(PDO::FETCH_ASSOC);
        $status = isset($file_name[0]["file_name"]);

        if($status)
        {
       
            return TRUE;
        }
        else{


            return FALSE;
        }
    }
?>
    <H1>Manage Order Page</H1>
    <table id="table">
        <tr>
            <th>Order ID</th>
            <th>User Email</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th colspan="4">Options</th>


        </tr>
        <?php
        $all_orders = $conn ->query("SELECT DISTINCT * FROM Orders;");
        $order_list = $all_orders ->fetchAll(PDO::FETCH_ASSOC);    
    ?>

        <?php foreach($order_list as $order):?>

            <tr>
                <td><?=$order['OrderID']?></td>
                <td><?=get_email($order['UserID'])?></td>
                <td><?=get_product_name($order['ProductID'])?></td>
                <td><?=$order['quantity']?></td>
                <td>$ <?=$order['total_cost']?></td>
                <td><?=$order['status']?></td>
                <td><button id="<?=$order['OrderID']?>">Update</button></td>
                <td style ="display: none"><?=$order['OrderID']?></td>
                <td><button id="invoice_<?=$order['OrderID']?>"> Create Invoice</button></td>
                <td><button id="upload_<?=$order['OrderID']?>"> Upload Invoice</button></td>
                <td><button id="view_<?=$order['OrderID']?>" <?php if(!invoice_available($order['OrderID'])){echo " disabled ";}?>>Download Invoice</button></td>



            </tr>

        <?php endforeach;?>

    </table>

    <?php
           
                 
    ?>

</body>
</html>