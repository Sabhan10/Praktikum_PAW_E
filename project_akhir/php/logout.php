<?php 
	session_start();//memulai session, digunakan untuk autentifikasi, yaitu mekanisme untuk mengatur hak akses suatu halaman web
	if ($_SESSION['isCustomer'] == true) {//jika session == customer,maka unset dan menuju ke index
		unset($_SESSION['isCustomer']);
		header("Location: ../index.php");
	}
	else{//jika session == admin,maka unset dan menuju ke indexAdmin
		unset($_SESSION['isAdmin']);
		header("Location: indexAdmin.php");
	}
 ?>