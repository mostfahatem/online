<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    echo "<script>window.location.href='./login.php';</script>";
    exit;
}
include('cons.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["id"];
    $sum=0;
                        $cart_query = mysqli_query($conn, "SELECT * FROM cartsh WHERE userid = $user_id");
    
                        if(mysqli_num_rows($cart_query) > 0) {
                            while ($cart_item = mysqli_fetch_assoc($cart_query)) {
                                $a = $cart_item['price'];
                                $b = $cart_item['product_id'];
                                $c = $cart_item['name'];
                                $d = $cart_item['photo'];
                                
                                // Check if product_id already exists in orderdisc table
                                $check_query = "SELECT * FROM orderdisc WHERE product_id = '$b' AND  userid=$user_id";
                                $check_result = mysqli_query($conn, $check_query);
                                
                                if (mysqli_num_rows($check_result) == 0) {
                                    // If product_id doesn't exist, insert the record
                                    $insert_query = "INSERT INTO orderdisc (product_id, price, name, photo, userid) 
                                                    VALUES ('$b', '$a', '$c', '$d', '$user_id')";
                                    mysqli_query($conn, $insert_query);
                                } else {
                                    // Handle the case where product_id already exists (e.g., update or skip)
                                    // You can add your logic here
                                    echo "<script>alert('Error product_id is already at the  cart');</script>";

                                    echo "<script>window.location.href='./cartshop.php';</script>";


                                }
                            }
                            



    // Get user ID from session
    $user_id = $_SESSION["id"];
    $username=$_SESSION["username"];

    // Get order details from the form
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $total_price = $_POST['total_price'];

    // Insert order details into the database
    $insert_quers = "INSERT INTO orders (user_id, phone_number, address, total_price,username) 
                    VALUES ('$user_id', '$phone_number', '$address', '$total_price','$username')";
    
    mysqli_query($conn, $insert_quers);


    
        // Order inserted successfully
        echo "<script>window.location.href='./cartshop.php';</script>";
        // You may redirect the user to a confirmation page or any other page here
    

                      }
                    }
                

                  ?>
