<?php
	include("../../connection.php");

	if(!empty($_POST['provinceId'])){
		$provinceId = $_POST['provinceId'];
		$get_municipality = mysqli_query($connect, "SELECT * FROM refcitymun WHERE provCode='$provinceId'");
		$municipal_rows = mysqli_num_rows($get_municipality);

		if($municipal_rows > 0){
			echo '<option value="">Select Municipality</option>';
			while($row = mysqli_fetch_assoc($get_municipality)){
				
				if(isset($_POST['municipality']) && $row['citymunCode'] == $row['municipality']){
					echo '<option selected value="'.$row['citymunCode'].'">'.$row['citymunDesc'].'</option>';
				}
				else{
					echo '<option value="'.$row['citymunCode'].'">'.$row['citymunDesc'].'</option>';
				}	

			}
		}
		else{
			echo '<option value="">Municipality not Available</option>';
		}
	}
	elseif(!empty($_POST['municipalId'])){
		$municipalId = $_POST['municipalId'];
		$get_barangay = mysqli_query($connect, "SELECT * FROM refbrgy WHERE citymunCode='$municipalId'");
		$barangay_rows = mysqli_num_rows($get_barangay);

		if($barangay_rows > 0){
			echo "<option value=''>Select Barangay</option>";
			while($row1 = mysqli_fetch_assoc($get_barangay)){
				$get_barangay_id = $row1['brgyCode'];
				$get_barangay_name = $row1['brgyDesc'];
				echo '<option value="'.$get_barangay_id.'">'.$get_barangay_name.'</option>';
			}
		}
		else{
			echo '<option value="">Barangay not Available</option>';
		}
	}
?>