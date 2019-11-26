	<div class="header">
		<!-- link image ke folder Foto -->
		<img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar">
	</div>
	<div class="sidebox">
	<h1> Keterangan : </h1>
		<p>Silakan Isi Form Tersebut</p>
	</div>
	<div class = "isi">
	<!-- home -->
	<?php echo "
		<ul>
			<li><a href=\"indexAdmin.php?username_admin=$username_admin_enc\">Home</a> </li>
		</ul>";
	?>
	<fieldset>
		<form method="POST">
			Tambahkan Rekening &nbsp; :
			<!-- input no rekening -->
			<input list="noRekening" name="no_rekening" value="<?php if (isset($_POST['no_rekening'])) echo htmlspecialchars($_POST['no_rekening']) ?>">
			<datalist id="noRekening">
			<!-- dropdown no rekening customer yang bersangkutan  -->
			<?php
				selectOneAllRowDB($statement, "trekening", "no_rekening");//memanggil function untuk select no rekening pada tabel trekening
				foreach ($statement as $rekening) {//mengeluarkan value hasil select pada pemanggilan function diatas
				echo "<option value=\"{$rekening['no_rekening']}\">";
					}
			?>
			</datalist>
			<span><?php if (isset($errors['no_rekening'])) echo $errors['no_rekening'];//menampilkan pesan error
							?></span><br>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="Reset">
		</form>
	</fieldset>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>