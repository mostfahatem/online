<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    echo "<script>window.location.href='./login.php';</script>";
    exit;
}

include('cons.php');

// Check if product ID is set
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details
    $product_query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $product_id");
    $product_row = mysqli_fetch_assoc($product_query);
    //
    

    // Check if the product already exists in the cart for the current user
    
   

    // Insert into cart table
    $user_id = $_SESSION["id"];
    $existing_cart_query = mysqli_query($conn, "SELECT * FROM cartsh WHERE userid = $user_id AND product_id = $product_id");
    if(mysqli_num_rows($existing_cart_query) > 0) {
        echo "<script>alert('Product already exists in the cart');</script>";
        echo "<script>window.location.href='sig.php?id= $product_id';</script>";
    }else{
    // Assuming you have a user id stored in session
    $quantity = 1; // Assuming quantity is 1 for now
    $price = $product_row['price']; // Fetching price from product table
    $ph =  $product_row['product_image']; // Escape the image path
    $nm = mysqli_real_escape_string($conn, $product_row['product_name']); // Escape the product name

    $stmt = mysqli_query($conn, "INSERT INTO cartsh (userid, photo, price, name, product_id) VALUES ('$user_id', '$ph', '$price', '$nm', '$product_id')");

    if ($stmt) {
        echo "<script>alert('Product added to cart successfully $ph');</script>";
        echo "<script>window.location.href='sig.php?id= $product_id';</script>";
    } else {
        echo "<script>alert('Error adding product to cart');</script>";
    }
}

} else {
    echo "<script>alert('Product ID not set');</script>";
}
?>
