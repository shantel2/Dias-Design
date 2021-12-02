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
    session_start();
    require('root_credentials.php');


      
    
    function direct(){
        if(isset($_SESSION['uid'])){
             echo "../Profile/profile.php";
        }
        else{
             echo "Authen/login.html";
        }
    }

    function name_or_login(){
      $root = $_SERVER['DOCUMENT_ROOT'];
      include("$root" . "/Dias-Design/root_credentials.php");

        if(isset($_SESSION['uid']))
        {
            $id = $_SESSION['uid'];
            $sql = "SELECT email FROM Users WHERE UserID = $id;";
            $fetched = $conn ->query($sql);
            $email = $fetched->fetchAll(PDO::FETCH_ASSOC);
            $dis = $email[0]["email"];
            echo "$dis";
       }
       else{
            echo "Login";
       }
    }

    function admin_check(){
      if(!isset($_SESSION['adminID']))
      {
          echo "hidden";
     }
      
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="edit_or_del.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"> 

</head>
<body>


          <!-- Navigation Bar Header -->
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

          <a class="navbar-item" href="../Contact-us/contact-us.php">
            CONTACT US
          </a>

          <a class="navbar-item" href="../faq.php">
            FAQs
          </a>

          <a class="navbar-item" href="../Manage Orders/manage_order_page.php " <?php admin_check();?> >
          Orders
        </a>
          
          <a class="navbar-item" href="../Menu Manager/del_or_edit_product.php " <?php admin_check();?> >
          Products
        </a>


        </div>
        
        <div class="navbar-end">
            <a href= <?php direct()?> class="navbar-item">
               <?php name_or_login();?>
            </a>
          </div>
      </div>
    
    </nav>


    <title>Update Product</title>

    <?php
        $all_products = $conn ->query("SELECT DISTINCT * FROM Products;");
        $product_list = $all_products ->fetchAll(PDO::FETCH_ASSOC);    
    ?>

<style>
    header {
    background-color: #790EAA;
    padding: 20px;
    text-align: center;
    font-size: 20px;
    color: white;
}
</style>
    <header> 
        <h1> Product Management </h1>
        <h2> (Deletion or Edition of product content) </h2>
    </header>

    <table class= "table" id="table">
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
                <td><button class="button" id= "delete<?=$product['ProductID']?>" >Delete</button></td>
                <td><button class="button" id= "edit<?=$product['ProductID']?>" >Edit</button></td>
                <td style ="display: none"><?=$product['ProductID']?></td> 
            </tr>

        <?php endforeach;?>

    </table>

</body>
</html>