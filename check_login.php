<?php 
	 require("connect.php");
	session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>check_login</title>
</head>

<body>
<?php 
	
		if(isset($_POST["dangnhap"]))	{
			$ms=$_POST["usename"];
			$mk=$_POST["pass"];
			$sql="Select * from nguoimuon where username ='$ms' and password='$mk'";
			$row= mysql_query($sql,$cn);
			$count= mysql_num_rows($row);
			$_SESSION["username"]= $ms;
						if($count==1){
				$_SESSION["loged"] = true;
				echo "<script language='javascript'>alert('Đăng nhập thành công');";
				echo "location.href='index.php';</script>";
				setcookie($ms, "Bạn đã đăng nhập!", time()+1, "/","", 0);
			}
			else{
				echo "<script language='javascript'>alert('Sai username hoặc password');";
				echo "location.href='login.php';</script>";			}
			
		} ?>
</body>
</html>