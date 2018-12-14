
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
	height:auto;
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
 box-sizing: border-box;
  width: 360px;
  margin: 10px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
  padding-bottom: 40px;
  border-radius: 3px;
  padding-left:20px;
  padding-right:20px;
	
	}
#error{
	color: #F00;
	
	
	}
#sucess{
	color: #093;
	}
#btn1{}
#btn2{}
#contenta{
height: 800px;	
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="jquery.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
        $("#btn1").on('click',function()
                         {
            var keyword = $(this).val();
			var tinhtrang='đã xét duyệt';
			$.ajax(
            {
                url:'xetduyet.php',
                type:'POST',
                data:{madk:keyword, stt:tinhtrang
				 },
                success:function(response)
                { if (response=='0'){
                    $("#error").html('Thời gian này đã được đặt trước');
				}
				else if (response=='1'){
					$("#sucess").html('Thành công');
					window.location.href="panel.php";
					}
                },
            });
       
						
        });
		
		   $("#btn2").on('click',function()
                         {
            var keyword = $(this).val();
			var tinhtrang='Hủy';
			$.ajax(
            {
                url:'xetduyet.php',
                type:'POST',
                data:{madk:keyword, stt:tinhtrang
				 },
                success:function(response)
                { if (response=='0'){ 
                    $("#error").html('Có lỗi xảy ra !!!');
				}
				else if (response=='1'){
					$("#sucess").html('Đã hủy');
					window.location.href="panel.php";

					}
                },
            });
       
						
        });
	
					 });
function In_Content(strid){   
    var prtContent = document.getElementById(strid);
    var WinPrint = window.open('','','letf=0,top=0,width=800,height=800');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
}
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
  <div class="active"><a href="#services" >Đơn đăng kí</a></div>
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
      <a href="#">Thông tin user</a>
    <a href="#">Ngành</a>
    <a href="#">Lớp</a>
    <a href="#">Bộ môn</a>
  </div>
  <a href="#contact">Thống kê </a>
   <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>

	<?php $madk= $_POST['request'];
			
	
	?>
    <i class="glyphicon glyphicon-print" onclick="In_Content('contenta')"></i> 
    <div id="contenta">
	<p style="font-size:30px;color:#000; padding-left:110px"> PHIẾU ĐĂNG KÍ #     <?php echo $madk ?>
</p><p style="float:right; font-size:14px; margin-right:200px"><a href="panel.php">Đăng kí</a> >Chi tiết    </p>
    
    <br />
 
   <div style="float:left">
    
     <?php 
	  	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	  	$username= $_SESSION['username'];
		$result=mysql_query("select MaSo from phieudk where MaDK='$madk'", $cn);
		$arrayms= mysql_fetch_array($result);
		$maso= $arrayms['MaSo'];
		//in thông tin người mượn
		$sql="Select MaSo,hoten, sdt, email from nguoimuon where MaSo='$maso' ";
		$result1=mysql_query($sql,$cn);
		while($row=mysql_fetch_array($result1)){
				echo" Thông tin người dùng<hr/>";
				echo "Họ tên:<br/><input class='form-control' type='text' style='width:330px; float:right' readonly value='".$row['hoten']."'><br/>";
				echo "Điện thoại:<br/><input class='form-control' type='text' style='width:330px; float:right'readonly value='".$row['sdt']."'><br/>";
				echo "Mail:<br/><input class='form-control' type='text' style='width:330px; float:right' readonly value='".$row['email']."'><br/>";
			}
		$check=mysql_query("select * from sinhvien where MaSo='$maso'", $cn);
		if(mysql_num_rows($check)==0){
			//chuyển sang bảng gv
			$sql1="Select  c.tenBM from giangvien b, bomon c where b.MaSo='$maso' and b.MaBoMon=c.MaBoMon";
			
			$result2=mysql_query($sql1,$cn);
			echo "Bộ môn: <br/>";
			echo"<input class='form-control' style='width:330px; float:right' type='text' readonly";
			while($row2=mysql_fetch_array($result2)){
				
				echo" value='".$row2['tenBM']."'><br/>";
				}}
			else {
				
				$lop=mysql_query("Select a.malop,a.tenlop from lop a ,sinhvien b where b.MaSo='$maso' and a.MaLop=b.MaLop", $cn);
				echo "Tên lớp: <br/>";
				echo"<input class='form-control' style='width:330px; float:right' type='text' readonly";
				while($row3=mysql_fetch_array($lop)){
				echo " value='".$row3['tenlop']."'";
				}
				echo "></br>";
				$nganh=mysql_query("Select a.tennganh from nganh a ,lop b, sinhvien c where b.MaLop=c.MaLop and a.MaNganh=b.MaNganh and c.MaSo='$maso'", $cn);
				echo "Tên ngành: <br/>";
				echo"<input class='form-control' style='width:330px; float:right' type='text' readonly ";
				while($nganhrow=mysql_fetch_array($nganh))	{
				echo "value='".$nganhrow['tennganh']."'";
				}
			echo"><br/>";
			}
			
	  ?>
      
      </div>
            <div style="float:right">
			
      	<?php 
		$tt=mysql_query("Select * from phieudk where MaDK='$madk'",$cn);
		while($row5=mysql_fetch_array($tt)){
				echo" Thông tin đặt chỗ<hr/>";
				echo "Ngày đăng kí:<br/><input class='form-control' type='text' style='width:330px; float:right' readonly value='".$row5['NgayDK']."'><br/>";
				echo "Ngày mượn:<br/><input class='form-control' type='text' style='width:330px; float:right' readonly value='".$row5['NgayMuon']."'><br/>";
				echo "Hội trường:<br/><input class='form-control' type='text' style='width:330px; float:right' readonly value='".$row5['MaHT']."'><br/>";
				echo "Ca: <br/><input class='form-control' style='width:330px; float:right' type='text' readonly value='".$row5['MaCa']."'><br/>";
				echo "Mục đích: <br/><textarea class='form-control' style='width:330px; float:right' type='text' readonly>".$row5['Mucdich']."</textarea><br/>";

				echo "Tình trạng: <br/><input class='form-control' style='width:330px; float:right' readonly type='text' value='".$row5['Tinhtrang']."'><br/>";
				
				}
			
		?></div></div>
      			</br><button type='submit'  id='btn1' class='btn btn-success' value='<?php echo $madk?>'>Chấp nhận</button> <button type='submit' class='btn btn-danger' id='btn2' value='<?php echo $madk?>'>Từ chối</button>
      
      			<div id=error></div><div id=sucess></div>
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