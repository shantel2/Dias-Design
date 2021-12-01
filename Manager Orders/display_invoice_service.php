<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<!-- DEBUGGING MODE -->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>
<!-- END OF DEBUGGING MODE -->

<!--This displays the invoice -->
<?php
        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");
    
    $order_id_str = $_GET['order_id'];
    $order_id = (int)$order_id_str;
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($order_id)){
        $invoice_sql = "SELECT `file_name`,`content` FROM Invoices WHERE OrderID = :id;"; // It gets the order from the invoice table 

        $stmt = $conn->prepare($invoice_sql);
        $stmt->bindValue(':id', $order_id, PDO::PARAM_INT);
        $stmt->bindColumn(1, $file_name);
        $stmt->bindColumn(2, $content, PDO::PARAM_LOB);
        if ($stmt->execute() === FALSE) {
            echo 'Could not display Invoice'; //if can't locate the invoice it will display this 
        } else {
            $stmt->fetch(PDO::FETCH_BOUND); 
            header("Content-type: application/pdf");  
            header('Content-disposition: inline; filename="'.$file_name.'.pdf"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            echo $content; // if order does exist it will display the invoice 
        }
    } else {
        header('location: manage_order_page.php'); //if orderid not located it will redirect you to the order page 
    }







?>