<!-- Function - function dibawah digunakan untuk pengecekan apakah passing value pada url sesuai, digunakan untuk menampilkan error  jika user iseng mengubah-ubah value pada url -->
<?php 
	//untuk cek username admin
	function cekUsernameAdmin($username_admin, $tadmin) {
		if (isset($_GET['username_admin'])) {
			selectOneDB_enc($statement, $_GET, "tadmin", "username_admin", "username_admin");
			if ($statement->rowCount()>0) {
			    foreach ($statement as $tadmin) {
			        $admin = $tadmin['username_admin'];
			    }
			}
			if (base64_decode($_GET['username_admin']) != $admin) {
		   		header("Location: ERROR_PAGE.php");
		    }
		}
		if (!isset($_GET['username_admin'])) {
			header("Location: ERROR_PAGE.php");
		}
		if (!isset($admin)) {
			header("Location: ERROR_PAGE.php");
		}
	}

	//untuk cek id customer
	function cekIdCustomer($id_customer, $tcustomer) {
		if (isset($_GET['id_customer'])) {
			selectOneDB_enc($statement, $_GET, "tcustomer", "id_customer", "id_customer");
			if ($statement->rowCount()>0) {
			    foreach ($statement as $tcustomer) {
			        $id = $tcustomer['id_customer'];
			    }
			}
			if (base64_decode($_GET['id_customer']) != $id) {
		   		header("Location: ERROR_PAGE.php");
		    }
		}
		if (!isset($_GET['id_customer'])) {
			header("Location: ERROR_PAGE.php");
		}
		if (!isset($id)) {
			header("Location: ERROR_PAGE.php");
		}
	}

	//untuk cek username customer
	function cekUsernameCustomer($username_customer, $tcustomer) {
		if (isset($_GET['username_customer'])) {
			selectOneDB_enc($statement, $_GET, "tcustomer", "username_customer", "username_customer");
			if ($statement->rowCount()>0) {
			    foreach ($statement as $tcustomer) {
			        $username = $tcustomer['username_customer'];
			    }
			}
			if (base64_decode($_GET['username_customer']) != $username) {
		   		header("Location: ERROR_PAGE.php");
		    }
		}
		if (!isset($_GET['username_customer'])) {
			header("Location: ERROR_PAGE.php");
		}
		if (!isset($username)) {
			header("Location: ERROR_PAGE.php");
		}
	}

	//untuk cek pada variable cek, digunakan pada halaman edit customer
	function cek($cek){
		if (isset($_GET['cek'])) {
			if (base64_decode($_GET['cek']) == 0 or base64_decode($_GET['cek']) == 1) {
				return true; 
			}
			else {
				header("Location: ERROR_PAGE.php");
			}
		}

		if (!isset($_GET['cek'])) {
			header("Location: ERROR_PAGE.php");
		}
	}
//=====================================================
//KHUSUS HALAMAN INDEX
//=====================================================
	//untuk cek username customer, khusus halaman admin karena letak index berbeda sendiri, maka jika ingin membuat link kenuju halaman lain adalah dengan relative path yang menuju halaman yang diinginkan.
	function cekUsernameCustomer2($username_customer, $tcustomer) {
		if (isset($_GET['username_customer'])) {
			selectOneDB_enc($statement, $_GET, "tcustomer", "username_customer", "username_customer");
			if ($statement->rowCount()>0) {
			    foreach ($statement as $tcustomer) {
			        $username = $tcustomer['username_customer'];
			    }
			}
			if (base64_decode($_GET['username_customer']) != $username) {
		   		header("Location: ./php/ERROR_PAGE.php");
		    }
		}
		if (!isset($_GET['username_customer'])) {
			header("Location: ./php/ERROR_PAGE.php");
		}
		if (!isset($username)) {
			header("Location: ./php/ERROR_PAGE.php");
		}
	}

 ?>