<!DOCTYPE html>
<html>
<head>
	<title>animation</title>
</head>

<style>
	*{
		background-color: black;
	}
a{
	animation: bounce 2.5s ease 0s infinite alternate both;
	cursor: pointer;
	color: white;
	margin-right: 100px;
	padding: 10px;
	font-size: 140px;
	position: relative;
	text-decoration: none;
	vertical-align: top;
	margin-top: 100px;
}
    /*content: ' \263A';*/
 @keyframes bounce{
 	0%{
 		top: 5px;
 		box-shadow: 0 0 5px rgba(0,0,0,0.2);
 	}
 	100%{
 		top:  300px;
 		box-shadow: 0 50px 50px rgba(0,0,0,1);
 	}
}
a:hover{
	animation-direction: right;
	font-size: 200px;
}

</style>

<body>
	<center><a href="form.php">&#128526;</a></center>
</body>
</html>