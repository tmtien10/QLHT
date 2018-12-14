<?php 
	 require("connect.php");
		mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		session_start();
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="jquery.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
         	$("#chon").on('change',function()
                         {
            var keyword = $(this).val();
			var act='loc';
            $.ajax(
            {
                url:'ajax_user_search.php',
                type:'POST',
                data:{request:keyword , act:act
				 },
                
                beforeSend:function()
                {
                    $("#customers").html('Đang lọc...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
                },
            });
        });
		
		$("#search").on('change', function(){
			var keyword = $(this).val();
			var act='search';
            $.ajax(
            {
                url:'ajax_user_search.php',
                type:'POST',
                data:{request:keyword , act:act
				},
                
                beforeSend:function()
                {
                    $("#customers").html('Tìm kiếm...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
                },
            });
        });
		$(".btn-success").on('click',function()
                         {
   			var act = 'update'; 
			var maso=$(this).val();
            $.ajax(
            {
                url:'ttuser.php',
                type:'POST',
                data:{act:act, maso:maso},
                
                beforeSend:function()
                {
                    $("#customers").html('Loading...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
					$("#b").hide();
                },
            });
            });	 
			$(".btn-danger").on('click', function(){
			
			var act='del';
			var maso=$(this).val();
			$confirm=confirm("Bạn thật sự muốn xóa?");
			if($confirm==true){
			$.ajax({
				
				url: 'ajax_xuli_user.php',
				type:'POST',
				data: {maso:maso, act:act},
		               
                success:function(response)
         		 {
				
					 window.location.href='user.php';  
			    },
				
			});
		}
		});
		
			
		});
  


</script>
</head>

<body>	<table>
		
<?php 
		if($_POST['request']){
			$act=$_POST['act'];
			$dk=$_POST['request'];
		if ($act=='search'){
		$result=mysql_query("select * from nguoimuon where MaSo='$dk'", $cn);
		     echo"<tr><th style='width:10%'> Mã số</th><th style='width:20%'>Họ tên</th><th style='width:20%'>Email</th><th style='width:26%'>Số điện thoại</th><th>Username</th><th style='width:10%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaSo']."</td>";
				echo "<td>".$row['HoTen']."</td>";
				echo "<td>".$row['Email']."</td>";
				echo "<td>".$row['SDT']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td><button type='submit' class='btn btn-success' value=".$row['MaSo']."><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaSo']."><i class=' glyphicon glyphicon-trash'style='color: white;'></i></button></td></tr>";
		}
				
		}
	else {
			if($dk=='sv'){
				$result=mysql_query("select * from nguoimuon a, sinhvien b where a.MaSo=b.MaSo", $cn);
		     echo"<tr><th style='width:10%'> Mã số</th><th style='width:20%'>Họ tên</th><th style='width:20%'>Email</th><th style='width:26%'>Số điện thoại</th><th>Username</th><th style='width:10%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaSo']."</td>";
				echo "<td>".$row['HoTen']."</td>";
				echo "<td>".$row['Email']."</td>";
				echo "<td>".$row['SDT']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td><button type='submit' class='btn btn-success'  value=".$row['MaSo']."><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaSo']."><i class=' glyphicon glyphicon-trash'style='color: white;'></i></button></td></tr>";
		}	}
		else {
			
			$result=mysql_query("select * from nguoimuon a, giangvien b where a.MaSo=b.MaSo", $cn);
		     echo"<tr><th style='width:10%'> Mã số</th><th style='width:20%'>Họ tên</th><th style='width:20%'>Email</th><th style='width:26%'>Số điện thoại</th><th>Username</th><th style='width:15%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaSo']."</td>";
				echo "<td>".$row['HoTen']."</td>";
				echo "<td>".$row['Email']."</td>";
				echo "<td>".$row['SDT']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td><button type='submit' class='btn btn-success' value=".$row['MaSo']."><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaSo']."><i class=' glyphicon glyphicon-trash'style='color: white;'></i></button></td></tr>";
		}
			
			}
		
		
		}
		}
				?>
                </table>
</body>
</html>