<?php include("header.php");?>
<?php
	$od_number = "";
	$od_numberErr = "";

	if(isset($_POST['od_number'])){
		if(empty($_POST['od_number'])){
			$od_numberErr = "Field Required";
		}
		else{
			$od_number = $_POST['od_number'];
		}

		if($od_number){
			$check_od_number = mysqli_query($connect, "SELECT * FROM orders WHERE order_numbers='$od_number' AND tag_deleted='0'");
			if($check_od_number){
				while($row = mysqli_fetch_assoc($check_od_number)){
					$update_status = mysqli_query($connect, "UPDATE orders SET tag_deleted='1' WHERE order_numbers='$od_number'");
				}

				echo "<script>window.location.href='orders.php';</script>";
			}
			else{
				$od_numberErr = "Wrong Order Number";
			}
		}
	}
?>


<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Products</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fa fa-inbox fa-fw"></span> Product List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="float-left">
						<form method="post">
							<span class="error"><?php echo $od_numberErr;?></span>
							<label for="">Enter Order Number to be Accepted: </label>
							<input type="text" name="od_number" class="form-horizontal">
							<button class="btn btn-primary">Accept</button>
						</form>
					</div>
					<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
						<thead>
							<tr>
								<th width="8%">Product Name</th>
								<th width="10%">Product Quantity</th>
								<th width="10%">Order Number</th>
								<th width="10%">User Id</th>
								<th width="10%">Province</th>
								<th width="10%">Municipality</th>
								<th width="10%">Barangay</th>
								<th width="10%">Street</th>
								
							</tr>
						</thead>
						<tbody>
					<?php 
						while($row = mysqli_fetch_assoc($get_pending_order)){
							$get_product_name = $row['products'];
							$get_product_quantity = $row['quantity'];
							$get_order_number = $row['order_numbers'];
							$get_user_id = $row['user_id'];
							$get_province = $row['province'];
							$get_municipality = $row['municipality'];
							$get_barangay = $row['barangay'];
							$get_street = $row['street'];

							$get_province1 = mysqli_query($connect, "SELECT * FROM refprovince WHERE provCode='$get_province'");
							$get_municipality1 = mysqli_query($connect, "SELECT * FROM refcitymun WHERE citymunCode='$get_municipality'");
							$get_barangay1 = mysqli_query($connect, "SELECT * FROM refbrgy WHERE brgyCode='$get_barangay'");

							$fetch_province = mysqli_fetch_assoc($get_province1);
							$fetch_municipality = mysqli_fetch_assoc($get_municipality1);
							$fetch_barangay = mysqli_fetch_assoc($get_barangay1);

							$get_province_name = $fetch_province['provDesc'];
							$get_municipality_name = $fetch_municipality['citymunDesc'];
							$get_barangay_name = $fetch_barangay['brgyDesc'];
							/*$limit_text = 100;
							$description = $row['product_description'];
							$limited = substr($description, 0, $limit_text);*/
					?>		
							<tr>
								<td style="vertical-align: middle;"><?php echo $get_product_name;?></td>
								<td style="vertical-align: middle;"><?php echo $get_product_quantity;?></td>
								<td style="vertical-align: middle;"><?php echo $get_order_number;?></td>
								<td style="vertical-align: middle;"><?php echo $get_user_id;?></td>
								<td style="vertical-align: middle;"><?php echo $get_province_name;?></td>
								<td style="vertical-align: middle;"><?php echo $get_municipality_name;?></td>
								<td style="vertical-align: middle;"><?php echo $get_barangay_name;?></td>
								<td style="vertical-align: middle;"><?php echo $get_street;?></td>
								
							</tr>
					<?php
						}
					?>									
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
<?php include("footer.php");?>