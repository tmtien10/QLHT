
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
</style>
<script src="jquery.js"></script>
<script language="javascript">
		$(document).ready(function()
                     {
        $("#chon").on('change',function()
                         {
            var keyword = $(this).val();
			var act='loc';
            $.ajax(
            {
                url:'ajax_user_search.php',
                type:'POST',
                data:{request:keyword , act:act
				 },
                
                beforeSend:function()
                {
                    $("#customers").html('Đang lọc...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
                },
            });
        });
		
		$("#search").on('change', function(){
			var keyword = $(this).val();
			var act='search';
            $.ajax(
            {
                url:'ajax_user_search.php',
                type:'POST',
                data:{request:keyword , act:act
				},
                
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
		
		
			 $("#addnew").on('click',function()
                         {
   			var act = 'add';
			$("#b").hide();
            $.ajax(
            {
                url:'ttuser.php',
                type:'POST',
                data:{act:act},
                
                beforeSend:function()
                {
                    $("#customers").html('Loading...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
					
                },
            });
            });
		
		$(".btn-success").on('click',function()
                         {
   			var act = 'update'; 
			var maso=$(this).val();
            $.ajax(
            {
                url:'ttuser.php',
                type:'POST',
                data:{act:act, maso:maso},
                
                beforeSend:function()
                {
                    $("#customers").html('Loading...');
                    
                },
                success:function(data)
                {
                    $("#customers").html(data);
					$("#b").hide();
                },
            });
            });	 
			$(".btn-danger").on('click', function(){
			
			var act='del';
			var maso=$(this).val();
			$confirm=confirm("Bạn thật sự muốn xóa?");
			if($confirm==true){
			$.ajax({
				
				url: 'ajax_xuli_user.php',
				type:'POST',
				data: {maso:maso, act:act},
		               
                success:function(response)
         		 {
				
					 window.location.href='user.php';  
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
 <div class="active">     <a href="user.php">Thông tin user</a></div>
    <a href="nganh.php">Ngành</a>
    <a href="lop.php">Lớp</a>
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

</div>	
	<p style="font-size:28px;color:#000; padding-left:140px;"> User</p>
    <div class="main">

	<div id="b"> <p style="float:left; margin-left:30px"><button id="addnew" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button> </p>
	<div style="float:left; margin-left:200px"><select class="form-control" style="width:150px" id="chon">
		<option value="sv">Sinh viên</option>
        <option value="gv">Giảng viên</option>
    
    </select>  </div>
	<div class="input-group" style="width:220px; margin-left:800px"">
  <input type="text" class="form-control" id='search' style="width:200px"><span class="input-group-addon" ><i class="glyphicon glyphicon-search"></i></span>
   </div></div>
   <hr />
        <table id='customers'>
	<?php 
	  	
		$result=mysql_query("select * from nguoimuon", $cn);
		     echo"<tr><th style='width:10%'> Mã số</th><th style='width:20%'>Họ tên</th><th style='width:20%'>Email</th><th style='width:26%'>Số điện thoại</th><th>Username</th><th style='width:10%'></th></tr>";

		while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['MaSo']."</td>";
				echo "<td>".$row['HoTen']."</td>";
				echo "<td>".$row['Email']."</td>";
				echo "<td>".$row['SDT']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td><button type='submit' class='btn btn-success' id='update1' value=".$row['MaSo']."><i class=' glyphicon glyphicon-pencil'style='color: white;'></i></button> <button type='submit' class='btn btn-danger' value=".$row['MaSo']."><i class=' glyphicon glyphicon-trash'style='color: white;'></i></button></td></tr>";

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