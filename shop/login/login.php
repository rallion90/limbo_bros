<?php
session_start();
    include('../../connection.php');

    $email = "";
    $password = "";

    $required = "";
    $emailErr = "";
    $passwordErr = "";
    $cartErr = "";
    $message = "";

    if(isset($_GET['register']) == 'succesfully'){
        $message = "
            <div class='alert alert-success text-center alert-dismissable ' role='alert'>
                Your account has succesfully Registered
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        ";
    }

    if(isset($_POST['login'])){
        if(empty($_POST['email']) && empty($_POST['password'])){
            echo "<script>window.location.href='login.php?required=error';</script>";
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        if($email && $password){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<script>window.location.href='login.php?email=error';</script>";
            }
            else{
                $get_database_data = mysqli_query($connect, "SELECT * FROM user_account WHERE email='$email'");
                $fetch_data = mysqli_fetch_assoc($get_database_data);
                $get_user_id = $fetch_data['user_id'];
                $get_user_password = $fetch_data['password'];

                if($get_user_password == $password){
                    $_SESSION['user_id'] = $get_user_id;
                    echo "<script>window.location.href='../index.php';</script>";
                }
                else{
                    echo "<script>window.location.href='login.php?password=error';</script>";
                }
            }
        }
    }

    if(isset($_GET['required']) == "error"){
        $required = "
        <div class='alert alert-danger center' role='alert'>
            Email or Password are Required
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    elseif(isset($_GET['email']) == "error"){
        $emailErr = "
        <div class='alert alert-danger center' role='alert'>
            Invalid Email Format
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    elseif(isset($_GET['password']) == "error"){
        $passwordErr = "
        <div class='alert alert-danger center' role='alert'>
            Invalid Email or Password
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    elseif(isset($_GET['cart']) == "error"){
        $cartErr = "
        <div class='alert alert-danger center' role='alert'>
            Please Log in First
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
    .login-form {
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .error{
        color:red;
    }
</style>
</head>
<body>
<div class="login-form">
    <form  method="post">
        <h2 class="text-center">Log in</h2>
        <span><?php echo $message;?></span>
        <span class="error"><?php echo $required;?></span>
        <span class="error"><?php echo $emailErr;?></span>
        <span class="error"><?php echo $passwordErr;?></span>
        <span class="error"><?php echo $cartErr;?></span>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
    <p class="text-center"><a href="../index.php">Go back to Shop</a></p>
</div>
</body>
</html>                                                                 