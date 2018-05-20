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
			<th>Company name</th>
			<th>CSE Vaccancy</th>
			<th>CVE Vaccancy</th>
			<th>MEE Vaccancy</th>
			<th>EEE Vaccancy</th>
			<th>ECE Vaccancy</th>
			<th>PEE Vaccancy</th>
		</tr>
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
				$conn=new  mysqli($host,$user,$dbpassword,$dbname);
				if ($conn->connect_error) 
				{
    				die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM company";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
 				{
    						while($row = $result->fetch_assoc()) 
    						{
    		?>
    							<tr>
    								<td> <?php echo " ".$row["name"]." "; ?> </td>
    								<td> <?php echo " ".$row["cse_vac"]." "; ?> </td>
    								<td> <?php echo " ".$row["cve_vac"]." "; ?> </td>
    								<td> <?php echo " ".$row["mee_vac"]." "; ?> </td>
    								<td> <?php echo " ".$row["eee_vac"]." "; ?> </td>
    								<td> <?php echo " ".$row["ece_vac"]." "; ?> </td>
    								<td> <?php echo " ".$row["pee_vac"]." "; ?> </td>
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