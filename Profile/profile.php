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
        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");

        // $uid = $_SESSION['userID'];
        $uid = 1;

        $user_orders = $conn ->query("SELECT  * FROM Orders WHERE UserID = $uid;");
        $order_list = $user_orders ->fetchAll(PDO::FETCH_ASSOC); 
        $order_list_len = count($order_list);

        function get_item_name($prod_id){
            $root = $_SERVER['DOCUMENT_ROOT'];
            include("$root" . "/Dias-Design/root_credentials.php");
            $order_item = $conn ->query("SELECT Title FROM Products WHERE ProductID = $prod_id;");
            $item = $order_item ->fetchAll(PDO::FETCH_ASSOC);  
            // var_dump($item[0]);   
            return $item[0]["Title"];
        }

        function format_date($dateTime){
            $dateObj = date_create($dateTime);
            return date_format($dateObj, 'g:ia \o\n l jS F Y');
        }


        function invoice_available($order_id_recv){
            $root = $_SERVER['DOCUMENT_ROOT'];
            include("$root" . "/Dias-Design/root_credentials.php");

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="profile.js"></script>
<<<<<<< HEAD

<style>
    header {
        background-color: #790EAA;
        padding: 20px;
        text-align: center;
        font-size: 20px;
        color: white;
    }
    h1{
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

=======
>>>>>>> 219e09a71dc773d187c7fb77fc74d9a6c47cf7c1
</head>
<body>
    <h1>View Your Orders</h1>
    <?php if($order_list_len <= 0):?>
            <h2>You have not placed an order as yet...</h2>
        <?php else:?>       

            <table id="table">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total $</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
<<<<<<< HEAD
                    <th>Download</th>
=======
>>>>>>> 219e09a71dc773d187c7fb77fc74d9a6c47cf7c1
                </tr>

                <?php foreach($order_list as $order):?>
                    <tr>
                        <td><?=get_item_name($order['ProductID'])?></td>
                        <td><?=$order['quantity']?></td>
                        <td><?=$order['total_cost']?></td>
                        <td><?=format_date($order['created_at'])?></td>
                        <td><?=$order['status']?></td> 
                        <td><button id="view_<?=$order['OrderID']?>" <?php if(!invoice_available($order['OrderID'])){echo " disabled ";}?>>Download Invoice</button></td>

                    </tr>

                <?php endforeach;?>

            </table>
        <?php endif;?>


        
       

</body>
</html>