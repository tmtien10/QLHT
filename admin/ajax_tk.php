<?php 

		 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
	  	$ma=$_POST['MaHT'];
		$result=mysql_query("select a.MaTB, a.TenTB, b.SoLuong from thietbi a, chitiettb b where MaHT='$ma' and a.MaTB=b.MaTB", $cn);
		     echo"<tr><th style='width:30%'> Mã thiết bị</th><th style='width:30%'>Tên.Mã thiết bị</th><th style='width:10%'>Số lượng</th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaTB']."</td>";
				echo "<td>".$row['TenTB']."</td>";
				echo "<td>".$row['SoLuong']."</td></tr>";
					}

				$dem=mysql_query("SELECT SUM(SoLuong) as soluong FROM `chitiettb` where MaHT='$ma'", $cn);
				while ($rew=mysql_fetch_assoc($dem)){
				echo "<tr><td colspan='2'>Tổng cộng</td><td>".$rew['soluong']."</td></tr>";
				}
		?>
