<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<!-- DEBUGGING MODE -->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>
<!-- END OF DEBUGGING MODE -->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

        <!-- Include the header file -->
        <?php
         $root = $_SERVER['DOCUMENT_ROOT'];
        //  include("$root" . "/Dias-Design/head.php");
         ?>
         
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link type="text/css" href="product-style.css" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
            crossorigin="anonymous"
        />
        <title>Shopping Cart</title>
    </head>

    <body>
        <!--Navbar-->
        <nav>
            <div class="navbar-top">
                <div>
                    <button id="menuButton"><i class="fas fa-bars"></i></button>
                </div>
                <div>
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
                <div id = "1" class="products">
                    <img class = "image" src="prod1.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <div class="details">
                            <button id = "prod1.jpg" class = "btn">Buy Now!</button>
                            <button class = "more-information">Details</button>
                        </div>
                    </div>
                    <div class = "price">
                        <span>$2654</span>
                    </div>
                </div>
                <div id = "2" class="products">
                    <img id = "" class = "image" src="prod2.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod2.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $2346 </span>
                    </div>
                </div>
                <div id = '3' class="products">
                    <img  class = "image" src="prod3.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod3.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $6436 </span>
                    </div>
                </div>
                <div id = '4' class="products">
                    <img  class = "image" src="prod4.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final.</p>
                        <button id = "prod4.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $7886 </span>
                    </div>
                </div>
                <div id = '5' class="products">
                    <img  class = "image" src="prod5.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod5.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $3219 </span>
                    </div>
                </div>
                <div id = '6' class="products">
                    <img   class = "image" src="prod6.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod6.jpg" class = "btn"> Buy Now! </button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $786 </span>
                    </div>
                </div>
                <div id = '7' class="products">
                    <img  class = "image" src="prod7.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod7.jpg" class = "btn"> Buy Now! </button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $1286 </span>
                    </div>
                </div>
                <div id = '8' class="products">
                    <img class = "image" src="prod8.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words </p>
                        <button id = "prod8.jpg" class = "btn"> Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $6786 </span>
                    </div>
                </div>
                <div id = '9' class="products">
                    <img  class = "image" src="prod9.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod9.jpg" class = "btn"> Buy Now! </button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $786 </span>
                    </div>
                </div>
                <div id = '10' class="products">
                    <img  class = "image" src="prod10.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod10.jpg" class = "btn"> Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $2786 </span>
                    </div>
                </div>
        
                <div id = '11' class="products">
                    <img  class = "image" src="prod11.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod11.jpg" class = "btn"> Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $3486 </span>
                    </div>
                </div>
        
                <div id = '12' class="products">
                    <img class = "image" src="prod12.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod12.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $1386 </span>
                    </div>
                </div>
        
                <div id = '13' class="products">
                    <img class = "image" src="prod13.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod13.jpg" class = "btn"> Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $786 </span>
                    </div>
                </div>
        
                <div id = '14' class="products">
                    <img class = "image" src="prod14.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod13.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $2786 </span>
                    </div>
                </div>
        
                <div id = '15' class="products">
                    <img  class = "image" src="prod15.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
                        <button id = "prod15.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $1786 </span>
                    </div>
                </div>
        
                <div id = '16' class="products">
                    <img  class = "image" src="prod16.jpg">
                    <div class="overlay-img"></div>
                    <div class="prod-description">
                        <h2> Dias Designs </h2>
                        <hr>
                        <p>Lorem ipsum is, in printing, a series of meaningless words
                        used on a provisional basis to calibrate a layout, the final</p>
        
                        <button id = "prod16.jpg" class = "btn">Buy Now!</button>
                        <button class = "more-information">Details</button>
                    </div>
                    <div class = "price">
                        <span> $786 </span>
                    </div>
                </div>
            </div>
        </section>
        <script src="script.js"></script>
        <script src="shopping-cart.js"></script>
    </body>
</html>