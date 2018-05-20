<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: admin_login.php");
	}
?>
<html>
<head>
	<title></title>
	<style>
		iframe
		{
			margin-top: 20px;
			margin-left: 20px;
			border-style: none;
		}
		.header img 
		{
			float:left;
			width: 80px;
			height: 100px;
			background: #555
		}
		.header h1 
		{
			// position: relative;
			font-size:60px;
			//top:8px;
			height: 60px;

		}
	</style>
</head>
<body>
	<div id="header-container">
		<div class="header">
			<a href="admin_home.php"><img src="images/logo.png" /></a>
			<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b>
				<br/><br/>
			</h1>
		</div>
	</div>
	<iframe src="cv.php" height="490" width="1250px"></iframe>
</body>
</html>