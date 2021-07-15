<?php
	
	require_once('PHPMailer/PHPMailerAutoload.php');
	
	$mail =new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure ='ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();
	$mail->Username = 'slayedt@gmail.com';
	$mail->Password = 'rahul123kevin';
	$mail->SetFrom('no_reply');
	$mail->Subject = 'Hello World';
	$mail->Body = 'A test mail';
	$mail->AddAddress('chamodhiduranga87@gmail.com');
	
	$mail->Send()
?>