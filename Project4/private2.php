<?php
	require 'adminPermission.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Data 2</title>
	<style>
		body {
			font-family: algerian;
		}
		select {
			width: 99%;
		}
		table{
			background-color: red;
			margin-left: 30px;
			text-align: justify-all;
			border: 3px solid red;
		}
		td, th{
			background-color: cyan;
			text-align: center;
		}
		.menu a:link, a:visited {
		  background-color: #f44336;
		  color: white;
		  padding: 10px 30px;
		  margin-left: 30px;
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
		<a href='http://localhost/PAW_2019/Project4/private1.php'>Detail Data 1</a>
		<a href='http://localhost/PAW_2019/Project4/logout.php'>Logout</a>
	</div>
	<table >
	<tr> 
		<th colspan="3"> Riwayat Pendidikan</th>
	</tr>
	<tr>
		<th>Sekolah</th>
		<th>Tahun Masuk - Lulus</th>
		<th>Website</th>
	</tr>
	<tr>
		<td>MI Nurur Rahmah</td>
		<td>2003-2009</td>
		<td><a href="http://sekolah.data.kemdikbud.go.id/index.php/chome/profil/EC29D6F6-4C93-4C31-B08E-A7F56ADC855A">minururrahmah.com</a></td>
	</tr>
	<tr>
		<td>SMPN 2 Larangan Pamekasan</td>
		<td>2009-2012</td>
		<td><a href="http://20527194.siap-sekolah.com/">smpn2lrgpmk.com</a></td>
	</tr>
	<tr>
		<td>SMAN 2 Pamekasan</td>
		<td>2012-2015</td>
		<td><a href="http://sman2pmk.sch.id/">sman2pmk.sch.id</a></td>
	</tr>
	<tr>
		<td>Universitas Trunojoyo Madura</td>
		<td>2016-Sekarang</td>
		<td><a href="https://www.trunojoyo.ac.id">trunojoyo.ac.id</a></td>
	</tr>

	<tr> 
		<th colspan="3"> Mata Kuliah yang diambil</th>
	</tr>
	<tr>
		<th>Nama Matakuliah</th>
		<th colspan="2">Semester</th>
	</tr>
	<tr>
		<td>
		<br>
		Algoritma Pemrograman<br>
		Pendidikan Agama Islam<br>
		Bahasa Inggris<br>
		Matematika<br>
		Logika Informatika<br>
		Pengantar Informatika<br>
		Bahasa Indonesia
		</td>
		<td colspan="2">Semester 1</td>
	</tr>
	<tr>
		<td>
		<br>		
		Struktur Data<br>
		Dasar Pemrograman Web<br>
		Organisasi Komputer<br>
		Fisika Informatika<br>
		Komputasi Aljabar Linier<br>
		Pancasila dan Kewarganegaraan<br>
		Statistika
		</td>
		<td colspan="2">Semester 2</td>
	</tr>
	<tr>
		<td>
		<br>
		Matematika Diskrit<br>
		Sistem Operasi<br>
		Pemrograman Desktop<br>
		Rekayasa Multimedia<br>
		Sistem Basis Data<br>
		Pemrograman Berorientasi Objek<br>
		Penambangan Data
		</td>
		<td colspan="2">Semester 3</td>
	</tr>
	<tr>
		<td>
		<br>		
		Bahasa Formal dan Otomata<br>
		Grafika Komputer<br>
		Jaringan Komputer<br>
		Komputasi Numerik<br>
		Pengelolaan Basis Data<br>
		Sistem Informasi<br>
		Wawasan Teknologi & Komunikasi
		</td>
		<td colspan="2">Semester 4</td>
	</tr>
	<tr>
		<td>
		<br>
		Analisa & Perancangan Perangkat Lunak<br>
		Pengembangan aplikasi Web<br>
		Strategi Algoritma<br>
		Pengolahan Citra<br>
		Interaksi Manusia dan Komputer<br>
		Keamanan Data dan aplikasi<br>
		Technopreneurship
		</td>
		<td colspan="2">Semester 5</td>
	</tr>
	<tr>
		<td>
		<br>
		KP<br>
		KKN<br>
		Kecerdasan Komputasional<br>
		Wawasan Teknologi dan Komunikasi<br>
		Biometrik<br>
		Pengujian Perangkat Lunak<br>
		Proyek Perangkat Lunak<br>
		Sistem Terdistribusi
		</td>
		<td colspan="2">Semester 6</td>
	</tr>
	<tr>
		<td>
		<br>
		KP<br>
		PAW<br>
		SPK<br>
		Metodelogi Peneitian<br>
		Topik Khusus Kecerdasan Komputasional
		<td colspan="2">Semester 7</td>
	</tr>
	</table>
</body>
</html>