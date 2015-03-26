<?php
$checkEmail = $_GET['checkEmail'];
if($checkEmail){
	require '../../connect.php';	
	$result = mysqli_query($con,"SELECT COUNT(*) AS count FROM `louisdickinson`.`smartcube_users` WHERE email = '$checkEmail' LIMIT 1");
	$row = mysqli_fetch_array($result);
	echo $row['count'];
}
?>