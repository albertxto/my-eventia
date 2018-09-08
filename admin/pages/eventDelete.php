<?php 
	session_start();
	include '../../config.php';
	if(!isset($_SESSION["email"])){
		header("location:../../index.php");
	}
	else if(!isset($_GET["id"])){
		header("location:listevent.php");
	}
	else{
		$query = "SELECT * FROM me_events WHERE event_id = '".$_GET["id"]."'";
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);
		if($_SESSION["control"]!="Admin" || $_SESSION["control"]=="Member"){
			if($data["event_user_id"]!=$_SESSION["id"]){
				header("location:listevent.php");
			}
		}
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

    <title>Delete Event</title>

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
                        <li class="active">Delete Event</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
				
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete Event
                        </div>
                        <div class="panel-body">
                            <form action="doEventDelete.php" method="post" enctype="multipart/form-data">
                                <?php include '../../message.php'; ?>
								<input type="hidden" name="eventid" value="<?php echo $_GET["id"]; ?>" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label class="control-label">Event Name:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_name"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label class="control-label">Event Description:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_description"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label class="control-label">Event Location:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_location"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
	                                        <label class="control-label">Event Start Date:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_start_date"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
	                                        <label class="control-label">Event End Date:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_end_date"]; ?></p>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
	                                        <label class="control-label">Event Posted Date:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_post_date"]; ?></p>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
	                                        <label class="control-label">Event Status:</label>
    	                                    <p class="form-control-static"><?php echo $data["event_status"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
	                                        <label class="control-label">Event Image:</label>
											<img class="img-responsive" src="../../img/<?php echo $data["event_image"]; ?>" alt="<?php echo $data["event_image"]; ?>" />
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="form-control-static">Are you sure want to delete this event?</p>
	                                        <input type="submit" class="btn btn-primary" value="Yes" />
                                            <a href="listevent.php"><input type="button" class="btn btn-danger" value="No" /></a>
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
