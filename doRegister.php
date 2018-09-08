<?php
	session_start();
	
	$email = mysql_real_escape_string($_POST["email"]);
	$password = mysql_real_escape_string($_POST["password"]);
	$fname = mysql_real_escape_string($_POST["fname"]);
	$lname = mysql_real_escape_string($_POST["lname"]);
	$dob = mysql_real_escape_string($_POST["dob"]);
	$phone = mysql_real_escape_string($_POST["phone"]);
	$address = mysql_real_escape_string($_POST["address"]);
	if(isset($_POST["gender"])) $gender = mysql_real_escape_string($_POST["gender"]);
	if(isset($_POST["checkbox"])) $checkbox = mysql_real_escape_string($_POST["checkbox"]);
	
	if($email==""){
		$_SESSION["errMsg"] = "Email address must be filled!";
	}
	else if($password==""){
		$_SESSION["errMsg"] = "Password must be filled!";
	}
	else if($fname==""){
		$_SESSION["errMsg"] = "First name must be filled!";
	}
	else if($dob==""){
		$_SESSION["errMsg"] = "Date of birth must be filled!";
	}
	else if($gender!="Male" && $gender!="Female"){
		$_SESSION["errMsg"] = "Gender must be filled!";
	}
	else if($phone==""){
		$_SESSION["errMsg"] = "Phone number must be filled!";
	}
	else if($address==""){
		$_SESSION["errMsg"] = "Address must be filled!";
	}
	else if(empty($checkbox)){
		$_SESSION["errMsg"] = "You must agree with our term of use!";
	}
	else{
		include 'config.php';
		$sql = "SELECT `user_email` FROM `me_users` WHERE `user_email` = '".$email."'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_num_rows($result);
		if($row>0){
			$_SESSION["errMsg"] = "Email already registered!";
		}
		else{
			$sql = "INSERT INTO `me_users`(`user_email`, `user_password`, `user_fname`, `user_lname`, `user_dob`, `user_gender`, `user_phone`, `user_address`, `user_control`) VALUES ('".$email."', '".$password."', '".$fname."', '".$lname."', '".$dob."', '".$gender."', '".$phone."', '".$address."', 'Member')";
			$result = mysql_query($sql) or die(mysql_error());
			$_SESSION["msg"] = "Register Success!";
		}
	}
	header("Location: register.php");
?>