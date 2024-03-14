<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Shop</title>
    
    <style>
     
        .card{

            display: inline-block;
            margin: 50px;
        }
        img{
            height: 350px;
            width: 350px;
        }
       
    </style>
</head>

<body>
   
    
    
    <div class="navbar1">
        
            
            <div class="lt">
                <img  src="images/logo.png" class="logo1">
                <a href="#">Home</a>
                <a href="#">Contact </a>
                
                <a href="#">Shop</a>
                <a href="orders.php">Orders</a>

                <a href="cartshop.php">cart</a>

                <a href="./logout.php" class="btn btn-primary" id="vv">Log Out</a>
            </div>
        
        <div class="dropdown">
            <div class="fa fa-bars dropbtn">&emsp; Menu</div>
            <div class="dropdown-content">
                <a href="index.html">Home</a>
                <a href="About.html">About</a>
                
                <a href="viewcart.php">cart</a>

                <a href="Shop.html">Shop</a>
                <a href="index.html">Contact Us</a>
               

            </div>
        </div>
    </div>
    <div class="back">
        <div>
            <h1>Shop</h1>
            <a href="#">Home</a>
            /
            <a href="#">Shop</a>
            <br>
            <br>
            <br>
        </div>
    </div>

   
        </div>
    </div>
    
  <center>
<?php 

    include('cons.php');

  $reslt=mysqli_query($conn,"SELECT * FROM product");
  while($row=mysqli_fetch_array($reslt)){

  echo" 
  
  
  
  <div class='card' style='width: 28rem;'>
  <a href='sig.php?id=$row[product_id]'><img src='$row[product_image]' alt=''></a>

  <div class='card-body'>
    <h5 class='card-title'>$row[product_name]</h5>
    <p class='card-text'>price</span> $row[price]$</p>
    <a href='addtocart.php?id=$row[product_id]' class='btn btn-primary'>Add to cart</a>
  </div>
</div>

			

 "
;
}
?>
</center>
</div>
    <div class="full">
        <div class="row1">
            <div class="contain">
                <div class="log">
                    <i class="fa fa-gift"></i>
                </div>
                <div class="write">
                    <h5>Special Offer 1 + 1 = 3</h5>
                    <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                </div>
            </div>

            <div class="contain">
                <div class="log">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="write">
                    <h4>Free reward card</h4>
                    <p>Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco.</p> 
                </div>
            </div>

            <div class="contain">
                <div class="log">
                    <i class="fa fa-truck" ></i>
                </div>
                <div class="write">
                    <h4>Free Shipping</h4>
                    <p>Fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat.</p>
                </div>
            </div>

            <div class="contain">
                <div class="log">
                    <i class="fa fa-refresh"></i>
                </div>
                <div class="write">
                    <h4>Order return</h4>
                    <p>nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor.</p>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>