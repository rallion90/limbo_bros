<?php include("header.php");?>
<?php include("function/add_stock.php");?>
<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Stocks</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Stock
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post">
                                                <span class="error"></span> 
                                                <div class="form-group">
                                                    <label>Stock:</label>
                                                    <input type="text" name="stock" class="form-control">                                  
                                                </div>
                                                
                                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->


                            </div>
                            <!-- /.panel -->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Product Information
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 
                                            <tbody>
                                        <?php
                                        	$product_id = $_GET['id'];
                                        	$get_product_id = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '$product_id'");
                                            while($row = mysqli_fetch_assoc($get_product_id)){
                                        ?>        
                                                <tr>
                                                	<td><b>Product ID</b></td>
                                                	<td><?php echo $row['product_id'];?></td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Name</b></td>
                                                	<td><?php echo $row['product_name'];?></td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Price</b></td>
                                                	<td>₱ <?php echo $row['product_price'];?></td>
                                                </tr>
                                                <tr>
                                                	<td><b>Product Category</b></td>
                                                	<td><?php echo $row['product_category'];?></td>
                                                </tr> 
                                                <tr>
                                                	<td><b>Product Stock</b></td>
                                                	<td><?php echo $row['product_stock'];?></td>
                                                </tr>                 
                                                
                                        <?php
                                            }
                                        ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->


                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
<?php include("footer.php")?>