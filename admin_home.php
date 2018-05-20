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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		body {     display: block;     margin: 0px !important; }
		.header img 
		{
			float:left;
	 		width: 70px;
			height: 80px;
			background: #555
			top:0;
			padding:0px;
		}
		.footer {
				 		margin: 100px 0px;
				  		text-align: center;
				  		position:relative;
				  
					}
					.header h1 {
				 		// position: relative;
						font-size:60px;
						//top:8px;
						height: 60px;
					}
		.but
		{
			  display: inline-block;
			  border-radius: 4px;
			  background-color: #f4511e;
			  border: none;
			  color: #FFFFFF;
			  text-align: center;
			  font-size: 28px;
			  padding: 20px;
			  width: 200px;
			  transition: all 0.5s;
			  cursor: pointer;
			  margin: 5px;
			  margin-left: 450px;
		}

		.but span 
		{	
			  cursor: pointer;
			  display: inline-block;
			  position: relative;
			  transition: 0.5s;
		}

		.but span:after 
		{
			  content: '\00bb';
			  position: absolute;
			  opacity: 0;
			  top: 0;
			  right: -20px;
			  transition: 0.5s;
		}

		.but:hover span 
		{
			  padding-right: 25px;
		}

		.but:hover span:after 
		{
		  opacity: 1;
		  right: 0;
		}			
		.button 
		{
    		background-color: #4CAF50; /* Green */
    		border: none;
    		color: white;
    		padding: 10px 20px;
    		text-align: center;
    		text-decoration: none;
    		display: inline-block;
    		font-size: 14px;
    		margin: 50px 40px;
    		cursor: pointer;
    		-webkit-transition-duration: 0.4s;
    		transition-duration: 0.4s;
		}

		.button1
 		{
    		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}

		.button2:hover 
		{
    		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		}
		.btn
		{
			float: right;
			padding: 10px 20px;
			margin-right: 20px;
			 transform: translate(-50%, -50%);
    		-ms-transform: translate(-50%, -50%);
    		background-color: #f1f1f1;
    		color: black;
    		font-size: 16px;
    		border: none;
    		cursor: pointer;
    		border-radius: 5px;
    		text-align: center;
		}
		.btn:hover 
		{
    		background-color: black;
    		color: white;
		}
		
		.switch 
		{
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {display:none;}

		.slider 
		{
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before
		{
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked + .slider 
		{
			background-color: #2196F3;
		}

		input:focus + .slider 
		{
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before 
		{
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round 
		{
			border-radius: 34px;
		}

		.slider.round:before 
		{
			border-radius: 50%;
		}
	</style>
</head>
<body>
	<div id="header-container">
		<div class="header">
			<a href=" "><img src="images/logo.png" /></a>
			<h1 align="center"; style="font-family:algerian"; ><b>PRESIDENCY UNIVERSITY  </b><br/>
				<br/>
			</h1>
		</div>
	</div>
	<button class="btn" onclick="window.location.href='admin_logout.php'">Logout</button>
	<br>
	<button class="button button2" onclick="window.location.href='student_cgpa.php'">Student cgpa entry</button>
	<button class="button button1" onclick="window.location.href='company_register.php'">Company register</button>
	<button class="button button1" onclick="window.location.href='std_view.php'">View registered students list </button>
	<button class="button button2" onclick="window.location.href='company_view.php'">Participating Companies</button>
	<br>
	<button class="but" style="vertical-align:middle" align="center" onclick="window.location.href='allotment.php'"><span>ALLOT</span></button>
	<!--<label class="switch">
  		<input type="checkbox" checked>
  			<span class="slider round"></span>
	</label>-->
	<div id="footer-container">
		<div class="footer">
			<h3> ©2017, PRESIDENCY UNIVERSITY. all rights reserved.</h3>
		</div>
	</div>			
</body>
</html>
