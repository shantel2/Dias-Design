

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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!-- <link rel="stylesheet" href="about.css"> -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
    

    <script src="#"></script>
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

    <section>
      <div class="columns">
        <div class="column" id="founder_image">
          <img src="https://www.flairja.com/wp-content/uploads/5057335_-Copy-1-759x1024.jpg" align="left" alt="Dias Designs logo">
        </div>

        <div class="column" id="founder_comment">
          <div class="content">
            <div class = "article">
              <h1><center><b>About Us</b></center></h1>
              <h3><center>Hi, I am Danae!</h3></center>
              <span class = "has-text-link">
                <h1><center>Welcome to Dias Designs!</center></h1>
              </span>
              </div>
              <div class="box has-background-danger-light">
                <div class="image-section"></div>
                  <p style="text-align:right;">  
                  <h5>I founded Dias Designs with the aim of designing clothing that women feel sexy and empowered while wearing!</h5></p>
                  <br>
                  <h5>What started as a summer hobby has grown into an entreprenurial ingenuity.</h5>
                  <br>
                  <h5>Dias Designs has evolved from cropped tops and keychains into swimwear and handbags and there is more in store 
                  <b> so stay tuned!</b></h5>
                </div>
    
              <div class="box has-text-centered">
                <a class="button is-primary" href= "../Products/Products.php">Shop Now</a>
              </div>
            </div> 

          </div>    
        </div>
      </div>
    </section> 

 
</body>
</html>