<?php
	$server = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$database = "my_eventia";
	mysql_connect($server, $dbuser, $dbpassword) or die(mysql_error());
	mysql_select_db($database) or die(mysql_error());
	date_default_timezone_set('Asia/Jakarta');
?>