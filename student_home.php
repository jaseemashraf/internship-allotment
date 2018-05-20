<?php
	session_start();
	if(!isset($_SESSION['id_no']))
	{
		header("location: student_login.php");
	}
	$host='localhost';
	$user='root';
	$dbpassword='donotgiveup.1';
	$dbname='it_project';
	$conn=new  mysqli($host,$user,$dbpassword,$dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$id_no=$_SESSION['id_no'];
	$sql="SELECT * from student where id='$id_no'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$fname = $row['fname'];
	$lname = $row['lname'];
	$branch = $row['dept'];

?>
<html>
<head>
	<title></title>
	<style>
		.header img 
		{
			background-color: BLUE; 
			float:left;
	 		width: 70px;
			height: 90px;
			background: #555
			top:0;
			padding:0px;
			margin-top: 4px;
			margin-left: 5px;
		}
		.header h1 
		{
			// position: relative;
			font-size:40px;
			//top:8px;
			float: top;
			margin-top: 3px;
			background-color:#27adf5;
					}
		table 
		{
  			border-collapse: separate;
  			border-spacing: 20px 0;
		}

		td 
		{
		  	padding: 5px 0;
		}
		.card 
 		{
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin:auto;
			  text-align: center;
			  font-family: arial;

		}

		.title 
		{
		  color: grey;
		  font-size: 22px;
		}

		button 
		{
		  border: none;
		  outline: 0;
		  display: inline-block;
		  padding: 8px;
		  color: white;
		  background-color: #000;
		  text-align: center;
		  cursor: pointer;
		  width: 100%;
		  font-size: 18px;
		}

		a 
		{
		  text-decoration: none;
		  font-size: 22px;
		  color: black;
		}

		button:hover, a:hover
		{
		  opacity: 0.7;
		}
	</style>
</head>
<body bgcolor="   #dde5ea  ">
	<div id="header-container">
		<div class="header">
			<a href=" "><img src="images/logo.png" /></a>
			<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b><br/>
				<br/>
			</h1>
		</div>
	</div>
	<table>
	<tr>
		<td>
			<iframe src="student_choice.php" height="520" width="900" frameborder="0"></iframe>
		</td>
		<td bgcolor="#fcfeff " width="400">
			<div class="card">
	  			<img src="index.png" style="width:100%">
	  			<h1><?php echo $id_no; ?></h1>
	  			<p class="title"><?php echo $fname; echo "  ".$lname." "; ?></p>
	  			<p><?php echo $branch; ?></p>
	 			<p><button onclick="window.location.href='student_logout.php'">LOGOUT</button></p>
			</div>
		</td>
	</tr>
	</table>
</body>
</html>