<?php 
require ('../Controllers/product_controller.php');

$prodids = array();
$prodids = featuredID();

$prodname = array();
$prodname = featuredName();

$prodprice = array();
$prodprice = featuredPrice();

$prodimage = array();
$prodimage = featuredImage();

$catids = array();
$catids = categoryID();

$catnames = array();
$catnames = categoryName();

$catimages = array();
$catimages = categoryImage();
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
	<div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="#"><img src="../Images/logo2.png"></a>
				</div>
				<nav>
					<ul id="menuItems">
						<li><a href="#">Home</a></li>
						<li><a href="products.php">Products</a></li>
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
			<div class="row">
				<div class="col-2">
					<h1>Enhance The Taste <br> Of Your Meatballs!</h1>
					<p>It's not always the spices that make the mouth water. <br> Sometimes... It's the Meat!</p>
					<!-- <a href="" class="btn">Explore  &#8594;</a> -->
				</div>
				<div class="col-2">
					<img src="../Images/meatballs.png">
				</div>
			</div>
		</div>
	</div>

	<div class="category">
		<div class="sub-container">
			<h2 class="title">Categories</h2>
			<div class="row">

			<?php
			if (!empty($catids)) {
				foreach ($catids as $catid) {
					$key = array_search($catid, $catids);
			?>
				<div class="col-3">
					<a href="catprod.php?id=<?php  echo $catids[$key];?>&name=<?php  echo $catnames[$key];?>"><img src="<?php  echo $catimages[$key];?>"></a><br><br>
					<h4><?php  echo $catnames[$key];?></h4>
				</div>
				<?php		
					}
				}
				?>			
			</div>			
		</div>	
	</div>

	<div class="sub-container">
		<h2 class="title">Featured Products</h2>
		<div class="row">

		<?php    

			if (!empty($prodids)) {
			  foreach ($prodids as $prodid) {
			    $key = array_search($prodid, $prodids);
		?>	
			<div class="col-4">
				<a href="oneproduct.php?id=<?php echo "$prodids[$key]";?>&name=<?php echo"$prodname[$key]";?>"><img src="<?php echo"$prodimage[$key]";?>"></a>
				<h4><?php echo"$prodname[$key]"; ?></h4>
				<p>GHS: <?php echo "$prodprice[$key]"; ?>.00</p>
			</div>
		<?php

			}
		}
		?>
		</div>	
	</div>

	<div class="promo">
		<div class="sub-container">
			<div class="row">
				<div class="col-2">
					<img src="../Images/basket.png" class="promo-image">
				</div>

				<div class="col-2">
					<p>Christmas promo. Only on meatHaven</p>
					<h1>All Meat Basket</h1>
					<small>Buy this season's already made gift basket and pay 70% <br> of the total price of the items in the basket.</small><br>
					<!-- <a href="" class="btn">Buy Now &#8594;</a> -->
				</div>
			</div>
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