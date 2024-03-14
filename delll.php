<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
include('cons.php');

?>
<?php
include('cons.php');


    $itemId = $_GET['id'];
    $user_id = $_SESSION["id"];

    // Perform deletion from the database
    $deleteQuery = "DELETE FROM cartsh WHERE userid = $user_id AND product_id=$itemId";
    if (mysqli_query($conn, $deleteQuery)) {
        // Item deleted successfully
        echo "<script>" . "window.location.href='./cartshop.php';" . "</script>";
        
        exit;
    } else {
        // Error deleting item
        echo 'Error deleting item';
        exit;
    }

?>
