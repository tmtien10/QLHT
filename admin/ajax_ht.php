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
<script src="jquery.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
		 $("#formmau").hide();
		 $("#formmau2").hide();
		 $(".alert-success").hide();
		 
		 
        $("#add").on('click',function()
                         {
   			$("#formmau").show();
            });
        $("#close").on('click', function(){
				$("#formmau").hide();
			
			});
		$("#cloupd").on('click',function()
			{
				$("#formmau2").hide();
				
				}
		
		);
		$(".btn-success").on('click',function()
          {
   			var act='update';
			var maHT=$(this).val();
			$.ajax({
				
				url: 'updateht.php',
				type:'POST',
				data: {maHT:maHT, act:act},
		            
                beforeSend:function()
                {
                    $("#customers").html('Tìm kiếm...');
                    
                },     
                success:function(data)
          {		$("#customers").html(data);
		  
		  	}
				
            });

            });
		
		$("#search").on('change', function(){
			var keyword = $(this).val();
            $.ajax(
            {
                url:'ajax_ht.php',
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
		$("#addnew").on('click', function(){
			var mabmad = $("#mabm").val();
			var tenbmad=$("#tenbm").val();
			var actad='add';
			if(mabmad==""){
				$(".text-warning").html("Mã không được để trống");
				
				}
			else{
            $.ajax(
            {
                url:'ajax_nganh.php',
                type:'POST',
                data: {mabm:mabmad, tenbm:tenbmad, act:actad},                
                success:function(response)
          {
                window.location.href='nganh.php'; 

			    },
            });}
        });
		
		  
       
					
			
			$(".btn-danger").on('click', function(){
			
			var act='del';
			var mabm=$(this).val();
			var tenbm='a';
			$confirm=confirm("Bạn thật sự muốn xóa?");
		if($confirm==true){
			$.ajax({
				
				url: 'ajax_nganh.php',
				type:'POST',
				data: {mabm:mabm, tenbm:tenbm, act:act},
		               
                success:function(response)
         		 {
					 
					 window.location.href='nganh.php'; 
			    },
				
			});
		}
		});
		
		
		});
  </script>

</head>

<body>
		<table width="1000px">

<?php 
		if($_POST['request']){
			$dk=$_POST['request'];
		$result=mysql_query("select * from HOITRUONG where MaHT='$dk'", $cn);
		
		echo"<tr><th style='width:30%'> Mã ngành</th><th style='width:30%'>Tên ngành</th><th>Số chỗ</th><th>Địa điểm</th><th style='width:10%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaHT']."</td>";
				echo "<td>".$row['TenHT']."</td>";
				echo "<td>".$row['SoCho']."</td>";
				echo "<td>".$row['DiaDiem']."</td>";
				echo "<td><button type='submit' class='btn btn-success' id='update' value='".$row['MaHT']."'><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaHT']." id='del'><i class='glyphicon glyphicon-trash'></i></button></td></tr>";

				}
			
	
			
		
		}
				?>
                </table>
</body>
</html>