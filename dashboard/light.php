<?php
require '../../connect.php';
$x = $_GET['status'];
if($x == 1){
	mysqli_query("UPDATE  `louisdickinson`.`lighttest` SET  `light` =  '1'");
}else if($x == 2)
	mysqli_query("UPDATE  `louisdickinson`.`lighttest` SET  `light` =  '0'");
}

$r = mysqli_query($con,"select * from lighttest");
	while($row=mysqli_fetch_array($r)){
		echo $row['light'];
	}
?>