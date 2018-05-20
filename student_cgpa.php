<?php 
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: admin_login.php");
	}
	$host='localhost';
	$user='root';
	$dbpassword='donotgiveup.1';
	$dbname='it_project';
	$msg = '';
	$conn=new  mysqli($host,$user,$dbpassword,$dbname);
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_FILES['file'])) {;

		$errors = array();
		//validate whether uploaded file is a csv file
    	$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    	if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        	if(is_uploaded_file($_FILES['file']['tmp_name'])){

				//open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            //skip first line
	            fgetcsv($csvFile);
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE) {
					$id = strtoupper($line[0]);
	            	$conn->query("INSERT INTO student_cgpa (id, cgpa) VALUES ('".$id."','".$line[1]."')");
	            }

				 //close opened csv file
				fclose($csvFile);
				$msg="Student CGPA list uploaded successfully";
            }
        } else {
			$msg = 'Please upload CSV file only';
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
			//position: relative;
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
	<form method="POST" enctype="multipart/form-data">
		<br/><br/>
		<h2 align="center" >Student-Cgpa List</h2>
		<table bgcolor="#a1daff" align="center" cellpadding="5" cellspacing="5" border="0">
			<tr>
				<td>Upload the csv file containing the student-cgpa list:</td>
				<td><input type="file" name="file" id="txtFileUpload" accept=".csv" required=''/></td/>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit"  value="submit"></td>
			</tr>
		</table>
	</form>
	<script>
	  <?php
	   if($msg!= '') {
	  ?>
		   alert('<?php echo($msg) ?>');
	   <?php 
	   }
	   ?>

	</script>

</body>
</html>