<?php include('header.php');?>
<?php
if(isset($_SESSION['user_id'])){

	$review = $name = $email = "";
	$reviewErr = $nameErr = $emailErr = "";

	if(isset($_GET['product_id'])){
		$product_id = $_GET['product_id'];
		$get_product_detail = mysqli_query($connect, "SELECT * FROM product WHERE product_id='$product_id'");
		$get_comment = mysqli_query($connect, "SELECT * FROM comment WHERE product_id='$product_id' AND status='1'");


		$fetch_product_detail = mysqli_fetch_assoc($get_product_detail);
		$image = $fetch_product_detail['product_image'];
		$product_name = $fetch_product_detail['product_name'];
		$product_price = $fetch_product_detail['product_price'];
		$product_description = $fetch_product_detail['product_description'];
	}
	else{
		echo "<script>window.location.href='index.php'</script>";
	}

	if(isset($_POST['submit'])){
		if(empty($_POST['review'])){
			$reviewErr = "Field Required";
		}
		else{
			$review = $_POST['review'];
		}

		if(empty($_POST['name'])){
			$nameErr = "Field Required";
		}
		else{
			$name = $_POST['name'];
		}

		if(empty($_POST['email'])){
			$emailErr = "Field Required";
		}
		else{
			$email = $_POST['email'];
		}

		if($review && $name && $email){
			$insert_comment = mysqli_query($connect, "INSERT INTO comment (product_id, name, email, review, status) VALUES ('$product_id', '$name', '$email', '$review', '0')");

			if(insert_comment){
				echo "<script>window.location.href='product_detail.php?comment=added'</script>";
			}
		}
	}
}else{
	echo "<script>window.location.href='login/login.php?error=logged_in'</script>";
}	
?>
<!-- Sidebar -->
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
<?php
	if(isset($_SESSION['user_id'])){
		if(!empty($_SESSION['shopping_cart'])){
			$total = 0;

			foreach($_SESSION['shopping_cart'] as $keys => $values){
				
?>					
				<ul class="header-cart-wrapitem w-full">		
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="../template/admin_template/product_image/<?php echo $values['image'];?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									<?php echo $values['product_name'];?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $values['product_quantity'];?> x ₱ <?php echo $values['product_price'];?> 
							</span>

							<span class="header-cart-item-info">
								
							</span>
						</div>
							</li>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									
							</a>

							<span class="header-cart-item-info">
									
							</span>
						</div>
					</li>				
				</ul>
<?php
				$total = $total + ($values['product_quantity'] * $values['product_price']);
			}
?>
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">			
					Total: ₱ <?php echo number_format($total);?>.00	
				</div>

			<div class="header-cart-buttons flex-w w-full">
				<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
					View Cart/Check Out
				</a>	
			</div>
		</div>
<?php			
		}
	}else{
?>
				<ul class="header-cart-wrapitem w-full">		
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="../template/admin_template/product_image/" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
										
							</a>

							<span class="header-cart-item-info">
								
							</span>
						</div>
							</li>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									
							</a>

							<span class="header-cart-item-info">
									
							</span>
						</div>
					</li>				
				</ul>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">		
						
						Total: 0	
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart/Check Out
						</a>	
					</div>
				</div>
<?php
	}
?>			

				
					
				<!--<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">		
						
						Total: 0	
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart/Check Out
						</a>	
					</div>
				</div>-->
			</div>

		</div>
	</div>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">	
		<div class="row">
		<form action="function/add_cart.php?action=add&product_id=<?php echo $_GET['product_id'];?>" method="post">	
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
						<div class="slick3 gallery-lb">
							
							<div class="item-slick3">
								<div class="wrap-pic-w pos-relative">
									<img src="../template/admin_template/product_image/<?php echo $image;?>" alt="IMG-PRODUCT">
									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../template/admin_template/product_image/<?php echo $image;?>">
										<i class="fa fa-expand"></i>
									</a>
									<input type="hidden" name="image" value="<?php echo $image;?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
					<?php echo $product_name;?>
					<input type="hidden" name="product_name" value="<?php echo $product_name;?>">
					</h4>
					<span class="mtext-106 cl2">
						<?php echo $product_price;?>
						<input type="hidden" name="product_price" value="<?php echo $product_price;?>">
					</span>
					<p class="stext-102 cl3 p-t-23">
						<?php echo $product_description;?>
						<input type="hidden" name="product_description" value="<?php echo $product_description;?>">
					</p>
					
					<!--  -->
					<div class="p-t-33">
						
						
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-204 flex-w flex-m respon6-next">
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>
									<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">
									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>
								<input type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
								
							</div>
						</div>
					</div>
					<!--  -->
					<div class="flex-w flex-m p-l-100 p-t-40 respon7">
						<div class="flex-m bor9 p-r-10 m-r-11">
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
								<i class="zmdi zmdi-favorite"></i>
							</a>
						</div>
						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
							<i class="fa fa-google-plus"></i>
						</a>
					</div>
				</div>
			</div>
		</form>	
		</div>
		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
					</li>
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
					</li>
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<!-- - -->
					<div class="tab-pane fade show active" id="description" role="tabpanel">
						<div class="how-pos2 p-lr-15-md">
							<p class="stext-102 cl6">
								Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
							</p>
						</div>
					</div>
					<!-- - -->
					<div class="tab-pane fade" id="information" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<ul class="p-lr-28 p-lr-15-sm">
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Weight
										</span>
										<span class="stext-102 cl6 size-206">
											0.79 kg
										</span>
									</li>
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Dimensions
										</span>
										<span class="stext-102 cl6 size-206">
											110 x 33 x 100 cm
										</span>
									</li>
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Materials
										</span>
										<span class="stext-102 cl6 size-206">
											60% cotton
										</span>
									</li>
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Color
										</span>
										<span class="stext-102 cl6 size-206">
											Black, Blue, Grey, Green, Red, White
										</span>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- - -->
					<div class="tab-pane fade" id="reviews" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<div class="p-b-30 m-lr-15-sm">
									<!-- Review -->
									
									<div class="flex-w flex-t p-b-68">
										<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
											
										</div>
										<div class="size-207">
									<?php 
										while($row = mysqli_fetch_assoc($get_comment)){
									?>		
											<div class="flex-w flex-sb-m p-b-17">
												<span class="mtext-107 cl2 p-r-20">
													<?php echo $row['name'];?>
												</span>
												<span class="fs-18 cl11">
													<i class="zmdi zmdi-star"></i>
													<i class="zmdi zmdi-star"></i>
													<i class="zmdi zmdi-star"></i>
													<i class="zmdi zmdi-star"></i>
													<i class="zmdi zmdi-star-half"></i>
												</span>
											</div>
											<p class="stext-102 cl6">
												<?php echo $row['review'];?>
											</p>
									<?php
										}
									?>		
										</div>
									</div>
									
									<!-- Add review -->
									<form class="w-full" method="post">
										<h5 class="mtext-108 cl2 p-b-7">
										Add a review
										</h5>
										<p class="stext-102 cl6">
											Your email address will not be published. Required fields are marked *
										</p>
										<div class="flex-w flex-m p-t-50 p-b-23">
											<span class="stext-102 cl3 m-r-16">
												Your Rating
											</span>
											<span class="wrap-rating fs-18 cl11 pointer">
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<input class="dis-none" type="number" name="rating">
											</span>
										</div>
										<div class="row p-b-25">
											<div class="col-12 p-b-5">
												<label class="stext-102 cl3" for="review">Your review</label>
												<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
											</div>
											<div class="col-sm-6 p-b-5">
												<label class="stext-102 cl3" for="name">Name</label>
												<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name" value="<?php echo $get_name;?>">
											</div>
											<div class="col-sm-6 p-b-5">
												<label class="stext-102 cl3" for="email">Email</label>
												<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email" value="<?php echo $get_email;?>">
											</div>
										</div>
										<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="submit">
										Submit
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		<span class="stext-107 cl6 p-lr-25">
			SKU: JAK-01
		</span>
		<span class="stext-107 cl6 p-lr-25">
			Categories: Jacket, Men
		</span>
	</div>
</section>
<?php include('footer.php');?>