
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
		$("#ht").on('change', function(){
			var keyword = $(this).val();
			if(keyword==""){
				window.location.href="tktb.php";
				
				
				}
            $.ajax(
            {
                url:'ajax_tk.php',
                type:'POST',
                data:{MaHT:keyword},
                
                beforeSend:function()
                {
                    $("#customers").html('...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
                },
            });
        });
			
			
			});
			
  
    function In_Content(strid){   
   var divToPrint = document.getElementById(strid);
    var htmlToPrint = '' +
        '<style type="text/css">' + 'table{'+ 'border-collapse:collapse' + '}' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        'border-collapse:collapse;' + '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
	newWin.document.write("<center><b>THỐNG KÊ TRANG THIẾT BỊ</b><br/>");
    newWin.document.write(htmlToPrint);
	newWin.document.write("</center>");
    newWin.print();
    newWin.close();
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
 <a href="#panel.php" >Đơn đăng kí</a>
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
    <a href="lop.php">Lớp</a>
    <a href="bomon.php">Bộ môn</a>
  </div>
<button class="dropdown-btn"> Thống kê
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
      <a href="thongke.php">Lượt đăng kí</a>
<div class="active" >   <a href="tktb.php">Thiết bị</a></div>
    </div>
       <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>
	<p style="font-size:28px;color:#000; padding-left:140px;"> THỐNG KÊ THIẾT BỊ</p>
    <div class="main">

    <i class="glyphicon glyphicon-print" onclick="In_Content('customers')"></i> 
	<div class="input-group" style="width:220px; margin-left:800px; float:right">
	<?PHP echo"<select name='ht' class='form-control' style='width:300px;' id='ht'>";
				echo "<option value=''>ALL</option>";
				$bm=mysql_query("select * from hoitruong", $cn);
				while ($rbm=mysql_fetch_array($bm)){
					echo "<option value=".$rbm['MaHT'].">".$rbm['TenHT']."</option>";
					
					}
				echo "</select>";
					?>

   </div>
   <br />

   <hr />
        <table id='customers'>
	<?php 
	  	
		$result=mysql_query("select DISTINCT a.MaTB,b.TenTB, a.SoLuong  from chitiettb as a , thietbi as b  where a.MaTB=b.MaTB
group by a.MaTB", $cn);
		     echo"<tr><th style='width:30%'> Mã thiết bị</th><th style='width:30%'>Tên thiết bị</th><th style='width:10%'>Số lượng</th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaTB']."</td>";
				echo "<td>".$row['TenTB']."</td>";

				$matb=$row['MaTB'];
				$dem=mysql_query("SELECT SUM(SoLuong) as soluong FROM `chitiettb` WHERE MaTB='$matb'", $cn);
				while ($raw=mysql_fetch_assoc($dem)){
				echo "<td>".$raw['soluong']."</td></tr>";
					}

				}
				$dem=mysql_query("SELECT SUM(SoLuong) as soluong FROM `chitiettb`", $cn);
				while ($rew=mysql_fetch_assoc($dem)){
				echo "<tr><td colspan='2'>Tổng cộng</td><td>".$rew['soluong']."</td></tr>";
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