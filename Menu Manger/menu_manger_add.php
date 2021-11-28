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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="edit_or_del.js" ></script>

</head>
<body>

    <?php if(!isset($product_name) || !isset($description) || !isset($type) || !isset($price) || !isset($size) || !isset($colour)):?>
        <div id="dialog" >
        <h3> <?="<H2> A required field is missing from the product submission</H2>"?></h3>
        </div>
    <?php else:?>
        <?php   $sql = "INSERT INTO Products(Title, Description, Type, Price, size, colour) VALUES ('$product_name','$description','$type',$price,'$size','$colour');";?>
            <?php if($conn ->query($sql) == TRUE):?>
                <div id="dialog" >
                        <h3> <?="Records Successfully Saved!"?></h3>
                </div>
            <?php else:?>    
                <div id="dialog" >
                    <h3> <?="An Error has occured, Item not Added"?></h3>
                </div>
                <?php endif;?>
    <?php endif;?>



</body>
</html>






