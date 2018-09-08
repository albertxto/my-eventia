<?php
	session_start();
	include 'config.php';
	if(!isset($_GET["id"])){
		header("Location: index.php");
	}
	$eventid = $_GET["id"];
	$sql = "SELECT * FROM me_events JOIN me_users ON me_events.event_user_id = me_users.user_id WHERE me_events.event_id = ".$eventid;
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $row["event_name"]; ?> - My-Eventia</title>

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
                <h1 class="page-header"><?php echo $row["event_name"]; ?>
                    <!--<small>by <a href="#">Start Bootstrap</a>
                    </small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Event</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted on <?php echo $row["event_post_date"]; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="img/<?php echo $row["event_image"]; ?>" alt="<?php echo $row["event_image"]; ?>">

                <hr>

				<!-- Event Detail -->
                <div class="well">
                    <h4>Event Detail</h4>
                    <div class="row">
                        <div class="col-lg-12">
                        <table>
                            <tr>
                                <td>By</td>
                                <td>: <?php echo $row["user_fname"]." ".$row["user_lname"]; ?></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>: <?php echo $row["event_start_date"]; ?></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td>: <?php echo $row["event_end_date"]; ?></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>: <?php echo $row["event_location"]; ?></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
				
                <!-- Post Content -->
                <p><?php echo $row["event_description"]; ?></p>
				
            <?php if($row["event_post_date"]!=$row["event_updated_date"]){ ?>
                <p>Updated on: <?php echo $row["event_updated_date"]; ?></p>
            <?php } ?>
				
                <hr>

                <!-- Event Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Event Search</h4>
					<form action="index.php" method="get">
						<div class="input-group">
							<input type="text" class="form-control" name="search" />
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
                    <!-- /.input-group -->
                </div>

                <!-- Most Popular Events -->
                <div class="well">
                    <h4>Most Popular Events</h4>
                    <div class="row">
						<div class="col-lg-12">
							<a href="#">Test</a>
						</div>
                    </div>
                    <!-- /.row -->
                </div>

            </div>

        </div>
        <!-- /.row -->
		
        <hr>

        <!-- Footer -->		
        <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
