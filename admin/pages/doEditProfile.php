<?php	
	session_start();
	include '../../config.php';
	
	$fname = mysql_real_escape_string($_POST["fname"]);
	$lname = mysql_real_escape_string($_POST["lname"]);
	$dob = mysql_real_escape_string($_POST["dob"]);
	$gender = mysql_real_escape_string($_POST["gender"]);
	$phone = mysql_real_escape_string($_POST["phone"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$oldpass = mysql_real_escape_string($_POST["oldpass"]);
	$newpass = mysql_real_escape_string($_POST["newpass"]);
	$address = mysql_real_escape_string($_POST["address"]);
	
	$query = "SELECT * FROM `me_users` WHERE `user_id` = '".$_SESSION["id"]."'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
	
	if($fname==""){
		$_SESSION["errMsg"] = "First name must be filled!";
	}
	else if($lname==""){
		$_SESSION["errMsg"] = "Last name must be filled!";
	}
	else if($dob==""){
		$_SESSION["errMsg"] = "Date of birth must be filled!";
	}
	else if($gender==""){
		$_SESSION["errMsg"] = "Gender must be selected!";
	}
	else if($phone==""){
		$_SESSION["errMsg"] = "Phone must be filled!";
	}
	else if($email==""){
		$_SESSION["errMsg"] = "Email must be filled!";
	}
	else if($oldpass==""){
		$_SESSION["errMsg"] = "Old password must be filled!";
	}
	else if($oldpass!=$data["user_password"]){
		$_SESSION["errMsg"] = "Old password is wrong!";
	}
	else if($newpass==""){
		$_SESSION["errMsg"] = "New password must be filled!";
	}
	else if($address==""){
		$_SESSION["errMsg"] = "Address must be filled!";
	}
	else{
		$query = "UPDATE `me_users` SET user_fname='".$fname."', user_lname='".$lname."', user_dob='".$dob."' , user_gender='".$gender."', user_email='".$email."', user_password='".$newpass."', user_phone='".$phone."', user_address='".$address."' WHERE `user_id` = '".$_SESSION["id"]."'";
		$result = mysql_query($query) or die(mysql_error());
		if($result>0){
			$_SESSION["email"] = $email;
			$_SESSION["fname"] = $data["user_fname"];
			$_SESSION["lname"] = $data["user_lname"];
			$_SESSION["msg"] = "Update profile success!";
		}
		else{
			$_SESSION["errMsg"] = "Update profile failed!";
		}
	}
	header("Location: profile.php");
?>