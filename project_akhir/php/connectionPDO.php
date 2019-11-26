<?php /*membuat koneksi database dengan PDO
		Sistem basis data 'mysql',
		nama host ':host=localhost;
		nama basisdata 'bdname=banking'
		username basisdata 'root'
		password ''*/
	 $dbc = new PDO('mysql:host=localhost;dbname=banking','root',''); 
?>