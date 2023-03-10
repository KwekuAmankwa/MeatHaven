<?php

require ("../Classes/product_class.php");

function addCategory($a,$b){

	$new_category = new productclass();

	$category = $new_category->addCategory($a,$b);

	if ($category) {
		
		return true;
	}else{

		return false;
	}
}

function updateCategory($a,$b,$c){

	$object = new productclass();

	$category = $object->updateCategory($a,$b,$c);

	if ($category) {
		
		return true;
	}else{

		return false;
	}
}

function deleteCategory($id){

	$object = new productclass();

	$category = $object->deleteCategory($id);

	if ($category) {
		
		return true;
	}else{

		return false;
	}
}

function findCategory($name){

	$object = new productclass();

	$category = $object->findCategory($name);

	if ($category) {
		
		return true;
	}else{

		return false;
	}
}

function categoryID(){

	$object = new productclass();

	$category = $object->getCategory();

	if ($category) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['category_id']);
		}

		return $array;
	}else{

		return false;
	}
}

function categoryName(){

	$object = new productclass();

	$category = $object->getCategory();

	if ($category) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['category_name']);
		}

		return $array;
	}else{
		return false;
	}
}

function categoryImage(){

	$object = new productclass();

	$category = $object->getCategory();

	if ($category) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['category_image']);
		}

		return $array;
	}else{
		return false;
	}
}

function addProduct($a,$b,$c,$d,$e,$f){

	$object = new productclass();

	$product = $object->addProduct($a,$b,$c,$d,$e,$f);

	if ($product) {
		
		return true;
	}else{

		return false;
	}
}

function updateProduct($a,$b,$c,$d,$e,$f,$g){

	$object = new productclass();

	$product = $object->updateProduct($a,$b,$c,$d,$e,$f,$g);

	if ($product) {
		
		return true;
	}else{

		return false;
	}
}

function deleteProduct($id){

	$object = new productclass();

	$product = $object->deleteProduct($id);

	if ($product) {
		
		return true;
	}else{

		return false;
	}
}

function ProductID(){

	$object = new productclass();

	$product = $object->allProducts();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_id']);
		}

		return $array;
	}else{

		return false;
	}
}

function ProductName(){

	$object = new productclass();

	$product = $object->allProducts();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_name']);
		}

		return $array;
	}else{

		return false;
	}
}

function ProductImage(){

	$object = new productclass();

	$product = $object->allProducts();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_image']);
		}

		return $array;
	}else{

		return false;
	}
}

function ProductPrice(){

	$object = new productclass();

	$product = $object->allProducts();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_price']);
		}

		return $array;
	}else{

		return false;
	}
}

function oneProduct($id){

	$object = new productclass();

	$product = $object->oneProduct($id);

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			array_push($array, $entries['prod_image']);
			array_push($array, $entries['prod_name']);
			array_push($array, $entries['prod_price']);
			array_push($array, $entries['prod_description']);
			array_push($array, $entries['category_name']);
			array_push($array, $entries['prod_keywords']);
			array_push($array, $entries['prod_category']);
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


function Featured($a,$b){

	$feature = new productclass();

	$feature = $feature->featured($a,$b);

	if ($feature) {
		
		return true;
	}else{

		return false;
	}
}

function featuredID(){

	$object = new productclass();

	$product = $object->getFeatured();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_id']);
		}

		return $array;
	}else{

		return false;
	}
}


function featuredName(){

	$object = new productclass();

	$product = $object->getFeatured();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_name']);
		}

		return $array;
	}else{

		return false;
	}
}


function featuredPrice(){

	$object = new productclass();

	$product = $object->getFeatured();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_price']);
		}

		return $array;
	}else{

		return false;
	}
}


function featuredImage(){

	$object = new productclass();

	$product = $object->getFeatured();

	if ($product) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			array_push($array, $entries['prod_image']);
		}

		return $array;
	}else{

		return false;
	}
}
function searchProduct($term){

	$object = new productclass();

	$search = $object->searchProduct($term);

	if ($search) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			$array[$entries['prod_id']] = [$entries['prod_name'],
										  $entries['prod_image'],
										  $entries['prod_price'],
										  $entries['prod_id']];
		}

		return $array;
	}else{

		return false;
	}
}

function categoryproduct($catid){

$object = new productclass();

$search = $object->catprod($catid);

	if ($search) {
		
		$array = array();

		while ($entries = $object->db_fetch()) {
			
			$array[$entries['prod_id']] = [$entries['prod_id'],
										  $entries['prod_name'],
										  $entries['prod_image'],
										  $entries['prod_price']];
		}

		return $array;
	}else{

		return false;
	}
}
?>