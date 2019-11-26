<div class="header">
	<!-- IMAGE untuk header -->
	<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar">
</div>
<div class="sidebox">
	<h1> Keterangan : </h1>
	<p>Pilih No Rekening sesuai dengan No Rekening mana yang akan anda pakai.</p>
	<p>Rekening tujuan diisi dengan No rekening nasabah yang ingin dituju.</p>
	<p>Nominal diisi dengan berapa besar uang yang akan anda transfer dalam satuan rupiah.</p>
</div>
<div class="isi">
	<!-- kembali ke homer dengan membawa value username_customer dan id_customer -->
	<?php echo "
		<ul>
			<li><a href=\"../index.php?username_customer=$username_customer_enc&id_customer=$id_customer_enc\">Home</a> </li>
		</ul>";
	?>          
	<br>
	<!-- untuk menampilkan tanggal dan waktu serta keterangan pagi, siang, sore dan malam -->
	<?php
		echo "Tanggal : <b>".date('d-M-Y')."</b> ";
		date_default_timezone_set('Asia/Jakarta');
		$jam=date("H:i:s");
		echo "| Pukul : <b>". $jam." "."</b>";
		$a = date ("H");
		if (($a>=5) && ($a<=11)){
			echo "<b>, Selamat Pagi !!</b>";}
		else if(($a>11) && ($a<=15)){
			echo ", Selamat Siang !!";}
		else if (($a>15) && ($a<=18)){
			echo ", Selamat Sore !!";}
		else { 
			echo ", <b> Selamat Malam </b>";}
	?> 
	<br>
	<h2>Silakan Transaksi</h2>
	<fieldset>
	<form method="POST">
	<!-- membuat dropdown list dari no rekening berdasarkan id_customer -->
	<label for="no_rekeningA">Pilih No.Rekening :</label>
	<select name="no_rekeningA" id="no_rekeningA">
	 	<option value="initial">[pilih no rekening]</option>
	 	<?php 
 			selectOneDB_enc($statement, $_GET, "tmbanking", "no_rekening", "id_customer");//memanggil function dari file databaseCRUD.php yang digunakan untuk select no_rekening berdasarkan id_customer
 			$trace = 0;
 			foreach ($statement as $rekening ) {//mengeluarkan value dari hasil function selectOneDB  diatas
 					$trace++;
 				echo "<option value=\"{$rekening['no_rekening']}\">{$rekening['no_rekening']}</option>";
 			}
	 	 ?>
	 </select>
		<span><?php if (isset($errors['no_rekeningA'])) echo $errors['no_rekeningA'];//menampilkan pesan error ketika terdapat error pada $errors['no_rekeningA'] (no_rekening pengirim) ketika nilai di set
			?></span><br>
			<br>
	Rekening Tujuan &nbsp;&nbsp;:
	<!-- input no_rekening penerima -->
 	<input list="noRekening" name="no_rekening" value="<?php if (isset($_POST['no_rekening'])) echo htmlspecialchars($_POST['no_rekening']) ?>">
 	<!-- membuat datalist seluruh rekening -->
		<datalist id="noRekening">
			<?php
				selectOneAllRowDB($statement, "tmbanking", "no_rekening");//function untuk seluruh rekening dari tabel tmbanking
				foreach ($statement as $rekening ) {//mengeluarkan value dari hasil function selectOneAllRowDB  diatas
					echo "<option value=\"{$rekening['no_rekening']}\">";
				}
			?>
		</datalist>
		<span><?php if (isset($errors['no_rekening'])) echo $errors['no_rekening'];//menampilkan pesan error ketika terdapat error pada $errors['no_rekening'] (no_rekening penerima) ketika nilai di set
			?></span><br>
			<br>
	Nominal Transfer &nbsp;:
	<!-- input nominal transfer -->
	<span class="currency">Rp</span>
	<input type="text" name="saldo_rekening" value="<?php if (isset($_POST['saldo_rekening'])) echo htmlspecialchars($_POST['saldo_rekening']) ?>">
		<span><?php if (isset($errors['saldo_rekening'])) echo $errors['saldo_rekening']; //menampilkan pesan error ketika terdapat error pada $errors['saldo_rekening'] (nominal transfer) ketika nilai di set
					?></span><br>
					<br>
	<!-- submit -->
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="submit" value="Transfer">
	</form>
	</fieldset>
</div>
<div id="footer">
	<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
</div>