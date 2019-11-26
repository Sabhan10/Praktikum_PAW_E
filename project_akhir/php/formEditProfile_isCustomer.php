<?php 	
    selectOneRowDB_enc($statement, $_GET, "tcustomer", "username_customer");//select one row dari tabel tcustomer berdasarkan username customer
   	if ($cek == 0) {//yang dilakukan jika $cek == 0
   		foreach ($statement as $tcustomer) {//mengeluarkan value dari select pada pemanggilan function diatas
	    	$_POST['username_customer'] = $tcustomer['USERNAME_CUSTOMER'];
	    	$_POST['nama_customer'] = $tcustomer['NAMA_CUSTOMER'];
	    	$_POST['jk_customer'] = $tcustomer['JK_CUSTOMER'];
	    	$_POST['alamat'] = $tcustomer['ALAMAT'];
	    	$_POST['tanggal_lahir'] = $tcustomer['TANGGAL_LAHIR'];
	    	$_POST['email_customer'] = $tcustomer['EMAIL_CUSTOMER'];
	    	$_POST['no_telephone_customer'] = $tcustomer['NO_TELEPHONE_CUSTOMER'];
	    }
   	}
 ?>
 <div class="header">
 	<!-- link image dari folder Foto -->
	<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar">
</div>
<div class="sidebox">
	<h1> Keterangan : </h1>
	<p>Silakan Edit Profile anda</p>
</div>
<div class = "isi">
	<!-- home -->
	<?php echo "
		<ul>
			<li><a href=\"../index.php?username_customer=$username_customer_enc\">Home</a> </li>
		</ul>";
	?>
	<fieldset>
	<form method="POST">
		Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input username customer -->
		<input type="text" name="username_customer" value="<?php if (isset($_POST['username_customer'])) echo htmlspecialchars($_POST['username_customer']) ?>" readonly>
		<!-- menampilkan pesan error username customer-->
		<span><?php if (isset($errors['username_customer'])) echo $errors['username_customer'];
				?></span><br><br>
		Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input nama customer -->
		<input type="text" name="nama_customer" value="<?php if (isset($_POST['nama_customer'])) echo htmlspecialchars($_POST['nama_customer']) ?>" readonly>
		<!-- menampilkan pesan error nama customer -->
		<span><?php if (isset($errors['nama_customer'])) echo $errors['nama_customer'];
				?></span><br><br>
		Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<input type="text" name="jk_customer" value="<?php if (isset($_POST['jk_customer'])) echo htmlspecialchars($_POST['jk_customer']) ?>" readonly>
		<span><?php if (isset($errors['jk_customer'])) echo $errors['jk_customer'];
				?></span><br><br>
		Alamat(Kota) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input alamat customer -->
		<input type="text" name="alamat" value="<?php if (isset($_POST['alamat'])) echo htmlspecialchars($_POST['alamat']) ?>" readonly>
		<!-- menampilkan pesan error alamat customer -->
		<span><?php if (isset($errors['alamat'])) echo $errors['alamat'];
				?></span><br><br>
		Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input tanggal lahir customer -->
		<input type="date" name="tanggal_lahir" value="<?php if (isset($_POST['tanggal_lahir'])) echo htmlspecialchars($_POST['tanggal_lahir']) ?>" readonly>
		<!-- menampilkan pesan error tanggal lahir customer -->
		<span><?php if (isset($errors['tanggal_lahir'])) echo $errors['tanggal_lahir'];
				?></span><br><br>
		Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input email customer -->
		<input type="text" name="email_customer" value="<?php if (isset($_POST['email_customer'])) echo htmlspecialchars($_POST['email_customer']) ?>">
		<!-- menampilkan pesan error email customer -->
		<span><?php if (isset($errors['email_customer'])) echo $errors['email_customer'];
				?></span><br><br>
		No Telephone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<!-- input no telephone customer -->
		<input type="text" name="no_telephone_customer" value="<?php if (isset($_POST['no_telephone_customer'])) echo htmlspecialchars($_POST['no_telephone_customer']) ?>" readonly>
		<!-- menampilkan pesan error no telephone customer -->
		<span><?php if (isset($errors['no_telephone_customer'])) echo $errors['no_telephone_customer'];
				?></span><br><br>
		Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<!-- input password customer -->
		<input type="password" name="password_customer" value="<?php if (isset($_POST['password_customer'])) echo htmlspecialchars($_POST['password_customer']) ?>">
		<!-- menampilkan pesan error password customer -->
		<span><?php if (isset($errors['password_customer'])) echo $errors['password_customer'];
				?></span><br><br>
		Confirm Password :
		<!-- input confirm password customer -->
		<input type="password" name="c_password" value="<?php if (isset($_POST['c_password'])) echo htmlspecialchars($_POST['c_password']) ?>">
		<!-- menampilkan pesan error confirm password customer -->
		<span><?php if (isset($errors['c_password'])) echo $errors['c_password'];
				?></span><br>
		<input type="submit" name="submit" value="Update">
		<input type="reset" name="reset" value="Reset">
	</form>
	</fieldset>
	</div>
	<div id="footer">
	<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>