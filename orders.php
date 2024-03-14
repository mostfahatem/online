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
      .row {
    margin-right: 0px;
    margin-left: 0px;
}

    </style>
</head>

<body>
   
    <form action="uploadorder.php" method="post">
    <br>
    <div class="navbar1">
        
            <div class="lt">
                <img src="images/logo.png" class="logo1">
                <a href="Shcat.php">Home</a>
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="Shcat.php">Shop</a>
                
               
                <a href="index.html">Contact </a>
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
    
    

    <!-- Left and right controls -->
    
    <section class="h-100 h-custom" style="background-color: #ffff;">
   
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                                  <center>

                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">your order</h1>
                    </center>
                  </div>
                 

<?php
$user_id = $_SESSION["id"];
$sum=0;
                    $cart_query = mysqli_query($conn, "SELECT * FROM cartsh WHERE userid = $user_id");

                    if(mysqli_num_rows($cart_query) > 0) {
                      while ($cart_item = mysqli_fetch_assoc($cart_query)) {
                        $sum+=$cart_item['price'];
                      echo"
                      <hr class='my-4'>

                      <div class='row mb-4 d-flex justify-content-between align-items-center'>
                        <div class='col-md-2 col-lg-2 col-xl-2'>
                          <img
                            src='$cart_item[photo]'
                            class='img-fluid rounded-3' alt=''>
                        </div>
                    <div class='col-md-3 col-lg-3 col-xl-3'>
                      
                      <h6 class='text-black mb-0'>$cart_item[name]</h6>
                    </div>
                    
                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                      <h6 class='mb-0'>$cart_item[price]</h6>
                    </div>
                   
                  </div>
";
                      }
                    }
                  ?>

<hr class="my-4">
<br>
<br>
<br>


                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <input type="text" value=<?php echo $sum; ?> name="total_price" readonly>  
                  </div>

                

                  <hr class="my-4">

                 
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
    
</div>
<section class="py-5">
    
                       
        </section>
       
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
