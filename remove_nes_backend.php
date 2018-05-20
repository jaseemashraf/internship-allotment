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
	if (isset($_POST['submit']) 
	{
		$id_no= $_POST['search'];
		$query = "SELECT * FROM non_eli_std WHERE id_no='$id_no'";
		$sqlsearch = mysqli_query($conn, $query);
		$rescount=mysqli_num_rows($sqlsearch);

		if($rescount>0)
		{
			$sql = "delete FROM non_eli_std WHERE id_no='$id_no'";
			header("location: remove_nes.php");
		}
		else
		{
			$idMessage= 'Enter a valid Id_no';
		}
	}
?>
