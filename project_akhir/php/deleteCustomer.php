<?php 
	//memanggil file yang dibutuhkan
	require "cekPermissionAdmin.php";
	include "connectionPDO.php";
	include "databaseCRUD.php";
	$username_admin_enc = $_GET['username_admin'];//mendapatkan nilai dari username_admin yang di enkripsi
	deleteUser_enc($statement, $_GET, "tcustomer", "id_customer");//memanggil function untuk delete customer pada tabel customer berdasarkan id customer
	if ($statement->rowCount()>0) {
		header("Location:indexAdmin.php?username_admin=$username_admin_enc&id_customer=".base64_encode($_GET['id_customer']));//ke halaman indexAdmin dengan membawa nilai username admin dan id customer
	}

?>
