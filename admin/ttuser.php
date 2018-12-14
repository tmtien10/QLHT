
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
	height:1000px;
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
			
			$("#them").on('click', function(){
			var maso = $("#maso").val();
			var hoten=$("#hoten").val();
			var email = $("#email").val();
			var sdt=$("#sdt").val();
			var username = $("#username").val();
			var pass=$("#pass").val();
			var bomon=$("#bomon").val();
			var lop=$("#lop").val();
			var act='add';
			
			if(maso==""){
				$(".text-warning").html("Mã không được để trống");
				
				}
			else {
            $.ajax(
            {
                url:'ajax_xuli_user.php',
                type:'POST',
                data: {maso:maso, hoten:hoten, email:email, sdt:sdt, username:username, pass:pass, bomon:bomon, lop:lop,act:act},                
                success:function()
          			{
						window.location.href='bomon.php';
						},
            });
			}
        });
       
			       
			$("#update").on('click', function(){
			var maso = $("#maso").val();
			var hoten=$("#hoten").val();
			var email = $("#email").val();
			var sdt=$("#sdt").val();
			var username = $("#username").val();
			var pass=$("#pass").val();
			var bomon=$("#bomon").val();
			var lop=$("#lop").val();
			var act='update';
            $.ajax(
            {
                url:'ajax_xuli_user.php',
                type:'POST',
                data: {maso:maso, hoten:hoten, email:email, sdt:sdt, username:username, pass:pass, bomon:bomon, lop:lop,act:act},                
                success:function()
          			{},
            });
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
      <a href="#">Hội trường</a>
    <a href="#">Thiết bị</a>
    </div>
  <button class="dropdown-btn">User
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
  <div class="active">    <a href="#">Thông tin user</a></div>
    <a href="#">Ngành</a>
    <a href="#">Lớp</a>
    <a href="#">Bộ môn</a>
  </div>
  <a href="#contact">Thống kê </a>
   <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>
	<p style="font-size:30px;color:#000; padding-left:110px"> 
</p><p style="float:right; font-size:14px; margin-right:200px"><a href="user.php">User</a> >Chi tiết</p>
    
    <br />
 
     <?php 
	  	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET ");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	  	$username= $_SESSION['username'];
		$act=$_POST['act'];
		if ($act=='add'){
			    echo"<center><div style='text-align:left; width:900px'>";
				echo" Thông tin người dùng<hr/>";
				echo "Mã số:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='maso' ><br/>";

				echo "Họ tên:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='hoten'><br/>";
				echo "Điện thoại:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='sdt'><br/>";
				echo "Email:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='email' ><br/>";
				echo "Username:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='username'><br/>";
				echo "Password:<br/><input class='form-control' type='text' style='width:400px; margin-left:250px' id='pass'><br/>";
				echo"Phân loại<br/><select id='luachon' class='form-control' style='width:400px; margin-left:250px' >
						<option value=''>Chọn</option>

						<option value='sv'>Sinh viên</option>
						<option value='gv'>Giảng viên </option>
				
				</select><br/> ";
				echo "<div id='bm'>";
				echo" Bộ môn</br>";
				echo"<select name='bomon' class='form-control' style='width:400px; margin-left:250px' id='bomon'>";
				echo"<option value=''>Chọn</option>";
				$bm=mysql_query("select * from bomon", $cn);
				while ($rbm=mysql_fetch_array($bm)){
					echo "<option value=".$rbm['MaBoMon'].">".$rbm['TenBM']."</option>";
					
					}
				echo"</select></div><br>";
				echo "<div id='ng'>";
				echo "Lớp</br>";
				echo"<select name='nganh' class='form-control' style='width:400px; margin-left:250px' id='lop'>";
				$bm=mysql_query("select * from lop", $cn);
				while ($rbm=mysql_fetch_array($bm)){
					echo "<option value=".$rbm['MaLop'].">".$rbm['TenLop']."</option>";
					
					}
				echo"</select></div>";
				echo"</br><center><button type='submit' class='btn btn-primary' id='them'>OK</button> 
      				<input type='reset' class='btn btn-default' /></center>
      			<div class='text-warning'></div></center>
				</div>	";
			
			}
			
	else if($act=='update') {
		$maso=$_POST['maso'];
		//in thông tin người mượn
		$sql="Select MaSo,hoten, sdt, email, username, password from nguoimuon where MaSo='$maso' ";
		$result1=mysql_query($sql,$cn);
		while($row=mysql_fetch_array($result1)){
				echo" Thông tin người dùng<hr/>";
				echo "Mã số:<br/><input class='form-control' type='text' readonly style='width:330px;'  value='".$row['MaSo']."' id='maso'><br/>";

				echo "Họ tên:<br/><input class='form-control' type='text' style='width:330px;'  value='".$row['hoten']."' id='hoten'><br/>";
				echo "Điện thoại:<br/><input class='form-control' type='text' style='width:330px;'  value='".$row['sdt']."' id='sdt'><br/>";
				echo "Email:<br/><input class='form-control' type='text' style='width:330px;' value='".$row['email']."' id='email'><br/>";
				echo "Username:<br/><input class='form-control' type='text' style='width:330px;' value='".$row['username']."' id='username'><br/>";
				echo "Password:<br/><input class='form-control' type='text' style='width:330px;' value='".$row['password']."' id='pass'><br/>"; 
				
			}
		$check=mysql_query("select * from sinhvien where MaSo='$maso'", $cn);
		if(mysql_num_rows($check)==0){
			//chuyển sang bảng gv
			$sql1="Select  c.tenBM from giangvien b, bomon c where b.MaSo='$maso' and b.MaBoMon=c.MaBoMon";
			
			$result2=mysql_query($sql1,$cn);
			echo "Bộ môn: <br/>";
			echo"<input class='form-control' style='width:330px;' type='text' readonly";
			while($row2=mysql_fetch_array($result2)){
				
				echo" value='".$row2['tenBM']."'><br/>";
				}
			echo"<select name='bomon' class='form-control'  style='width:330px;' id='bomon'>";
				$bm=mysql_query("select * from bomon", $cn);
				while ($rbm=mysql_fetch_array($bm)){
					echo "<option value=".$rbm['MaBoMon'].">".$rbm['TenBM']."</option>";
					
					}
				echo"</select></div><br>";
				echo"</br><button type='submit' class='btn btn-primary' id='update'>OK</button>
      			<div id=error></div><div id=sucess></div>";
			
		}
			else {
				
				$lop=mysql_query("Select a.malop,a.tenlop from lop a ,sinhvien b where b.MaSo='$maso' and a.MaLop=b.MaLop", $cn);
				echo "Tên lớp: <br/>";
				echo"<input class='form-control' style='width:330px;' type='text' readonly";
				while($row3=mysql_fetch_array($lop)){
				echo " value='".$row3['tenlop']."'";
				}
				echo "></br>";
				echo"<select name='nganh' class='form-control' style='width:330px;' id='lop'>";
				$bm=mysql_query("select * from lop", $cn);
				while ($rbm=mysql_fetch_array($bm)){
					echo "<option value=".$rbm['MaLop'].">".$rbm['TenLop']."</option>";
					
					}
				echo"</select></div>";
				echo"</br><button type='submit' class='btn btn-success' id='update'>OK</button>
      			<div id=error></div><div id=sucess></div>";
			}
	}?>
   
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