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
    $order_id = $_GET['order_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit product</title>
  <link rel="prodstylesheet" href="styles.css">
    <title>File Upload</title> <!--uploads an invoice-->
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
    <h2>
        Select an Invoice to Upload
    </h2>
 
<form action="upload.php" method="POST" enctype="multipart/form-data"> 
    <div class="">
        <label for="title">Title</label>
        <input type="text" name="title"> <!--User inserts file name-->
    </div>

    <div>
        <input type="file" name="pdf_file"> <!--User selects file-->
        <input type="hidden" name="MAX_FILE_SIZE" value= "67108864"/>
        <input type="hidden" name="order_id" value= <?=$order_id?>/>

    </div>

    <div>
        <label for="submit">Upload Invoice</label> 
        <input type="submit" name="submit">

    </div>


 
 
</form>
 
</body>
</html>
 