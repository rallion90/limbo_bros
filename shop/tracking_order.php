<?php include('header.php');?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../template/user_template/css/order.css">
<!------ Include the above in your HEAD tag ---------->
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
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
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

<div class="row shop-tracking-status">
    
    <div class="col-md-12">
        <div class="well">
    
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputOrderTrackingID" class="col-sm-2 control-label">Order id</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="track" id="track"  placeholder="Please Insert your Order Tracking Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"  id="track_trigger" class="btn btn-success">Get status</button>
                        </div>
                    </div>
                </div>

            <div class="container" id="status">
                
            </div>    
        </div>
    </div>

</div>
<?php include('footer.php');?>