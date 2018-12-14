<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$ma=$_POST['maHT'];
		
		$act=$_POST['act'];
		if($act=='add'){
			$ten=$_POST['tenHT'];
		$succhua=$_POST['succhua'];
		$diadiem=$_POST['diadiem'];
		

		$sql="INSERT into hoitruong (MaHT,TenHT,SoCho,DiaDiem,MSCB) values ('$ma', '$ten', '$succhua', '$diadiem',null)";
		$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='update'){
			$ten=$_POST['tenHT'];
		$succhua=$_POST['succhua'];
		$diadiem=$_POST['diadiem'];
			$sql="UPDATE hoitruong SET tenHT='$ten', SoCho='$succhua', DiaDiem='$diadiem' where MaHT='$ma'";
			$result=mysql_query($sql,$cn);
		exit();
			
			}
		else if($act=='del') {
			
			$sql="DELETE from hoitruong where MaHT='$ma'";
			$result=mysql_query($sql,$cn);
			exit();
			}
		?>