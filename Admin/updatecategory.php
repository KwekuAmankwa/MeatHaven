<?php

require("../Actions/update_category.php");
session_start();

$category = $_GET['name'];
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Category</title>
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

		.form-control{

			width: 50%;
		}

		.list-group-item{
			width: 50%;
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
	</style>
</head>
<body>
	<?php
  		if (isset($_SESSION['customer_id'])) {
  	?>
	<div class="topnav">
		<div class="topnav-centered">
		  	
	    </div>
	  
	 
		<a href="Admin.php" class="btn btn-outline-light">Meat Haven</a>
		<!-- <a href="#">Category</a> -->
	  
		<div class="topnav-right">
		  	

		  	<a href="product.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-plus"></span> Product</a>
		  	<a href="../Login/logout.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-user"></span> Logout</a>	
	    </div>  
	</div>

	<div class="container">
		<h1>Update <?php  echo "$category";?></h1>
		<form action="../Actions/update_category.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php  echo "$id";?>">
				<input type="text" name="category" required="required" class="form-control" placeholder="Category"><br>	
			</div>
			<div class="form-group">
				<label for="exampleFormControlFile1">Category Image</label>
				<input type="file" name="catimage" class="form-control-file">
			</div>	
			<button type="submit" class="btn btn-primary" name="update">Update</button>
		</form><br><br>
	</div>
<?php }else{header("Location:../index.php");}   ?>
</body>
</html>