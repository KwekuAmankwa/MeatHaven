<?php 
require ('../Controllers/cart_controller.php');

$order_id = $_GET['ord_id'];
$order = getOrder($order_id);
$order_details = getOrderDetails($order_id);
print_r($order_details);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>meatHaven</title>
	<script src="https://use.fontawesome.com/ee1aff83f2.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>	
	<div class="container">
		<div class="navbar">
			<div class="logo">
				<a href="meathaven.php"><img src="../Images/logo2.png"></a>
			</div>
			<nav>
				<ul id="menuItems">
					<li><a href="meathaven.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<!-- <li><a href="../Login/account.php">Login</a></li> -->
					<?php
					session_start();
					if (isset($_SESSION['customer_id'])) {
					
					?>
						<li><a href="../Login/logout.php">Logout</a></li>
					<?php 
					}else{
					?>
						<li><a href="../Login/account.php">Login</a></li>
					<?php
					}
					?>
				</ul>
			</nav>
			<a href="#"><img src="../Images/cart.png" height="30px" width="30px"></a>
			<img src="../Images/menu.png" class="menu" onclick="menutoggle()">
		</div>
	</div>

	
	<div class="sub-container cart-details">
		<h1>Payment Approved</h1>
		<h6>Your Order is being processed</h6>
		<p>Invoice Number: <?php echo $order['invoice_no']; ?></p>
		<h6>Order Details</h6>
		<table>
			<tr>
				<th>#</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub-Total</th>
			</tr>

			<?php
	        $counter = 1;
	        $totals = 0;
	        foreach($order_details as $key => $value){
	    	?>

			<tr>
				<td><?php echo $counter; ?></td>
				<td><?php echo $value['prod_name'] ?></td>
				<td><?php echo $value['prod_price'] ?></td>
				<td><?php echo $value['quantity']; ?></td>
				<td><?php echo $value['result']; ?></td>
			</tr>
			<?php
	            $totals += $value['result'];
	            $counter++;
        	} ?>

		</table>

		<div class="price-total">
			
			<table>
				<tr>
					<td>Totals:</td>
					<td><?php  echo $totals; ?></td>
				</tr>
			</table>
		</div>
	</div>
	


	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download the app</h3>
					<p>Download the MeatHaven app from <br> the app store or google play.</p>
					<div class="app">
						<img src="../Images/app.png">
						<img src="../Images/play.png">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="../Images/white.png">
					<p>We aim to provide you with meat that is just right for you.</p>
				</div>
				<div class="footer-col-3">
					<h3>Follow Us</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright - MeatHaven</p>
			<p class="copyright">©2020</p>
		</div>
	</div>
	<script>
		var menuItems = document.getElementById('menuItems');

		menuItems.style.maxHeight = '0px';

		function menutoggle() {
			if (menuItems.style.maxHeight == '0px') {
				menuItems.style.maxHeight = '200px';
			}else{
				menuItems.style.maxHeight = '0px'
			}
		}
	</script>
		
</body>
</html>