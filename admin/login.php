<?php include("function/login.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../template/admin_template/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../template/admin_template/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../template/admin_template/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../template/admin_template/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .error{
                color:red;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <span class="error"><?php echo $emailErr;?></span>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                    </div>
                                    <span class="error"><?php echo $passwordErr;?></span>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password">
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block" name="login">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../template/admin_template/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../template/admin_template/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../template/admin_template/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../template/admin_template/js/startmin.js"></script>

    </body>
</html>
