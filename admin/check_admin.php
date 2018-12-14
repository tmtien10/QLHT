<?php
	 require("connect.php");
		session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
   	$sql="Select * from admin where MSCB='$username' and pass='$password'";
			$row= mysql_query($sql,$cn);
			$count= mysql_num_rows($row);
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	if ($count==1) {
		$_SESSION["username"]=$username;
		$_SESSION["loged"]= true;
		echo 1;
		exit();
	}
 
	// Nếu thông tin đăng nhập sai, trả về giá trị là 0
	echo 0;
	exit();
?>