<?php
include('../../connection.php');
	if(isset($_GET['comment_id'])){
		$comment_id = $_GET['comment_id'];
		$approved_comment = mysqli_query($connect,"UPDATE comment SET status='1' WHERE comment_id='$comment_id'");

		if($approved_comment){
			echo "<script>window.location.href='../comments.php?comment=approved';</script>";
		}
	}
?>