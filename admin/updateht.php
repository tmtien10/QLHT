
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
<style type="text/css">
body {
    font-family: "Lato", sans-serif;
	background-color:#D8DDFE;
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
	height:1500px;
	background-color:#FFF;
	margin-right:10px;
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
form{

	
	}
#error{
	color: #F00;
	
	
	}
#sucess{
	color: #093;
	}
#btn1{}
#btn2{}
</style>
<script src="jquery.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
		$("#ng").hide();
		$("#bm").hide();
		$("#luachon").on('change',function(){
			var dk=$(this).val();
			
			if(dk=='sv'){ 
			$("#bm").hide();
			$("#ng").show();
			}
			else { 
			
			$("#bm").show();
			$("#ng").hide();}
			
			});        
			
       
			       
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
  <a href="#services" >Đơn đăng kí</a>
  	 <button class="dropdown-btn"> Hội trường
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
    <div class="active">  <a href="#">Hội trường</a></div>
    <a href="#">Thiết bị</a>
    </div>
  <button class="dropdown-btn">User
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
   <a href="#">Thông tin user</a>
    <a href="#">Ngành</a>
    <a href="#">Lớp</a>
    <a href="#">Bộ môn</a>
  </div>
  <a href="#contact">Thống kê </a>
   <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>
	<p style="font-size:30px;color:#000; padding-left:110px"> 
</p><p style="float:right; font-size:14px; margin-right:200px"><a href="hoitruong.php">Hội trường</a> >Chi tiết</p>
    
    <br />
 
     <?php 
	  	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET ");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	  	$username= $_SESSION['username'];
		$act='update';
		 if($act=='update') {
		$maso=$_POST['maHT'];
		//in thông tin
		$sql="Select * from hoitruong where MaHT='$maso' ";
		$result1=mysql_query($sql,$cn);
		while($row=mysql_fetch_array($result1)){
				echo" Thông tin <hr/>";
				echo "Mã hội trường:<br/><input class='form-control' type='text' readonly style='width:330px;'  value='".$row['MaHT']."' id='maHT'><br/>";

				echo "Tên hội trường:<br/><input class='form-control' type='text' style='width:330px;'  value='".$row['TenHT']."' id='tenHT'><br/>";
				echo "Sức chứa:<br/><input class='form-control' type='text' style='width:330px;'  value='".$row['SoCho']."' id='Succhua'><br/>";
				echo "Địa điểm:<br/><input class='form-control' type='text' style='width:330px;' value='".$row['DiaDiem']."' id='Diadiem'><br/>";
				echo"<button type='submit' class='btn btn-success' id='update'>OK</button>
      			<div id=error></div><div id=sucess></div>";
				
			}
		$check=mysql_query("select a.SoLuong, a.MaTB,b.TenTB from chitiettb a, thietbi b where MaHT='$maso' AND a.MaTB=b.MaTB", $cn);
			echo "Danh sách thiết bị: <br/>";
			echo "<div style='float:left'>";
			
			echo"<table id='ie'>";
			echo"<tr><th>Tên thiết bị</th><th>Số lượng</th><th></th></tr>";
			while($row2=mysql_fetch_array($check)){
				echo "<tr><td>".$row2['TenTB']."</td>";
				echo" <td>".$row2['SoLuong']."</td>";
				
				echo"<td></br><button type='submit' class='btn btn-danger' value=".$row2['MaTB']." id='del'>Xóa</button></td></tr>";
			
			}
			echo "</div>";
	}?>

   <div style="float:right; margin-left:400px; width:300px">
       Thiết bị<select id='tb' class="form-control">
   <?php $cmd=mysql_query("select * from thietbi " ,$cn);
   while($kq=mysql_fetch_array($cmd)){
	   echo "<option value=".$kq['MaTB'].">".$kq['TenTB']."</option>";
	   }
	   ?>
   		</select><br />
     Số lượng<input class="form-control" id="sl" /><br />
     <button type='submit' class='btn btn-default' id='add'>Thêm</button>
   
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