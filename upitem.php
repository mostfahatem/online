
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
$id=$_POST['id'];
//echo $id;

$sql="UPDATE item SET nam='$evname',type='$doname',disc='$spname',photo='$filename',pric='$dename' WHERE id=$id";


}
mysqli_query($conn,$sql);
mysqli_close($conn);

header('location:shopad.php');


?>
