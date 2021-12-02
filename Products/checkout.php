

<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        echo "Please Login to continue!";
   }
    else{   

        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");


        $submitted_items = $_POST['cart'];
        $Process_status = FALSE;
        foreach($submitted_items as $item){
            // var_dump($item["prod_db_id"]);
            // var_dump($item["count"]);
            $prod_id = $item["prod_db_id"];
            $quantity = $item["count"];

            $sql = "SELECT Price FROM Products WHERE ProductID = $prod_id;";
            $_= $conn ->query($sql);
            $price = $_->fetchAll(PDO::FETCH_ASSOC); 

            $total = floatval($price[0]["Price"] * $quantity);

            $uid = $_SESSION['uid'];
            $order_query = "INSERT INTO Orders(UserID,ProductID,quantity,total_cost,status)VALUES($uid,$prod_id,$quantity,$total,'Pending');";

            if($conn ->query($order_query) == TRUE){
                $Process_status = TRUE;
            }
            else{
                $Process_status = FALSE;

            }


        }

        if($Process_status){
            echo "Your Order Has Been Placed!";
        }else{
            echo "There was an Issue processing your order.";            
        } 
    }       

?>

