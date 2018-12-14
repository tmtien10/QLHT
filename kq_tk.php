<?php 
	 require("connect.php");
		session_start();
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang chủ</title>
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
	width:100px;
	height:40px;
	background-color:#093;
	color:#FFF;
	border-radius: 25px;
	font-size:14px;
	
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

.popup{
    position: absolute;
    background-color: white;
    border: 1px solid gray;
    z-index: 10000;
    box-shadow: 3px 3px gray;
}
#background{
   position: absolute;
    background: gray;
    left: 0px;
    top: 0px;
}
a.close{
    text-decoration: none;
    float: right;
}
#button1{
	width:60px;
	height:30px;
	background-color:#093;
	color:#FFF;
	
	}
.button2{
	background-color:#093;
	color:#FFF;
	width:60px;
	height:30px;
	}
.box1{
	width:20px;
	border-style: dashed;
	margin-top: 10px;
	}	
#dangkimuon .alert{
	color: #093;
	
	}
-->
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/slideshow.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script>
$(document).ready(function() {
    $(".popup").hide();
 
    $("#button1").click(function(e) {
        openPopup();
		
    });
 
    $(".close").click(function (e) {
        closePopup();
        e.preventDefault();
    });
 
    $("#background").click(function () {
        closePopup();
    });
 	$("#dangkimuon .button2").click(function(){
		
		var ngaymuon= $("#ngaymuon").val();
		var camuon= $("#camuon").val();
		
		var maHT= $("#maHT").val();
		var mucdich= $("#mucdich").val();
		$.ajax({
		  url: "xuli_dk.php",
		  method: "POST",
		  data: { ngaymuon : ngaymuon, camuon : camuon, maHT: maHT, mucdich:mucdich },
		  success : function(result){
			   $("#dangkimuon .alert").html(result);
		  }
		});
		});
});
 
function openPopup(){
    var dheight = document.body.clientHeight;
    var dwidth = document.body.clientWidth;
 
    $("#background").width(dwidth).height(dheight);
 
    $("#background").fadeTo("slow",0.8);
 
    var $popup1=$("#popup1");
    $popup1.css("top", (dheight-$popup1.height())/2);
    $popup1.css("left",(dwidth-$popup1.width())/2);
 
    $popup1.fadeIn();
	 var checkedradio = $('[name="check"]:radio:checked').val();
     $('#maHT').val('' + checkedradio);
}
function closePopup(){
    $("#background").fadeOut();
    $(".popup").hide();
}
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
        <ul><li><a href="taikhoan.php">Tài khoản</a></li>
        	<li><?php if(isset($_SESSION["loged"])) echo "<a href='index.php?act=logout'>Đăng xuất</a>" ; ?></li>
        </ul>
             </li>
      </ul>    <h1 align="center">&nbsp;</h1>
    <p style="margin-left:30px"><b>KẾT QUẢ TÌM KIẾM</b></p>
    <hr />
        <form action="kq_tk.php" method="post">
    <table width="360" border="0" align="center" cellpadding="20" cellspacing="0">
      <tr>
        <td colspan="2"><label for="ngaymuon"></label>
        <center><?php echo"  <input name='ngaymuon' type='date' id='ngaymuon' size='50' value='".$_POST['ngaymuon']."' style='width:230px'/>"?></center></td>
        <td><label for="camuon"></label>
          <select name="camuon" id="camuon" style="width:150px">
          <option value="0">Chọn ca</option>
           <?php 
		   	$ca=mysql_query("select * from ca" , $cn);
			while($row=mysql_fetch_array($ca)){
				if( $row['MaCa']==$_POST['camuon']){
            echo"<option value='".$row['MaCa']."' selected>".$row['MaCa']."</option>";} 
				else echo" <option value='".$row['MaCa']."'>".$row['MaCa']."</option>";
			}
			?>
          </select></td>
        <td><label for="sochomuon"></label>
         <?php echo "<input type='text' name='socho' id='sochomuon' value='".$_POST['socho']."' />"?></td>
      	<td colspan="2"><center><input type="submit" name="timkiem" id="timkiem" value="Tìm kiếm" class="button" action="search.php" /></center></td>
      </tr>
    </table>
    </form>

   <hr />
   <br />
 <center>
    <table id="customers" ><tr><th>Mã hội trường</th><th>Tên hội trường</th><th>Sức chứa</th><th>Địa điểm</th><th></th></tr>
   <?php 
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		$db = mysql_select_db("hoitruong",$cn)or die("Could not select database");
	$ngaydkmuon= $_POST["ngaymuon"];
	$sochodkmuon=$_POST["socho"];
	$cadkmuon=$_POST["camuon"];
	$kq1= mysql_query("select MaHT from hoitruong where SoCho >= $sochodkmuon", $cn);
	if (mysql_num_rows($kq1)==0){
		    echo "Không tim thấy";
			}
		
	else {
		while ($row= mysql_fetch_assoc($kq1))
		{  $ma=$row["MaHT"];
		$sql1="Select NgayMuon, MaHT from phieudk where MaHT='$ma' AND NgayMuon='$ngaydkmuon'";
			$kq2=mysql_query($sql1, $cn);
				if (mysql_num_rows($kq2)==0){
						$makq=$ma;
					  $result=mysql_query("Select MaHT, TenHT, SoCho, DiaDiem from hoitruong where MaHT='$ma'",$cn);
					  
					  while($dong= mysql_fetch_array($result)){
						
						  echo "<tr><td>".$dong['MaHT']."</td>";
						  echo "<td> ".$dong['TenHT']."</td>";
						  echo "<td>".$dong["SoCho"]."</td>";
						  echo "<td>".$dong["DiaDiem"]."</td>";
						  echo "<td><input name='check' type='radio' value=".$dong['MaHT']." /></td></tr>";
					}}
				else {
					while ($row1= mysql_fetch_array($kq2))
					{	$makq=$ma;
					$sql2="Select MaCa, MaHT from phieudk where NgayMuon='$ngaydkmuon' and MaHT='$ma' and MaCa=$cadkmuon";
						$kq3=mysql_query($sql2, $cn);
						if (mysql_num_rows($kq3)==0){
							$result=mysql_query("Select MaHT, TenHT, SoCho, DiaDiem from hoitruong where MaHT='$ma'",$cn);
					  
					  while($dong= mysql_fetch_array($result)){
						  
						  echo "<tr><td>".$dong['MaHT']."</td>";
						  echo "<td> ".$dong['TenHT']."</td>";
						  echo "<td>".$dong["SoCho"]."</td>";
						  echo "<td>".$dong["DiaDiem"]."</td>";
						  echo "<td><input name='check' type='radio' value=".$dong['MaHT']." /></td></tr>";
						   }
							}
					} } 
	
			}
		}
	


?>
</table></center>
<br />
<center><input type="button" id="button1" value="Đăng kí"/></center>
</div>
<!--POPUP CONTENT-->
<div id="popup1" class="popup" style="width:300px;height:450px;">
<div style="background-color:#093"><a href="#" class="close" style=" background-color:red"/>x</a><br /></div>
<div align="center" style="color:white; background-color:#093"><b>Đăng kí hội trường</b></div>
<div align="center" style="margin-top:20px">
<form id='dangkimuon' method="post" onsubmit="return false">
    <table border="0" style="font-size:14px">
	<?php 
	
	
		echo"<tr><td>Ngày mượn </td> <td> <input id='ngaymuon' type='text' size='30' value='".$_POST['ngaymuon']."' class='box1' style='width:100px' readonly/></td></tr>";
		echo"<tr><td>Ca </td><td> <input id='camuon' type='text' size='30' value='".$_POST['camuon']."' class='box1' style='width:100px' readonly/></td></tr>";	
		echo" <tr><td>Sức chứa</td><td> <input name='socho' type='text' size='30' value='".$_POST['socho']."' class='box1' style='width:100px' readonly/></td></tr>";
		echo"<tr><td> Địa điểm</td><td>  <input id='maHT' type='text' size='30' style='width:100px' class='box1' readonly/></td></tr>";
		echo"<tr><td> Mục đích</td><td>  <textarea id='mucdich' rows='5' cols='50' size='30' style='width:100px; height:100px' class='box1'/></textarea></td></tr>";

		echo "<tr><td colspan='2'><br><center><button name='dk' value='OK' class='button2'>OK</button>
		<input type='button' class='close' id='button1' value='close'></center></td></tr>";
	?></table><div class="alert danger"></div></form>
</div>
<!-- END POPUP CONTENT -->



</div>
   <br />
    <ul id="MenuBar3" class="MenuBarHorizontal">
      <li><a href="www.ctu.edu.vn">CTU</a>      </li>
      <li><a href="www.cit.ctu.edu.vn">CIT</a></li>
      <li><a href="www.elcit.ctu.edu.vn">E LEARNING</a>      </li>
      <li><a href="#">HTQL</a></li>
    </ul>
    <div id="background"></div>
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