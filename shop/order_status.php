<?php include("header.php");?>


<aside class="wrap-sidebar js-sidebar">
	<div class="s-full js-hide-sidebar"></div>
	<div class="sidebar flex-col-l p-t-22 p-b-25">
		<div class="flex-r w-full p-b-30 p-r-27">
			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
			<ul class="sidebar-link w-full">
				<li class="p-b-13">
					<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
						Home
					</a>
				</li>
				
				<?php
					if(!isset($_SESSION['user_id'])){
				?>
				<li class="p-b-13">
					<a href="login/login.php" class="stext-102 cl2 hov-cl1 trans-04">
						Login
					</a>
				</li>
				<?php
					}
					else{
				?>
				<li class="p-b-13">
					<a href="login/logout.php" class="stext-102 cl2 hov-cl1 trans-04">
						Logout
					</a>
				</li>
				<?php
					}
				?>
				<li class="p-b-13">
					<a href="tracking_order.php" class="stext-102 cl2 hov-cl1 trans-04">
						Track Oder
					</a>
				</li>
				
			</ul>
			
			<div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        Recycled Riding Dreams will offer quality used motorcycles and motorcycle parts to a growing market of motorcycling hobbyists.  For the beginner, Recycled Riding Dreams offers excellent value in a first bike that will not bust the customer's budget.  For the experienced biker, quality used parts will cut the cost of repairs and modifications by 50% to 75%.
                    </p>
            </div>
		</div>
	</div>
</aside>
<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>
	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Your Cart
			</span>
			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				<?php
					if(isset($_SESSION['user_id'])){
						
				?>
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="../template/admin_template/product_image/<?php echo $row['product_image'];?>" alt="IMG">
					</div>
					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							<?php echo $row['product_name'];?>
						</a>
						<span class="header-cart-item-info">
							<?php echo $row['product_quantity'];?> x <?php echo $row['product_price'];?>
						</span>
					</div>
				</li>
				<?php
						}else{
				?>
				<li class="header-cart-item flex-w flex-t m-b-12">
					
					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							
						</a>
						<span class="header-cart-item-info">
							
						</span>
					</div>
				</li>
				<?php
					}
				?>
			</ul>
			
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					
					Total:
					
					Total: 0
					
				</div>
				<div class="header-cart-buttons flex-w w-full">
					<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						View Cart/Check Out
					</a>
					
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="container" style="background-color: white">
<?php
if(isset($_SESSION['user_id'])){
	if(!empty($_GET['order_number'])){
		$order_numbers = $_GET['order_number'];
		$get_order = mysqli_query($connect, "SELECT * FROM orders WHERE order_numbers='$order_numbers'");
		$grand_total = 0;
		$shipping = 0;


?>	
		<div class="jumbotron text-center">
			<h3 style="color:green"><i class="fa fa-clock-o"></i> Thankyou for your Purchase!</h3>
			<br>
			<p>Your Order # is <b><?php echo $order_numbers;?></b></p>
			
		</div>
		
		<div class="jumbotron">
			<h2>Your order status:</h2>
			<br>
			
			<ul class="list-group">
				
				<li class="list-group-item">
					<span class="prefix"><b>Est. Date of Delivery</b></span>
					<span class="label label-success"></span>
				</li>
				<li class="list-group-item">
					<span class="prefix"><b>Order Status:</b></span>
					<span class="label label-success"></span>
				</li>
				<li class="list-group-item">
					<b>Order Details:</b>
					<table class="table table-borderless">
						<thead>
							<tr>
								
								<th scope="col">Product Name</th>
								<th scope="col">Product Quantity</th>
								<th scope="col">Product Price</th>
							</tr>
						</thead>
						<tbody class="text-center">
					<?php
						while($row = mysqli_fetch_assoc($get_order)){
							$municipality = $row['municipality'];
							if($municipality == "045624" OR $municipality == "045645" OR $municipality == "045648" OR $municipality == "045608"){
								$shipping = 0;
							}
							else{
								$shipping = 350;
							}
					?>
							<tr>
								
								<td><?php echo $row['products'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php echo $row['price'];?></td>
							</tr>
					<?php
							$grand_total = $grand_total + ($row['quantity'] * $row['price']);	
						}
					?>		
						</tbody>
					</table>
				</li>
				<li class="list-group-item"><b>Shipping Fee:</b> <?php echo $shipping;?> </li>
				<li class="list-group-item"><b>Total Amount:</b> ₱ <?php echo number_format($grand_total + $shipping);?>.00&nbsp; <span style="color:Red">*Please Pay Exact Amount</span></li>
			</ul>
		</div>
<?php
	}
}else{	
	echo "<script>window.location.href='index.php?error=not_allowed';</script>";
}	
?>	
</div>
<?php include("footer.php");?>