<?php 
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: admin_login.php");
	}
	$idMessage = '';
	$host='localhost';
	$user='root';
	$dbpassword='donotgiveup.1';
	$dbname='it_project';
	$conn=new  mysqli($host,$user,$dbpassword,$dbname);
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['submit']))
	{
		$com_name= $_POST['com_name'];
		$cse= $_POST['cse'];
		$cve= $_POST['cve'];
		$mee= $_POST['mee'];
		$eee= $_POST['eee'];
		$ece= $_POST['ece'];
		$pee= $_POST['pee'];
		$cgpa= $_POST['min_cgpa'];
		
		$query = "SELECT * FROM company WHERE name='$com_name'";
		$sqlsearch = mysqli_query($conn, $query);
		$rescount=mysqli_num_rows($sqlsearch);

		if($rescount>0)
		{
			$idMessage = "This Company is already registered.";
		}
		else
		{
			$stmt = $conn->prepare("INSERT INTO company (name, min_cgpa, cse_vac, cve_vac, mee_vac, eee_vac, ece_vac, pee_vac) VALUES (?,?,?,?,?,?,?,?)");
			$stmt->bind_param('sdiiiiii', $com_name, $cgpa, $cse, $cve, $mee, $eee, $ece, $pee);
			if( $stmt->execute())
			{
				header("Location: company_register.php");
				die();
			} 
			else 
			{
				echo "Error";
			} // mysqli_query($conn, "INSERT INTO student (fname,lname,id,password,email,dept,cgpa,gender) VALUES ($fname,$lname,$id_no,$password,$email,$dept,$cgpa,$gender)");
		}
	}
?>
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
	<form method="POST">
		<br/><br/>
		<h2 align="center" >Enter the company details and register </h2>
		<table bgcolor="#a1daff" align="center" cellpadding="5" cellspacing="5" border="0">
			<tr>
				<td>Company name:</td>
				<td><input type="text" name="com_name" placeholder="Enter name of company" required=""></td/>
			</tr>
			<tr>
				<td>Vaccancy</td>
			</tr>
			<tr>
				<td><input type="number" name="cse" placeholder="CSE" min="0" required=""></td/>
				<td><input type="number" name="cve" placeholder="CVE" min="0" required=""></td/>
				<td><input type="number" name="eee" placeholder="EEE" min="0" required=""></td/>
				<td><input type="number" name="ece" placeholder="ECE" min="0" required=""></td/>
				<td><input type="number" name="mee" placeholder="MEE" min="0" required=""></td/>
				<td><input type="number" name="pee" placeholder="PEE" min="0" required=""></td/>
			</tr>
			<tr>
				<td>Minimum CGPA Required:</td>
				<td><input type="number" name="min_cgpa" step="0.01" min="1" max="10"placeholder="Enter the minimum CGPA demanded by the company"></td/>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
		</table>
	</form>
	<script> 
			<?php
				if($idMessage != '')
			    {
					echo "alert('" . $idMessage . "')";
				}
			?>
	</script>
</body>
</html>