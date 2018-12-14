<!DOCTYPE html>
<html>
<head>
	<title>admin login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
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
	width:200px;
	height:40px;
	background-color:#093;
	color:#FFF;
	font-size:14px;
	margin-top:30px;
	border-style:none;
	border-radius: 10px ;
	box-shadow: 0px 5px 0px #063;
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
form {
  box-sizing: border-box;
  width: 360px;
  margin: 100px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
  padding-bottom: 40px;
  border-radius: 3px;
  text-align:center;
  background-color:#FFF;
}
form h1 {
  box-sizing: border-box;
  padding: 20px;
  background-color:#063;
  color: #FFF;
}
 
input {
  margin: 30px auto 10px;
  width: 200px;
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px #06C;
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background-position: -200px 0;
  background-size: 200px 100%;
  background-repeat: no-repeat;
  color: #069;
}
input:focus, input:valid {
  box-shadow: none;
  outline: none;
  background-position: 0 0;
}
input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
  color: #069;
  font-size: 11px;
  transform: translateY(-20px);
  visibility: visible !important;
}
 

button:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
-->
</style>
</head>
<body>
<h2></h2>
<center>
<form>
	<p style="font-size:24px; color:#FFF; background-color:#093">Admin Login</p>
  <div id="error" style="color: red;"></div></div>
	<input type="text" placeholder="Username" id = "username" name="username">
  <input type="password"  placeholder="Password" id = "password" name="password">
	<button type="button" id="btn_submit" name="btn_submit"class="button"> Đăng nhập</button>
</form>
</button>
<script type="text/javascript">
	$("#btn_submit").on("click", function(){
	var password = $("#password").val();
			var username = $("#username").val();
		var error = $("#error");
		var ok = $("#ok");
 		error.html("");
		ok.html("");
 
		if (username == "") {
			error.html("Tên đăng nhập không được để trống");
			return false;
		}
		if (password == "") {
			error.html("Mật khẩu không được để trống");
			return false;
		}
		
		$.ajax({
		  url: "check_admin.php",
		  method: "POST",
		  data: { username : username, password : password },
		  success : function(response){
		  	if (response == "1") {
		  		ok.html("Đăng nhập thành công");
				window.location.href="panel.php"
			     
		  	}else{
		  		error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
		  	}
		  }
		});
 
	});
</script>
</body>
</html>