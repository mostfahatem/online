<?php

include('cons.php');

//include('eve-1.php');
if(isset($_POST['post'])){

$evname=$_POST['nam'];
$doname=$_POST['type'];
$dename=$_POST['price'];
$spname=$_POST['disc'];
$filename = $_FILES["ima"]["name"];
$tempname = $_FILES["ima"]["tmp_name"];
$folder = "./photo/" . $filename;
echo $filename;
$sql = "INSERT INTO item (nam, type, disc,photo, pric) VALUES ('$evname','$doname','$spname','$filename','$dename')";

}
mysqli_query($conn,$sql);

mysqli_close($conn);
header('location:shopad.php');
?>
