<?php

require ("../Classes/cart_class.php");


function addCart($prod,$ip,$quantity){

	$object = new cartclass();

	$cart = $object->addCart($prod,$ip,$quantity);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}


function CustomerAdd($prod,$customer,$ip,$quantity){

	$object = new cartclass();

	$cart = $object->CustomerAdd($prod,$customer,$ip,$quantity);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}

function customerUpdate($customer,$ip){

	$object = new cartclass();

	$cart = $object->customerUpdate($customer,$ip);

	if ($cart) {
		
		return true;
	}else{

		false;
	}
}

function quantity($customer,$quantity,$product){
	
	$object = new cartclass();

	$cart = $object->quantity($customer,$quantity,$product);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}

function IPquantity($ip,$quantity,$product){

	$object = new cartclass();

	$cart = $object->IPquantity($ip,$quantity,$product);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}

function deleteCart($customer,$product){

	$object = new cartclass();

	$cart = $object->deleteCart($customer,$product);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}

function IPdelete($ip,$product){

	$object = new cartclass();

	$cart = $object->IPdelete($ip,$product);

	if ($cart) {
		
		return true;
	}else{

		return false;
	}
}

function emptyCart($customer){

	$object = new cartclass();

	$cart = $object->emptyCart($customer);

	if ($cart) {
		
		return $cart;
	}else{

		return false;
	}
}



function viewCart($customer){

	$object = new cartclass();

	$cart = $object->viewCart($customer);

	if ($cart) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			$array[$entries['product_id']]= [$entries['prod_name'],
											$entries['prod_image'], 
											$entries['prod_price'], 
											$entries['quantity'],
											$entries['customer_id']];
		}

		return $array;
	}else{

		return false;
	}
}

function IPcart($ip){

	$object = new cartclass();

	$cart = $object->IPcart($ip);

	if ($cart) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			$array[$entries['product_id']] = [$entries['prod_name'],
											 $entries['prod_image'],
											  $entries['prod_price'],
											   $entries['quantity'],
											$entries['ip_address']];
		}
		return $array;
	}else{

		return false;
	}
}

function duplicate($product,$customer){

	$object = new cartclass();

	$cart = $object->duplicate($product,$customer);

	if ($cart) {
		
		$array = array();

		$entries = $object->db_fetch();

		if (!empty($entries['product_id']) && !empty($entries['customer_id'])) {
			
			return true;
		}else{

			return false;
		}
	}else{

		return false;
	}
}

function IPduplicate($product,$ip){

	$object = new cartclass;

	$cart = $object->IPduplicate($product,$ip);

	if ($cart) {
		
		$array = array();

		$entries = $object->db_fetch();

		if (!empty($entries['product_id']) && !empty($entries['ip_address'])) {
			
			return true;
		}else{

			return false;
		}
	}else{

		return false;
	}
}

function Total($customer){

	$object = new cartclass();

	$cart = $object->Total($customer);

	if ($cart) {
		
		$total = $object->db_fetch();

		return $total;
	}else{

		return false;
	}
}

function newOrder($cid, $inv, $date, $status){
    $cart_object = new cartclass();

    $cart = $cart_object->newOrder($cid, $inv, $date, $status);

    if ($cart){
        return $cart;
    }else{
        return false;
    }
}

function addOrderDetails($ord_id, $p_id, $qty){
    $cart_object = new cartclass();

    $cart = $cart_object->addOrderDetails($ord_id, $p_id, $qty);

    if ($cart){
        return $cart;
    }else{
        return false;
    }
}

function recentOrder(){
    $cart_object = new cartclass();

    $cart = $cart_object->recentOrder();
    if($cart){
        $recent = $cart_object->db_fetch();
        return $recent;
    }else{
        return false;
    }
}

function getOrder($ord_id){
    $cart_object = new cartclass();

    $cart = $cart_object->getOrder($ord_id);
    if($cart){
        $order = $cart_object->db_fetch();
        return $order;
    }else{
        return false;
    }
}

function getOrderDetails($ord_id){
    $cart_object = new cartclass();

    $cart = $cart_object->getOrderDetails($ord_id);
    if($cart){
        while($entries = $cart_object->db_fetch()){
            $order[] = $entries;
        }
        return $order;
    }else{
        return false;
    }
}

function addPayment($amt, $cid, $ord_id, $currency, $date){
    $cart_object = new cartclass();

    $cart = $cart_object->addPayment($amt, $cid, $ord_id, $currency, $date);

    if ($cart){
        return $cart;
    }else{
        return false;
    }
}
?>