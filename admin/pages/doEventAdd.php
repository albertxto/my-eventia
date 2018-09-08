<?php
	include '../../config.php';
	session_start();
	
	$name = mysql_real_escape_string($_POST["name"]);
	$description = mysql_real_escape_string($_POST["description"]);
	$location = mysql_real_escape_string($_POST["location"]);
	$start_date = mysql_real_escape_string($_POST["start"]);
	$end_date = mysql_real_escape_string($_POST["end"]);
	$post = date("Y-m-d H:i:s");
	$tmp_name = $_FILES["fileImage"]["tmp_name"];
	$filename = $_FILES["fileImage"]["name"];
	
	if($name==""){
		$_SESSION["errMsg"] = "Event name must be filled!";
	}
	else if($description==""){
		$_SESSION["errMsg"] = "Event description must be filled!";
	}
	else if($location==""){
		$_SESSION["errMsg"] = "Event location must be filled!";
	}
	else if($start_date==""){
		$_SESSION["errMsg"] = "Event start date must be filled!";
	}
	else if($end_date==""){
		$_SESSION["errMsg"] = "Event end date must be filled!";
	}
	else if($start_date > $end_date){
		$_SESSION["errMsg"] = "Event start date must be before event end date!";
	}
	else if(empty($tmp_name) || empty($filename)){
		$_SESSION["errMsg"] = "Event image must be selected!";
	}
	else{
		$folder = "../../img/";
		move_uploaded_file($tmp_name,$folder.$filename); //Upload Gambar
		
		$sql = "INSERT INTO me_events (event_name, event_description, event_image, event_location, event_start_date, event_end_date, event_post_date, event_user_id, event_status) VALUES ('".$name."', '".$description."', '".$filename."', '".$location."', '".$start_date."', '".$end_date."', '".$post."', '".$_SESSION["id"]."', 'Pending')";
		$result = mysql_query($sql) or die(mysql_error());
		$_SESSION["msg"] = "Insert success! Waiting for approval!";
	}
	header("Location: eventAdd.php");
?>