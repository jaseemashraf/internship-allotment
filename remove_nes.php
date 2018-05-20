<html>
<head>
	<title></title>
	<style>
		.header img 
		{
			float:left;
			width: 100px;
			height: 120px;
			background: #555
		}
		.header h1 
		{
			// position: relative;
			font-size:60px;
			//top:8px;
			height: 60px;

		}
		h2
		{
			margin-left: 30px;
		}
		iframe
		{
			margin-left: 100px;
			border-style: none;
		}
		table
		{
			float: right;
			margin-top: 100px;
			margin-right: 60px;
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
	<br/><br/>
	<h2>LIST OF NON ELIGIBLE STUDENTS</h2>
	<iframe src="view_nes.php" height="400" width="150"></iframe>
		<!-- <table bgcolor="#a1daff" align="center" cellpadding="5" cellspacing="5" border="0">
			<form method="POST">
			<tr>
				<td>Remove Non eligible student</td>
				<td><input type="text" name="search" placeholder="Enter a valid student id_no" required=''></td/>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
		</form>
		</table> -->
</body>
</html>