<?php include("header.php");?>
<?php include("function/register_product.php");?>
<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Product</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Register Product
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>File input</label>
                                                    <input type="file" name="product_image">
                                                </div>
                                                <span class="error"><?php echo $item_nameErr;?></span>
                                                <div class="form-group">
                                                    <label>Item Name:</label>
                                                    <input type="text" class="form-control" name="item_name" placeholder="Enter Item Name">
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
                                                <span class="error"><?php echo $stockErr;?></span>
                                                <div class="form-group">
                                                    <label>Stock:</label>
                                                    <input type="text" class="form-control" name="stock" placeholder="Enter Number of Stocks">
                                                </div>
                                                <span class="error"><?php $priceErr;?></span>
                                                <div class="form-group">

                                                    <label>Price:</label>
                                                    <input type="text" class="form-control" name="price" placeholder="Enter Price">
                                                </div>
                                                <span class="error"><?php echo $lengthErr;?></span>
                                                <div class="form-group">
                                                    <label>Length: (cm)</label>
                                                    <input type="text" class="form-control" name="length" placeholder="Enter Length">
                                                </div>
                                                <span class="error"><?php echo $widthErr;?></span>
                                                <div class="form-group">
                                                    <label>Width: (cm)</label>
                                                    <input type="text" class="form-control" name="width" placeholder="Enter Width">
                                                </div>
                                                <span class="error"><?php echo $weightErr;?></span>
                                                <div class="form-group">
                                                    <label>Weight: (kg)</label>
                                                    <input type="text" class="form-control" name="weight" placeholder="Enter Weight">
                                                </div>
                                                <span class="error"><?php echo $editorErr;?></span>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea class="form-control" id="editor" name="editor" rows="3" placeholder="Enter Description"></textarea>
                                                </div>     
                                        
                                                <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
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