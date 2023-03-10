<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<?php

		if ($_SESSION['customer_id']) {

			if ($_SESSION['user_role'] == 2) {
				
				header("Location:View/meathaven.php");
			}else{

				header("Location:Admin/Admin.php");
			}						
		}else{

			header("Location:View/meathaven.php");
		}
	?>
</body>
</html>