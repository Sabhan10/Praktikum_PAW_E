<?php 
	if (isset($_POST['Register']) && $_POST['Register'] == 'Register') {
		$surname = $_POST['surname'];
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$Mnumber= $_POST['Mnumber'];
		$passwd = $_POST['passwd'];
		$Cpasswd = $_POST['Cpasswd'];

		$errorSurname = $errorFname = $errorEmail = $errorMnumber = $errorPasswd = $errorCpasswd = "";
		//validasi untuk Surname
		if (empty($surname)) {
			$errorSurname = "Surname tidak boleh kosong";
		}
		else {
			if (!preg_match("/^[a-zA-Z]*$/",$surname)){
				$errorSurname = "surname tidak boleh angka";
			}
		}
		//validasi untuk Fname
		if (empty($fname)) {
			$errorFname = "First Name tidak boleh kosong";
		}
		else {
			if (!preg_match("/^[a-zA-Z]*$/",$fname)){
				$errorFname = "First name tidak boleh angka";
			}
		}
		//validasi untuk email
		if (empty($email)) {
			$errorEmail = "Email tidak boleh kosong";
		}
		else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errorEmail = "Email format Invalid";
			}
		}
		//validasi untuk nomor telpon
		if (empty($Mnumber)) {
			$errorMnumber = "Mobile number tidak boleh kosong";
		}
		else {
			if (!preg_match("/^[0-9]*$/",$Mnumber)){
				$errorMnumber = "Mobile Number harus angka";
			}
			else {
				if (!preg_match("/^\d{10,12}$/", $Mnumber)){
					$errorMnumber = "Panjang Number min 10 max 12";
				}
			}
		}

		//validasi untuk password
		if (empty($passwd)) {
			$errorPasswd = "password tidak boleh kosong";
		}
		else {
			if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/",$passwd)){
				$errorPasswd = "Masukkan huruf Besar, kecil dan angka";
			}
			else {
				if (!preg_match("/^.{8,}$/", $passwd)){
					$errorPasswd = "Panjang password min 8 karakter";
				}
			}
		}
		//validasi untuk confirm password
		if (empty($Cpasswd)) {
			$errorCpasswd = "password tidak boleh kosong";
		}
		else {
			if ($_POST['Cpasswd'] != $_POST['passwd']) {
				$errorCpasswd = "confirm password invalid";
			}
		} 

		if (empty($errorSurname) and empty($errorFname) and empty($errorEmail) and empty($errorMnumber) and empty($errorPasswd) and empty($errorCpasswd)){
			header("Location: login.php?sukses=sukses");
		}
		else {
			header("Location: formLogin.php?pesanSurname=$errorSurname&pesanFname=$errorFname&pesanEmail=$errorEmail&pesanMnumber=$errorMnumber&pesanPasswd=$errorPasswd&pesanCpasswd=$errorCpasswd&surname=$surname&fname=$fname&email=$email&Mnumber=$Mnumber&passwd=$passwd&Cpasswd=$Cpasswd");
		}
	}
 ?>