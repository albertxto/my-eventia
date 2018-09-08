<?php
	session_start();
	include '../../config.php';
	
	$eventid = mysql_real_escape_string($_POST["eventid"]);
	$name = mysql_real_escape_string($_POST["name"]);
	$description = mysql_real_escape_string($_POST["description"]);
	$location = mysql_real_escape_string($_POST["location"]);
	$start_date = mysql_real_escape_string($_POST["start"]);
	$end_date = mysql_real_escape_string($_POST["end"]);
	$post = mysql_real_escape_string($_POST["post"]);
	$status = mysql_real_escape_string($_POST["status"]);
	
	if($eventid==""){
		$_SESSION["errMsg"] = "Event ID is missing!";
	}
	else if($name==""){
		$_SESSION["errMsg"] = "Event name must be filled!";
	}
	else if($description==""){
		$_SESSION["errMsg"] = "Event description must be filled!";
	}
	else if($location==""){
		$_SESSION["errMsg"] = "Event description must be filled!";
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
	else if($post==""){
		$_SESSION["errMsg"] = "Event post date must be filled!";
	}
	else{
		if($_SESSION["control"]=="Admin"){
			if($status==""){
				$_SESSION["errMsg"] = "Event status must be selected!";
				header("location:eventEdit.php?id=".$eventid);
			}
		}
		$tmp_name = $_FILES["fileImage"]["tmp_name"];
		$filename = $_FILES["fileImage"]["name"];
		
		if($tmp_name=="" || $filename==""){
			if($_SESSION["control"]=="Admin"){
				$query = "UPDATE me_events SET event_name = '".$name."' , event_description = '".$description."' , event_location = '".$location."' , event_start_date = '".$start_date."' , event_end_date = '".$end_date."' , event_post_date = '".$post."' , event_status = '".$status."' WHERE event_id = '".$eventid."'";
				$result = mysql_query($query) or die(mysql_error());
			}
			else{
				$query = "UPDATE me_events SET event_name = '".$name."' , event_description = '".$description."' , event_location = '".$location."' , event_start_date = '".$start_date."' , event_end_date = '".$end_date."' , event_post_date = '".$post."' WHERE event_id = '".$eventid."'";
				$result = mysql_query($query) or die(mysql_error());
			}
		}
		else{
			//Upload Gambar
			$folder = "../../img/";
			move_uploaded_file($tmp_name,$folder.$filename);
			
			if($_SESSION["control"]=="Admin"){
				$query = "UPDATE me_events SET event_name = '".$name."' , event_description = '".$description."' , event_image = '".$filename."' , event_location = '".$location."' , event_start_date = '".$start_date."' , event_end_date = '".$end_date."' , event_post_date = '".$post."' , event_status = '".$status."' WHERE event_id = '".$eventid."'";
				$result = mysql_query($query) or die(mysql_error());
			}
			else{
				$query = "UPDATE me_events SET event_name = '".$name."' , event_description = '".$description."' , event_image = '".$filename."' , event_location = '".$location."' , event_start_date = '".$start_date."' , event_end_date = '".$end_date."' , event_post_date = '".$post."' WHERE event_id = '".$eventid."'";
				$result = mysql_query($query) or die(mysql_error());
			}
		}
		$_SESSION["msg"] = "Update success!";
	}
	header("location:eventEdit.php?id=".$eventid);
?>