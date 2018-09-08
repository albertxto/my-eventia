<?php	
	session_start();
	include 'config.php';
	if(isset($_POST["submit"])){	
		if(!empty($_POST["email"])) {
			$email = $_POST["email"];
			
			$search = mysql_query("SELECT * FROM me_users WHERE user_email='".$email."'");
			$match  = mysql_num_rows($search);
			$row = mysql_fetch_array($search);
			$password = $row['user_password'];
			
			if($match > 0){
				$to = $email;
				$subject = "Recover Password";
				$message = "Thanks for recover your password!\n\nYour account has been recover, you can login with the following credentials.\n\n------------------------\n\nEmail: '$email'\nPassword: '$password'\n\n------------------------";
				$headers = "From:noreply@my-eventia.pe.hu";
				mail($to, $subject, $message, $headers);
				$_SESSION["msg"] = "Your password is already sent to your email.";
			}
			else{
				$_SESSION["msg"] = "Email is not match!";
			}
		}
		else{
		   $_SESSION["msg"] = "Email must be filled!";
		}
	}
	header("Location: forgotpassword.php");
?>