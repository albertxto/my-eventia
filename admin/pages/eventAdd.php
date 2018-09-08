<?php 
	session_start();
	include '../../config.php';
	if(!isset($_SESSION["email"])){
		header("location:../../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Event</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include 'navbar.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Events</h1>
					<ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
					    <li><a href="listevent.php">List Events</a></li>
                        <li class="active">Add Event</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
				
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Event
                        </div>
                        <div class="panel-body">
                            <form action="doEventAdd.php" method="post" enctype="multipart/form-data">
                                <?php include '../../message.php'; ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label>Event Name:</label>
    	                                    <input type="text" class="form-control" name="name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label>Event Description:</label>
    	                                    <textarea class="form-control" name="description" rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label>Event Location:</label>
    	                                    <input type="text" class="form-control" name="location" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
	                                        <label>Event Start Date:</label>
    	                                    <input type="date" class="form-control" name="start" placeholder="YYYY-MM-dd" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
	                                        <label>Event End Date:</label>
    	                                    <input type="date" class="form-control" name="end" placeholder="YYYY-MM-dd" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label>Event Image:</label>
    	                                    <input type="file" name="fileImage" accept=".jpg,.png" required />
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <input type="submit" class="btn btn-primary" />
                                            <input type="reset" class="btn btn-danger" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php include 'copyright.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
