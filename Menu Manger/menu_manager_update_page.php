<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->


<?php
ini_set('display_errors', 'On'); //debugger
error_reporting(E_ALL | E_STRICT);
?>

<?php
$product_ID = filter_var($_GET['prod_id'],FILTER_SANITIZE_NUMBER_INT);
?>

<?php
require('root_credentials.php'); //requires the root_credentials to run
?>

<?php
  $sql = "SELECT * FROM Products WHERE ProductID = $product_ID;";
  $fetch = $conn ->query($sql);
  $product_info = $fetch->fetchAll(PDO::FETCH_ASSOC);

  $array_info = array();
  foreach($product_info as $row){  //array of array with a sngle element
    foreach($row as $innerrow){
      array_push($array_info,$innerrow); //prints out array
    }
  }
  $product_ID=$array_info[0];
  $name=$array_info[1];
$description=$array_info[2];
$category=$array_info[3];
$price=$array_info[4];
$size=$array_info[5];
$color=$array_info[6];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit product</title>
  <link rel="prodstylesheet" href="prodstylesheet.css">

  <style>
    body {
      background-color: #d8befa;
      text-align: center;
      border: 10px solid #6b38ab;
      padding: 50px;
      margin: 100px;
    }
  </style>

</head>
<body>

  <header> 
    <h1> Product Update </h1>
  </header>
  
  <section>
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <form action="menu_manger_update_service.php" method="POST">
            <label for="title">Product Name</label><br>
            <input type="text" id="title" name="title" value="<?=$name?>"><br>

            <label for="description">Product Description</label><br>
            <textarea name="description" id="description" rows="10" cols="30" ><?=$description?>
            </textarea><br>


              <label for="type">Product Category</label>
              <select name="type" id="type" value="Tops">
                <option <?php if($category == 'Accessories'){echo("selected ");}?> value="Accessories">Accessories</option>
                <option <?php if($category == 'Tops'){echo("selected ");}?> value="Tops">Tops</option>
                <option <?php if($category == 'Bikini & Coverup'){echo("selected ");}?>value="Bikini & Coverup">Bikini & Coverup</option>
              </select><br>

              <label for="price">Product Price</label>
              <input type="text" id="price" name="price" value="<?=$price?>"><br>

              <label for="size">Size</label>
              <select name="size" id="size">
                <option <?php if($size == 'small'){echo("selected ");}?> value="small">small</option>
                <option <?php if($size == 'medium'){echo("selected ");}?> value="medium">medium</option>
                <option <?php if($size == 'large'){echo("selected ");}?> value="large">large</option>
                </select><br>


              <label for="colour">Colour</label>
              <select name="colour" id="colour">
                <option <?php if($color == 'Red'){echo("selected ");}?> value="Red">Red</option>
                <option <?php if($color == 'Green'){echo("selected ");}?> value="Green">Green</option>
                <option <?php if($color == 'Blue'){echo("selected ");}?> value="Blue">Blue</option>
                <option <?php if($color == 'Purple'){echo("selected ");}?> value="Purple">Purple</option>
                <option <?php if($color == 'Orange'){echo("selected ");}?> value="Orange">Orange</option>
                <option <?php if($color == 'Yellow'){echo("selected ");}?> value="Yellow">Yellow</option>
                <option <?php if($color == 'Multi-coloured'){echo("selected ");}?> value="Multi-coloured">Multi-coloured</option>
              </select><br><br>

              <input type="hidden" name="product_ID" value="<?=$product_ID?>">

             <input type="submit" value="Submit">
          
          </form>
        </div>
      </div>
    </div>
  </section>
    
</body>
</html>

