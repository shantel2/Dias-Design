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
$order_id = $_GET['order_ID']; // coming from a hidden field not needing user input


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

if(isset($order_id)){
    $sql = "SELECT * FROM Orders WHERE OrderID = $order_id;";
    $fetch = $conn ->query($sql);
    $order_info = $fetch->fetchAll(PDO::FETCH_ASSOC);
    $items_orderID = $order_info[0]["ProductID"];
    $quantity =  $order_info[0]["quantity"];
    $order_total = $order_info[0]["total_cost"];
    $user_id = $order_info[0]["UserID"];
    $status =  $order_info[0]["status"];
    $date = date('m/d/Y', time());

    $name = get_customer_name($user_id);
    $email = get_customer_email($user_id);
    $item = get_item_ordered($items_orderID);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h2>Creating Invoice...</h2>

    <?php
ob_start();
define('FPDF_FONTPATH','fpdf/font/');
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();


    //set font to arial, bold, 14pt
    $pdf->SetFont('courier','B',16);

    //Cell(width , height , text , border , end line , [align] )

    $pdf->Cell(130 ,5,'Dias Designs',0,0);
    $pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

    //set font to arial, regular, 12pt
    $pdf->SetFont('courier','B',12);

    $pdf->Cell(130 ,5,'876-555-555',0,0);
    $pdf->Cell(59 ,5,'',0,1);//end of line

    $pdf->Cell(130 ,5,'Dias-Design@gmail.com',0,0);
    $pdf->Cell(25 ,5,'Date',0,0);
    $pdf->Cell(34 ,5,"$date",0,1);//end of line

    $pdf->Cell(130 ,5,'Perfection in Every stich...',0,0);
    $pdf->Cell(25 ,5,'Order #',0,0);
    $pdf->Cell(34 ,5,"$order_id",0,1);//end of line

    $pdf->Cell(130 ,5,'Everytime.',0,0);
    $pdf->Cell(25 ,5,'It\'s a pleasure to serve.',0,0);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line

    //billing address
    $pdf->Cell(100 ,5,'Bill to',0,1);//end of line

    //add dummy cell at beginning of each line for indentation
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,"Customer Name: $name",0,1);

    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,"Customer Email: $email",0,1);



    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line

    //invoice contents
    $pdf->SetFont('courier','B',12);

    $pdf->Cell(130 ,5,'Product Ordered',1,0);
    $pdf->Cell(25 ,5,'Quantity',1,0);
    $pdf->Cell(34 ,5,'Amount $',1,1);//end of line

    $pdf->SetFont('courier','B',12);

    //Numbers are right-aligned so we give 'R' after new line parameter

    $pdf->Cell(130 ,5,"$item",1,0);
    $pdf->Cell(25 ,5,"$quantity",1,0);
    $pdf->Cell(34 ,5,"$order_total",1,1,'R');//end of line



    //summary
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Subtotal',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,"$order_total",1,1,'R');//end of line



    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Discount',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,'-',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Total Due',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,"$order_total",1,1,'R');//end of line

    
    $pdf->Output();
    ob_end_flush(); 

echo "<h2>Invoice successfully generated</h2>"

?> 

</body>
</html>


