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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="edit_or_del.js" type="text/javascript"></script>
    <link rel="stylesheet" href="stylesheet.css"> 

</head>
<body>


    <title>Update Product</title>

    <?php
        $all_products = $conn ->query("SELECT DISTINCT * FROM Products;");
        $product_list = $all_products ->fetchAll(PDO::FETCH_ASSOC);    
    ?>


    <header> 
        <h1> Product Management </h1>
        <h2> (Deletion or Edition of product content) </h2>
    </header>

    <table id="table">
        <tr>

            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Remove Option</th>
            <th>Edit Option</th>

        </tr>

        <?php foreach($product_list as $product):?>
            <tr>
                <td><?=$product['Title']?></td>
                <td><?=$product['Description']?></td>
                <td><?=$product['Price']?></td>
                <td><button id= "delete<?=$product['ProductID']?>" >Delete</button></td>
                <td><button id= "edit<?=$product['ProductID']?>" >Edit</button></td>
                <td style ="display: none"><?=$product['ProductID']?></td> 
            </tr>

        <?php endforeach;?>

    </table>

</body>
</html>