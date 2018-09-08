<?php
	session_start();
	include 'config.php';
	if(isset($_SESSION["email"])){
		header("Location: index.php");
	}
	$active = 3;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up - My-Eventia</title>

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
                <h1 class="page-header">Sign Up</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Sign Up</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Registration Form -->
        <div class="row">
            <div class="col-md-8">
                <h3>Registration Form</h3>
                <form action="doRegister.php" method="post">
				    <?php include 'message.php'; ?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="email" autofocus required />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" required />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>First Name:</label>
                            <input type="text" class="form-control" name="fname" required />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" name="lname" />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" required />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Gender:</label><br>
                            <label class="radio-inline"><input type="radio" name="gender" value="Male" required /> Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="Female" required /> Female</label>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone:</label>
                            <input type="number" class="form-control" name="phone" required />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Address:</label>
                            <textarea class="form-control" name="address" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <p>Agree with our <a href="#" data-toggle="modal" data-target="#myModal">term of use</a>?
                            <input type="checkbox" name="checkbox" value="check" required /></p>
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-danger" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
		<!-- /.row -->
		
        <hr>
		<?php include 'term.php'; ?>
        <?php include 'footer.php'; ?>
		
    </div>
	<!-- /.container -->
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>