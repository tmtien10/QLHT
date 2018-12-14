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
            $.ajax(
            {
                url:'ajax_xuli.php',
                type:'POST',
                data:'request='+keyword,
                
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
            $.ajax(
            {
                url:'ajax_phieudk_search.php',
                type:'POST',
                data:'request='+keyword,
                
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
		$(".btn-success").on('click', function(){
			var keyword = $(this).val();
            $.ajax(
            {
                url:'xetduyetdk.php',
                type:'POST',
                data:'request='+keyword,
                
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
		
			
			
		});
		</script>
</head>

<body>
		<table>

		<?php 
		if($_POST['request']){
			$dk=$_POST['request'];
		
		$result=mysql_query("select MaDK, NgayDk, NgayMuon, Tinhtrang, MaSo from phieudk where Tinhtrang='$dk' order by NgayDk ASC", $cn);
		     echo"<tr><th style='width:10%'> Mã số</th><th style='width:20%'>Ngày mượn</th><th style='width:20%'>Tình trạng</th><th style='width:28%'>Ngày đăng kí</th><th>Người mượn</th><th style='width:9%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaDK']."</td>";
				echo "<td>".$row['NgayMuon']."</td>";
				echo "<td>".$row['Tinhtrang']."</td>";
				echo "<td>".$row['NgayDk']."</td>";
				echo "<td>".$row['MaSo']."</td>";
				echo "<input type='hidden' name='MaDK' value=".$row['MaDK'].">";

				echo "<td><button class='btn btn-success' value=".$row['MaDK']." ><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button></td></tr>";

				}
		}
				?>
                </table>
</body>
</html>