<?php include("header.php");?>
<?php include("function/edit_product.php");?>
<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Product</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Product
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>File input</label>
                                                    <input type="file" name="product_image">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Item Name:</label>
                                                    <input type="text" class="form-control" name="item_name" value="<?php echo $get_raw_data['product_name'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Category:</label>
                                                    <select class="form-control" name="category">
                                                <?php
                                                    while($row = mysqli_fetch_assoc($get_category)){
                                                ?>        
                                                        <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
                                                <?php
                                                    }
                                                ?>        
                                                    </select>
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Stock:</label>
                                                    <input type="text" class="form-control" name="stock" value="<?php echo $get_raw_data['product_stock'];?>">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">

                                                    <label>Price:</label>
                                                    <input type="text" class="form-control" name="price" value="<?php echo $get_raw_data['product_price'];?>">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Length: (cm)</label>
                                                    <input type="text" class="form-control" name="length" value="<?php echo $get_raw_data['product_length'];?>">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Width: (cm)</label>
                                                    <input type="text" class="form-control" name="width" value="<?php echo $get_raw_data['product_width'];?>">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Weight: (kg)</label>
                                                    <input type="text" class="form-control" name="weight" value="<?php echo $get_raw_data['product_weight'];?>">
                                                </div>
                                                <span class="error"></span>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea class="form-control" name="editor" id="editor" rows="3"><?php echo $get_raw_data['product_description'];?></textarea>
                                                </div>     
                                        
                                                <button type="submit" name="submit" class="btn btn-default">Edit Product</button>
                                                
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
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php include("footer.php");?>