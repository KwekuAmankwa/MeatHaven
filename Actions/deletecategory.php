<?php

require ('../Controllers/product_controller.php');
session_start();


$id = $_GET['id'];

$submit = deleteCategory($id);

if ($submit) {
	
	echo '<script>alert("Delete successful")</script>';
	header("Location:../Admin/category.php");
}else{

	echo '<script>alert("Did not delete")</script>';
	header("Location:../Admin/category.php");
}
?>