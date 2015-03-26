<?php session_start();
//Verify user code again on server side
$email = $_SESSION['sessionEmail'];
$code = $_POST['code'];
$pass1 = $_POST['pass'];
$pass2 = $_POST['conPass'];
if($pass1 !== $pass2){
	//AWESOME!
	echo "pass error";
	exit;
}
if($email){
	require '../../connect.php';	
	$result = mysqli_query($con,"SELECT COUNT(*) AS count FROM `louisdickinson`.`smartcube_users` WHERE email = '$email'");
	$row = mysqli_fetch_array($result);
	if($row['count'] == 0){
		$password = sha1($email.$pass1."kh32v5h4v52vkh5k3kj2v31popqwzxw");
		$sql = "INSERT INTO `louisdickinson`.`smartcube_users` (`email`, `password`) VALUES ('$email', '$password')";
		$result = mysqli_query($con,$sql);
		echo sha1($email."3v0h2l123h3h6lh5v6l5hkv6980804hv57l4h6cv");
	}else{
		$result = mysqli_query($con,"DELETE FROM `louisdickinson`.`smartcube_users` WHERE email = '$email'");
		echo "email exists";
	}
}else{
	echo "no email";
}