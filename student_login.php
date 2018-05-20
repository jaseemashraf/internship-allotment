<?php
	$idMessage = '';
    if(isset($_POST['Login_button']))
    {
        $con = mysqli_connect('localhost', 'root', 'donotgiveup.1', 'it_project');
        $id_no = $_POST['id_no'];
        $password = $_POST['password'];
        $result = mysqli_query($con, 'select  id,password from student where id="'.$id_no.'" and password="'.$password.'"');
        if(mysqli_num_rows($result)==1)
        {
        	session_start();
            $_SESSION['id_no']=$_POST['id_no'];
            header('Location: student_home.php');
            die();
        }
        else
        {   
            $idMessage = "Ivalid username and password.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>presidency university online internship registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="User Profile Form A Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css"> 
		<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<style>
			.header img
			{
  				float:left;
  				width: 70px;
  				height: 80px;
  				background: #555
				top:0;
				padding:0px;
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
		<div class="header">
				<a href="home.html"><img src="images/logo.png" /></a>
				<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b><br/>
		</div>
		<h1>Students Login here</h1>
		<div class="w3-main">
			<div class="form-w3l">
				<form action="student_login.php" method="post">
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" name="id_no" placeholder="Id no." required=""/>
					<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
					<input type="password" name="password" placeholder="password" required=""/></br></br>
					<!--<a href="forgot_password.html"> <font color="WHITE" >Forgot password?</font></a>-->
					<div class="w3l-btn">
						<input type="submit" name="Login_button" value=" Login"/>
					</div>
					<a href="student_register.php"><font color="WHITE"><u>Register here</u></font></a> </br>If you are not registered to get internship
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
