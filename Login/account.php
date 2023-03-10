<?php 

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
				<a href="../View/meathaven.php"><img src="../Images/logo2.png"></a>
			</div>
			<nav>
				<ul id="menuItems">
					<li><a href="../View/meathaven.php">Home</a></li>
					<li><a href="../View/products.php">Products</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="../View/cart.php"><img src="../Images/cart.png" height="30px" width="30px"></a></li>
				</ul>
			</nav>
			<img src="../Images/menu.png" class="menu" onclick="menutoggle()">
		</div>
	</div>

	<div class="account">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<h2 style="text-align: center;">Join the Family!</h2>
					<p style="text-align: center;">Register and let us <br> meat your needs.</p>
					<img src="../Images/account.png" width="100%">
				</div>
				<div class="col-2">
					<div class="form-container">
						<div class="form-btn">
							<span onclick="Login()">Login</span>
							<span onclick="reg()"> Register</span>
							<hr id="indicator">
						</div>
						<form action="accountprocess.php" method="post" id="loginform">
							<input type="email" name="lemail" placeholder="Email" required="required">
							<input type="password" name="lpassword" placeholder="Password" required="required">
							<button type="submit" class="btn" name="log">Login</button>
						</form>
						<form action="accountprocess.php" method="post" id="regform">
							<input type="text" name="username" placeholder="Username" required="required">
							<input type="email" name="email" placeholder="Email" required="required">
							<input type="password" name="password" placeholder="Password" required="required">
							<input type="text" name="city" placeholder="City" required="required">
							<input type="text" name="contact" placeholder="Contact" required="required">
							<button type="submit" class="btn" name="reg">Register</button>
						</form>
					</div>
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
	<!-- navbar dropdown js -->
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
	<!-- form js -->
	<script>
		var login = document.getElementById("loginform");
		var register = document.getElementById("regform");
		var indicator = document.getElementById("indicator");

		function reg(){

			regform.style.transform = "translateX(0px)";
			loginform.style.transform = "translateX(0px)";
			indicator.style.transform = "translateX(100px)";
		}

		function Login(){

			regform.style.transform = "translateX(300px)";
			loginform.style.transform = "translateX(300px)";
			indicator.style.transform = "translateX(0px)";
		}
	</script>	
</body>
</html>