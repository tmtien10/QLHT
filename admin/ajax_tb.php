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
					

		$sql="INSERT into thietbi (MaTB,TenTB) values ('$mabm', '$tenbm')";
		$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='update'){

			$sql="UPDATE thietbi SET TenTB='$tenbm' where MaTB='$mabm'";
			$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='del') {
			
			$sql="DELETE from thietbi where MaTB='$mabm'";
			$result=mysql_query($sql,$cn);
			exit();
			}
		?>