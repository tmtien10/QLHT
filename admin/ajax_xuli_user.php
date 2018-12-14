<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$ma=$_POST['maso'];
		
		$act=$_POST['act'];
	if($act=='add'){
		$ten=$_POST['hoten'];
	  	$email =$_POST['email'];
		$sdt=$_POST['sdt'];
		$username = $_POST['username'];
		$pass=$_POST['pass'];
		$bomon=$_POST['bomon'];
		$lop=$_POST['lop'];
		$sql="INSERT INTO nguoimuon(MaSo, HoTen, Email, SDT, username, password, MSCB) VALUES ('$ma','$ten','$email','$sdt','$username','$pass','b123')";
		$result=mysql_query($sql,$cn);
	 	if($bomon==""){
			$sql1="INSERT INTO sinhvien(MaSo, MaLop) VALUES ('$ma','$lop')";
		$result=mysql_query($sql1,$cn);
			
			}
		else {
			$sql1="INSERT INTO giangvien(MaSo, MaBoMon) VALUES ('$ma','$bomon')";
		$result=mysql_query($sql1,$cn);
			
			}	}
			
	else if($act=='del'){
			$sql="DELETE from nguoimuon where MaSo='$ma' ";
		$result=mysql_query($sql,$cn);
			}
	else {
		$ten=$_POST['hoten'];
	  	$email =$_POST['email'];
		$sdt=$_POST['sdt'];
		$username = $_POST['username'];
		$pass=$_POST['pass'];
		$bomon=$_POST['bomon'];
		$lop=$_POST['lop'];
		$sql="UPDATE nguoimuon SET MaSo='$ma', HoTen='$ten', Email='$email', SDT='$sdt', username='$sdt', password='$pass', MSCB='b123') where MaSo='$ma'";
		$result=mysql_query($sql,$cn);
		
	 	if($bomon==""){
			$sql1="UPDATE sinhvien set MaLop='$lop' where MaSo='$ma'";
		$result2=mysql_query($sql1,$cn);
			
			}
		else if($lop==""){

		$sql1="UPDATE giangvien set MaBoMon='$bomon' where MaSo='$ma'";

		$result2=mysql_query($sql1,$cn);
			
			}
		}
		?>