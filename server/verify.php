<?php session_start();
//Users entered code
$code = $_POST['code'];
//Salt for hash
$salt = "HVKLK875447jhv54KODG";
//Sesson hash & email
$sessionEmail = $_SESSION['sessionEmail'];
$sessionHash = $_SESSION['sessionHash'];

if($sessionEmail && $code && $sessionHash){
	if($sessionHash == sha1($sessionEmail.$code.$salt)){
		echo 1;
	}
	$email = '';
	exit;
}
$email = strtolower(stripslashes($_POST['email']));
if($email){
	$num = 123456;//rand(100000,999999);
 	$_SESSION['sessionEmail'] = $email;
	$_SESSION['sessionHash'] = sha1($email.$num.$salt);
/* 	require '../PHPMailer/PHPMailerAutoload.php'; 
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'loueed+smartcube@gmail.com';                 // SMTP username
	$mail->Password = 'ndcqafgjjefncomq';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	
	$mail->From = 'loueed@gmail.com';
	$mail->FromName = 'SmartCube';
	$mail->addAddress($email);                            // Add a recipient
	
	$mail->WordWrap = 50;                                 // Set word wrap to 50 charactersd
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = "SmartCube - Verify Code - $num";

	$link = '<div style="color: #ffffff;text-decoration: none;display: inline-block;outline: 0;background:rgb(0, 221, 133);border: 0;border-radius: 10px;
			padding: 0 10px;font-size: 40px;text-align: center;font-style: normal;font-weight: 600;white-space: nowrap;margin: 30px auto 10px;display: table;">'.$num.'</div>';
	$message = '<!DOCTYPE html><html><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>SmartCube</title></head>';
	$message .= '<body style="margin:0;padding:0;font-family:\'Helvetica Neue\',Arial,sans-serif;color:#111">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="320" style="padding:0 0 20px">
			<tr><td style="background:rgb(0, 221, 133);color:#fff;padding:10px 0 10px 10px;">SmartCube</td></tr>
			<tr><td style="text-align:center;">
			<h1 style="font-weight:300;font-size:27px;text-align:center;margin-top:20px">Welcome to SmartCube</h1>
			<hr style="width:140px;border:0;border-bottom:1px solid #e5e5e5;margin-bottom:15px;margin-top:20px"></td></tr>';
	$message .= '<tr><td style="text-align:center;padding:10px 20px;">'.$email.' account is nearly active! Simply type the code below into the site.<br>'.$link.'<br><br>
			<hr style="width:220px;border:0;border-bottom:1px solid #e5e5e5;margin-bottom:10px;">
			<a style="color:#545454;text-decoration:none;" href="mailto:loueed@gmail.com">Any questions? Ask loueed@gmail.com</a><br>
			If you didn\'t request an account<br>
			please delete this email.<br>
			</div>';
	$message .= '</td></tr></table></body><br></html>';
	
	$mail->Body  = $message;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		//echo 'Message could not be sent.';
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
		echo 0;
	} else {
		//echo 'Verification Email sent: '.$email;
		echo 1;
	}
 	 */
	echo 1;
}
?>