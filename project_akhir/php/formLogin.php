<div class="header">
	<!-- link image dari folder Foto -->
	<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar">
</div>
<div class="sidebox">
	<h1> Keterangan : </h1>
	<p> USERNAME dan PASSWORD dapat diperoleh pada saat Anda melakukan Registrasi Internet melalui ATM BANK KRUT. Untuk informasi lebih lanjut hubungi Halo BANK KRUT 1604111.</p>
	<p>USERNAME merupakan kombinasi huruf dan angka dengan panjang karakter minimal 5, sedangkan PASSWORD merupakan perpaduan antara angka dan huruf dengan panjang karakter minimal 6.</p>
</div>
<div class="isi">
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
	<br>
	<br>
	<h1>Selamat Datang di Bank-Krut</h1>
	<h2>"Simpan Uangnya dan Dapatkan Bunganya"</h2>
	<fieldset>
		<legend>Login</legend>
		<form method="POST">
			<!-- label username customer -->
			<label for="username_customer">Username &emsp;&emsp;&emsp;&nbsp; :</label>
			<!-- input username customer -->
			<input name="username_customer" id="username_customer" type="text" value="<?php if (isset($_POST['username_customer'])) echo htmlspecialchars($_POST['username_customer']) ?>" placeholder="Username customer" size="33"/><br>
			<!-- menampilkan pesan error username customer -->
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<span><?php if (isset($errors['username_customer'])) echo $errors['username_customer'];
					?></span><br>
			<!-- label password customer -->
			<label for="password_customer">Password &emsp;&emsp;&emsp;&nbsp;&nbsp; :</label>
			<!-- input password customer -->
			<input name= "password_customer" id="password_customer" type="password" value="<?php if (isset($_POST['password_customer'])) echo htmlspecialchars($_POST['password_customer']) ?>" placeholder="Masukkan Password" size="33"/><br>
			<!-- menampilkan pesan error -->
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<span><?php if (isset($errors['password_customer'])) echo $errors['password_customer'];
					?></span><br>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="submit" value="Login" name="login">
			<input type="reset" value="Reset" name="reset">
		</form>
	</fieldset>
</div>
<div id="footer">
	<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
</div>