<?php include("header.php");?>
<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Products</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12" style="padding-bottom: 10px;">
			<div style="background: #eee;padding: 10px;border:solid 1px #ddd;border-radius: 0.5em">
				
				<a class="btn btn-default" href="register_product.php">
					<i class="fa fa-plus"></i>
				Add Product</a>
			</div>
		</div>
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
								<th width="8%">&nbsp;</th>
								<th width="10%">Product Name</th>
								<th width="10%">Category</th>
								<th width="10%">Product Stock</th>
								<th width="10%">Product Price</th>
								<th width="10%">Product Description</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
						while($row = mysqli_fetch_assoc($get_product)){
							$limit_text = 100;
							$description = $row['product_description'];
							$limited = substr($description, 0, $limit_text);
					?>		
							<tr>
								<td style="vertical-align: middle;"><img src="../template/admin_template/product_image/<?php echo $row['product_image'];?>" width="100" alt="Product Image"></td>
								<td style="vertical-align: middle;"><center><?php echo $row['product_name'];?></center></td>
								<td style="vertical-align: middle;"><?php echo $row['product_category'];?></td>
								<td style="vertical-align: middle;"><?php echo $row['product_stock'];?></td>
								<td style="vertical-align: middle;">₱<?php echo number_format($row['product_price']);?></td>
								<td style="vertical-align: middle;"><?php echo $limited;?></td>
								<td style="vertical-align: middle;">
									<div class="btn-group">
									  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									    Action <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									    <li><a href="edit_product.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-edit fa-fw"></i>Edit</a></li>
									    <li><a href="stock_product.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-plus fa-fw"></i>Stock</a></li>
									    <li><a href="function/delete_product.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-trash fa-fw"></i>Delete</a></li>
									  </ul>
									</div>
								</td>
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

<!-- /#page-wrapper -->
<?php include("footer.php");?>