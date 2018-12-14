
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
<title>Bảng điều khiển</title>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style type="text/css">
body {
    font-family: "Lato", sans-serif;
	background-color:#ECE9FE;
}

/* Fixed sidenav, full height */
.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
    padding: 20px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
    color: #f1f1f1;
}

/* Main content */
.main {
    margin-left: 120px; /* Same as the width of the sidenav */
    font-size: 20px; /* Increased text to enable scrolling */
    padding: 10px 10px;
	height:800px;
	background-color:#FFF;
	margin-right:10px;
	width:1100px;
	box-shadow: 5px 0px 0x #CCC;
}

/* Add an active class to the active dropdown button */
.active {
    background-color: green;
    color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
}

/* Optional: Style the caret down icon */

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
#button{
	background-color: #093;
	border-style:none;
	box-shadow: 0px 5px 0px #063;
	
	}
/css bảng
customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-bottom: 100px;
	margin-top:20px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
	
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


}
#background{
   position: absolute;
    background: gray;
    left: 0px;
    top: 0px;
}
img{
	border-radius:50%;
-moz-border-radius:50%;
-webkit-border-radius:50%;
	}
#chon{}
.button{
	
	}
#b{}
#formmau{
	
	}
#edit{}
#del{}
#formmau2{}
#maup{}
#tenup{}

</style>
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
   			$("#formmau2").show();
			
			$("#tenup").val('' +$(this).val());

			$("#maup").val($(this).attr('mabm'));
			$("#nganhup").val($(this).attr('manganh'));
            });
		
		$("#search").on('change', function(){
			var keyword = $(this).val();
            $.ajax(
            {
                url:'ajax_lop_search.php',
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
			var nganh=$("#nganh").val();
			var actad='add';
			if(mabmad==""){
				$(".text-warning").html("Mã không được để trống");
				
				}
			else {
            $.ajax(
            {
                url:'ajax_lop.php',
                type:'POST',
                data: {mabm:mabmad, tenbm:tenbmad, act:actad, nganh:nganh},                
                success:function(response)
          {
                window.location.href='lop.php'; 

			    },
            });
			}
        });
		$("#update").on('click', function(){
			
			var act='update';
			var mabm=$("#maup").val();
			var tenbm=$("#tenup").val();
			var nganh=$("#nganhup").val();
			$.ajax({
				
				url: 'ajax_lop.php',
				type:'POST',
				data: {mabm:mabm, tenbm:tenbm, act:act,nganh:nganh},
		               
                success:function(response)
          {			$(".alert-success").show();
					$(".alert-success").html("Update thành công");
					 window.location.href='lop.php'; 
			    },
				
			});
			
			
			
			});
			
			$(".btn-danger").on('click', function(){
			
			var act='del';
			var mabm=$(this).val();
			var tenbm='a';
			$confirm=confirm("Bạn thật sự muốn xóa?");
		if($confirm==true){
			$.ajax({
				
				url: 'ajax_lop.php',
				type:'POST',
				data: {mabm:mabm, tenbm:tenbm, act:act},
		               
                success:function(response)
         		 {
					 
					 window.location.href='lop.php'; 
			    },
				
			});
		}
		});
		
		
		});
  


</script>
</head>

<body>
<?php 
	
		if(!isset($_SESSION["loged"]))	{
				echo "<script language='javascript'>alert('Vui lòng đăng nhập');";
				echo "location.href='admin_login.php';</script>";
				
			} ?>
  <?php 
		if(isset($_GET["act"])&&$_GET["act"]=="logout"){
			unset($_SESSION["loged"]);
			echo "<script language='javascript'>alert('Bạn đã thoát');";
				echo "location.href='admin_login.php';</script>";
			setcookie("success", "Bạn đã đăng xuất!", time()+1, "/","", 0);
		}
	?>

<div class="container">
<div class="content">

<div class="sidenav">
 <center><p style="color:#CCC; font-size:18px"> Chào, <?php echo $_SESSION["username"];?><br />
  <img src="Untitled.png" /><br />
  <i class="glyphicon glyphicon-eye-open" style="color:#0F3"></i>Online</p></center>
  <hr />
  <a href="panel.php" >Đơn đăng kí</a>
  	 <button class="dropdown-btn"> Hội trường
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
      <a href="hoitruong.php">Hội trường</a>
    <a href="thietbi.php">Thiết bị</a>
    </div>
  <button class="dropdown-btn">User
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
      <a href="user.php">Thông tin user</a>
    <a href="nganh.php">Ngành</a>
<div class="active">    <a href="lop.php">Lớp</a></div>
    <a href="bomon.php">Bộ môn</a>
  </div>
<button class="dropdown-btn"> Thống kê
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
      <a href="thongke.php">Lượt đăng kí</a>
    <a href="tktb.php">Thiết bị</a>
    </div>
       <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>	<p style="font-size:28px;color:#000; padding-left:140px;"> LỚP</p>
    <div class="main" class="form-control">

	<button class="btn btn-primary" id="add"  style=" float:left"><i class="glyphicon glyphicon-plus"></i></button>
	<div class="input-group" style="width:220px; margin-left:800px; float:right">
  <input type="text" class="form-control" id='search' style="width:200px"><span class="input-group-addon" ><i class="glyphicon glyphicon-search"></i></span>
   </div>
   <br />
   <hr />
   <div id='formmau' class="form-control" style="height:100px">
   <table>
        	<tr><td>Mã lớp</td><td>Tên lớp </td></tr>
           <tr><td><input type="text" id='mabm' style="float:left" class="form-control" ></td><td style="padding-left:5px">  <input type="text" id='tenbm' style="float:left" class="form-control"></td>
           
          <td style="padding-left:5px"> <select class="form-control" id='nganh' style="width:200px; float:right" >
            		<?php
					$nganh=mysql_query("select manganh, tennganh from nganh",$cn);
                    while($row1=mysql_fetch_array($nganh)){
                    echo "<option value=".$row1['manganh'].">".$row1['tennganh']."</option>";
					} ?>
            </select></td>
            <td style="padding-left:5px"><button class="btn btn-primary" id="addnew" >OK</button>
        	 <button class="btn btn-default" id="close" >Đóng</button>
             <div class="text-warning"></div></td></tr>
            </table>
          
            
           
</div>
     <div id="formmau2" class="form-control" style="height:100px">
     <table>
                	<tr><td>Mã bộ môn</td><td>Tên bộ môn</td></tr>
                    <tr><td style="padding-left:5px"> <input type="text" id="maup" readonly/ class="form-control"></td>
            		<td style="padding-left:5px"><input type="text"  id="tenup" style="width:250px" class="form-control"/></td>
                    <td style="padding-left:5px" ><select class="form-control" id='nganhup' style="width:200px; float:right" >
            		<?php
					$nganh=mysql_query("select manganh, tennganh from nganh",$cn);
                    while($row1=mysql_fetch_array($nganh)){
                    echo "<option value=".$row1['manganh'].">".$row1['tennganh']."</option>";
					} ?>
            </select></td>
          
           <td style="padding-left:5px"><button class="btn btn-primary" id="update" >OK</button>
        	 <button class="btn btn-default" id="cloupd" >Đóng</button><div class=" alert alert-success" style="width:200px; float:right; margin-right:150px;height:30px;padding:5px"></div></td></tr>

   </table>
   </div>

   <hr />
        <table id='customers'>
	<?php 
	  	
		$result=mysql_query("select * from lop", $cn);
		     echo"<tr><th style='width:30%'> Mã lớp</th><th style='width:30%'>Tên lớp</th><th style='width:10%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaLop']."</td>";
				echo "<td>".$row['TenLop']."</td>";
				echo "<td><button type='submit' class='btn btn-success' mabm=".$row['MaLop']." value='".$row['TenLop']."' manganh=".$row['MaNganh']."><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaLop']." id='del'><i class='glyphicon glyphicon-trash'></i></button></td></tr>";

				}
			
		?>
		</table>
</div>


</div>
</div>
<script type="text/javascript">
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

</body>
</html>