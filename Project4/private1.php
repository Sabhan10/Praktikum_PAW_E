<?php
	require 'adminPermission.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Data 1</title>
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
		}
		table{
			background-color: cyan;
			margin-left: 30px;
			text-align: justify-all;
		}
		.menu a:link, a:visited {
		  background-color: #f44336;
		  color: white;
		  padding: 10px 30px;
		  margin-left: 10px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}

		.menu a:hover, a:active {
		  background-color: red;
		}
	</style>
</head>
<body>
	<div class="menu">
		<a href='http://localhost/PAW_2019/Project4/index.php'>Home</a>
		<a href='http://localhost/PAW_2019/Project4/private2.php'>Detail Data 2</a>
		<a href='http://localhost/PAW_2019/Project4/logout.php'>Logout</a>
	</div>
	<fieldset>
		<legend>Data Detil 1</legend>
			<table>
				<tr>
						<td>Nama Panggilan</td>
						<td>:</td>
						<td>Sabhan</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>Laki-Laki</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>Kaduara Timur</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><a href="mailto:mohammadsabhan007@gmail">mohammadsabhan007@gmail.com</a></td>
					</tr>
			</table>
	</fieldset>
</body>
</html>