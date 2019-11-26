<?php 
	//memanggil file-file yang dibutuhkan untuk proses pada halaman ini
	require "cekPermissionAdmin.php";
	include "connectionPDO.php";
	include "databaseCRUD.php";
	include "cekUser_ini.php";
	$username_admin_enc = $_GET['username_admin'];//mendapatkan value dari username_admin yang di enkripsi
	$id_customer_enc = $_GET['id_customer'];//mendapatkan value dari id_customer yang di enkripsi
	$username_admin = base64_decode($_GET['username_admin']);//mendapatkan value dari username_admin yang di enkripsi
	$id_customer = base64_decode($_GET['id_customer']);//mendapatkan value dari id_customer yang di enkripsi

	cekUsernameAdmin("username_admin", "tadmin");//memanggil function untuk cek username admin
	cekIdCustomer("id_customer", "tcustomer");//memanggil function untuk cek id customer
?>
<!DOCTYPE html>
<html lang = "id">
<head>
	<title>profile customer</title>
	<link rel="stylesheet" type="text/css" href="../css/profileCostumer.css"><!-- link ke css pada folder css -->
</head>
<body>
	<div class="header">
		<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link foto yang ada pada folder Foto -->
	</div>
	<div class="sidebox">
	<h1> Keterangan : </h1>
		<p>Berikut adalah profile anda</p>
		<p>Apabila ingin menyunting profile anda, silakan tekan tombol edit</p>
	</div>
	<div class = "isi">
		<ul>
			<li><?php echo"<a href = 'indexAdmin.php?username_admin=$username_admin_enc'"?>> Home </a> </li><!-- kembali ke home -->
		</ul>
		<fieldset>
			<legend>
				My Profile
			</legend>
				<?php 
					$cek_enc = base64_encode(0);
					selectOneRowDB_enc($statement, $_GET, "tcustomer", "id_customer");//memanggil funntion untuk select satu row dalam table berdasarkan id customer
					if ($statement->rowCount()>0) {
						foreach ($statement as $tcustomer) {//mengeluarkan isi dari hasil select pada pemanggilan funcion diatas
						echo "	Username &emsp;&emsp;&nbsp; : {$tcustomer['USERNAME_CUSTOMER']} <br>
							   Nama Customer&nbsp;: {$tcustomer['NAMA_CUSTOMER']} <br>
							   Jenis Kelamin&emsp; : {$tcustomer['JK_CUSTOMER']} <br>
							   Alamat &emsp;&emsp;&emsp;&nbsp;&nbsp; : {$tcustomer['ALAMAT']} <br>
							   Tanggal Lahir&emsp; : {$tcustomer['TANGGAL_LAHIR']} <br>
							   Email &emsp;&emsp;&emsp;&emsp; : {$tcustomer['EMAIL_CUSTOMER']} <br>
							   No Telephone&emsp; : {$tcustomer['NO_TELEPHONE_CUSTOMER']} <br>
							   Daftar Rekening : <br>
							   ";
										selectOneDB_enc($statement, $_GET, "tmbanking", "no_rekening", "id_customer");//memanggil function untuk select no_rekening pada tabel tmbanking berdasarkan id_customer
										if ($statement->rowCount()>0) {
											foreach ($statement as $rekening) {//mengeluarkan nilai dari hasil select pada pemanggilan function diatas
												echo " - {$rekening['no_rekening']}<br> ";
											}
										}
						 $username_customer_enc = base64_encode($tcustomer['USERNAME_CUSTOMER']);
						 echo " <ul>
									<li><a href=\"editProfile_isAdmin.php?cek=$cek_enc&username_admin=$username_admin_enc&username_customer=$username_customer_enc\">Edit</a></li>
								</ul>
								";
						}
					}
					
				 ?>
		</fieldset>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>
</body>
</html>