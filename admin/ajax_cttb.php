<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script src="jquery.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
	
			       
			$("#update").on('click', function(){
			var maHT = $("#maHT").val();
			var tenHT=$("#tenHT").val();
			var Succhua = $("#Succhua").val();
			var Diadiem=$("#Diadiem").val();
			var act='update';
            $.ajax(
            {
                url:'ajax_ht_xuli.php',
                type:'POST',
                data: {maHT:maHT,tenHT:tenHT,succhua:Succhua, diadiem:Diadiem,act:act},                
                success:function()
          			{
						window.location.href='hoitruong.php';
						},
            });
        });
			$(".btn-default").on('click', function(){
			var maHT=$("#maHT").val();
			var maTB= $("#tb").val();
			var sl=$("#sl").val();
			var act='add';
            $.ajax(
            {
                url:'ajax_cttb.php',
                type:'POST',
                data: {maTB:maTB, sl:sl, act:act, maHT:maHT},                
                success:function(data)
          			{
						$("#ie").html(data);
						},
            });
        });

		$(".btn-danger").on('click', function(){
			var maHT=$("#maHT").val();
			var matb= $(this).val();
			var act='del';
			$cm=confirm("Bạn muốn xóa?");
			if($cm==true){
            $.ajax(
            {
                url:'ajax_cttb.php',
                type:'POST',
                data: {maTB:matb, act:act, maHT:maHT},                
                success:function(data)
          			{
						$("#ie").html(data);
						},
            });
			}
        });


		
       
						
        });
			
					 </script>

<body>

<?php

	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		$ma=$_POST['maHT'];
		
		$act=$_POST['act'];
		if($act=='add'){
			$tb=$_POST['maTB'];
			$sl=$_POST['sl'];
		

		$sql="INSERT into chitiettb (MaHT,MaTB,SoLuong) values ('$ma', '$tb', '$sl')";
		$result=mysql_query($sql,$cn);
		$check=mysql_query("select a.SoLuong, a.MaTB,b.TenTB from chitiettb a, thietbi b where MaHT='$ma' AND a.MaTB=b.MaTB", $cn);
			
			echo"<table id='ie'>";
			echo"<tr><th>Tên thiết bị</th><th>Số lượng</th><th></th></tr>";
			while($row2=mysql_fetch_array($check)){
				echo "<tr><td>".$row2['TenTB']."</td>";
				echo" <td>".$row2['SoLuong']."</td>";
				
				echo"<td></br><button type='submit' class='btn btn-danger' val='".$row2['MaTB']."' id='del'>Xóa</button></td></tr>";
			
			}
			}
		else if($act=='del') {
			$tb=$_POST['maTB'];

			$sql="DELETE from chitiettb where MaHT='$ma' and MaTB='$tb'";
			$result=mysql_query($sql,$cn);
			$check=mysql_query("select a.SoLuong, a.MaTB,b.TenTB from chitiettb a, thietbi b where MaHT='$ma' AND a.MaTB=b.MaTB", $cn);
			echo "<div style='float:left'>";
			
			echo"<table id='ie'>";
			echo"<tr><th>Tên thiết bị</th><th>Số lượng</th><th></th></tr>";
			while($row2=mysql_fetch_array($check)){
				echo "<tr><td>".$row2['TenTB']."</td>";
				echo" <td>".$row2['SoLuong']."</td>";
				
				echo"<td></br><button type='submit' class='btn btn-danger' val='".$row2['MaTB']."' id='del'>Xóa</button></td></tr>";
			
			}
			echo "</div>";
			}



?>
</body>
</html>