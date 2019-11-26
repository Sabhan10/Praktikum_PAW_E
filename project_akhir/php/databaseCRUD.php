<?php 
	//SQL select All
	function selectAllDB(&$statement, $field_table) {
		global $dbc;
		$statement = $dbc->prepare("SELECT * FROM $field_table");
		$statement->execute();

	}
	//SQL select one All ROW
	function selectOneAllRowDB(&$statement, $field_table, $field_name) {
		global $dbc; 	
		$statement = $dbc->prepare("SELECT $field_name FROM $field_table");
 		$statement->execute();
	}

	//SQL Select All one ROW
	function selectOneRowDB(&$statement, $field_list, $field_table, $field_name) {
		global $dbc;
		$statement = $dbc->prepare("SELECT * FROM $field_table WHERE $field_name = :namanya");
		$statement->bindValue(':namanya', $field_list[$field_name]);
		$statement->execute();
	}
	//SQL Select All one ROW dengan parameter ter enkripsi
	function selectOneRowDB_enc(&$statement, $field_list, $field_table, $field_name) {
		global $dbc;
		$statement = $dbc->prepare("SELECT * FROM $field_table WHERE $field_name = :namanya");
		$statement->bindValue(':namanya', base64_decode($field_list[$field_name]));
		$statement->execute();
	}

	//Select 1 value
	function selectOneDB(&$statement, $field_list, $field_table, $field_name, $field_name2) {
		global $dbc;
		$statement = $dbc->prepare("SELECT $field_name FROM $field_table WHERE $field_name2 = :namanya");
		$statement->bindValue(':namanya', $field_list[$field_name2]);
		$statement->execute();
	}
	//SQL Select 1 value dengan salah satu parameter ter enkripsi
	function selectOneDB_enc(&$statement, $field_list, $field_table, $field_name, $field_name2) {
		global $dbc;
		$statement = $dbc->prepare("SELECT $field_name FROM $field_table WHERE $field_name2 = :namanya");
		$statement->bindValue(':namanya', base64_decode($field_list[$field_name2]));
		$statement->execute();
	}

	//SQL INSERT for Add customer
	//insert to table customer
	function insertCustomer(&$statement, $field_list, $field_table, $username, $nama, $password, $jk, $alamat, $tanggal_lahir, $email, $no_telephone) {
		global $dbc;

		$statement = $dbc->prepare("INSERT INTO $field_table($username, $nama, $password, $jk, $alamat, $tanggal_lahir, $email, $no_telephone) VALUES (:username, :nama, :password, :jk, :alamat, :tanggal_lahir, :email, :no_telephone)");
		$statement->bindValue(':username', $_POST['username_customer']);
		$statement->bindValue(':nama', $_POST['nama_customer']);
		$statement->bindValue(':password', hash('sha256', $_POST['password_customer']));
		$statement->bindValue(':jk', $_POST['jk_customer']);
		$statement->bindValue(':alamat', $_POST['alamat']);
		$statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir']);
		$statement->bindValue(':email', $_POST['email_customer']);
		$statement->bindValue(':no_telephone', $_POST['no_telephone_customer']);
		$statement->execute();
	}
	//insert for table tmbanking
	function insertTMbanking(&$statement, $field_list, $field_list2, $field_table, $field_name, $field_name2) {
		global $dbc;

		$statement = $dbc->prepare("INSERT INTO $field_table($field_name, $field_name2) VALUES (:no_rekening, :id_customer)");
		$statement->bindValue(':id_customer', $field_list2[$field_name2]);
		$statement->bindValue(':no_rekening', $field_list[$field_name]);
		$statement->execute();
	}
	//insert for table tmbanking dengan salah satu parameter ter enkripsi
	function insertTMbanking_enc(&$statement, $field_list, $field_list2, $field_table, $field_name, $field_name2) {
		global $dbc;

		$statement = $dbc->prepare("INSERT INTO $field_table($field_name, $field_name2) VALUES (:no_rekening, :id_customer)");
		$statement->bindValue(':id_customer', base64_decode($field_list2[$field_name2]));
		$statement->bindValue(':no_rekening', $field_list[$field_name]);
		$statement->execute();
	}
	//--------------------------------------------------------

	//SQL untuk edit customer
	function updateCustomerDB(&$statement, $field_list, $field_list2, $field_table, $username, $nama, $password, $jk, $alamat, $tanggal_lahir, $email, $no_telephone) {
		global $dbc;

		$statement = $dbc->prepare("UPDATE $field_table SET $username = :username_customer, $nama = :nama_customer, $password = :password_customer, $jk = :jk_customer, $alamat = :alamat, $tanggal_lahir = :tanggal_lahir, $email = :email_customer, $no_telephone = :no_telephone_customer WHERE $username = :username_lama");
		$statement->bindValue(':username_customer', strtolower($field_list[$username]));
		$statement->bindValue(':username_lama', base64_decode($field_list2[$username]));
		$statement->bindValue(':nama_customer', $field_list[$nama]);
		$statement->bindValue(':password_customer', hash('sha256', $field_list[$password]));
		$statement->bindValue(':jk_customer', $field_list[$jk]);
		$statement->bindValue(':alamat', $field_list[$alamat]);
		$statement->bindValue(':tanggal_lahir', $field_list[$tanggal_lahir]);
		$statement->bindValue(':email_customer', $field_list[$email]);
		$statement->bindValue(':no_telephone_customer', $field_list[$no_telephone]);
		$statement->execute();

		//echo $field_list[$username], $field_list2[$username];

	}
	//-------------------------------------------------------

	//SQL delete
	function deleteUser_enc(&$statement, $field_list, $field_table, $field_name){
		global $dbc;
		$statement = $dbc->prepare("DELETE FROM $field_table WHERE $field_name = :namanya");
		$statement->bindValue(':namanya', base64_decode($field_list[$field_name]));
		$statement->execute();
	}
	//=======================================================
	//SQL transfer Rekening----------------------------------
	//=======================================================
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d');
    $time = date('H:i:s');
    $date_field = date('Y-m-d',strtotime($date));
    $time_field = date('H:i:s', strtotime($time));
    if (isset($_POST['saldo_rekening'])) {
    	$nominal = str_replace(".", "", $_POST['saldo_rekening']);
    }
    //Select Saldo pengirim
	function selectSaldo1(&$statement, $field_list, $field_table, $field_name, $field_name2, $field_name3) {
		global $dbc;
		$statement = $dbc->prepare("SELECT $field_name2 FROM $field_table WHERE $field_name = :namanya");
		$statement->bindValue(':namanya', $field_list[$field_name3]);
		$statement->execute();
	}
	//Select Saldo Penerima
	function selectSaldo2(&$statement, $field_list, $field_table, $field_name, $field_name2) {
		global $dbc;
		$statement = $dbc->prepare("SELECT $field_name2 FROM $field_table WHERE $field_name = :namanya");
		$statement->bindValue(':namanya', $field_list[$field_name]);
		$statement->execute();
	}
	//Update Saldo pengirim
	function update1(&$statement, $field_list, $field_table, $field_name, $field_name2, $field_name3, $field_name4, &$confirm) {
		global $dbc;
		$statement = $dbc->prepare("UPDATE $field_table SET $field_name2 = :saldo_rekening WHERE $field_name = :no_rekening");
		$statement->bindValue(':no_rekening', $field_list[$field_name4]);
		$statement->bindValue(':saldo_rekening', $field_name3);

		//update jika saldo pengirim masih > Rp 50.000
		if ($field_name3 < 50000) {
			$confirm = 0;
		}
		else {
			$confirm = 1;
		}
	}
	//Update Saldo Penerima
	function update2(&$statement, $field_list, $field_table, $field_name, $field_name2, $field_name3) {
		global $dbc;
		$statement = $dbc->prepare("UPDATE $field_table SET $field_name2 = :saldo_rekening WHERE $field_name = :no_rekening");
		$statement->bindValue(':no_rekening', $field_list[$field_name]);
		$statement->bindValue(':saldo_rekening', $field_name3);
		$statement->execute();
	}
	//Insert Tabel Transaksi untuk Pengirim
	function insertTransaksi1 (&$statement, $field_list, $field_table, $no_rekening, $tmb_no_rekening, $nominal_transaksi, $status, $tanggal, $waktu, $saldo, $no_rekeningA, $nominal, $kredit, $date_field, $time_field, $saldoPengirim) {
		global $dbc;
		$statement = $dbc->prepare("INSERT INTO $field_table($no_rekening, $tmb_no_rekening, $nominal_transaksi, $status, $tanggal, $waktu, $saldo) VALUES (:no_rekening, :tmb_no_rekening, :nominal_transaksi, :status_transaksi, :tanggal_transaksi, :waktu_transaksi, :saldo)");
		$statement->bindValue(':no_rekening', $field_list[$no_rekeningA]);
		$statement->bindValue(':tmb_no_rekening', $field_list[$no_rekening]);
		$statement->bindValue(':nominal_transaksi', $nominal);
		$statement->bindValue(':status_transaksi', $kredit);
		$statement->bindValue(':tanggal_transaksi', $date_field);
		$statement->bindValue(':waktu_transaksi', $time_field);
		$statement->bindValue(':saldo', $saldoPengirim);
		$statement->execute();
	}
	//Insert Tabel Transaksi untuk penerima
	function insertTransaksi2 (&$statement, $field_list, $field_table, $no_rekening, $tmb_no_rekening, $nominal_transaksi, $status, $tanggal, $waktu, $saldo, $no_rekeningA, $nominal, $debet, $date_field, $time_field, $saldoPenerima) {
		global $dbc;
		$statement = $dbc->prepare("INSERT INTO $field_table($no_rekening, $tmb_no_rekening, $nominal_transaksi, $status, $tanggal, $waktu, $saldo) VALUES (:no_rekening, :tmb_no_rekening, :nominal_transaksi, :status_transaksi, :tanggal_transaksi, :waktu_transaksi, :saldo)");
		$statement->bindValue(':no_rekening', $field_list[$no_rekening]);
		$statement->bindValue(':tmb_no_rekening', $field_list[$no_rekeningA]);
		$statement->bindValue(':nominal_transaksi', $nominal);
		$statement->bindValue(':status_transaksi', $debet);
		$statement->bindValue(':tanggal_transaksi', $date_field);
		$statement->bindValue(':waktu_transaksi', $time_field);
		$statement->bindValue(':saldo', $saldoPenerima);
		$statement->execute();
	}

 ?>