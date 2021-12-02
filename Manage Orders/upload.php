<!--  -->
<!-- WRAP ALL OF  THE BELOW IN A SESSION AUTHENTICATION -->
<!--  -->




<?php
    require('root_credentials.php');


    $order_id_str = $_POST['order_id'];
    $order_id = (int)$order_id_str ;
    $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING) ;
    $type = '.pdf';

    if(isset($order_id)){
        $sql = "SELECT * FROM Orders WHERE OrderID = $order_id;";
        $fetch = $conn ->query($sql);
        $order_info = $fetch->fetchAll(PDO::FETCH_ASSOC);
        $user_id = $order_info[0]["UserID"];


        
    }
    else{
        echo "<script> alert('There was an issue in selecting the order');</script>";        
    }



    if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {

        //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
        if ($_FILES['pdf_file']['error'] != 0) {
        echo "<script> alert('Something wrong with the file');</script>";
        echo "<script> window.location.href = '../Manage Orders/file-upload.php'</script>";
        } 
        else { //pdf file uploaded okay.
            //project_name supplied from the form field
            $title = htmlspecialchars($_POST['title']);
            //attached pdf file information
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];

            if ($pdf_blob = fopen($file_tmp, "rb")) {
                try {
                    
                    include 'root_credentials.php';

                    $insert_sql = "INSERT INTO `Invoices` (`file_name`, `type`,`UserID`,`OrderID`,`content`) VALUES(:title,:pdf,:userID,:order_id,:content);";
                    $stmt = $conn->prepare($insert_sql);
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':pdf', $type);
                    $stmt->bindParam(':userID', $user_id);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':content', $pdf_blob, PDO::PARAM_LOB);

                    if ($stmt->execute() === FALSE) {
                        echo "<script>alert('Could not save information to the database');</script>";
                    }
                     else {
                        echo "<script>alert('Invoice Uploaded');</script>";
                    }
                } catch (PDOException $e) {
                    echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
                    ': '. $e->getLine();
                }
            } else {
                //fopen() was not successful in opening the .pdf file for reading.
                echo "<script>alert('Could not open the attached pdf file');</script>";
            }
        }
       } else {
            //submit button was not clicked. No direct script navigation.
            echo "<script> window.location.href = '../Manage Orders/file-upload.php'</script>";
       }

?>