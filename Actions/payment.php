<?php
require_once("../Controllers/cart_controller.php");
session_start();
//check for status
if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status == 'completed'){
        // ..code
        $customer = $_SESSION['customer_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        $ord_status = 'unfulfilled';
        $addOrder = newOrder($customer, $inv_no, $ord_date, $ord_status);
        if($addOrder){
            $recent = recentOrder();
            $cart = viewCart($customer);
            foreach($cart as $key => $value){

                $addDetails = addOrderDetails($recent['recent'], $key, $value[3]);
            }

            $amt = Total($customer);
            $currency = "USD";
            $addPayment = addPayment($amt['Result'], $customer, $recent['recent'], $currency, $ord_date);


            if($addPayment){
                $delete = emptyCart($customer);
                if($delete){
                    header("location: ../View/success.php?ord_id=" .$recent['recent']);
                }
            }else{
                echo "payment failed";
            }


        }else{
            echo "order went wrong";
        }

    }else if ($status == 'failed'){
        echo "failed";
    }
}else{
    echo "payment cancelled";
}

?>
