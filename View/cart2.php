<?php 
require ('../Controllers/cart_controller.php');
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
					<li><a href="../Login/account.php">Login</a></li>
				</ul>
			</nav>
			<a href="#"><img src="../Images/cart.png" height="30px" width="30px"></a>
			<img src="../Images/menu.png" class="menu" onclick="menutoggle()">
		</div>
	</div>

	
	<div class="sub-container cart-details">
		<table>
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Manage</th>
			</tr>

			<?php
				//session_start();
				if (isset ($_SESSION['customer_id'])) {
					
					$id = $_SESSION['customer_id'];

					$cart = array();
					$cart = viewCart($id);
					$checkOut = Total($id);
				
					if ($cart) {
						foreach ($cart as $key => $value) {
			?>
			<tr>
				<td>	
					<div class="cartinfo">
						<img src="<?php echo "".$value[1]."" ?>">
						<div>
							<p><?php echo "".$value[0]."" ?></p>
							<small>GHS <?php echo "".$value[2]."" ?>.00</small>
						</div>
					</div>
				</td>
				<td>
					<form method="get" action="..Actions/manage.php">
					<input type="hidden" name="prodID" value="<?php echo "".$key."" ?>">
					<input type="number" value="1" name="quantity">
					<button type="submit" name="cusdate"><i class="fa fa-refresh"></i></button>
					</form>
				</td>
				<td><a href="../Actions/remove.php?id=<?php echo "".$key."" ?>">Remove</a></td>
			</tr>
				<?php
				}
				}
				}else{
					$ip = $_SERVER['REMOTE_ADDR'];

					$cartIP = array();
					$cartIP = IPcart($ip);

					if ($cartIP) {
						foreach ($cartIP as $key => $value) {
				?>
			<tr>
				<td>	
					<div class="cartinfo">
						<img src="<?php echo "".$value[1]."" ?>">
						<div>
							<p><?php echo "".$value[0]."" ?></p>
							<small>GHS <?php echo "".$value[2]."" ?>.00</small>
						</div>
					</div>
				</td>
				<td>
					<form method="get" action="../Actions/manage.php">
					<input type="hidden" name="prodid" value="<?php echo "".$key."" ?>">	
					<input type="number" value="<?php echo "".$value[3]."" ?>" name="qty">
					<button type="submit" name="update"><i class="fa fa-refresh"></i></button>
					</form>
				</td>
				<td><a href="../Actions/ipremove.php?id=<?php echo "".$key."" ?>">Remove</a></td>
				<?php
						}
					}else{
						echo "Daabi";
					}
				}	
				?>
			</tr>
		</table>

		<div class="price-total">
			<table>
				<tr>
					<td>Subtotal:</td>
					<td>*money*</td>
				</tr>
				<tr>
					<td>Total:</td>
					<td>*plenty money*</td>
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