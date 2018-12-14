<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$mabm=$_POST['mabm'];
		$tenbm=$_POST['tenbm'];
		$act=$_POST['act'];
		if($act=='add'){
					

		$sql="INSERT into nganh (MaNganh,TenNganh,MSCB) values ('$mabm', '$tenbm', null)";
		$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='update'){

			$sql="UPDATE nganh SET TenNganh='$tenbm' where MaNganh='$mabm'";
			$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='del') {
			$sql="DELETE from nganh where MaNganh='$mabm'";
			$result=mysql_query($sql,$cn);
			exit();
			
			}
		?>