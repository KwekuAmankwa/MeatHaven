<?php 

session_start();

require ('../Controllers/product_controller.php');

$id = $_GET['id'];

$name = $_GET['name'];

$featured = Featured($id,$name);

if ($featured) {
	
	echo '<script>alert("Insertion Successfull");</script>';
	header("Location:../Admin/Admin.php");
}else{

	echo '<script>alert("Insertion Unsuccessfull");</script>';
}
?>