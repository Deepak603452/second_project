<!DOCTYPE html>
<html>
<head>
	<title>background_video</title>
</head>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		font-family: sans-serif; 
	}
	.main{
		width: 100%;
		height: 100Vh;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.main video{
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		object-fit: cover;
		pointer-events: none;
		opacity: 0.4;
	}
	.text{
		position: relative;
		font-size: 20px;
		text-align: center;
		max-width: 1000px;
		margin: 0px auto;
		z-index: 1;
	}
	h1{
		text-transform: uppercase;
		color: royalblue;
		font-size: 4em; 
	}
	p{
		color: crimson;
		font-size: 1em; 
	}
	span{
		color: white;
	}
	span:hover{
		color: red;
		font-size: 1.5em;
	}

</style>

<body>
<div class="main">
	<video autoplay muted loop>
		<source src="video-bg.mp4" type="video/mp4">
	</video>
	<div class="text">
		<h1>DEEPAK <span>&#10084</span> kalpna</h1>
		<p>hello how are you!............................................................................................hello world hello world!...........................hello how are you!............................................................................................hello world hello world!...........................hello how are you!............................................................................................hello world hello world!...........................</p>
	</div>
</div>
</body>
</html>
