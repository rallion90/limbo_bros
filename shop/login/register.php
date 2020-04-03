<?php
include('../../connection.php');
    $fullname = $email = $password = $retype_password = "";
    $fullnameErr = $emailErr = $passwordErr = $retype_passwordErr = "";

    if(isset($_POST['submit'])){
        
        

        if(empty($_POST['fullname'])){
            $fullnameErr = "Field Required";
        }
        else{
            $fullname = $_POST['fullname'];
        }

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

        if(empty($_POST['retype_password'])){
            $retype_passwordErr = "Field Required";
        }
        else{
            $retype_password = $_POST['retype_password'];
        }

        if($fullname && $email && $password && $retype_password){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Please Enter Valid Email Address";
            }
            else{
                $passwordLen = strlen($password);

                if($passwordLen > 6){
                    if($password == $retype_password){
                        $register_account = mysqli_query($connect, "INSERT INTO user_account (fullname, email, password) VALUES ('$fullname', '$email', '$password')");

                        if($register_account){
                            echo "<script>window.location.href='login.php?register=succesfully'</script>";
                        }
                    }
                    else{
                        $retype_passwordErr = "Password not Match";
                    }
                }
                else{
                    $passwordErr = "Password is too short";
                }
            }
        }
    }
?>
<br>
<br>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .error{
        color:red;
    }
</style>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="POST"  role="form">
                        <div class="form-group">
                            <h2>Create account</h2>
                        </div>
                        <span class="error"><?php echo $fullnameErr;?></span>
                        <div class="form-group">
                            <label class="control-label" for="signupName">Full Name</label>
                            <input id="signupName" type="text" maxlength="50" name="fullname" class="form-control">
                        </div>
                        <span class="error"><?php echo $emailErr;?></span>
                        <div class="form-group">
                            <label class="control-label" for="signupEmail">Email</label>
                            <input id="signupEmail" type="text" maxlength="50" name="email" class="form-control">
                        </div>
                        <span class="error"><?php echo $passwordErr;?></span>
                        <div class="form-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <input id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" name="password" length="40">
                        </div>
                        <span class="error"><?php echo $retype_passwordErr;?></span>
                        <div class="form-group">
                            <label class="control-label" for="signupPasswordagain">Password again</label>
                            <input id="signupPasswordagain" name="retype_password" type="password" maxlength="25" class="form-control">
                        </div>
                        <div class="form-group">
                            <button id="signupSubmit" type="submit" name="submit" class="btn btn-info btn-block">Create your account</button>
                        </div>
                        <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                        <hr>
                        <p></p>Already have an account? <a href="login.php">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
