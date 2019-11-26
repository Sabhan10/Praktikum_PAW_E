<div class="header">
	<!-- link image dari folder Foto -->
	<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar">
</div>
<div class="sidebox">
	<h1> Keterangan : </h1>
	<p> Masukkan USERNAME berupa karakter minimal 5 dan PASSWORD merupakan perpaduan Huruf besar, huruf kecil, dan angka dengan minimal 6 karakter </p>
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
	<legend>Login Admin</legend>
	<form method="POST" action="loginAdmin.php">
		<!-- label username customer -->
		<label for="username_admin">Username &emsp;&emsp;&emsp;&nbsp;:</label> 
		<!-- input username customer -->
		<input name= "username_admin" type="text" id="username_admin" value="<?php if (isset($_POST['username_admin'])) echo htmlspecialchars($_POST['username_admin']) ?>" placeholder="Masukkan Username" size="33"/><br>
		<!-- menampilkan pesan error username customer -->
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><?php if (isset($errors['username_admin'])) echo $errors['username_admin'];
				?></span><br>
		<label for="password_admin">Password &emsp;&emsp;&emsp;&nbsp; :</label>
		<!-- input password customer -->
		<input name= "password_admin" type="password" id="password_admin" value="<?php if (isset($_POST['password_admin'])) echo htmlspecialchars($_POST['password_admin']) ?>" placeholder="Masukkan Password" size="33"/><br>
		<!-- menampilkan pesan error -->
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><?php if (isset($errors['password_admin'])) echo $errors['password_admin'];
				?></span><br>
		<input type="submit" value="Login" name="login">
		<input type="reset" value="Reset" name="reset">
	</form>
	</fieldset>
</div>
<div id="footer">
	<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
</div>