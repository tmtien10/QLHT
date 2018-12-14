<?php 
	 require("connect.php");
		session_start();
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hội trường</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	height: 800px;
	
	}
#right{
	margin-left:30px;
	margin-right: 30px;
	margin-top: 30x;
	padding: auto;
	float:right;
	width:500px}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/

.content {
	text-align: left;
	height:900px;
}

/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background-color: #CCC49F;
}
.button{
	width:150px;
	height:40px;
	background-color:#093;
	color:#FFF;
	font-size:16px;
	border-style:none;
	box-shadow: 0px 2px 0px 0px #063;
    -moz-box-shadow: 0px 2px 0px 0px #063;
    -webkit-box-shadow: 0px 2px 0px 0px #063;
	border-radius: 20px 20px 20px 20px;
	}

#tb{
	border-radius: 5px 5px 5px;
	box-shadow: #999999;
	background-color:#EAD797;
	padding: 5px;
	width:500px;
	margin-top:16px;
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

#background{
   position: absolute;
    background: gray;
    left: 0px;
    top: 0px;
}
// css slide show

	.slideshow { 
        position:relative; /*Make the slideshow container  position:relative and make the sub elements absolute to position the sub element absolute to the container*/
        height:800px; /*The slide show height*/
        overflow:hidden;
		margin-top: 100px;
    }
    .slideshow div {
        position: absolute;
        left:250px;
        z-index:8;
		top:200px;
    }
    .slideshow div img
    {
        width:360px; /*The image slide show width*/
        height:650px; /*The image slide show height*/
		margin-top:40px;
    }
    .slideshow div.active {
        z-index:10;
    }
    .slideshow div.lastactive {
        z-index:9;
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
<script language="javascript">
	/***************************************************************************************
	* Run when page load
	***************************************************************************************/
	$(document).ready(function()
	{
		initSlideShow();
		
	});
	/***************************************************************************************
	****************************************************************************************/
	function initSlideShow()
	{
		if($(".slideshow div").length > 1) //Only run slideshow if have the slideshow element and have more than one image.
		{
			var transationTime = 5000;//5000 mili seconds i.e 5 second
			$(".slideshow div:first").addClass('active'); //Make the first image become active i.e on the top of other images
			setInterval(slideChangeImage, transationTime); //set timer to run the slide show.
		}
	}
	/***************************************************************************************
	****************************************************************************************/
	
	function slideChangeImage()
	{
		var active = $(".slideshow div.active"); //Get the current active element.
		if(active.length == 0)
		{
			active = $(".slideshow div:last"); //If do not see the active element is the last image.
		}
		
		var next = active.next().length ? active.next() : $(".slideshow div:first"); //get the next element to do the transition
		active.addClass('lastactive');
		next.css({opacity:0.0}) //do the fade in fade out transition
				.addClass('active')
				.animate({opacity:1.0}, 1500, function()
				{
					active.removeClass("active lastactive");	
				});
		 
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
        <div align="center"><a href="hoitruong1.php" ID="iactive">Giới thiệu</a> </div>
      </li>
      <li> <div align="center" ><a class="MenuBarItemSubmenu">Chào,<?php echo $_SESSION["username"] ; ?></a></div>
        <ul><li><a href="taikhoan.php">Tài khoản</a></li>
        	<li><?php if(isset($_SESSION["loged"])) echo "<a href='index.php?act=logout'>Đăng xuất</a>" ; ?></li>
        </ul>
             </li>
      </ul>         <center>  GIỚI THIỆU HỘI TRƯỜNG </center>
           <hr />
      <div id="left">
 <div class="slideshow">
	<div ><a href="#"><img src="img/ht1.jpg" alt="" border="0" /></a></div>
	<div ><a href="#"><img src="img/ht12.jpg" alt="" border="0" /></a></div>
	<div><a href="#"><img src="img/ht23.jpg" alt="" border="0" /></a></div>
</div>   <hr />

</div>
 <div id="right">
 
 		
                 <table id="customers" ><tr><th>Mã hội trường</th><th>Tên hội trường</th><th>Sức chứa</th><th>Địa điểm</th></tr>
   <?php 
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		$db = mysql_select_db("hoitruong",$cn)or die("Could not select database");
	

					  $result=mysql_query("Select MaHT, TenHT, SoCho, DiaDiem from hoitruong ",$cn);
					  
					  while($dong= mysql_fetch_array($result)){
						
						  echo "<tr><td>".$dong['MaHT']."</td>";
						  echo "<td> ".$dong['TenHT']."</td>";
						  echo "<td>".$dong["SoCho"]."</td>";
						  echo "<td>".$dong["DiaDiem"]."</td>";					}
				
	


?>
      </table>               
 </div>   </div>
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