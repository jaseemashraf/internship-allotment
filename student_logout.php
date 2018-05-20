<?php   
	session_start();
	session_destroy(); 
	header("location:/IT/student_login.php"); 
	exit();
?>