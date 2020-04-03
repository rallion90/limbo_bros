<?php
	$category = "";
	$categoryErr = "";

	if(isset($_POST['submit'])){
		if(empty($_POST['category'])){
			$categoryErr = "Field Cannot be Blank!";
		}
		else{
			$category = $_POST['category'];
		}

		if($category){
			$insert_category = mysqli_query($connect, "INSERT INTO categories(category_name) VALUES('$category')");

			if($insert_category){
				echo "<script>window.location.href='../admin/categories.php?added=succesfully';</script>";
			}
			else{
				echo "<script>window.location.href='../admin/categories.php?added=failed';</script>";
			}
		}
	}
	
?>