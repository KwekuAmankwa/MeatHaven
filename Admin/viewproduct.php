<?php


require ('../Controllers/product_controller.php');

$prodID = $_GET['id'];
$prodName = $_GET['name'];

$one = oneProduct($prodID);
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
	</style>
</head>
<body>

	<?php
  		session_start();
  		if (isset($_SESSION['customer_id'])) {
  	?>
<!-- Top navigation -->
<div class="topnav">

  <!-- Centered link -->
  <div class="topnav-centered">
  	
  	
    
  </div>
  
  <!-- Left-aligned links (default) -->
  <a href="Admin.php" class="btn btn-outline-light">Meat Haven</a>
  <a href="category.php">Categories</a>
  
  <!-- Right-aligned links -->
  <div class="topnav-right">

  	<a href="product.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-plus"></span> Product</a>
  	

  	<a href="../Login/logout.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-user"></span> Logout</a>
  	

  	
    <!-- <a href="#search">Login</a> -->
    
  </div>  
</div><br><br>

<div class="container">
  
  
  	<div class="container">

	    <div class="col-sm-3">
	    	
			<img src="<?php echo "".$one[0]."" ?>" style="width: 100%;"><br><br>
			<a href="../Admin/updateproduct.php?id=<?php echo "$prodID";?>&name=<?php echo "".$one[1]."" ?>" class="btn btn-success" style="width: 100%"><span class="glyphicon glyphicon-gift"></span> Update</a><br><br>
			<a href="../Actions/deleteproduct.php?id=<?php echo "$prodID";?>" style="width: 100%" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Delete</a>
		</div><br><br>

		<div class="col-sm-1">
			
		</div>

		<div class="col-sm-8">
			<?php echo "
			<h1>Product: ".$one[1]."</h1>
			<h2>Price: GHS ".$one[2].".00</h2>
			<h2>Description: ".$one[3]."</h2>
			<h2>Category: ".$one[4]."</h2>
			<h2>Keywords: ".$one[5]."</h2>";

			?>
		</div>
	</div>
</div>

	<?php
  		}else{
  		}
  	?>
</body>
</html>
