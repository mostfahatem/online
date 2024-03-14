<?php
include('cons.php');
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM item WHERE id=$id");
header('location:shopad.php');
?>