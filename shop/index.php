<?php include("header.php");?>

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



	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(http://mc-rag.com/wp-content/uploads/2015/07/beeline-highway.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									Motorcycle Parts 2019
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(https://b.kisscc0.com/20180607/vjw/kisscc0-motorcycle-helmets-car-motorcycle-accessories-vehi-nature-5b18bbb84b70f0.247743331528347576309.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 cl2 respon2" style="color:white">
									Some Parts on-Sale
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1" style="color:white">
									Breaks and Suspension/Lighting and Indicators/Exhaust System
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0">
		<div class="flex-w flex-c-m">
			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="http://pluspng.com/img-png/png-tire-truck-tires-png-tires-in-the-country-image-463-1009.png" alt="IMG-BANNER">

					<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Wheel, Tires and Tubes
							</span>

							<span class="block1-info stext-102 trans-04">
								Christmas Season
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="https://i.pinimg.com/736x/df/44/c4/df44c463c38a7cad9b18bafd74bd9f49.jpg" alt="IMG-BANNER">

					<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Accessories
							</span>

							<span class="block1-info stext-102 trans-04">
								Christmas Season
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="https://5.imimg.com/data5/IU/BS/MY-989864/yamaha-bike-500x500.png" alt="IMG-BANNER">

					<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Body and Frame
							</span>

							<span class="block1-info stext-102 trans-04">
								New Parts
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Store Overview
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					

					<li class="nav-item p-b-10 active">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a>
					</li>

					<!--<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>-->

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
					

					<!-- - -->
					<div class="tab-pane fade show active" id="featured" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">	
							<div class="slick2">
							<?php
								while($row = mysqli_fetch_assoc($get_featured)){
							?>		
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/admin_template/product_image/<?php echo $row['product_image'];?>" alt="IMG-PRODUCT">

											<a href="#" id="<?php echo $row['product_id'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 view_data">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product_detail.php?product_id=<?php echo $row['product_id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $row['product_name'];?>
												</a>

												<span class="stext-105 cl3">
													₱ <?php echo number_format($row['product_price']).".00";?>
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php
								}
							?>	

								
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-02.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Herschel supply
												</a>

												<span class="stext-105 cl3">
													$35.31
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-04.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Classic Trench Coat
												</a>

												<span class="stext-105 cl3">
													$75.00
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-06.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Vintage Inspired Classic 
												</a>

												<span class="stext-105 cl3">
													$93.20
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-09.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Converse All Star Hi Plimsolls
												</a>

												<span class="stext-105 cl3">
													$75.00
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-11.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Herschel supply 
												</a>

												<span class="stext-105 cl3">
													$63.16
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-13.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													T-Shirt with Sleeve
												</a>

												<span class="stext-105 cl3">
													$18.49
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/user_template/images/product-15.jpg" alt="IMG-PRODUCT">

											<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													Mini Silver Mesh Watch
												</a>

												<span class="stext-105 cl3">
													$86.85
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="top-rate" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
							<?php
								while($row = mysqli_fetch_assoc($get_top_rated)){
							?>
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">		
									<!-- Block2 -->
									
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../template/admin_template/product_image/<?php echo $row['product_image'];?>" alt="IMG-PRODUCT">

											<a href="#" id="<?php echo $row['product_id'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 view_data">
												Quick View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product_detail.php?product_id=<?php echo $row['product_id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $row['product_name'];?>
												</a>

												<span class="stext-105 cl3">
													₱ <?php echo number_format($row['product_price']).".00";?>
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="../template/user_template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../template/user_template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>		
								</div>
							<?php
								}
							?>	
								

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	
<?php include("footer.php");?>	