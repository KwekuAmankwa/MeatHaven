<?php 
  		

require ('../Controllers/product_controller.php');

$cat = $_GET['name'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>meatHaven</title>
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
			<a href="cart.php"><img src="../Images/cart.png" height="30px" width="30px"></a>
			<img src="../Images/menu.png" class="menu" onclick="menutoggle()">
		</div>
	</div>
	
	<div class="sub-container">
		<div class="row row-2">
			<h2><?php echo $cat; ?></h2>
			
		</div>
		<div class="row">
			<?php    
				$catid = $_GET['id'];

				$category = array();
				$category = categoryproduct($catid);

				print_r($category);
				if ($category) {
				  foreach ($category as $key => $value) {   
			?>
			<div class="col-4">
				<a href="oneproduct.php?id=<?php echo "".$key."" ?>&name=<?php echo "".$value[0]."" ?>">
					<img src="<?php echo "".$value[1].""; ?>">
				</a>
				<h4><?php echo "".$value[0]."" ?> </h4>
				<p>GHS: <?php echo "".$value[2]."" ?>.00</p>
			</div>
			<?php

			 }
			}
			?>
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