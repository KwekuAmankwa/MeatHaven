<?php
//A customer class to handle all customer processes for Meat Haven

//connect to the database class
require("../Settings/db_class.php");



class customerclass extends db_connection
{
	
	public function addCustomer($b,$c,$d,$e,$f)
	{
		//query to add customer
		$sql = "INSERT into customer (`username`,`customer_email`,`customer_password`,`customer_city`,`customer_contact`,`user_role`) values ('$b','$c','$d','$e','$f',2)";

		return $this->db_query($sql);
	}

	public function updateCustomer($a,$c,$d,$e,$f)
	{
		//query to update customer details
		$sql = "UPDATE customer SET `last_name`='$c',`customer_password` = '$d',`customer_city` = '$e',`customer_contact` = '$f' WHERE `customer_id`='$a'";

		return $this->db_query($sql);
	}

	public function findEmail($email)
	{
		//query to find existing emails
		$sql = "SELECT `customer_id`, `customer_email`,`customer_password`,`user_role` from customer where `customer_email` = '$email'";

		return $this->db_query($sql);
	}

	public function Customer($email,$password)
	{
		#query lo login customer
		$sql = "SELECT `customer_id`,`customer_email`,`customer_password`,`user_role` FROM customer WHERE `customer_email`='$email' AND `customer_password`=$password'";

		return $this->db_query($sql);
	}

	public function customerUpdate($customer,$ip)
	{
		#query to add update customer column using the IP address
		$sql = "UPDATE cart set `customer_id`='$customer' where `ip_address` = '$ip'";

		return $this->db_query($sql);
	}
}
?>