	<div class="header">
		<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link image dari folder image -->
	</div>
	<div class="sidebox">
	<h1> Keterangan : </h1>
		<p>Silakan Isi Form Tersebut</p>
	</div>
	<div class = "isi">
	<!-- HOME -->
	<?php echo "
		<ul>
			<li><a href=\"indexAdmin.php?username_admin=$username_admin_enc\">Home</a> </li>
		</ul>";
	?>
	<fieldset>
		<form method="POST">
			Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input username customer -->
			<input type="text" name="username_customer" value="<?php if (isset($_POST['username_customer'])) echo htmlspecialchars($_POST['username_customer']) ?>">
			<span><?php if (isset($errors['username_customer'])) echo $errors['username_customer'];
					?></span><!-- menampilkan pesan error --><br><br>
			Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input nama customer -->
			<input type="text" name="nama_customer" value="<?php if (isset($_POST['nama_customer'])) echo htmlspecialchars($_POST['nama_customer']) ?>">
			<span><?php if (isset($errors['nama_customer'])) echo $errors['nama_customer'];
					?></span><!-- menampilkan pesan error --><br>
			Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<input type="radio" name="jk_customer" value="laki-laki"  checked> Laki-laki
			<input type="radio" name="jk_customer" value="perempuan">Perempuan<br>
			Alamat(Kota) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input alamat customer -->
			<input type="text" name="alamat" value="<?php if (isset($_POST['alamat'])) echo htmlspecialchars($_POST['alamat']) ?>">
			<span><?php if (isset($errors['alamat'])) echo $errors['alamat'];
					?></span><!-- menampilkan pesan error --><br><br>
			Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input tanggal lahir customer -->
			<input type="date" name="tanggal_lahir" value="<?php if (isset($_POST['tanggal_lahir'])) echo htmlspecialchars($_POST['tanggal_lahir']) ?>">
			<span><?php if (isset($errors['tanggal_lahir'])) echo $errors['tanggal_lahir'];
					?></span><!-- menampilkan pesan error --><br><br>
			Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input email customer -->
			<input type="text" name="email_customer" value="<?php if (isset($_POST['email_customer'])) echo htmlspecialchars($_POST['email_customer']) ?>">
			<span><?php if (isset($errors['email_customer'])) echo $errors['email_customer'];
					?></span><!-- menampilkan pesan error --><br><br>
			No Telephone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
			<!-- input no telephone customer -->
			<input type="text" name="no_telephone_customer" value="<?php if (isset($_POST['no_telephone_customer'])) echo htmlspecialchars($_POST['no_telephone_customer']) ?>">
			<span><?php if (isset($errors['no_telephone_customer'])) echo $errors['no_telephone_customer'];
					?></span><!-- menampilkan pesan error --><br><br>
			Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
			<!-- input password customer -->
			<input type="password" name="password_customer" value="<?php if (isset($_POST['password_customer'])) echo htmlspecialchars($_POST['password_customer']) ?>">
			<span><?php if (isset($errors['password_customer'])) echo $errors['password_customer'];
					?></span><!-- menampilkan pesan error --><br><br>
			Confirm Password :
			<!-- input confirm password customer -->
			<input type="password" name="c_password" value="<?php if (isset($_POST['c_password'])) echo htmlspecialchars($_POST['c_password']) ?>">
			<span><?php if (isset($errors['c_password'])) echo $errors['c_password'];
					?></span><!-- menampilkan pesan error --><br><br>
			Tambahkan Rekening :
			<input list="noRekening" name="no_rekening" value="<?php if (isset($_POST['no_rekening'])) echo htmlspecialchars($_POST['no_rekening']) ?>">
			<!-- membuat dropdown no rekening customer yang bersangkutan -->
			<datalist id="noRekening">
				<?php
					selectOneAllRowDB($statement, "trekening", "no_rekening");
					foreach ($statement as $rekening ) {
						echo "<option value=\"{$rekening['no_rekening']}\">";
					}
				?>
			</datalist>
			<span><?php if (isset($errors['no_rekening'])) echo $errors['no_rekening'];
					?></span><!-- menampilkan pesan error --><br><br>
			<!-- submit -->
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="Reset">
		</form>
	</fieldset>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>