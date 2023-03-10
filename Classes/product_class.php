<?php
//A class to handle product processes and functions


//connect to the database class
require("../Settings/db_class.php");


class productclass extends db_connection
{
	

	public function addCategory($a,$b)
	{
		#query to insert Category
		$sql = "INSERT into category (`category_name`,`category_image`) values ('$a','$b') ";

		return $this->db_query($sql);
	}

	public function updateCategory($a,$b,$c)
	{
		#query to update category name
		$sql = "UPDATE category set `category_name` = '$a',`category_image` = '$b' where `category_id` = '$c'";

		return $this->db_query($sql);
	}

	public function deleteCategory($id)
	{
		#query to delete category
		$sql = "DELETE from category where `category_id`='$id' ";

		return $this->db_query($sql);
	}

	public function getCategory()
	{
		#query to get category items
		$sql = "SELECT * from category";

		return $this->db_query($sql);
	}

	public function findCategory($name)
	{
		#query to check if category exists
		$sql = "SELECT from category where `category_name` = '$name'";

		return $this->db_query($sql);
	}

	public function addProduct($a,$b,$c,$d,$e,$f)
	{
		#query to insert product
		$sql = "INSERT into product (`prod_name`,`prod_category`,`prod_price`,`prod_image`,`prod_description`,`prod_keywords`
		) values ('$a','$b','$c','$d','$e','$f') ";

		return $this->db_query($sql);
	}

	public function updateProduct($a,$b,$c,$d,$e,$f,$g)
	{
		#query to update product
		$sql = "UPDATE product set `prod_name`='$a',`prod_category`='$b',`prod_price`='$c',`prod_image`='$d',`prod_description`='$e',`prod_keywords`='$f' where `prod_id` = '$g'";

		return $this->db_query($sql);
	}

	public function deleteProduct($id)
	{
		#query to delete product 
		$sql = "DELETE from product where `prod_id`='$id' ";

		return $this->db_query($sql);
	}

	public function oneProduct($id)
	{
		#query to retrieve one product 
		$sql = "SELECT product.prod_id, product.prod_name, category.category_name, product.prod_price, product.prod_image, product.prod_description, product.prod_keywords, product.prod_category 
			FROM product 
			JOIN category ON (category.category_id = product.prod_category)
			WHERE `prod_id` = '$id'";

		return $this->db_query($sql);	
	}

	public function allProducts()
	{
		#query to list all products
		$sql = "SELECT product.prod_id, product.prod_name, product.prod_price, product.prod_image from product";

		return $this->db_query($sql);
	}

	public function searchProduct($term)
	{
		#query to search the product table using a term
		$sql = "SELECT * from product where `prod_name` like '$term'";

		return $this->db_query($sql);
	}

	public function featured($id,$name)
	{
		#query to add product to featured table
		$sql = "INSERT into featured (`fp_id`,`fp_name`) values ('$id','$name')";

		return $this->db_query($sql);
	}

	public function getFeatured()
	{
		$sql = "SELECT product.prod_id, product.prod_name, product.prod_price, product.prod_image 
				from featured
				JOIN product ON(product.prod_id = featured.fp_id)";

		return $this->db_query($sql);
	} 

	public function categoryproduct($catid){

		$sql = "SELECT * FROM `product` WHERE `prod_category` = '$catid'";

		return $this->db_query($sql);
	}

	public function catprod($catid){
		$sql = "SELECT product.prod_id, product.prod_name, category.category_name, product.prod_price, product.prod_image, product.prod_description, product.prod_keywords 
			FROM product 
			JOIN category ON (category.category_id = product.prod_category)
			WHERE prod_category = '$catid'";
		return $this->db_query($sql);	
	}
}
?>