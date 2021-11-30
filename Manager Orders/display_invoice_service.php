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
    include 'root_credentials.php';
    
    $order_id_str = $_GET['order_id'];
    var_dump($order_id);
    $order_id = (int)$order_id_str;
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($order_id)){
        $invoice_sql = "SELECT `file_name`,`content` FROM Invoices WHERE OrderID = :id;";

        $stmt = $conn->prepare($invoice_sql);
        $stmt->bindValue(':id', $order_id, PDO::PARAM_INT);
        $stmt->bindColumn(1, $file_name);
        $stmt->bindColumn(2, $content, PDO::PARAM_LOB);
        if ($stmt->execute() === FALSE) {
            echo 'Could not display Invoice';
        } else {
            $stmt->fetch(PDO::FETCH_BOUND);
            header("Content-type: application/pdf");  
            header('Content-disposition: inline; filename="'.$file_name.'.pdf"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            echo $content;
        }
    } else {
        header('location: manage_order_page.php');
    }







?>