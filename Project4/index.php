<?php  
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Utama</title>
	<style>
		body {
			font-family: algerian;
		}
		select {
			width: 99%;
		}
		fieldset{
			width: 50%;
			background-color: blue;
			margin-left: 325px;
		}
		h1, legend {
			text-align: center;
		}
		table{
			background-color: cyan;
			margin-left: 50px;
		}
		a:link, a:visited {
		  background-color: #f44336;
		  color: white;
		  padding: 10px 20px;
		  margin-left: 50px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}

		a:hover, a:active {
		  background-color: red;
		}

	</style>
</head>
<body>
	<fieldset>
		<legend>Halaman Utama</legend>
		<?php include'menubar.inc'?>
		<table cellpadding="10" cellspacing="0">
			<tr>
				<td rowspan="6"><img src="./saya1.jpg" alt="fotosaya" width="150" height="200" ></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>Moh. Sabhan</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td>160411100078</td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td>Teknik Informatika</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td>Teknik</td>
			</tr>
			<tr>
				<td>Perguruan Tinggi</td>
				<td>:</td>
				<td>Universitas Trunojoyo Madura</td>
			</tr>
		</table>
</fieldset>
<?php
	if(!isset($_SESSION['isAdmin'])){
		include 'login.php';
	}
	?>
</body>
</html>