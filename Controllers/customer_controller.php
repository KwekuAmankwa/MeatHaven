<?php

require ("../Classes/customer_class.php");


function addCustomer($b,$c,$d,$e,$f){

	$object = new customerclass();

	$customer = $object->addCustomer($b,$c,$d,$e,$f);

	if ($customer) {
		
		return $customer;
	}else{
		return false;
	}
}


function updateCustomer($b,$c,$d,$e,$f){

	$object = new customerclass();

	$customer = $object->updateCustomer($b,$c,$d,$e,$f);

	if ($customer) {
		
		return $customer;
	}else{

		return false;
	}
}


function Customer($email,$password){

	$object = new customerclass();

	$customer = $object->Customer($email,$password);

	if ($customer) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			array_push($array, $entries['customer_id']);
			array_push($array, $entries['customer_email']);
			array_push($array, $entries['customer_password']);
			array_push($array, $entries['user_role']);
		}

		if (empty($array)) {
			return false;
		}else{
			return $array;
		}
	}else{
		return false;
	}
}

function findEmail($email){

	$object = new customerclass();

	$customer = $object->findEmail($email);

	if ($customer) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			array_push($array, $entries['customer_id']);
			array_push($array, $entries['customer_email']);
			array_push($array, $entries['customer_password']);
			array_push($array, $entries['user_role']);
		}

		if (empty($array)) {
			return false;
		}else{
			return $array;
		}
	}else{

		return false;
	}
}

function customerUpdate($customer,$ip){

	$object = new customerclass();

	$cart = $object->customerUpdate($customer,$ip);

	if ($cart) {
		
		return true;
	}else{

		false;
	}
}
?>