<?php   
	session_start();
	session_destroy(); 
	header("location:/IT/admin_login.php"); 
	exit();
?>