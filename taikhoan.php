<?php 
	 require("connect.php");
		session_start();
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tài khoản</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-image:url(img/index.jpg);
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	background-color: #093;
	text-decoration: none;
}
#iactive { 
background-color:#093;
	}
/* ~~ this fixed width container surrounds the other divs ~~ */
.container {
	width: 960px;
	background-color: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}

/* ~~ the header is not given a width. It will extend the full width of your layout. It contains an image placeholder that should be replaced with your own linked logo ~~ */
.header {
	background-color: #CCC;
}
#left{
	background-color:#FFF;
	float:left;
	margin-left:30px;
	border-radius: 5px;
	box-shadow: 5px 5px 5px #CCCCCC;
	
	}
#right{
	margin-left:30px;
	margin-right: 30px;
	padding: auto;
	background-color:#FFF;
	float:left;
	box-shadow: 5px 5px 5px #CCCCCC;
	border-radius: 5px;
	height:250px;
	width:590px;}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/

.content {
	text-align: left;
}

/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background-color: #CCC49F;
}
.button{
	width:50px;
	height:40px;
	background-color:#F00;
	color:#FFF;
	font-size:14px;
	border-radius: 10px ;
	border-style:inset;
	
	}

/* ~~ miscellaneous float/;
clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the #footer is removed or taken out of the #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
//css bang

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-bottom: 100px;
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
-->
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/slideshow.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script>
	 $(document).ready(function(){
	$(".button").click( function(e){
	 	$confirm=confirm("Bạn thật sự muốn hủy đăng kí?");
		if($confirm==true){
			var madk=$(this).attr('id-phieudk');
			$.ajax({
			 	url: 'del_pdk.php',
				method: 'POST',
				data:{
					madk: madk
					} ,
					success : function() {
						
						window.location.reload();				} 
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
				echo "location.href='login.php';</script>";
				
			} ?>
<?php 
		if(isset($_GET["act"])&&$_GET["act"]=="logout"){
			unset($_SESSION["loged"]);
			echo "<script language='javascript'>alert('Bạn đã thoát');";
				echo "location.href='login.php';</script>";
			setcookie("success", "Bạn đã đăng xuất!", time()+1, "/","", 0);
		}
	?>

<div class="container">
  <div class="header">
    <div align="right"><a href="#"><img src="img/logo.jpg" alt="Insert Logo Here" name="Insert_logo" width="964" height="134" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a></div> 
    <!-- end .header --></div>
  <div class="content">
<ul id="MenuBar1" class="MenuBarHorizontal" style="height:50px">
      <li>
        <div align="center"><a href="index.php">Trang chủ</a> </div>
      </li>
      <li><a href="#" class="MenuBarItemSubmenu">Lịch hội tr&#432;ờng</a>
        <ul>
          <li><a href="lichhoitruong1.php">Hội tr&#432;ờng 1</a></li>
          <li><a href="lichhoitruong2.php">Hội tr&#432;ờng 2</a></li>
        </ul>
      </li>
      <li>
        <div align="center"><a href="hoitruong1.php">Giới thiệu</a> </div>
      </li>
      <li> <div align="center" ><a class="MenuBarItemSubmenu">Chào,<?php echo $_SESSION["username"] ; ?></a></div>
        <ul><li><a href="taikhoan.php" id="iactive">Tài khoản</a></li>
        	<li><?php if(isset($_SESSION["loged"])) echo "<a href='index.php?act=logout'>Đăng xuất</a>" ; ?></li>
        </ul>
             </li>
      </ul>
                <h1 align="center" style="padding-top:10px;">THÔNG TIN NGƯỜI DÙNG</h1>
    <center>
  <table id='customers'> <tr><td rowspan="6"><img src="img/user.png"  width="150px" height="200px"/></td></tr>
      <?php 
	  	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	  	$username= $_SESSION['username'];
		$result=mysql_query("select MaSo from nguoimuon where username='$username'", $cn);
		$arrayms= mysql_fetch_array($result);
		$maso= $arrayms['MaSo'];
		//in thông tin người mượn
		$sql="Select MaSo,hoten, sdt, email from nguoimuon where MaSo='$maso' ";
		$result1=mysql_query($sql,$cn);
		while($row1=mysql_fetch_array($result1)){
				echo "<tr><td>Họ tên:</td><td>".$row1['hoten']."</td></tr>";
				echo "<tr><td>Số điện thoại:</td><td>".$row1['sdt']."</td></tr>";
				echo "<tr><td>Email:</td><td>".$row1['email']."</td></tr>";
			}
		$check=mysql_query("select * from sinhvien where MaSo='$maso'", $cn);
		if(mysql_num_rows($check)==0){
			//chuyển sang bảng gv
			$sql1="Select  c.tenBM from giangvien b, bomon c where b.MaSo='$maso' and b.MaBoMon=c.MaBoMon";
			
			$result2=mysql_query($sql1,$cn);
			echo "<tr><td>Bộ môn:</td><td>";
			while($row=mysql_fetch_array($result2)){
				echo"".$row['tenBM']."";
				}
			echo "</td></tr>";
				}
			else {
				$lop=mysql_query("Select a.malop,a.tenlop from lop a ,sinhvien b where b.MaSo='$maso' and a.MaLop=b.MaLop", $cn);
				echo "<tr><td>Tên lớp:</td><td>";
			while($loprow=mysql_fetch_array($lop))	{
				
				echo"".$loprow['tenlop']."";
			}	$malop=$loprow['malop'];
				echo "</td></tr>";
				echo "<tr><td>Tên ngành:</td><td>";
				$nganh=mysql_query("Select a.tennganh from nganh a ,lop b, sinhvien c where b.MaLop=c.MaLop and a.MaNganh=b.MaNganh and c.MaSo='$maso'", $cn);
				while($nganhrow=mysql_fetch_array($nganh))	{

				echo "".$nganhrow['tennganh'].""; 
				}
				
				echo"</td></tr>";
				
			
			}
			
	  ?>
      </table>
      <br />
      <table id='customers'>
      	<tr><th>Mã số</th><th>Ngày đăng kí</th><th>Ngày mượn</th><th>Hội trường</th><th>Ca</th><th>Mục đích</th><th>Tình trạng</th><th></th></tr>
        
        <?php
		$sql2="select * from phieudk where MaSo='$maso'";
		$kq=mysql_query($sql2,$cn);
				while($row3=mysql_fetch_array($kq)){
				echo "<tr><td>".$row3['MaDK']."</td>";
				echo "<td>".$row3['NgayDK']."</td>";
				echo "<td>".$row3['NgayMuon']."</td>";
				echo "<td>".$row3['MaHT']."</td>";
				echo "<td>".$row3['MaCa']."</td>";
				echo "<td>".$row3['Mucdich']."</td>";
				echo "<td>".$row3['Tinhtrang']."</td>
				      <td> <input type='button' class='button' id-phieudk=".$row3['MaDK']." value='Hủy'></td>
				</tr>";
				}
		
		?>
      </table>
      <br />
    <ul id="MenuBar3" class="MenuBarHorizontal">
      <li><a href="ctu.edu.vn">CTU</a>      </li>
      <li><a href="cit.ctu.edu.vn">CIT</a></li>
      <li><a href="elcit.ctu.edu.vn">E LEARNING</a>      </li>
      <li><a href="#">HTQL</a></li>
    </ul>
  <div class="footer">
    <p><br />
    <br />Khoa Công nghệ Thông tin & Truyền thông - Trường Đại học Cần Thơ<br />

Khu 2, đường 3/2, Phường Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam;<br />

Điện thoại: 84 0292 3831301; Fax: 84 0292 3830841; Email: webmaster@cit.ctu.edu.vn</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>