<?php 
	/*memanggil file-file yang dibutuhkan*/
	require "cekPermissionCustomer.php";
	include "connectionPDO.php";
	include "databaseCRUD.php";
	include "cekUser_ini.php";
	$username_customer_enc = $_GET['username_customer'];//get nilai dari username_customer
	$id_customer_enc = $_GET['id_customer'];//get nilai dari id_customer

	cekIdCustomer("id_customer", "tcustomer");//memanggil function untuk cek id customer
	cekUsernameCustomer("username_customer", "tcustomer");//memanggil function untuk cek username customer

?>
<!DOCTYPE html>
<html lang = "id">
<head>
	<title>profile customer</title>
	<link rel="stylesheet" type="text/css" href="../css/profileCostumer.css"><!-- link ke css pada folder css -->
</head>
<body>
	<div class="header">
		<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link image pada folder image -->
	</div>
	<div class="sidebox">
	<h1> Keterangan : </h1>
		<p>Berikut adalah profile anda</p>
		<p>Apabila ingin menyunting profile anda, silakan tekan tombol edit</p>
	</div>
	<div class ="isi">
	<!--link ke homer degan membawa nilai username_customer  -->
	<?php echo "
		<ul>
			<li><a href=\"../index.php?username_customer=$username_customer_enc\">Home</a> </li>
		</ul>";
	?>
		<fieldset>
			<legend>
				My Profile
			</legend>
				<?php 
					$cek_enc = base64_encode(0);//enkripsi
					selectOneRowDB_enc($statement, $_GET, "tcustomer", "id_customer");//memanggil function untuk select saru baris pada tabel tcustomer berdasarkan id_customer
					foreach ($statement as $tcustomer) {// mengeluarkan nilai select dari pemanggilan function diatas
						echo " Username &emsp;&emsp;&nbsp; : {$tcustomer['USERNAME_CUSTOMER']} <br>
							   Nama Customer&nbsp;: {$tcustomer['NAMA_CUSTOMER']} <br>
							   Jenis Kelamin&emsp; : {$tcustomer['JK_CUSTOMER']} <br>
							   Alamat &emsp;&emsp;&emsp;&nbsp;&nbsp; : {$tcustomer['ALAMAT']} <br>
							   Tanggal Lahir&emsp; : {$tcustomer['TANGGAL_LAHIR']} <br>
							   Email &emsp;&emsp;&emsp;&emsp; : {$tcustomer['EMAIL_CUSTOMER']} <br>
							   No Telephone&emsp; : {$tcustomer['NO_TELEPHONE_CUSTOMER']} <br>
							   Daftar Rekening : <br>
							   ";
										selectOneDB_enc($statement, $_GET, "tmbanking", "no_rekening", "id_customer");//memanggil function untuk select on_rekening pada tabel trekening berdasarkan id_customer
										if ($statement->rowCount()>0) {
											foreach ($statement as $rekening) {//mengeluarkan nilai select dari pemanggilan function diatas
												echo " - {$rekening['no_rekening']}<br> ";
											}
										}
						$username_customer1_enc = base64_encode($tcustomer['USERNAME_CUSTOMER']);//enkripsi
						 echo "	<ul>
									<li><a href=\"editProfile_isCustomer.php?cek=$cek_enc&username_customer=$username_customer1_enc\">Edit</a></li>
								</ul>
								";
					}
				 ?>
		</fieldset>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>
</body>
</html>