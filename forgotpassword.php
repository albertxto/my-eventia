<?php
	session_start();
	include 'config.php';
	if(isset($_SESSION["email"])){
		header("Location: index.php");
	}
	$active = 4;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password - My-Eventia</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include 'header.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Forgot Password</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    <li><a href="login.php">Login</a></li>
                    <li class="active">Forgot Password</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Log In -->
        <div class="row">
            <div class="col-md-8">
                <h3>Forgot Password</h3>
                <form action="sendpassword.php" method="post">
				    <?php include 'message.php'; ?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>