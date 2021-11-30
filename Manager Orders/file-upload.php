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
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>
        Select an Invoice to Upload
    </h2>
 
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="">
        <label for="title">Title</label>
        <input type="text" name="title">
    </div>

    <div>
        <input type="file" name="pdf_file">
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
 