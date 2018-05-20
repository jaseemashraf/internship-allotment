<?php
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
	{	$apply= 0;
		$dp_id= 0;
		$fname= strtoupper($_POST['fname']);
		$lname= strtoupper($_POST['lname']);
		$id_no= strtoupper($_POST['id_no']);
		$password= $_POST['password'];
		$email= $_POST['email'];
		$dept= $_POST['dept'];
		$gender= $_POST['gender'];
		if ($dept == 'CSE') 
		{
			$dp_id=1;
		}
		elseif ($dept == 'CVE') 
		{
			$dp_id=2;
		}
		elseif ($dept == 'ECE')
		{
			$dp_id=3;
		}
		elseif ($dept == 'EEE') {
			$dp_id=4;
		}
		elseif ($dept == 'MEE') {
			$dp_id=5;
		}
		else
		{
			$dp_id=6;
		}
		$query3 = "SELECT * FROM student_cgpa WHERE id='$id_no'";
		$sqlsearch3 = mysqli_query($conn, $query3);
		$rescount3=mysqli_num_rows($sqlsearch3);
		
		$query = "SELECT * FROM student WHERE id='$id_no'";
		$sqlsearch = mysqli_query($conn, $query);
		$rescount=mysqli_num_rows($sqlsearch);
		 if($rescount3<1)
		 {
			$idMessage = "Student details not found. Contact HOD for further actions.";
		}
		elseif($rescount>0)
		{
			$idMessage = "This ID no. is already registered.";
		}
		else
		{
			$stmt = $conn->prepare("INSERT INTO student (fname,lname,id,password,email,dept,gender,apply,dp_id) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('sssssssii', $fname, $lname, $id_no, $password, $email, $dept, $gender, $apply,$dp_id);
			if( $stmt->execute())
			{
				header("Location: student_login.php");
				die();
			} 
			else 
			{
				echo "Error";
			}; // mysqli_query($conn, "INSERT INTO student (fname,lname,id,password,email,dept,cgpa,gender) VALUES ($fname,$lname,$id_no,$password,$email,$dept,$cgpa,$gender)");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<script>	
	function validatePassword() {
				if(	document.getElementById('password').value === document.getElementById('password_confirm').value) {
					return true;
				} else {
					alert('password and password confirmation doesnt match');
					return false;
				}
			}
			</script>
		<title>presidency university online internship registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="User Profile Form A Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css"> 
		<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<style>
		.header h1 
		{
 			// position: relative;
			font-size:60px;
			//top:8px;
			height: 60px;
		}
		.header img 
		{
  			float:left;
  			width: 70px;
  			height: 80px;
  			background: #555
			top:0;
			padding:0px;
		}
		.login_button
		{
	  		background-color: blue;
	  		float: right;
	  		border: none;
	  		color: white;
	  		padding: 16px 32px;
	  		text-align: center;
	  		font-size: 16px;
	  		margin: 20px 30px;
	  		opacity: 0.6;
	  		transition: 0.3s;
	  		display: inline-block;
	  		text-decoration: none;
	  		cursor: pointer;
		}
		.cap
		{
			text-transform: capitalize;
		}
	</style>
	</head>
	<body>
	<div class="header">
		<a href="home.html"><img src="images/logo.png" /></a>
		<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b><br/>
	</div>
	<button class="login_button" onclick="window.location.href='student_login.php'">LOGIN</button>
		<h1>Student Register here</h1>
		<div class="w3-main">
			<div class="form-w3l">
				<form action="student_register.php" method="POST" onsubmit="return validatePassword();">
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" class="cap" name="fname" placeholder="First name" required/>
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" class="cap" name="lname" placeholder="Last name" required=""/>
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" name="id_no" placeholder="Id no." required=""/>
					<div onmousemove="myFunction()" onmouseout="clearCoor()">
						<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
						<input id="password" type="password" name="password" placeholder="password" required=""/>
						<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
						<input id="password_confirm" type="password" name="confirm_password" placeholder="Confirm password" required=""/>
					</div>
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="email" name="email" placeholder="info@example.com" required=""/>
					<span><i class="fa fa-mortar-board w3l-1" aria-hidden="true"></i></span> 
					 <select name="dept">
						  <option value="CSE">CSE</option>
						  <option value="CVE">CVE</option>
						  <option value="ECE">ECE</option>
  						  <option value="EEE">EEE</option>
						  <option value="MEE">MEE</option>
						  <option value="PEE">PEE</option>
					</select> 
					</br></br>
					<span><i class="fa fa-male w3l-1" aria-hidden="true"></i></span>
					<input type="radio" name="gender"  value="M" required="">Male
					<input type="radio" name="gender" value="F" required="">Female
					<div class="w3l-btn">
					</br>
						<p id="demo"></p>
						<input type="submit" name="submit" value="sign up"/>
					</div>
				</form>
			</div>
		</div>
		<footer>©2017, PRESIDENCY UNIVERSITY. all rights reserved.</footer>
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