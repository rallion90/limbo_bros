<?php
	$contact_number = $province = $municipality = $barangay = $street = "";
	$contact_numberErr = $provinceErr = $municipalityErr = $barangayErr = $streetErr = "";

	if(isset($_POST['checkout'])){
		$order_numbers = rand(11111111,99999999);
		if(empty($_POST['contact_number'])){
			$contact_numberErr = "Field Required";
		}
		else{
			$contact_number = $_POST['contact_number'];
		}

		if($_POST['province'] == 'null'){
			$provinceErr = "Field Required";
		}
		else{
			$province = $_POST['province'];
		}

		if($_POST['municipality'] == 'null'){
			$municipalityErr = "Field Required";
		}
		else{
			$municipality = $_POST['municipality'];
		}

		if($_POST['barangay'] == 'null'){
			$barangayErr = "Field Required";
		}
		else{
			$barangay = $_POST['barangay'];
		}

		if(empty($_POST['street'])){
			$streetErr = "Field Required";
		}
		else{
			$street = $_POST['street'];
		}

		if($contact_number && $province && $municipality && $barangay && $street && $order_numbers){
			$shipping = "";

			//echo $user_id;

			if($municipality == "045624" OR $municipality == "045645" OR $municipality == "045648" OR $municipality == "045608"){
				$shipping = 0;
			}
			else{
				$shipping = 350;
			}

			if(!empty($_SESSION['shopping_cart'])){
				$total = 0;

				foreach($_SESSION['shopping_cart'] as $key => $values){
					$product_name = $values['product_name'];
					$product_quantity = $values['product_quantity'];
					$product_price = $values['product_price'];

					$place_order = mysqli_query($connect, "INSERT INTO orders (order_numbers, user_id, products, quantity, price, province, municipality, barangay, street, status) VALUES ('$order_numbers', '$user_id', '$product_name', '$product_quantity', '$product_price', '$province', '$municipality', '$barangay', '$street', '0')");

					if($place_order){
						unset($_SESSION['shopping_cart']);
						echo "<script>window.location.href='order_status.php?order_number=$order_numbers';</script>";
					}
				}

			}


		}
	}
?>