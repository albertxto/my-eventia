<?php
	session_start();
	$eventid = mysql_real_escape_string($_POST["eventid"]);
	if($eventid==""){
		header("location:../../index.php");
	}
	else{
		include '../../config.php';
		$query = "DELETE FROM me_events WHERE event_id = '".$eventid."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result<=0){
			$_SESSION["errMsg"] = "Delete failed!";
			header("location:eventDelete.php?id=".$eventid);
		}
	}
	header("location:listevent.php");
?>