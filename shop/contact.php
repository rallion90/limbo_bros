<?php include('header.php');?>
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
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Pan-Philippine Hwy, Sariaya, Quezon Philippines Near Petron
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Call us
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+639302874528
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								limbo.bros@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="container-fluid">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d762.8191732002235!2d121.49665877293671!3d13.94518247967681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd492425e84cad%3A0x7420070c872a78ce!2sPETRON%20GAS%20STATION!5e0!3m2!1sen!2sph!4v1575781147812!5m2!1sen!2sph" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
<?php include('footer.php');?>