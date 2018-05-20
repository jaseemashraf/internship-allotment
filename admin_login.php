<?php
	$idMessage = '';

    if(isset($_POST['Login']))
    {
        $con = mysqli_connect('localhost', 'root', 'donotgiveup.1', 'it_project');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($con, 'select * from admin where uname="'.$username.'" and password="'.$password.'"');
        if(mysqli_num_rows($result)==1)
        {
			session_start();
            $_SESSION['name']=$_POST['username'];
			header('Location: admin_home.php');
            die();
        }
        else
        {   
            $idMessage = "Ivalid username and password.";
        }
    }
?>
<html>
	<head>
		<title> Admin page</title>
		<style>

					body {     display: block;     margin: 0px !important; }
					.header img {
				  		float:left;
				  		width: 70px;
				  		height: 80px;
				 		background: #555
						top:0;
						padding:0px;
					}

					.content img{
						width: 100%;
				  		height: 90%;
					}
					#content-container {
						height:100%;
						width:100%;
						background-image: url("images/uni.jpg");
				       		 background-repeat: no-repeat;
					} 

					.footer {
				 
				  		text-align: center;
				  		position:relative;
				  
					}
					.header h1 {
				 		// position: relative;
						font-size:60px;
						//top:8px;
						height: 60px;
					}

					.floating-box {
					    float: left;
					    width: 150px;
					    height: 75px;
					    margin: 10px;
					    border: 3px solid #C71585;  
					}


					.imgcontainer {
					    text-align: center;
					    margin: 24px 0 12px 0;
					}

					img.avatar {
					    width: 40%;
					    border-radius: 50%;
					}

					.container {
					    padding: 16px;
					}

					span.psw {
					    float: right;
					    padding-top: 16px;
					}
		</style>
	</head>
	<body bgcolor="">
		<form action="admin_login.php" method="POST">
			<div id="header-container">
				<div class="header">
					<a href=" "><img src="images/logo.png" /></a>
					<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b><br/>
						<br/>
					</h1>
				</div>
			</div>
			<div id="content-container">
				<div class="content">
					<br/><br/><br/><br/><br/><br/>
	
					<h2 align="center" >Office purpose only </h2>

					<label for="Username" ><b>Username:</b></label>
					<input type="text" id="username" name="username" /><br/><br/>

					<label for="password"><b>Password:</b></label>
					<input type="Password" id="Password" name="password" /><br/><br/>
					<input type="submit" value="Login" name="Login" /><br/>



				</div>
			</div>
			<div id="footer-container">
				<div class="footer">
					<h3> ©2017, PRESIDENCY UNIVERSITY. all rights reserved.</h3>
				</div>
			</div>
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

