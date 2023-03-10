<?php

require ('../Controllers/cart_controller.php');


if (isset($_POST['cart'])) {
	


	$ip = $_SERVER['REMOTE_ADDR'];

	$product = $_POST['prodID'];

	$quantity = $_POST['quantity'];

	session_start();
	if (isset($_SESSION['customer_id'])) {
		
		$customer = $_SESSION['customer_id'];
		
		$duplicate = duplicate($product,$customer);

		if ($duplicate) {
			
			?>
		    <script type="text/javascript">
		    alert("Product has already been added. Please increase the quantity in your cart");
		    window.location.href = "../View/meathaven.php";
		    </script>
		    <?php
		}else{

			$cart = CustomerAdd($product,$customer,$ip,$quantity);

			if ($cart) {
				
				header("Location:../View/meathaven.php");
			}else{

				echo "Failed to add";
			}
		}
	}else{

		$ipduplicate = IPduplicate($product,$ip);

		if ($ipduplicate) {
			
			?>
		    <script type="text/javascript">
		    alert("Product has already been added. Please increase the quantity in your cart");
		    window.location.href = "../View/meathaven.php";
		    </script>
		    <?php
		}else{

			echo $ip;
			$Cart = addCart($product,$ip,$quantity);

			if ($Cart) {
				
				header("Location:../View/meathaven.php");
			}else{

				echo "Failed to add";
			}
		}
	}
}
?>