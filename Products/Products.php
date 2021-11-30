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
        $root = $_SERVER['DOCUMENT_ROOT'];
        include("$root" . "/Dias-Design/root_credentials.php");
        $all_products = $conn ->query("SELECT DISTINCT * FROM Products;");
        $product_list = $all_products ->fetchAll(PDO::FETCH_ASSOC);  

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

        <!-- Include the header file -->
        <?php
         $root = $_SERVER['DOCUMENT_ROOT'];
        //  include("$root" . "/Dias-Design/head.php");
         include("$root" . "/Dias-Design/root_credentials.php");
         ?>
         
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link type="text/css" href="product-style.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
            crossorigin="anonymous"
        />
        
        <title>Products</title>
    </head>

    <body>
        <!--Navbar-->
        <nav>
            <div class="navbar-top">
                <div>
                    <button id="menuButton"></button>
                </div>

                    <!--Shopping cart-->
                    <div class="shopping-cart">
                        <div class="sum-prices">
                            <!--Shopping cart logo-->
                            <i
                                class="fas fa-shopping-cart shoppingCartButton"
                            ></i>
                            <!--The total prices in shopping cart -->
                            <h6 id="sum-prices">$0</h6>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="producstOnCart hide">
                <div class="overlay"></div>
                <div class="top">
                    <button id="closeButton">
                        <i class="fas fa-times-circle"></i>
                    </button>
                    <h3>Cart</h3>
                </div>
                <ul id="buyItems"><!---section on the cart to check out items in cart-->
                    <h4 class="empty">Your shopping cart is empty</h4> 
                </ul>                   
                <button class="check-out">Check out</button>

            </div>
        </nav>
        </header> <!---End of header section-->

        <section> <!---products section-->
            <div class="products-container">

                <?php foreach($product_list as $product):?>
                    <div id = "<?=$product['ProductID']?>" class="products">
                        <img class = "image" src="prod<?=$product['ProductID']?>.jpg">
                        <div class="overlay-img"></div>
                        <div class="prod-description">
                            <h2> <?=$product['Title']?></h2>
                            <hr>
                            <p><?=$product['Description']?></p>
                            <div class="details">
                                <button id = "prod<?=$product['ProductID']?>.jpg" class = "btn">Buy Now!</button>
                            </div>
                        </div>
                        <div class = "price">
                            <span>$ <?=$product['Price']?></span>
                        </div>
                        <div class="prod_db_id">
                            <span><?=$product['ProductID']?></span>
                        </div>
                    </div>
                <?php endforeach;?>


            </div>
        </section>
        <script src="script.js"></script>
        <script src="shopping-cart.js"></script>
    </body>
</html>
