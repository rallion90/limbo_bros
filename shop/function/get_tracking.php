<?php
	include("../../connection.php");

	if(isset($_POST['id'])){
		$id = $_POST['id'];


		$get_tracking = mysqli_query($connect, "SELECT * FROM orders WHERE order_numbers='$id' AND tag_deleted='0' LIMIT 1");

		$get_all_data = mysqli_query($connect, "SELECT * FROM orders WHERE order_numbers='$id' AND tag_deleted='0'");
		

		$get_track_rows = mysqli_num_rows($get_tracking);
		
		if($get_track_rows > 0){
			$date = strtotime("+2 day");
			$date1 = date('m-d-y',$date);
			while($row = mysqli_fetch_assoc($get_tracking)){
				$status = "";
				$status1 = "";
				
				if($row['status'] == 0){
					$status = "c0";
					$status1 = "Under Review";
					
				}
				elseif($row['status'] == 1){
					$status = "c1";
					$status1 = "In Progress";
					
				}
				elseif($row['status'] == 2){
					$status = "c2";
					$status1 = "Shipped";
					
				}
				elseif($row['status'] == 3){
					$status = "c4";
					$status1 = "Delivered";
					
				}
?>
					<h4>Your order status:</h4>

	                <ul class="list-group">
	                    <li class="list-group-item">
	                        <span class="prefix">Estimate Delivery:</span>
	                        <span class="label label-success"><?php echo $date1;?></span>
	                    </li>
	                    <li class="list-group-item">
	                        <span class="prefix">Status:</span>
	                        <span class="label label-success"><?php echo $status1;?></span>
	                    </li>
	                    <li class="list-group-item">
	                        <span class="prefix">Whats Inside?</span>
	                        <div class="container">
		                  		<table class="table table-borderless">
								    <!--<thead>
								      <tr>
								        <th>Firstname</th>
								        <th>Lastname</th>
								        <th>Email</th>
								      </tr>
								    </thead>-->
								    <tbody>
								<?php
									foreach($get_all_data as $items){
								?>    	
								      <tr>
								        <td><b><?php echo $items['products'];?></b></td>
								        
								      </tr>
								<?php
									}
								?>      
								    </tbody>
								</table>
							</div>	
	                    </li>
	                    
	                </ul>

	                <div class="order-status">

		                <div class="order-status-timeline">
		                    <!-- class names: c0 c1 c2 c3 and c4 -->
		                    <div class="order-status-timeline-completion <?php echo $status;?>"></div>
		                </div>

		                <div class="image-order-status image-order-status-new <?php if($row['status'] == 1){ echo "active";} ?>  img-circle">
		                    <span class="status">Accepted</span>
		                    <div class="icon"></div>
		                </div>
		                <div class="image-order-status image-order-status-active <?php if($row['status'] == 1){ echo "active";} ?>  img-circle">
		                    <span class="status">In progress</span>
		                    <div class="icon"></div>
		                </div>
		                <div class="image-order-status image-order-status-intransit <?php if($row['status'] == 2){ echo "active";} ?>  img-circle">
		                    <span class="status">Shipped</span>
		                    <div class="icon"></div>
		                </div>
		                <div class="image-order-status image-order-status-delivered <?php if($row['status'] == 3){ echo "active";} ?>  img-circle">
		                    <span class="status">Delivered</span>
		                    <div class="icon"></div>
		                </div>
		                <div class="image-order-status image-order-status-completed <?php if($row['status'] == 3){ echo "active";} ?>  img-circle">
		                    <span class="status">Completed</span>
		                    <div class="icon"></div>
		                </div>

		            </div>

<?php
			}		
		}else{
?>	
			

	            <div class="jumbotron">
	            	<h4>Your order status:</h4>
	            	<div class="container text-center">
	            		<h5>Order Number not Found</h5>
	            	</div>
	            </div>	
<?php			
		}
	}
?>