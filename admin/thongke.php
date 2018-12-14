
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js"></script>
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
#chon{
	
	}
.button{
	
	}
#b{}
#formmau{
	
	}
#edit{}
#del{}
#chartjs{
	height: 300px; 
	}

</style>
<script src="jquery.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
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
    newWin.document.write(htmlToPrint);
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
    <a href="lop.php">Lớp</a>
    <a href="bomon.php">Bộ môn</a>
  </div>
<button class="dropdown-btn"> Thống kê
    <i class=" glyphicon glyphicon-triangle-bottom" style="font-size:14px" ></i>
  </button>
  <div class="dropdown-container">
  <div class="active">    <a href="thongke.php">Lượt đăng kí</a></div>
    <a href="tktb.php">Thiết bị</a>
    </div>
       <?php if(isset($_SESSION["loged"])) echo "<a href='panel.php?act=logout'>" ; ?>Đăng xuất </a>

</div>	<p style="font-size:28px;color:#000; padding-left:140px;"> THỐNG KÊ</p>
    <div class="main">
    <i class="glyphicon glyphicon-print" onclick="In_Content('in')"></i> 
<form action="thongke.php" method="POST">
	<div class="input-group" style="width:220px; margin-left:800px; float:right">
    <select name="chon">
    <option value="">All</option>

    <?php $test=mysql_query("Select * from hoitruong", $cn);
	while ($r=mysql_fetch_array($test)){
    	echo "<option value=".$r['MaHT'].">".$r['TenHT']."</option>";
	} ?>
    </select>
    <input type="submit" value="OK" class="btn-default" name="btn1"/>
    </form>
   </div>
   <br />
   <div id="chartjs">
   <div id="in">
              THỐNG KÊ LƯỢT ĐĂNG KÍ<br/>
	  <?php
	  $cn = mysql_connect("localhost", "root","")or die("Could not connect: " . mysql_error());
		$db = mysql_select_db("hoitruong",$cn)or die("Could not select database");
		if(isset($_POST['btn1'])){
			$dk=$_POST['chon'];
			if($dk==""){
				 $sql = "SELECT COUNT(*) AS SOLAN, MONTH(NgayMuon) AS THANG FROM phieudk  GROUP BY MONTH(NgayMuon)";
        $result = mysql_query($sql,$cn) or die('Query failed: ' . mysql_error());
			 $dates = array();
        $counts = array();
			echo"<table id='customers' style='float:left;'>";
			echo"<tr><th style='width:50%'>Tháng</th><th style='width:200px'>Số lượt đăng kí</th></td>";
		       while ($row = mysql_fetch_array($result)) {
				   	$dates[]=$row["THANG"];
					echo "<tr><td>". $row["THANG"]."</td>";
					$counts[]=$row["SOLAN"];	
					echo  "<td>".$row["SOLAN"]."</td></tr>";

			   }
			 $ts=mysql_query("Select count(*) as TONGSO from phieudk", $cn);
			 while($kq=mysql_fetch_assoc($ts)){
				 echo  "<tr><td>Tổng số</td><td>".$kq["TONGSO"]."</td></tr>";

				 }
			echo "</table>";
		
				}
				
			else { $sql = "SELECT COUNT(*) AS SOLAN, MONTH(NgayMuon) AS THANG FROM phieudk where MaHT='$dk' GROUP BY MONTH(NgayMuon)";
        $result = mysql_query($sql,$cn) or die('Query failed: ' . mysql_error());
			 $dates = array();
        $counts = array();
			echo"<table id='customers' style='float:left;'>";
			echo"<tr><th style='width:50%'>Tháng</th><th style='width:200px'>Số lượt đăng kí</th></td>";
		       while ($row = mysql_fetch_array($result)) {
				   	$dates[]=$row["THANG"];
					echo "<tr><td>". $row["THANG"]."</td>";
					$counts[]=$row["SOLAN"];	
					echo  "<td>".$row["SOLAN"]."</td></tr>";
					
			   }
			    $ts=mysql_query("Select count(*) as TONGSO from phieudk where MaHT='$dk'", $cn);
			 while($kq=mysql_fetch_assoc($ts)){
				 echo  "<tr><td>Tổng số</td><td>".$kq["TONGSO"]."</td></tr>";
			 }
			echo "</table>";
		
        
			
			}
		}
			
		else{
        $sql = "SELECT COUNT(*) AS SOLAN, MONTH(NgayMuon) AS THANG FROM phieudk  GROUP BY MONTH(NgayMuon)";
        $result = mysql_query($sql,$cn) or die('Query failed: ' . mysql_error());
			 $dates = array();
        $counts = array();
			echo"<table id='customers' style='float:left;'>";
			echo"<tr><th style='width:50%'>Tháng</th><th style='width:200px'>Số lượt đăng kí</th></td>";
		       while ($row = mysql_fetch_array($result)) {
				   	$dates[]=$row["THANG"];
					echo "<tr><td>". $row["THANG"]."</td>";
					$counts[]=$row["SOLAN"];	
					echo  "<td>".$row["SOLAN"]."</td></tr>";

			   }
			 $ts=mysql_query("Select count(*) as TONGSO from phieudk", $cn);
			 while($kq=mysql_fetch_assoc($ts)){
				 echo  "<tr><td>Tổng số</td><td>".$kq["TONGSO"]."</td></tr>";

				 }
			echo "</table>";
		}
	
        ?>
        </div>
        <script>
var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

var barChartData = {
    labels : <?=json_encode($dates);?>,
    datasets : [

        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,0.8)",
            highlightFill : "rgba(151,187,205,0.75)",
            highlightStroke : "rgba(151,187,205,1)",
            data :<?=json_encode($counts);?>
        }
    ]

}
window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
        responsive : true
    });
}

</script>
  <div style="float:right">      <canvas id="canvas" height="450" width="600"></canvas></div>
  </div>  
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