<?php
	session_start();
	//menampilkan halaman login jika session tidak sama dengan isCustomer
	if (!isset($_SESSION['isCustomer'])) 
	{
		header("Location: ./php/login.php");
		exit();
	}
?>