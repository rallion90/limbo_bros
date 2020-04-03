<?php include('header.php');?>
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
<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
							LIMBO BROs' Motorcycle Parts, Accessories & Services launched 2000 is a family driven business and once was a small retail store for upcoming motorists going in & out of the town of Sariaya, Quezon.
							Provides wide range of accessories, products & services for motorcycle enthusiasts. The company, as the new comers of the eCommerce chain we aim to satify the needs & wants of the community, connects
							people through a technological standpoint.
						</p>

						
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?ixlib=rb-1.2.1&w=1000&q=80" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							We want to get people on bikes and keep them there. We strive to foster bicycling in Philippines as a viable means of transportation, and as a means to address wealth and health disparities that exist in our communities. We seek to empower individuals to take control of their transportation, health, and sense of community.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								We want to see multiple Bikes Together centers throughout the city of Philippines. Each center will have its own unique focus but primarily will serve as an active hub for bicycle education, access to bike maintenance, and access to bicycles through our free/earned bike programs and retail sales. We seek to engage each community we are active in, to sustain the location, and help fulfill our mission.
							</p>

							<span class="stext-111 cl8">
								- Valentino Rossi
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="https://images.unsplash.com/photo-1558981000-f294a6ed32b2?ixlib=rb-1.2.1&w=1000&q=80" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
<?php include('footer.php');?>