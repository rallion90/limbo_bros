<?php include("header.php");?>
<?php include("function/update_totals.php");?>


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
						<a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
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
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Track Oder
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Refunds
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ CozaStore
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-03.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-04.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-05.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-06.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-07.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-08.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="../template/user_template/images/gallery-09.jpg" data-lightbox="gallery" 
							style="background-image: url('../template/user_template/images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About Us
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis. 
					</p>
				</div>
			</div>
		</div>
	</aside>
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
					while($row = mysqli_fetch_assoc($get_mycart)){	
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
					}
				}
				else{	
			?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								awdawd
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
						Total: .00
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


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1"></th>
									<th class="column-2">Product Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
						<?php
							if(isset($_SESSION['user_id'])){
								if(!empty($_SESSION['shopping_cart'])){
									$total = 0;
									foreach($_SESSION['shopping_cart'] as $keys => $values){
						?>	

										<tr class="table_row">		
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="../template/admin_template/product_image/<?php echo $values['image'];?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?php echo $values['product_name'];?></td>
											<td class="column-3">₱ <?php echo $values['product_price'];?></td>
											<td class="column-4">
												
													
													<input class="mtext-104 cl3 txt-center num-product" type="text" name="quantity" value="<?php echo $values['product_quantity'];?>" readonly>

													
												
											</td>
											<td class="column-5"><?php echo $values['product_quantity'] * $values['product_price'];?></td>		
										</tr>

						<?php
										$total = $total + ($values['product_quantity'] * $values['product_price']);	
									}
								}	
							}else{	
						?>		
								<tr class="table_row">		
									<td class="column-1">
										
									</td>
									<td class="column-2"></td>
									<td class="column-3"></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"></td>		
								</tr>
						<?php
							}
						?>		
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							

							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50" id="cart-toral">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								
								
								<div class="p-t-15">

									<span class="stext-112 cl8">
										<p style='color:red'>*SHIPPING FEE IS 350 OUTSIDE DISTRICT 1 QUEZON PROVINCE</p>
									</span>
									<br><span class="error"><?php echo $contact_numberErr;?></span>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="contact_number" placeholder="Contact Number">
									</div>
									<span class="error"><?php echo $provinceErr;?></span>
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="province" id="province">
											<option value="null">Select Province</option>
									<?php
										while($row = mysqli_fetch_assoc($get_province)){		
									?>
											<option value="<?php echo $row['provCode']?>"><?php echo $row['provDesc'];?></option>
									<?php
										}	
									?>
											
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									
									<span class="error"><?php echo $municipalityErr;?></span>
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="municipality" id="municipality">
											<option value="null">Select Municipality</option>
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									
									<span class="error"><?php echo $barangayErr;?></span>
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="barangay" id="barangay">
											<option value="null">Select Barangay</option>
											
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									<span class="error"><?php echo $streetErr;?></span>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street" placeholder="Street/Building No.">
									</div>

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33 text-center">
							<div class="size-208">
								<span class="mtext-101 cl2" id="total">
									<span class="error"></span>
									Total: <br>₱ <?php echo number_format($total);?>.00
									
								</span>
							</div>
						</div>
						
						<div class="container">
							<div class="col-md-6">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="checkout">
									Pay With Paypal
								</button>
								<br>	
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="checkout">
									Proceed to Checkout
								</button>
							</div>
							
								
						</div>	
					</div>
				</div>
			</div>
		</div>
	</form>
<?php include("footer.php");?>	