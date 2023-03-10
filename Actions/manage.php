<?php

require_once("../Controllers/cart_controller.php");



if (isset($_GET['update'])) {



	$prodid = $_GET['prodid'];
	$quantity = $_GET['qty'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$Cart = IPquantity($ip, $quantity, $prodid);

	if ($Cart) {
		header("Location:../View/cart.php");
	}else{
		echo "Something went wrong";
	}
}elseif (isset($_GET['cusdate'])) {
	session_start();
	$prodid = $_GET['prodID'];
	$quantity = $_GET['quantity'];
	$customer = $_SESSION['customer_id'];

	$cart = quantity($customer,$quantity,$prodid);

	if ($cart) {
		
		header("Location:../View/cart.php");
	}else{
		echo "Annfa";
	}
}


?>