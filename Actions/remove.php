<?php  

require_once("../Controllers/cart_controller.php");

session_start();

$prodid = $_GET['id'];
$customer = $_SESSION['customer_id'];

$delete = deleteCart($customer,$prodid);

if ($delete) {
	header("Location:../View/cart.php");
}else{
	echo "Something went wrong";
}


?>