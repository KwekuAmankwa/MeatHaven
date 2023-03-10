<?php
# A CLASS TO HANDLE ALL CART PROCESSES


require ("../Settings/db_class.php");


class cartclass extends db_connection
{
	
	public function addCart($prod,$ip,$quantity)
	{
		#query to add items to cart without being logged in
		$sql = "INSERT into cart (`product_id`,`ip_address`,`quantity`) values('$prod','$ip','$quantity') ";

		return $this->db_query($sql);
	}

	public function CustomerAdd($prod,$customer,$ip,$quantity)
	{
		#query to add items to cart as a registered
		$sql = "INSERT into cart (`product_id`,`customer_id`,`ip_address`,`quantity`) values ('$prod','$customer','$ip',',$quantity') ";

		return $this->db_query($sql);
	}

	public function customerUpdate($customer,$ip)
	{
		#query to add update customer column using the IP address
		$sql = "UPDATE cart set `customer_id`='$customer' where `ip_address` = '$ip'";

		return $this->db_query($sql);
	}

	public function quantity($customer,$quantity,$product)
	{
		#query to update the quantity using the customer id
		$sql = "UPDATE cart set `quantity`='$quantity' where `customer_id` = '$customer' and `product_id`= '$product' ";

		return $this->db_query($sql);
	}

	public function IPquantity($ip,$quantity,$product)
	{
		#query to update the quantity using the IP address
		$sql = "UPDATE cart set `quantity`='$quantity' where `ip_address`='$ip' and `product_id` = '$product'";

		return $this->db_query($sql);
	}

	public function viewCart($customer)
	{
		#query to view cart items
		$sql = "SELECT cart.customer_id, cart.product_id, cart.quantity, product.prod_name,product.prod_price,product.prod_image
			FROM cart
			JOIN `product` ON (cart.product_id = product.prod_id)
			JOIN `customer` ON (cart.customer_id = customer.customer_id)
			WHERE cart.customer_id = '$customer'";

		return $this->db_query($sql);	
	}

	public function IPcart($ip)
	{
		#query to view cart item for unregistered customers
		$sql = "SELECT cart.ip_address, cart.product_id, cart.quantity, product.prod_name, product.prod_price, product.prod_image
			FROM `cart`
			JOIN `product` ON (cart.product_id = product.prod_id)
			WHERE cart.ip_address = '$ip'";

		return $this->db_query($sql);
	}

	public function duplicate($product,$customer)
	{
		#query to check if item is already in cart
		$sql = "SELECT `product_id`,`customer_id` FROM cart WHERE `product_id` = '$product' AND `customer_id`='$customer'";

		return $this->db_query($sql);
	}

	public function IPduplicate($product,$ip)
	{
		#query to check if item is already in cart for unregistered user
		$sql = "SELECT `product_id`,`ip_address` FROM cart WHERE `product_id` = '$product' AND `ip_address`='$ip'";

		return $this->db_query($sql);
	}

	public function deleteCart($customer,$product)
	{
		#query to delete items from customer's cart
		$sql = "DELETE FROM cart WHERE `customer_id`='$customer' AND `product_id`='$product'";

		return $this->db_query($sql);
	}

	public function IPdelete($ip,$product)
	{
		#query to delete items from unregistered customer's cart
		$sql = "DELETE FROM cart WHERE `ip_address`='$ip' AND `product_id`='$product'";

		return $this->db_query($sql);
	}

	public function emptyCart($customer)
	{
		#query to empty cart
		$sql = "DELETE FROM cart WHERE `customer_id`='$customer'";

		return $this->db_query($sql);
	}

	public function IPempty($ip)
	{
		#query to empty cart
		$sql = "DELETE FROM cart WHERE `ip_address`='$customer'";

		return $this->db_query($sql);
	}

	public function Total($customer)
	{
		#query to calculate and display cart total
		$sql = "SELECT SUM(product.prod_price*cart.quantity) AS Result
			FROM cart 
			JOIN product ON (product.prod_id = cart.product_id)
			WHERE cart.customer_id = '$customer'";

		return $this->db_query($sql);
	}

	public function ipTotal($ip)
	{
		#query to calculate and display cart total
		$sql = "SELECT SUM(product.prod_price*cart.quantity) AS Result
			FROM cart 
			JOIN product ON (product.prod_id = cart.product_id)
			WHERE cart.ip_address = '$ip'";

		return $this->db_query($sql);
	}

	public function newOrder($cid,$inv,$date,$status){
		//write a query to add new order
		$sql = "INSERT into orders (`customer_id`,`invoice_no`,`order_date`,`order_status`) values ('$cid','$inv','$date','$status')";

		return $this->db_query($sql);
	}

	public function addOrderDetails($ord_id, $p_id, $qty){
		//write a query toinsert into table
        $sql = "INSERT into orderdetails (`order_id`, `product_id`, `quantity`) values ('$ord_id','$p_id','$qty')";

        return $this->db_query($sql);
    }

    public function recentOrder(){
    	//write a query to show recent order
        $sql = "SELECT MAX(`order_id`) as recent FROM orders";


        return $this->db_query($sql);
    }

    public function getOrder($ord_id){
    	//write a query to get order using the order id
	    $sql = "SELECT  customer.username, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status 
	    FROM `orders` 
	    JOIN `customer` ON (customer.customer_id = orders.customer_id) 
	    WHERE orders.order_id = '$ord_id'";

        return $this->db_query($sql);
    }

    public function getOrderDetails($ord_id){

        $sql = "SELECT product.prod_name, 	product.prod_price, orderdetails.quantity, orderdetails.quantity*product.prod_price as result 
        FROM `orderdetails`
        JOIN `product` ON (orderdetails.product_id = product.prod_id) 
        WHERE `order_id`='$ord_id'";

        return $this->db_query($sql);
    }

    public function addPayment($amt, $cid, $ord_id, $currency, $date){
    	//write a query to add to the payment table
        $sql = "INSERT into payment (`amount`, `customer_id`, `order_id`, `currency`, `pay_date`) values ('$amt','$cid','$ord_id','$currency','$date')";

        return $this->db_query($sql);
    }
}
?>