<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php

session_start();
    
  
    
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
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dias Designs Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"> <!-- link for access to bulma api for page design-->
  <style>


    /* Header Style */
    header {
    background-color: #790EAA;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
    }

  </style>

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

          <a class="navbar-item" href="#">
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

    <!-- Contact Us Form Header -->
    <header> 
      <h1> CONTACT US </h1>
    </header>

    <!-- Contact Us Form -->
      <section class="section has-background-light">
        <div class="container">
          <div class="columns">
            <div class="column is-half">
              <img src="contactus.png" alt="Contact-Form-Photo">
            </div>

            <div class="column is-half">
              <form action="#" method="POST"> <!-- linl to FormSubmit api that allows the admin to recieve emails from form-->
                
                <!-- Contact Us Form Header -->
                <h1 style="text-align:center">What's on your mind? </h1> 

                <!-- Contact Us Form Firstname Field -->
                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="First Name" name="fname" required>
                  </div>
                </div>

                <!-- Contact Us Form Lastname Field -->
                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Last Name" name="lname" required>
                  </div>
                </div>

                <!-- Contact Us Form Email Field -->
                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                    <input class="input" type="email" placeholder="Example: username@" name="email" required>
                  </div>
                </div>

                <!-- Contact Us Form Message Field -->
                <div class="field">
                  <label class="label">Message</label>
                  <div class="control">
                    <textarea class="textarea" placeholder="Write something.." name="msg" required></textarea>
                  </div>
                </div>

                <!-- Contact Us Form Submit Button -->
                <div class="field is-grouped">
                  <div class="control">
                    <button class="button is-link">Submit</button>
                  </div>
                </div>  

              </form>  
            </div>
          </div>
        </div>
      </section>

  </body>
</html>