
<?php 
    session_start();
    if(!isset($_SESSION['uid'])){
    header("Location: /Dias-Design/index.php");        
}

?>

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
        $uid = $_SESSION['uid'];

        $user_orders = $conn ->query("SELECT  * FROM Orders WHERE UserID = $uid;"); //Selects orders related to usersid 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="profile.js"></script>

<style>


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
     <!--Navigation Bar Menu -->
  <nav class="navbar">
      <!-- Dias Designs Logo -->
      <div class="navbar-logo">
        <a href="" class="navbar-logo">
         <img src="../images/Dias Designs Transparent Background.png" alt="Business logo" style="max-height: 100px" class = "py-2 px-2">
        </a>
      </div>

      <!-- Navigation Bar Menu -->
      <div id="navbar-menu" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item"  href="../index.php">
            Home
          </a>

          <a class="navbar-item" href="../About-us/about.php">
            ABOUT US
          </a>
          
          <a class="navbar-item" href="../Products/Products.php">
            PRODUCTS
          </a>

          <a class="navbar-item" href="../testimonial.php">
            TESTIMONIALS
          </a>

          <a class="navbar-item" href="../Contact-us/ContactUs.html">
            CONTACT US
          </a>

          <a class="navbar-item" href="../faq.php">
            FAQs
          </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
            <a class="navbar-item" href="../Authen/logout.php">
            LOGOUT
            </a>
            </div>
        </div>
      </div>
    
    </nav>
    <h1 class = "title">View Your Orders</h1>
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
                    <th>Download</th>
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

                