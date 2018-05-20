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


    
    $selected_company_ids =  $_POST['company_id'];
    $priorities = $_POST['priority'];

    $stmt = $conn->prepare("INSERT INTO std_cmp (std_id, cmp_id, priority) VALUES (?,?,?)");

    foreach($selected_company_ids as $index=>$value) {
        $stmt->bind_param('sii', $id_no, $value, $priorities[$index]);
        $stmt->execute();
    }
	$sql_update= "update student set apply=1 where id='$id_no'";
	$conn->query($sql_update);
 ?>

 Thank You.  We have noted down your choices. 