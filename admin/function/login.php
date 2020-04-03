<?php
session_start();
include("../connection.php");
	$email = $password = "";
	$emailErr = $passwordErr = "";

	if(isset($_POST['login'])){
		if(empty($_POST['email'])){
			$emailErr = "Field Required";
		}
		else{
			$email = $_POST['email'];
		}

		if(empty($_POST['password'])){
			$passwordErr = "Field Required";
		}
		else{
			$password = $_POST['password'];
		}

		if($email && $password){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "Invalid Email Address";
			}
			else{
				$get_login = mysqli_query($connect, "SELECT * FROM admin_account WHERE admin_email = '$email'");
				$get_row = mysqli_num_rows($get_login);
				
				if($get_row > 0){
					$get_fetch = mysqli_fetch_assoc($get_login);
					$get_password = $get_fetch['admin_password'];
					$get_admin_id = $get_fetch['admin_id'];

					if($get_password != $password){
						$passwordErr = "Invalid Password";
					}
					else{
						$_SESSION['admin_id'] = $get_admin_id;
				        header("Location: index.php?admin=logged_in");
				        exit();
					}
				}
				else{
					$emailErr = "Email Not Found";
				}
			}
		}
	}
?>