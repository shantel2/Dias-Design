<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles.css">
    <?php include('head.php') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title> Dias Designs</title>
</head>
<body>
    <section class = "main">
        <div class = "information">
            <div class= "text">
                <h2>DIAS <br><span>DESIGNS</span></h2>
                <p>Welcome to Dias Designs, where we provide self-made clothing items made from crochet.</p>
                <button onclick="shopping()" > SHOP NOW </button>
                <script>
                    function shopping(){

                        window.location.href = "Products/Products.php";
                    }
                </script>
            </div>
            <div class= "main-img">
                <div class = "img active">
                    <img src="./images/Group 3(2).png">
                </div>
            </div>
        </div>
        <div class="media-icons">
            <a href="https://instagram.com/dias_designs?utm_medium=copy_link "><i class="fab fa-instagram"></i></a>
          </div>
    </section>
</body>
</html>