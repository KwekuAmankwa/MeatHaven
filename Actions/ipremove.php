<?php  

require_once("../Controllers/cart_controller.php");


$prodid = $_GET['id'];
$ip = $_SERVER['REMOTE_ADDR'];

$delete = IPdelete($ip,$prodid);

if ($delete) {
	header("Location:../View/cart.php");
}else{
	echo "Something went wrong";
}


?>