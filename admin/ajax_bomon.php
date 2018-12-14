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
					

		$sql="INSERT into bomon (MaBoMon,TenBM,MSCB) values ('$mabm', '$tenbm', null)";
		$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='update'){

			$sql="UPDATE bomon SET TenBM='$tenbm' where MaBoMon='$mabm'";
			$result=mysql_query($sql,$cn);
		exit();
			
		}
		else if($act=='del') {
			
			$sql="DELETE from bomon where MaBoMon='$mabm'";
			$result=mysql_query($sql,$cn);
			exit();
			
			}
		?>