<?php 
require ('../Controllers/product_controller.php');

$prodID = $_GET['id'];
$prodName = $_GET['name'];

$one = oneProduct($prodID);
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

	<div class="sub-container one-product">
		<div class="row">
			<div class="col-2">
				<img src="<?php echo "".$one[0]."" ?>" width="100%">
			</div>
			<div class="col-2">
				<p><a href="meathaven.php">Home </a>/ <?php echo "".$one[1]."" ?></p>
				<h1><?php echo "".$one[1]."" ?></h1>
				<p>Category: <a href="#"><?php echo "".$one[4]."" ?></a></p>
				<p>Keywords: <?php echo "".$one[5]."" ?></p><br>
				<h4>GHS <?php echo "".$one[2]."" ?>.00</h4>
				<form method="post" action="../Actions/addcart.php">
					<input type="hidden" name="prodID" value="<?php echo "$prodID";?>">
					<input type="number" name="quantity" value="1">
					<button type="submit" name="cart" >Add to Cart</button>
				</form>
				<h3>Description</h3>
				<br>
				<p><?php echo "".$one[3]."" ?></p>
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