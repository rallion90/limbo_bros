<?php
session_start();
	include("../../connection.php");

	if(isset($_POST['product_id'])){
		$product_id = $_POST['product_id'];
		//$user_id = $_SESSION['user_id'];
		$output = "";
		$get_data = mysqli_query($connect, "SELECT * FROM product WHERE product_id='$product_id'");
		$output .= "
			<div class='row'>";

		while($row = mysqli_fetch_assoc($get_data)){

			$get_image = $row['product_image'];
			$get_name = $row['product_name'];
			$get_price = $row['product_price'];
			$get_description = $row['product_description'];

			if(isset($_SESSION['user_id'])){
				$output .= "
			<form method='post' action='function/add_cart.php?action=add&product_id=$product_id'>	
				<div class='bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent'>
					<button class='how-pos3 hov3 trans-04 js-hide-modal1' data-dismiss='modal'>
						<img src='../template/user_template/images/icons/icon-close.png' alt='CLOSE'>
					</button>

					<div class='row'>
					<div class='col-md-6 col-lg-7 p-b-30'>
						<div class='p-l-25 p-r-30 p-lr-0-lg'>
							<div class='wrap-slick3 flex-sb flex-w'>
								<div class='wrap-slick3-dots'></div>
									<div class='wrap-slick3-arrows flex-sb-m flex-w'></div>

									<div class='slick3 gallery-lb'>
										<div class='item-slick3' data-thumb='../template/admin_template/product_image/$get_image'>
											<div class='wrap-pic-w pos-relative'>
												<img src='../template/admin_template/product_image/$get_image' alt='IMG-PRODUCT'>

												<a class='flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04' href='../template/admin_template/product_image/$get_image'>
													<i class='fa fa-expand'></i>
													<input type='hidden' name='image' value='$get_image'>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class='col-md-6 col-lg-5 p-b-30'>
							<div class='p-r-50 p-t-5 p-lr-0-lg'>
								<h4 class='mtext-105 cl2 js-name-detail p-b-14'>
									$get_name
									<input type='hidden' name='product_name' value='$get_name'>
								</h4>

								<span class='mtext-106 cl2'>
									₱ $get_price
									<input type='hidden' name='product_price' value='$get_price'>
								</span>

								<p class='stext-102 cl3 p-t-23'>
									$get_description
									<input type='hidden' name='product_description' value='$get_description'>
								</p>
								
								<!--  -->
								<div class='p-t-33'>
									

									
								
									<div class='flex-w flex-r-m p-b-10'>
										<div class='size-204 flex-w flex-m respon6-next'>
										<div class='wrap-num-product flex-w m-r-20 m-tb-10'>
											<div class='btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>
												
											</div>

											<input class='mtext-104 cl3 txt-center num-product' type='text' name='quantity' value='1'>

											<div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
												
											</div>
										</div>
											

											

											<input type='submit' class='flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail' value='Add to Cart'>
										</div>
									</div>
									
								</div>


								<!--  -->
								<div class='flex-w flex-m p-l-100 p-t-40 respon7'>
									<div class='flex-m bor9 p-r-10 m-r-11'>
										<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100' data-tooltip='Add to Wishlist'>
											<i class='zmdi zmdi-favorite'></i>
										</a>
									</div>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Facebook'>
										<i class='fa fa-facebook'></i>
									</a>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Twitter'>
										<i class='fa fa-twitter'></i>
									</a>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Google Plus'>
										<i class='fa fa-google-plus'></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</form>	
				";
			}else{
				$output .= "
				<div class='bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent'>
					<button class='how-pos3 hov3 trans-04 js-hide-modal1' data-dismiss='modal'>
						<img src='../template/user_template/images/icons/icon-close.png' alt='CLOSE'>
					</button>

					<div class='row'>
					<div class='col-md-6 col-lg-7 p-b-30'>
						<div class='p-l-25 p-r-30 p-lr-0-lg'>
							<div class='wrap-slick3 flex-sb flex-w'>
								<div class='wrap-slick3-dots'></div>
									<div class='wrap-slick3-arrows flex-sb-m flex-w'></div>

									<div class='slick3 gallery-lb'>
										

										

										<div class='item-slick3' data-thumb='../template/admin_template/product_image/$get_image'>
											<div class='wrap-pic-w pos-relative'>
												<img src='../template/admin_template/product_image/$get_image' alt='IMG-PRODUCT'>

												<a class='flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04' href='../template/admin_template/product_image/$get_image'>
													<i class='fa fa-expand'></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class='col-md-6 col-lg-5 p-b-30'>
							<div class='p-r-50 p-t-5 p-lr-0-lg'>
								<h4 class='mtext-105 cl2 js-name-detail p-b-14'>
									$get_name
								</h4>

								<span class='mtext-106 cl2'>
									₱ $get_price
								</span>

								<p class='stext-102 cl3 p-t-23'>
									$get_description
								</p>
								
								<!--  -->
								<div class='p-t-33'>
									

									
								
									<div class='flex-w flex-r-m p-b-10'>
										<div class='size-204 flex-w flex-m respon6-next'>
											

											<a href='../shop/login/login.php?cart=error' class='flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail'>
												Add to cart
											</a>
										</div>
									</div>
									
								</div>


								<!--  -->
								<div class='flex-w flex-m p-l-100 p-t-40 respon7'>
									<div class='flex-m bor9 p-r-10 m-r-11'>
										<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100' data-tooltip='Add to Wishlist'>
											<i class='zmdi zmdi-favorite'></i>
										</a>
									</div>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Facebook'>
										<i class='fa fa-facebook'></i>
									</a>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Twitter'>
										<i class='fa fa-twitter'></i>
									</a>

									<a href='#'' class='fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100' data-tooltip='Google Plus'>
										<i class='fa fa-google-plus'></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>	

				";
			}	
		}

		$output .= "
			</div>";

		echo $output;

	}
?>