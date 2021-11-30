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
        echo "There was an issue in selecting the order";
    }



    if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {

        //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
        if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Something wrong with the file.';
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
                        echo 'Could not save information to the database';
                    }
                     else {
                        echo "<h2>Invoice Uploaded</h2>";

                    }
                } catch (PDOException $e) {
                    echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
                    ': '. $e->getLine();
                }
            } else {
                //fopen() was not successful in opening the .pdf file for reading.
                echo 'Could not open the attached pdf file';
            }
        }
       } else {
            //submit button was not clicked. No direct script navigation.
            header('Location: file-upload.php');
       }

?>