<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php
    session_start();
    
  
    
    function direct(){
        if(isset($_SESSION['uid'])){
             echo "Profile/profile.php";
        }
        else{
             echo "Authen/login.html";
        }
    }

    function name_or_login(){
        require('root_credentials.php');

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


        <header>
            <a href="index.php"><img src="./images/Dias Designs Transparent Background.png"  class="logo"></a>
            <ul class="navigation">
                <li><a base href="index.php">HOME</a></li>
                <li><a href="About-us/about.php">ABOUT US</a></li>
                <li><a href="../Dias-Design/Products/Products.php">PRODUCTS </a></li>
                <li><a href="testimonial.php">TESTIMONIALS</a></li>
                <li><a href="../Dias-Design/Contact-us/contact-us.php">CONTACT US</a></li>
                <li><a href="faq.php" >FAQs</a></li>
                <li><a href="Manage Orders/manage_order_page.php " <?php admin_check();?> >Orders</a></li>
                <li><a href="Menu Manager/del_or_edit_product.php " <?php admin_check();?> >Products</a></li>

                <li><a href= <?php direct()?>><?php name_or_login();?></a></li>
            </ul>
            <label for="check" hidden>
                <i class="fas fa-bars menu-btn"></i>
                <i class="fas fa-times close-btn"></i>
                </label>
        </header>