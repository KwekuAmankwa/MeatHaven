<?php

require ("../Controllers/customer_controller.php");

if (isset($_POST['reg'])) {
	
	$user = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$city = $_POST['city'];
	$contact = $_POST['contact'];

	$password = md5($pass);

	$insert = addCustomer($user,$email,$password,$city,$contact);

	if ($insert) {
		
		echo "inserted successfully";
		header("Location:account.php");
	}else{

		echo "Failed to register";
	}
}


if (isset($_POST['log'])) {
	
	$user = $_POST['lemail'];
	$password = $_POST['lpassword'];

	$password = md5($password);

	$login = array();
	$login = findEmail($user);

	$ip = $_SERVER['REMOTE_ADDR'];

	if ($login) {
		
		if ($user == $login[1] && $password == $login[2]) {

			session_start();

			$_SESSION['customer_id'] = $login[0];
			$_SESSION['user_role'] = $login[3];

			if ($_SESSION['user_role'] == 2) {
				
			
				$cart = customerUpdate($_SESSION['customer_id'],$ip);

				if ($cart) {
					header("Location:../index.php");
				}else{
					echo "Ay3 Ka";
				}
			}else{
				header("Location:../index.php");
			}	
		}else{
			echo "Email or Password incorrect";
		}
	}else{
		echo "User does not exist";
	}
}
?>