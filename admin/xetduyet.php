<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$MaDK=$_POST['madk'];
		$st=$_POST['stt'];
		if($st=='Hủy'){
		$sql="update phieudk set Tinhtrang='Đã hủy' where MaDK='$MaDK'";
		$result=mysql_query($sql,$cn);
		echo 1;
		exit();
			
			
			}
		else {
		$sql="Select NgayMuon, MaCa from phieudk where MaDk='$MaDK' and Tinhtrang='đã xét duyệt'";
		$result=mysql_query($sql,$cn);
		$count=mysql_num_rows($result);
		if ($count>0){
			echo 0;
			exit();
			
			}
		else {
			$sql1="update phieudk set Tinhtrang='$st' where MaDK='$MaDK'";
		$result=mysql_query($sql1,$cn);
		echo 1;
		exit();
			}
		}
?>
