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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    </link>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Shop</title>
    <style>
        
        .card-img-top mb-5 mb-md-0{
            height: 550px;
            width: 550px;
        }
        p{
            margin-left: 50px;
        }
      .w-100{
        width: 300px;
        height: 300px;
      }
      .navbar1{
        margin-bottom: 20px;
      }
      .btn-primary {
    color: #fff;
    background-color: #f92000;
    border-color: #ffffff;
}
.carousel-control-prev,
      .carousel-control-next {
        z-index: 1; /* Ensure controls are above carousel images */
        color: #000;
        background-color: #000;
        width:10% ;
      }

    </style>
</head>

<body>
<form action="cartshop.php" method="post">
    
    <br>
    <div class="navbar1">
        
            <div class="lt">
                <img src="images/logo.png" class="logo1">
                <a href="Shcat.php">Home</a>
                <a href="#">About</a>
                <a href="Shcat.php">Shop</a>
                
               
                <a href="index.html">Contact </a>
                <a href="orders.php">Orders</a>

                <a href="cartshop.php">cart</a>
                                <a href="./logout.php" class="btn btn-primary" id="vv">Log Out</a>
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
    <br>
    <br>
    
    <div class="container">
        
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Wrapper for slides -->
            <center>
            <div class="carousel-inner">
                <?php
                include('cons.php');
                $id = $_GET['id'];
                $reslt = mysqli_query($conn, "SELECT * FROM photos WHERE id=$id");
                $active = true; // To mark the first image as active
                while ($row = mysqli_fetch_array($reslt)) {
                    echo "<div class='carousel-item " . ($active ? "active" : "") . "'>
                            <img src='$row[photo_path]' name='ph' class='w-100' alt='Product Photo' >
                        </div>";
                    $active = false; // Set active to false after the first iteration
                }
                ?>
            </div>
            </center>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel"href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    
  

    <!-- Left and right controls -->
    

  
    <?php
include('cons.php');
$id = $_GET['id'];
$reslt = mysqli_query($conn, "SELECT * FROM product WHERE product_id=$id");
while ($row = mysqli_fetch_array($reslt)) {
    echo "
    
        <div class='container my-5'>
            <div class='row justify-content-center'>
                <div class='col-md-6'>
                    <div class='product-details'>
                        <h2 name='name' class='fw-bold'>$row[product_name]</h2>
                        <p name='desc' class='lead mb-4'>$row[product_desc]</p>
                       <h3 name='pri' class='fw-bold'> Price: $row[price]</h3>
                       <div class='d-grid gap-2 mt-4'>
                       <a class='btn btn-primary' href='addtocart.php?id=$id'>
                                <i class='bi-cart-fill me-1'></i>
                                Add to cart
                                </a>
                        </div>

                      

                    </div>
                </div>
            </div>
        </div>
        
        ";
}
?>
                        
</div>
<section class="py-5">
    
                       
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <?php 

   /* include('cons.php');
    
  $reslt=mysqli_query($conn,"SELECT * FROM product");
  while($row=mysqli_fetch_array($reslt)){

  echo" 
  <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
  <div class='col mb-5'>
      <div class='card h-100'>
          <!-- Product image-->
          
          <a href='sig.php?id=$row[product_id]'> <img class='card-img-top' src='$row[product_image]' alt='...' /> </a>

          <!-- Product details-->
          <div class='card-body p-4'>
              <div class='text-center'>
                  <!-- Product name-->
                  <h5 class='fw-bolder'>$row[product_name]</h5>
                  <!-- Product price-->
                  $row[price]$
              </div>
          </div>
          <!-- Product actions-->
          <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
              <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='#'>View options</a></div>
          </div>
      </div>
  </div>
  
  
 

			

 "
;
}*/
?>
              
              
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        </form>
</body>