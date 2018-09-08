<?php
session_start();
include 'config.php';

$name = mysql_real_escape_string($_POST['name']);
$phone = mysql_real_escape_string($_POST['phone']);
$email_address = mysql_real_escape_string($_POST['email']);
$message = mysql_real_escape_string($_POST['message']);

if($name==""){
    $_SESSION["errMsg"] = "Name must be filled!";
}
else if($phone==""){
    $_SESSION["errMsg"] = "Phone must be filled!";
}
else if($email_address==""){
    $_SESSION["errMsg"] = "Email address must be filled!";
}
else if($message==""){
    $_SESSION["errMsg"] = "Message must be filled!";
}
else{
    $to = "albertxto@gmail.com";
    $email_subject = "My-Eventia Contact Form: $name";
    $email_body = "You have received a new message from your website's contact form.\n\n"."Here are the details:\n\nName: $name\n\nPhone: $phone\n\nEmail: $email_address\n\nMessage:\n$message";
    $headers = "From: noreply@my-eventia.pe.hu\n";
    $headers .= "Reply-To: $email_address";	
    mail($to,$email_subject,$email_body,$headers);
    $_SESSION["msg"] = "Message has been sent!";
    header("location: contact.php");
}
?>