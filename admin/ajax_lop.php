<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$mabm=$_POST['mabm'];
		$tenbm=$_POST['tenbm'];
		$nganh=$_POST['nganh'];
		$act=$_POST['act'];
		if($act=='add'){
					

		$sql="INSERT into lop (MaLop,TenLop,MaNganh,MSCB) values ('$mabm', '$tenbm', '$nganh',null)";
		$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='update'){

			$sql="UPDATE lop SET TenLop='$tenbm', MaNganh='$nganh' where MaLop='$mabm'";
			$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='del') {
			
			$sql="DELETE from lop where MaLop='$mabm'";
			$result=mysql_query($sql,$cn);
			exit();
			}
		?>