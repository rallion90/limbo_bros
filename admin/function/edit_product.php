<?php
	$product_id = $_GET['id'];
	$get_product_data = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '$product_id'");
	$get_raw_data = mysqli_fetch_assoc($get_product_data);

	$item_name = $stock = $price = $length = $width = $weight = $editor = "";
	$item_nameErr = $stockErr = $priceErr = $lengthErr = $widthErr = $weightErr = $editorErr = "";

	if(isset($_POST['submit'])){

		$target = "../template/admin_template/product_image/".basename($_FILES['product_image']['name']);
      	$image = $_FILES['product_image']['name'];
      	$category = $_POST['category'];

		if(empty($_POST['item_name'])){
			$item_nameErr = "Field Required";
		}
		else{
			$item_name = $_POST['item_name'];
		}

		if(empty($_POST['stock'])){
			$stockErr = "Field Required";
		}
		else{
			$stock = $_POST['stock'];
		}

		if(empty($_POST['price'])){
			$priceErr = "Field Required";
		}
		else{
			$price = $_POST['price'];
		}

		if(empty($_POST['length'])){
			$lengthErr = "Field Required";
		}
		else{
			$length = $_POST['length'];
		}

		if(empty($_POST['width'])){
			$widthErr = "Field Required";
		}
		else{
			$width = $_POST['width'];
		}

		if(empty($_POST['weight'])){
			$weightErr = "Field Required";
		}
		else{
			$weight = $_POST['weight'];
		}

		if(empty($_POST['editor'])){
			$editorErr = "Field Required";
		}
		else{
			$editor = $_POST['editor'];
		}

		if($item_name && $stock && $price && $length && $width && $weight && $editor){
			if(!is_numeric($price)){
				$priceErr = "Must be Numeric";
				//echo "<script>window.location.href='../admin/categories.php?added=succesfully';</script>";
			}
			else{
				$insert_product = mysqli_query($connect, "UPDATE product SET product_image = '$image', product_name = '$item_name', product_category = '$category', product_stock = '$stock', product_price = '$price', product_length = '$length', product_width = '$width', product_weight = '$weight', product_description = '$editor' WHERE product_id = '$product_id'");

				if($insert_product){
					if(move_uploaded_file($_FILES['product_image']['tmp_name'], $target)){
		            	echo "<script>window.location.href='../admin/edit_product.php?id=$product_id&added=succesfully';</script>";
		        	}
		        	else{
		        		$msgErr = "There was a problem uploading your image";
		        	}
				}
				else{
					echo "<script>window.location.href='../admin/register_product_item.php?added=failed';</script>";
				}

			}
		}
	}

?>