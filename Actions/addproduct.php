<?php


require("../Controllers/product_controller.php");


if (isset($_POST['submit'])) {
    session_start();
	$pname = $_POST['prodname'];
	$pcat = $_POST['prodcat'];
	$price = $_POST['prodprice'];
	$description = $_POST['proddesc'];
	$keywords = $_POST['prodkeys'];



	$target_dir = "../Images/Product/";
    $target_file = $target_dir . basename($_FILES['prodimage']["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (empty($_FILES["prodimage"]["name"])){
        echo '<scipt>alert("File cannot be empty")</script>';
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["prodimage"]["tmp_name"]);
    
        if ($check == false){
            echo '<script>alert("File is not an image")</script>';
        }
        //check if file already exists
        if (file_exists($target_file)){
            echo '<script>alert("File already exists")</script>';
        }
        
        //limit file size
        if ($_FILES["prodimage"]["size"] > 5000000){
            echo '<script>alert("File is too large")</script>';
        }
        
        //limit file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
        }
    }

    $image = move_uploaded_file($_FILES["prodimage"]["tmp_name"], $target_file);

    if ($image) {
    	$product = addProduct($pname,$pcat,$price,$target_file,$description,$keywords);

    	if ($product) {
    		echo '<script>alert("Added Successfully");</script>';
            header("Location:../Admin/Admin.php")
    	}else{
    		echo '<script>alert("Failed to add");</script>';
            echo "failed";
    	}
    }
}



?>