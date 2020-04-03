<?php
session_start();
include("../../connection.php");
	if(isset($_SESSION['shopping_cart']))
	{
		$item_array_id = array_column($_SESSION['shopping_cart'], 'product_id');

		if(!in_array($_GET['product_id'], $item_array_id))
		{
			$count = count($_SESSION['shopping_cart']);

			$item_array = array(
				'product_id' => $_GET['product_id'],
				'product_name' => $_POST['product_name'],
				'product_price' => $_POST['product_price'],
				'product_description' => $_POST['product_description'],
				'product_quantity' => $_POST['quantity'],
				'image' => $_POST['image']
			);

			$_SESSION['shopping_cart'][$count] = $item_array;
			echo "<script>window.location='../index.php'</script>";


		}
		else
		{
			echo "<script>alert('Item Has already Added');</script>";
			echo "<script>window.location='../index.php'</script>";
		}
	}
	else
	{
		$item_array = array(
			'product_id' => $_GET['product_id'],
			'product_name' => $_POST['product_name'],
			'product_price' => $_POST['product_price'],
			'product_description' => $_POST['product_description'],
			'product_quantity' => $_POST['quantity'],
			'image' => $_POST['image']
		);
		$_SESSION['shopping_cart'][0] = $item_array;
		echo "<script>window.location='../index.php?added=succesfully'</script>"; 
	}
?>