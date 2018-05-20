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
		table, th, tr, td
		{
			border: 1px solid black;
			border-collapse: collapse;
		}
		th,tr,td
		{
			padding: 10px;
		}
	</style>
</head>
<body>
	<table style="width:100%">
		<tr>
			<th>Id NO</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>Branch</th>
			<th>Application Status</th>
		</tr>
			<?php
				session_start();
				if(!isset($_SESSION['name']))
				{
					header("location: admin_login.php");
				}
				$msg= '';
				$host='localhost';
				$user='root';
				$dbpassword='donotgiveup.1';
				$dbname='it_project';
				$conn=new  mysqli($host,$user,$dbpassword,$dbname);
				if ($conn->connect_error) 
				{
    				die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM student order by dp_id,id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
 				{
    						while($row = $result->fetch_assoc()) 
    						{
    							if ($row["apply"]== 1) 
    							{
    								$msg= 'Application submitted';
    							}
    							else
    							{
    								$msg= 'Application not submitted';
    							}
    		?>
    							<tr>
    								<td> <?php echo " ".$row["id"]." "; ?> </td>
    								<td> <?php echo " ".$row["fname"]." "; ?> </td>
    								<td> <?php echo " ".$row["lname"]." "; ?> </td>
    								<td> <?php echo " ".$row["gender"]." "; ?> </td>
    								<td> <?php echo " ".$row["dept"]." "; ?> </td>
    								<td> <?php echo " ".$msg." "; ?></td>
    							</tr>
        	<?php
    						}
				} 
				else 
				{
    				echo "0 results";
				}
				$conn->close();
			?>
    </table>
</body>
</html>