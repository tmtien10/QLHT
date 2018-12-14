

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
	color: #FFF;
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
	width:250px;
	margin-left:25px;
	
	}
#right{
	
	background-color:#FFF;
	float:right;
	margin-right:25px;
	width:250px;
	
}
#cen{
	background-color:#FFF;
	float:left;
	width:400px;
	padding-left: 10px;
	}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/

.content {
	text-align: left;
}
.content2 {
	padding: 10px 0;
	text-align: left;
	height:500px;
}
.contentimg{
	width:240px;
	float:right;
	position:relative;
	height:230px;
	}
.derc{
	position:absolute; 
    bottombottom:0px; 
    left:0px;  
    width:100%;  
    /* styling bellow */  
    background-color: #093;  
    font-family: 'tahoma';  
    font-size:15px;  
    color:white;  
    opacity:0.8; /* transparency */  
    filter:alpha(opacity=60); /* IE transparency */ 
	}
.derc-cont{
	 padding:10px;  
    margin:0px;  
	}
/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background-color: #CCC49F;
	padding: 20px 20px;
}
.button{
	width:200px;
	height:40px;
	background-color:#093;
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
form{
	background-image:url(img/bg1.jpg);
	}
-->
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/slideshow.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
        <div align="center"><a href="index.php" id="iactive">Trang chủ</a> </div>
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
      </ul>
      <br />
    <center>
    <form action="kq_tk.php" method="post">
    <table width="200" border="0" align="center" cellpadding="20" cellspacing="0" style="background-color: #EEF0FD; color: #009;  box-shadow:2px 2px 2px #999; text-align:center">
      <tr>
        <th scope="col" colspan="2" style="font-size:24px;font-family: 'Courier New', Courier, monospace; "><b>Tìm kiếm</b><hr /></th>
      </tr>
      <tr>
        <td colspan="2"><label for="ngaymuon"></label>
          <input name="ngaymuon" type="date" id="ngaymuon" size="50" placeholder="Ngày mượn" style="width:150px" required="required"/></center></td>
      </tr>
      <tr>
        <td><label for="camuon"></label>
          <select name="camuon" id="camuon" style="width:150px">
          <option value="0">Chọn ca</option>
           <?php 
		   	$ca=mysql_query("select * from ca" , $cn);
			while($row=mysql_fetch_array($ca)){
            echo"<option value='".$row['MaCa']."'>".$row['MaCa']."</option>";} 
			?>
          </select></td></tr>
        <tr><td><label for="sochomuon"></label>
          <input type="text" name="socho" id="sochomuon"  placeholder="Số chỗ" style="width:150px" required="required"/></td>
      </tr>
      <tr>
      	<td colspan="2"><center><input type="submit" name="timkiem" id="timkiem" value="Tìm kiếm" class="button" action="search.php" /></center></td>
      </tr>
    </table>
    </form>
    </center>

    <h2>&nbsp;</h2>
    <br />
    <div class="content2">
    <div id="left">
    		<table border="0" style="background-color:#093; margin:5px; padding-top:10px; text-align:center; color:#FFF" width="240px">
            				  <tr><td><a href="#" style="color:#FFF">Cách thức đăng kí</a></td></tr>
            				  <tr><td><a href="#" style="color:#FFF">Hủy lịch đặt trước</a></td></tr>
                              <tr><td><a href="#" style="color:#FFF">Thủ tục nhận/ trả</a></td></tr>
                              <tr><td><a href="#" style="color:#FFF">Liên hê</a></td></tr>
                              <tr><td><a href="#" style="color:#FFF">Cách thức đăng kí</a></td></tr>
            				  <tr><td><a href="#" style="color:#FFF">Hủy lịch đặt trước</a></td></tr>
                              <tr><td><a href="#" style="color:#FFF">Thủ tục nhận/ trả</a></td></tr>
                              <tr><td><a href="#" style="color:#FFF">Liên hê</a></td></tr>
            </table>
            <center>
            <table border="0" style="background-color:#CCC; margin:5px; padding-top:10px; text-align:center" width="240px">
            
            					<tr><th style="font-size:20px">GIỚI THIỆU</th><tr>
                                
                                <tr><td>Website hỗ trợ đăng kí mượn hội trường<br />
                                
                                		Đặt trước online, đăng kí/ hủy lịch đặt trước nhanh chóng
                                </td></tr>
            
            </table>
            
            </center>
    </div>
    <div id="cen"><p style="font-size:20px"><b>Tin tức và thông báo</b>
            		<br />
                    
    				<p style="font-size:20px; color:#060"> Thông báo sửa chữa hội trường 1</p><br />
                    Hội trường 1 sẽ được sửa chữa đột xuất, lịch đăng kí trước có thể bị thay đổi
                    <a href="#">Xem thêm</a><hr />
                    
    				<p style="font-size:20px; color:#060"> Thông báo sửa chữa hội trường 1</p><br />
                    Hội trường 1 sẽ được sửa chữa đột xuất, lịch đăng kí trước có thể bị thay đổi
                     <a href="#">Xem thêm</a><hr />
            		<br />
                    
    				<p style="font-size:20px; color:#060"> Thông báo sửa chữa hội trường 1</p><br />
                    Hội trường 1 sẽ được sửa chữa đột xuất, lịch đăng kí trước có thể bị thay đổi
                    <a href="#">Xem thêm</a><hr />
                    <a href="#">Xem tất cả</a>
    
    
    </div>
    <div id="right">
   	<p style="font-size:15px"><b>SỰ KIỆN SẮP DIỄN RA </b></p>          <hr />
         <div class="contentimg">    
    			<img src='img/go.jpg' width="240px" />  
    			<div class="derc">  
        		<p class="derc-cont"><b>Nodejs VS Golang- cuộc chiến của những ngôn ngữ lập trình tương lai</b> - Ngày 23/04/2018 tại hội trường 2</p>    
                 </div>  
		</div>  
     
       <div class="contentimg">    
    			<img src='img/nhvl.jpg' width="240px" />  
    			<div class="derc">  
        		<p class="derc-cont"><b>Ngày hội việc làm 2018</b></p>      </div>  
				</div> 
	   </div>       
     </div>
    <br />
    <ul id="MenuBar3" class="MenuBarHorizontal">
      <li><a href="ctu.edu.vn">CTU</a>      </li>
      <li><a href="cit.ctu.edu.vn">CIT</a></li>
      <li><a href="elcit.ctu.edu.vn">E LEARNING</a>      </li>
      <li><a href="#">HTQL</a></li>
    </ul>
  <div class="footer">
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