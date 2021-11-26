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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Manage Order Page</H1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User Email</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Status</th>
        </tr>

        <?php foreach($order_list as $order):?>
            <tr>
                <td><?=$order['OrderID']?></td>
                <td><?=$order['UserID']?></td>
                <td><?=$order['ProductID']?></td>
                <td><?=$order['quantity']?></td>
                <td><?=$order['total_cost']?></td>
                <td><?=$order['status']?></td>
            </tr>

        <?php endforeach;?>

    </table>

</body>
</html>