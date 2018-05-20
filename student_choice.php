<?php
	session_start();
	if (!isset($_SESSION['id_no']))
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
	$sql="SELECT * from student_cgpa  where id='$id_no'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$cgpa  = $row['cgpa'];

	$sql = "SELECT * from student where id = '$id_no'";
	$student_result = $conn->query($sql);
	$student = $student_result->fetch_assoc();
	$applied = $student['apply'];
	$dp_id = $student['dp_id'];
	if($dp_id==1)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and cse_vac > 0";
	}
	elseif($dp_id==2)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and cve_vac > 0";
	}
	elseif($dp_id==3)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and ece_vac > 0";
	}
	elseif($dp_id==4)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and eee_vac > 0";
	}
	elseif($dp_id==5)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and mee_vac > 0";
	}
	elseif($dp_id==6)
	{
		$sql = "SELECT * FROM company Where min_cgpa <= '$cgpa' and pee_vac > 0";
	}
	$company_results = $conn->query($sql);

 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body bgcolor=" #fcfeff ">
		
	<?php
	if($applied == 1) {
	?>
		<strong> You have already applied</strong>
	<?php } 
	elseif ($company_results->num_rows > 0)
 	{
    ?>
	<form action="student_choice_store.php" method="post">
	<table bgcolor="" align="center" cellpadding="5" cellspacing="5" border="0">
	  <thead>
	    <th>Company Name</th>
		<th>Opt in </th>
		<th>Priority</th>
	  </thead>
	  <tbody>
	  <?php
	    $result_count = $company_results->num_rows;
    	while($row = $company_results->fetch_assoc()) {
			$name = $row['name'];
			$company_id = $row['id'];
			echo <<<EOT
<tr>
<td> $name </td>
<td><input type="checkbox" name="company_id[]" value="$company_id" onclick="toggleSelection(event);" ></td>
<td><input type="number" name="priority[]" value="" style="display:none;" id="priority_$company_id" min="1" max="$result_count" ></td>
</tr>
EOT;
		} 
	  ?>
	  	<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
	  </tbody>
	</table>
	</form>
    <?php
	 } 
	?>
	<script>
		function toggleSelection(event) {
			var id = event.target.value;
			var inputElement = document.getElementById('priority_' + id);
			if (event.target.checked) {
				inputElement.style.display = 'block';
			} else {
				inputElement.style.display = 'none';
			}
		}
	</script>
 </body>
 </html>