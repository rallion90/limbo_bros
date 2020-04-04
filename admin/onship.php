<?php include("header.php");?>
<?php
	$get_ship = mysqli_query($connect, "SELECT * FROM orders WHERE tag_deleted='1'");
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
					
					<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
						<thead>
							<tr>
								<th width="8%">Name</th>
								<th width="10%">Product</th>
								<th width="10%">Quantity</th>
								<th width="10%">Price</th>
								<th width="10%">Province</th>
								<th width="10%">Municipality</th>
								<th width="10%">Barangay</th>
								<th width="10%">Total</th>
								<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row1 = mysqli_fetch_assoc($get_ship)){
						?>
								<tr>
									<td style="vertical-align: middle;"><?php echo $row1['user_id']; ?></td>
									<td style="vertical-align: middle;"><?php echo $row1['products']; ?></td>
									<td style="vertical-align: middle;"><?php echo $row1['quantity']; ?></td>
									<td style="vertical-align: middle;"><?php echo $row1['price']; ?></td>
									<td style="vertical-align: middle;"></td>
									<td style="vertical-align: middle;"></td>
									<td style="vertical-align: middle;"></td>
									<td style="vertical-align: middle;"></td>
									<td style="vertical-align: middle;"><a href="function/delivered.php?id=<?php echo $row1['order_id'];?>" class="btn btn-default">Delivered</a></td>
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