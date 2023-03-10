<?php

require ('../Controllers/product_controller.php');
session_start();

$prodids = array();
$prodids = ProductID();

$prodname = array();
$prodname = ProductName();

$prodprice = array();
$prodprice = ProductPrice();

$prodimage = array();
$prodimage = ProductImage();

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
	if ($_SESSION['customer_id']) {
	?>

	<div class="topnav">

	 
		<div class="topnav-centered">
			
			
		</div>
	  
	  
		<a href="#" class="btn btn-outline-light">Meat Haven</a>
		<a href="category.php">Category</a>
	  
	  
		<div class="topnav-right">

			<a href="product.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-plus"></span> Product</a>
			<a href="../Login/logout.php" class="btn btn-outline-light"><span class="glyphicon glyphicon-user"></span> Logout</a>
			
		</div>  
	</div><br><br>

	<div class="container">
	  
	  	<div class="row">
			<?php    

			if (!empty($prodids)) {
			  foreach ($prodids as $prodid) {
			    $key = array_search($prodid, $prodids);
			?>
			<div class="col-sm-3">
			  <div class="panel panel-default">
			    <div class="panel-heading"><?php echo"$prodname[$key]"; ?></div>
			    <div class="panel-body">
			    	<a href="../Admin/viewproduct.php?id=<?php echo "$prodids[$key]";?>&name=<?php echo"$prodname[$key]"; ?>"><img src="<?php echo"$prodimage[$key]";?>" class="img-responsive" style="width:100%" alt="Image"></a>
			    </div>
			    <div class="panel-footer">   
			      <p>GHS <?php echo "$prodprice[$key]"; ?>.00p</p>
			      <a href="../Admin/updateproduct.php?id=<?php echo "$prodids[$key]";?>&name=<?php echo"$prodname[$key]"; ?>" style="width: 48%" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Update</a>
			      <a href="../Actions/deleteproduct.php?id=<?php echo "$prodids[$key]";?>" style="width: 48%" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Delete</a>
			      <br>
			      <br>
			      <a href="../Actions/featured.php?id=<?php echo "$prodids[$key]";?>&name=<?php echo"$prodname[$key]"; ?>" class="btn btn-default" style="width: 100%; ">Make Featured product</a>
			    </div>
			  </div>
			</div>
			<?php

			 }
			}
			?>
		</div>
	</div>
</body>
<?php }else{header("Location:../index.php");}  ?>
</html>
