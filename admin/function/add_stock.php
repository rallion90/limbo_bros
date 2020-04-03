<?php
	$stock = "";
	$stockErr = "";
	$product_id = $_GET['id'];
	if(isset($_POST['submit'])){
		if(empty($_POST['stock'])){
			$stockErr = "Field Required";
		}
		else{
			$stock = $_POST['stock'];
		}

		if($stock){
			if(!is_numeric($stock)){
				$stockErr = "This must be Numeric";
			}
			else{
				$update_stock = mysqli_query($connect, "UPDATE product SET product_stock = product_stock +'$stock' WHERE product_id = '$product_id' ");

				if($update_stock){
					echo "<script>window.location.href='../admin/stock_product.php?id=$product_id;</script>";
				}
				else{
					echo "<script>window.location.href='../admin/stock_product.php?id=$product_id&added=failed';</script>";
				}
			}
		}
	}
?>