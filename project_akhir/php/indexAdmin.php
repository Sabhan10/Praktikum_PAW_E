<?php 
	//memangil file-file yang dibutuhkan untuk proses php
	include "cekPermissionAdmin.php" ;
	include "connectionPDO.php";
	include "databaseCRUD.php";
	include "cekUser_ini.php";
	$username_admin_enc = $_GET['username_admin']; //mendapatkan value dari 'username_admin' yang di enkripsi
	$username_admin = base64_decode($_GET['username_admin']); //mendapatkan value dari 'username_admin' yang di enkripsi kemudian di decrypt
	cekUsernameAdmin("username_admin", "tadmin")//memanggil function untuk cek username admin
?>
<!DOCTYPE html>
<html lang = "id">
<head>
	<title>indexAdmin</title>
	<link rel="stylesheet" type="text/css" href="../css/indexAdmin.css"><!-- kink ke css pada folder css -->
	<?php include "../javascript/javascript.js"; ?>
</head>
<body>
	<div class="header">
		<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link untuk foto pada folder Foto -->
	</div>
	<div class="header2">
		<h1>
			<!-- menampilkan username admin -->
			Hai, <?php echo "$username_admin"; ?> !
		</h1>
		<ul>
			<li> <a href = "logout.php"> Logout </a> </li>
		</ul>
	</div>
	<div class="sidebarkiri">
		<h1> Selamat Datang </h1>
		<p> Anda adalah admin. silakan lakukan apapun yang ingin anda lakukan </p>
	</div>
	
	<div class="isi">
		<br>
		<!-- untuk menampilkan tanggal dan waktu serta keterangan pagi, siang, sore dan malam -->
		<?php
			date_default_timezone_set('Asia/Jakarta');
			echo "Tanggal : <b>".date('d-M-Y')."</b> ";
			$jam=date("H:i:s");
			echo "| Pukul : <b>". $jam." "."</b>";
			$a = date ("H");
			if (($a>=5) && ($a<=11)){
				echo "<b>, Selamat Pagi !!</b>";}
			else if(($a>11) && ($a<=15)){
				echo "<b>, Selamat Siang !!</b>";}
			else if (($a>15) && ($a<=18)){
				echo "<b>, Selamat Sore !!</b>";}
			else { 
				echo ", <b> Selamat Malam </b>";}
		?> 
		<br><br>
		<div>
		<form method="POST">
		<table>
			<tr>
				<th>No</th><th>Username</th><th>Name</th><th>Daftar Rekening</th><th>Action</th>
			</tr>
			<?php 
				selectAllDB($statement, "tcustomer");//memanggil function untuk select seluruh file pada tabel tcustomer
				$count = 0;
				foreach ($statement as $tcustomer) {//mengeluarkan hasil select pada fuction selectAllDB diatas
					$count++;
					echo "<tr>
							<td>$count</td>
							<td>{$tcustomer['USERNAME_CUSTOMER']}</td>
							<td>{$tcustomer['NAMA_CUSTOMER']}</td>
							<td>";
								selectOneDB($statement, $tcustomer, "tmbanking", "no_rekening", "ID_CUSTOMER");//selelct no_rekening dari tabel tmbanking berdasarkan id yang diperoleh dari hasil select pada function selectAllDB diatas
								foreach ($statement as $rekening) {//mengeluarkan hasil select pada fuction selectOneDB diatas
									echo "{$rekening['no_rekening']}<br>";
								}
								//membuat link dengan model list untuk ke halaman profil customer dan add rekening
								$id_customer_enc = base64_encode($tcustomer['ID_CUSTOMER']);
					echo "</td>
						   <td>
								<ul>
									<li> <a href=\"profileCustomer_isAdmin.php?username_admin=$username_admin_enc&id_customer=$id_customer_enc\">Lihat</a></li>

									<li> <a href =\"addRekening.php?username_admin=$username_admin_enc&id_customer=$id_customer_enc\">Tambah Rekening</a></li>
									";?>
									<li> <input type="button" onClick="deleteMethod('<?php echo $id_customer_enc ?>' , '<?php echo $username_admin_enc ?>')" name="delete" value="Delete"></li><!-- membuat button untuk delete customer yang mana jika button di click akan menuju ke function deleteMethod yang berada pada file javascript.js -->
								</ul>
							</td>
						 </tr>
			<?php
				}
			?>
		</table>
		</form>
		</div>
		<?php echo"
		<ul>
			<li> <a href = \"addCustomer.php?username_admin=$username_admin_enc\""?>> Tambah </a> </li>
		</ul>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>
</body>
</html>