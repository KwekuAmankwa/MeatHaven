<?php

require("../Controllers/product_controller.php");



if (isset($_POST['update'])) {
	
	$category = $_POST['category'];
	$id = $_POST['id'];


	$target_dir = "../Images/Category/";
    $target_file = $target_dir . basename($_FILES['catimage']["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (empty($_FILES["catimage"]["name"])){
        echo '<scipt>alert("File cannot be empty")</script>';
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["catimage"]["tmp_name"]);
    
        if ($check == false){
            echo '<script>alert("File is not an image")</script>';
        }
        //check if file already exists
        if (file_exists($target_file)){
            echo '<script>alert("File already exists")</script>';
        }
        
        //limit file size
        if ($_FILES["catimage"]["size"] > 5000000){
            echo '<script>alert("File is too large")</script>';
        }
        
        //limit file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif"){
            echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
        }
    }

    $image = move_uploaded_file($_FILES["catimage"]["tmp_name"], $target_file);

    if ($image) {
    		
    	//check if category exists

		$exist = findCategory($category);

		if ($exist) {
			echo '<script>alert("Enter a new category name")</script>';
		}else{

			$submit = updateCategory($category,$target_file,$id);

			if ($submit) {
				echo '<script>alert("Added Successfully");</script>';
				header("Location:../Admin/category.php");
			}else{
				echo '<script>alert("Something went wrong");</script>';
			}
		}
    }	
}
?>