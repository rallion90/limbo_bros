<?php
include("../../connection.php");
	$product_id = $_GET['id'];

	if(isset($product_id)){
		$delete_trigger = mysqli_query($connect, "DELETE FROM product WHERE product_id = '$product_id'");

		if($delete_trigger){
			echo "<script>window.location.href='../product.php?deleted=succesfully';</script>";
		}
		else{
			echo "<script>window.location.href='../product.php?deleted=failed';</script>";
		}
	}
	else{
		echo "<script>window.location.href='../product.php?error=not_allowed';</script>";
	}
?>