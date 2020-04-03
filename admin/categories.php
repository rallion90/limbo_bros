<?php include("header.php");?>
<?php include("function/add_categories.php");?>
<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Categories</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Category
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post">
                                                <span class="error"><?php echo $categoryErr;?></span> 
                                                <div class="form-group">
                                                    <label>Category:</label>
                                                    <input type="text" name="category" class="form-control">                                  
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
                                    Category List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            while($row = mysqli_fetch_assoc($get_category)){
                                        ?>        
                                                <tr>
                                                    <td><?php echo $row['category_id'];?></td>
                                                    <td><?php echo $row['category_name'];?></td>                            
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
<?php include("footer.php");?>