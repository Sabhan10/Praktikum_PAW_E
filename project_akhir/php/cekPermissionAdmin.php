<?php
	session_start();
	//menampilkan halaman login jika session tidak sama dengan isAdmin
	if (!isset($_SESSION['isAdmin'])) 
	{
		header("Location: login.php");
		exit();
	}
	
?>