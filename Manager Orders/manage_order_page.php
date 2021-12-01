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

<style>
    /* Header Style*/
 header {
    background-color: #790EAA;
    padding: 20px;
    align-items: center;
    font-size: 20px;
    color: white;
}

h1 {
    text-align: center;
}

/* Table Format*/
#table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
}
#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:hover {background-color: #ddd;}
#table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #280454
    ;
    color: white;
}
</style>

</head>
<body>

    <title>Document</title>
    <?php
        require('root_credentials.php');
        //this is getting users email from user table 
        function get_email($user_id){
            include 'root_credentials.php';
            $name =$conn->query("SELECT email FROM Users WHERE UserID = $user_id;");
            $email= $name->fetchAll(PDO::FETCH_ASSOC);
            return $email[0]["email"];
        }

        //this is matching productid and getting product name from Products table
        function get_product_name($product_id){
            include 'root_credentials.php';
            $name =$conn->query("SELECT Title FROM Products WHERE ProductID = $product_id;");
            $product_title = $name->fetchAll(PDO::FETCH_ASSOC);
            return $product_title[0]["Title"];
        }
        
        //this function receives the file name
        function invoice_available($order_id_recv){
            include 'root_credentials.php';
            $order_id = (int)$order_id_recv;
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
    <h1>Manage Order Page</h1>
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

        <?php foreach($order_list as $order):?> <!-- displays the order list -->

            <tr>
                <td><?=$order['OrderID']?></td> <!--display order id-->
                <td><?=get_email($order['UserID'])?></td> <!--display customer email-->
                <td><?=get_product_name($order['ProductID'])?></td> <!--displays product name -->
                <td><?=$order['quantity']?></td> <!--display quantity of items-->
                <td>$ <?=$order['total_cost']?></td> <!--displays order total cost-->
                <td><?=$order['status']?></td> <!--displays order status-->
                <td><button id="<?=$order['OrderID']?>">Update</button></td> <!--This button is used to update order status -->
                <td style ="display: none"><?=$order['OrderID']?></td>
                <td><button id="invoice_<?=$order['OrderID']?>"> Create Invoice</button></td> <!-- This button generates the invoice -->
                <td><button id="upload_<?=$order['OrderID']?>"> Upload Invoice</button></td> <!-- This button uploads the invoice -->
                <td><button id="view_<?=$order['OrderID']?>" <?php if(!invoice_available($order['OrderID'])){echo " disabled ";}?>>Download Invoice</button></td> 
                <!--This button allows you to download a pdf version of the invoice -->



            </tr>

        <?php endforeach;?>

    </table>
        
</body>
</html>