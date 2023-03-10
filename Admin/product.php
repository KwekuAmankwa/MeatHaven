<?php

session_start();

require("../Controllers/product_controller.php");

$catids = array();
$catids = categoryID();

$catnames = array();
$catnames = categoryName();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Meat Haven</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
		}

		.topnav {
		  position: relative;
		  overflow: hidden;
		  background-color: #222;
		}

		.topnav a {
		  float: left;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.topnav a.active {
		  background-color: #4CAF50;
		  color: white;
		}

		.topnav-centered {
		  float: none;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  padding: 14px 16px;
		  transform: translate(-50%, -50%);
		}

		.topnav-right {
		  float: right;
		}

		/* Responsive navigation menu (for mobile devices) */
		@media screen and (max-width: 600px) {
		  .topnav a, .topnav-right {
		    float: none;
		    display: block;
		  }
		  
		  .topnav-centered a {
		    position: relative;
		    top: 0;
		    left: 0;
		    transform: none;
		  }
		}

		button.btn.btn-default{
		 font-weight: bold;
		}

		.form-control{

			width: 50%;
		}

		.btn.btn-primary{
			padding: 10px 24px;	
		}

		.btn.btn-primary:hover{
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		}
	</style>
</head>
<body>


	<div class="topnav">

	 
		<div class="topnav-centered">
			
			
		</div>
	  
	  
		<a href="Admin.php" class="btn btn-outline-light">Meat Haven</a>
		<a href="category.php">Category</a>
	  
	  
		<div class="topnav-right">

			<!-- <a href="#about" class="btn btn-outline-light"><span class="glyphicon glyphicon-plus"></span> Product</a> -->
			<a href="../Login/logout.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-user"></span> Logout</a>
			
		</div>  
	</div>

	<div class="container">
	  	<h1>Add Product</h1>
		<form action="../Actions/addproduct.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" class="form-control" required="required" placeholder="Product name" name="prodname">
			</div>

			<div class="form-group">
				<select class="form-control" name="prodcat" required="required">
					<option disabled selected>Product Category</option>
					<?php

					if (!empty($catids)) {
						foreach ($catids as $catid) {
							$key = array_search($catid, $catids);
							echo "<option value='".$catids[$key]."'>".$catnames[$key]."</option>";
						}
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<input type="number" class="form-control" required="required" placeholder="Product price" name="prodprice">
			</div>

			<div class="form-group">
				<textarea class="form-control" name="proddesc" required="required" placeholder="Description"></textarea>
			</div>

			<div class="form-group">
				<label for="exampleFormControlFile1">Product Image</label>
				<input type="file" name="prodimage" class="form-control-file">
			</div>

			<div class="form-group">
				<input type="text" name="prodkeys" required="required" placeholder="Keywords" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary" name="submit">Add</button>
		</form><br>
	</div>
</body> 
</html>