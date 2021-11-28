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
?>

<?php
    $ProductID = filter_var($_POST['prod_id'], FILTER_SANITIZE_NUMBER_INT);

    if(isset($ProductID)){
        $sql = "DELETE FROM Products WHERE ProductID = $ProductID;";

        if($conn ->query($sql) == TRUE)
            {
                echo "<h3> Records Successfully Removed!</h3>";

            }

            else {
                echo "<h3>An Error has occured, Item not Deleted<h3>";
            }

    }
    else{
        echo "<h3>No Product Selected to remove<h3>";

    }





?>

