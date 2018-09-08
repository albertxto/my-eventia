<?php
	session_start();
	
	$email = mysql_real_escape_string($_POST["email"]);
	$password = mysql_real_escape_string($_POST["password"]);
	
	if($email==""){
		$_SESSION["errMsg"] = "Email must be filled!";
	}
	else if($password==""){
		$_SESSION["errMsg"] = "Password must be filled!";
	}
	else{
		include 'config.php';
		$sql = "SELECT * FROM `me_users` WHERE `user_email` = '".$email."' AND `user_password` = '".$password."'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_num_rows($result);
		if($row>0){
			$data = mysql_fetch_array($result);
			$_SESSION["email"] = $email;
			$_SESSION["id"] = $data["user_id"];
			$_SESSION["fname"] = $data["user_fname"];
			$_SESSION["lname"] = $data["user_lname"];
			$_SESSION["control"] = $data["user_control"];
			header("Location: index.php");
		}
		else{
			$_SESSION["errMsg"] = "Invalid email or password!";
		}
	}
	header("Location: login.php");
?>