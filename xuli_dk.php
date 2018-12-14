<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	 require("connect.php");
		session_start();
		date_default_timezone_set('Asia/Bangkok');
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	$ngaymuon = $_POST["ngaymuon"];
	$camuon = $_POST["camuon"];
	$dateht = date('Y-m-d H:i:s');
	$datess= date('Y-m-d');
	$maHT = $_POST["maHT"]; 
	$mucdich = $_POST["mucdich"];
	$nguoimuon=$_SESSION["username"];
	$kq = mysql_query("select MaSo from nguoimuon where username='$nguoimuon'",$cn);
	$row= mysql_fetch_assoc($kq);
	$msnm= $row['MaSo'];
	//
	$show_alert = '<script>$("#dangkimuon .alert").show();</script>'; // Hiển thị thông báo lỗi
	$success_alert = '<script>$("#dangkimuon .alert").attr("class", "alert success");</script>';
//
	if( strtotime($datess) >= strtotime ($ngaymuon)) echo $show_alert  . 'Đăng ký không thành công.';
 	else {  $sql="INSERT INTO phieudk (NgayDK, NgayMuon, Tinhtrang, Mucdich, MaSo, MaHT, MSCB, MaCa) VALUES ('$dateht', '$ngaymuon', 'chưa xét duyệt', '$mucdich', '$msnm', '$maHT', NULL, '$camuon')";
			$result= mysql_query($sql,$cn);
			echo $show_alert . $success_alert . 'Đăng ký thành công.'; // Thông báo 
	}
        
?>
</body>
</html>