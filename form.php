<!DOCTYPE html>
<html lang="eng">
<head>
	<title>FORM</title>
	<meta charset="utf-8" name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
h4:after {
    content: ' \22D9';
    font-size: 15px;
}
</style>

<body>
	<div class="container">
		<div class="box">
			<div class="button-box">
				<div id="btn1"></div>
				<button type="button" class="toggle-btn" onclick="login()">LOG IN</button>
				<button type="button" class="toggle-btn" onclick="register()">REGISTER</button>
			</div>
				<form id="login" class="form" action="login.php" method="post" onsubmit="return validate()">
					<input type="email" class="input" id="email" name="email" placeholder="email id" autofocus required>
					<input type="password" class="input" id="password" name="password" placeholder="Enter Password" required>
					<input type="checkbox" class="check-box"><span>Remember Password</span>
					<button type="submit" class="submit-btn" value="login">LOG IN</button>
					<div id="acc" onclick="register()"><h4>Click if not a register!</h4></div>
				</form>
				<form id="register" class="form" action="register.php" method="post" onsubmit="return validate()">
					<input type="text" class="input" id="uname" name="uname" placeholder="User name" autofocus required>
					<input type="email" name="email" id="email" class="input" placeholder="Email Id" required>
					<input type="password" name="pass" id="password" class="input" placeholder="Enter Password" size="8" maxlength="8" required>
					<h6 style="color: red;">*password contain A-Z,a-z,0-9,1 special character</h6>
					<input type="checkbox" class="check-box"><span>I agree terms & conditions!</span>
					<button type="submit" value="submit" class="submit-btn">REGISTER</button>
				</form>
		</div>
	</div>
</body>
<script type="text/javascript">
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn1");

	function register(){
		x.style.left = "-400px";
		y.style.left = "7px";
		z.style.left = "99px";
	}

	function login(){
		x.style.left = "7px";
		y.style.left = "400px";
		z.style.left = "-5px";
	}

function validate(){
	var result=true;
	var flag=1;
	var name=document.getElementsByName("uname")[0].value;
	var e=document.getElementsByName("email").value;
	var rpass=document.getElementsByName("pass").value;
	var atindex=e.indexOf('@');
	var dotindex=e.lastIndexOf('.');
	if(name.length<3 || name.length==0) {
	result=false;
	return(result);
	flag=0;
	}if (name.search(/[0-9]/)!=-1) {
		result=false;
		return(result);
		flag=0;
	}
	if(atindex<1 || dotindex>=e.length-2 || dotindex-atindex<3){
		result=false;
		return(result);
		flag=0;
	}
	if(rpass.length<8){
		result=false;
		return(result);
		flag=0;
	}if (rpass.search(/[0-9]/)==-1) {
		result=false;
		return(result);
		flag=0;
	}
	if (rpass.search(/[A-Z]/)==-1) {
		result=false;
		return(result);
		flag=0;
	}if (rpass.search(/[a-z]/)==-1) {
		result=false;
		return(result);
		flag=0;
	}if (rpass.search(/[!\@\#\$\&\*\,]/)==-1) {
		result=false;
		return(result);
		flag=0;
	}else{
		result=true;
		return(result);
		flag=1;
	}
}
</script>
</html>
