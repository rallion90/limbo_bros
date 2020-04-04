<?php
include('../../connection.php');

	$id = $_GET['id'];

	$update = mysqli_query($connect, 'UPDATE orders SET tag_deleted="2" WHERE order_id="'.$_GET['id'].'"');

	

	//echo "<script>window.location.href='../index.php';</script>";

	if($update){
		echo "Walang error";
	}
	else{
		echo "May error";
	}
?>