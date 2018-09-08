<?php
	session_start();
	include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My-Eventia</title>

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

<body <?php if(!isset($_SESSION["flag"])){ ?> onLoad="$('#myModal').modal('show');" <?php $_SESSION["flag"]=1; } ?>>
	
    <?php include 'header.php'; ?>
	
    <!-- Page Content -->
    <div class="container">
		
		<?php include 'term.php'; ?>
		
<?php
	$sql = "SELECT * FROM `me_events`";
	$header = "Browse Events";
	if(isset($_GET["search"]) && isset($_GET["sort"])){
		if($_GET["sort"] == "Recent"){
			$sql .= " WHERE `event_name` LIKE '%".$_GET["search"]."%' AND `event_status` LIKE 'Approved' ORDER BY `event_post_date` DESC";
		}
		else if($_GET["sort"] == "Name"){
			$sql .= " WHERE `event_name` LIKE '%".$_GET["search"]."%' AND `event_status` LIKE 'Approved' ORDER BY `event_name` ASC";
		}
		else if($_GET["sort"] == "Event Date"){
			$sql .= " WHERE `event_name` LIKE '%".$_GET["search"]."%' AND `event_status` LIKE 'Approved' ORDER BY `event_start_date` DESC";
		}
		$header = "Search: ".$_GET["search"];
	}
	else if(isset($_GET["search"])){
		$sql .= " WHERE `event_name` LIKE '%".$_GET["search"]."%' AND `event_status` LIKE 'Approved' ORDER BY `event_post_date` DESC";
		$header = "Search: ".$_GET["search"];
	}
	else if(isset($_GET["sort"])){
		if($_GET["sort"] == "Recent"){
			$sql .= " WHERE `event_status` LIKE 'Approved' ORDER BY `event_post_date` DESC";
		}
		else if($_GET["sort"] == "Name"){
			$sql .= " WHERE `event_status` LIKE 'Approved' ORDER BY `event_name` ASC";
		}
		else if($_GET["sort"] == "Event Date"){
			$sql .= " WHERE `event_status` LIKE 'Approved' ORDER BY `event_start_date` DESC";
		}
	}
	else{
		$sql .= " WHERE `event_status` LIKE 'Approved' ORDER BY `event_post_date` DESC";
	}
	$result = mysql_query($sql) or die(mysql_error());
	$totalData = mysql_num_rows($result);
	$dataPerPage = 6;
	$totalPage = ($totalData%$dataPerPage==0) ? floor($totalData/$dataPerPage) : floor($totalData/$dataPerPage)+1;
	$currPage = 1;
	if(isset($_GET["page"])){
		$currPage = $_GET["page"];
	}
	$limitStart = ($currPage-1)*$dataPerPage;
	$sql .= " LIMIT " . $limitStart . "," . $dataPerPage;
	$result = mysql_query($sql) or die(mysql_error());
?>
        <!-- Events Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $header; ?></h1>
            </div>
			<div class="col-lg-12" style="margin-top:10px; margin-bottom:20px;">
				<form action="" method="get">
					Sort By:
					<select name="sort" onchange="this.form.submit();">
						<option <?php if(isset($_GET["sort"]) && $_GET["sort"]=="Recent") echo "selected"; ?> >Recent</option>
						<option <?php if(isset($_GET["sort"]) && $_GET["sort"]=="Name") echo "selected"; ?> >Name</option>
						<option <?php if(isset($_GET["sort"]) && $_GET["sort"]=="Event Date") echo "selected"; ?> >Event Date</option>
					</select>
					<?php if(isset($_GET["search"])){ ?><input type="hidden" name="search" value="<?php echo $_GET["search"]; ?>" /><?php } ?>
				</form>
			</div>
<?php
	if($totalData > 0){
		for($i=0; $i<$dataPerPage && ($row = mysql_fetch_array($result)); $i++){
?>
            <div class="col-md-4 img-portfolio col-sm-6" style="height:450px;">
                <a href="event.php?id=<?php echo $row["event_id"]; ?>">
                    <img class="img-responsive img-hover" src="img/<?php echo $row["event_image"]; ?>" alt="<?php echo $row["event_image"]; ?>" style="width:360px; height:240px;">
                </a>
                <h3>
                    <a href="event.php?id=<?php echo $row["event_id"]; ?>"><?php echo $row["event_name"]; ?></a>
                </h3>
				<p><i class="fa fa-clock-o"></i> Posted on <?php echo $row["event_post_date"]; ?></p>
                <p><?php echo $row["event_description"]; ?></p>
            </div>
<?php
		}
?>
        </div>
        <!-- /.row -->
		
		<hr>

        <!-- Pagination -->
		<div class="row text-center">
            <div class="col-sm-12">
                <ul class="pagination">
                	<li class="disabled"><a href="">Page <?php echo $currPage; ?> of <?php echo $totalPage; ?></a></li>
<?php
		if($currPage>1){
?>
					<li><a href="?page=1<?php echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>">First</a></li>
					<li><a href="?page=<?php echo $currPage-1; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>">&laquo;</a></li>
<?php
		}
		$flagL = $flagG = 1;
		for($i=1; $i<=$totalPage; $i++){
			if($totalPage<=10){
				if($i!=$currPage){ //print paging selain halaman sekarang
?>
						<li><a href="?page=<?php echo $i; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>"><?php echo $i; ?></a></li>
<?php
				}else{ //print halaman sekarang
?>
						<li class="active"><a href="#"><?php echo $i; ?></a></li>
<?php
				}
			}else{
				if($i==$currPage){ //print halaman sekarang
?>
						<li class="active"><a href="#"><?php echo $i; ?></a></li>
<?php
				}else if($i>=$currPage-2 && $i<=$currPage+2){ //print 2 paging sebelum dan 2 paging setelah halaman sekarang
?>
						<li><a href="?page=<?php echo $i; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>"><?php echo $i; ?></a></li>
<?php
				}else if($i%10==0 && $i>$currPage && $flagG<=2){ //print 2 paging kelipatan 10 yg lebih besar dari halaman sekarang
					$flagG++;
?>
						<li><a href="?page=<?php echo $i; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>"><?php echo $i; ?></a></li>
<?php
				}else if($i%10==0 && $i<=20 && $flagL<=2){ //print 2 paging kelipatan 10 yg lebih kecil dari halaman sekarang
					$flagL++;
?>
						<li><a href="?page=<?php echo $i; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>"><?php echo $i; ?></a></li>
<?php
				}
			}
		}
		if($currPage!=$totalPage){
?>
					<li><a href="?page=<?php echo $currPage+1; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>">&raquo;</a></li>
					<li><a href="?page=<?php echo $totalPage; echo (isset($_GET['search']))?'&search='.$_GET['search']:''; echo (isset($_GET['sort']))?'&sort='.$_GET['sort']:''; ?>">Last</a></li>
<?php
		}
?>
				</ul>
			</div>
			<!-- /.col -->
<?php
	}else{
?>
			<div class='col-lg-12'><h3>Event not found!</h3></div>
<?php
	}
?>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>