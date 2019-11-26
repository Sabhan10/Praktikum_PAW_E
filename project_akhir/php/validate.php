<?php 
    //validasi untuk halaman login Admin
    function validateUsername(&$errors, $field_list, $field_name){//vlidasi untuk username
        $pattern = "/(?=.*\d)(?=.*[a-zA-Z])/";
        $pattern2 = "/^.{5,}$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
            $errors[$field_name] = 'tidak boleh kosong';
        else if (!preg_match($pattern, $field_list[$field_name]))
            $errors[$field_name] = 'alfabet dan angka';
        else if (!preg_match($pattern2, $field_list[$field_name]))
            $errors[$field_name] = 'panjang minimal 5';
    }
    function validateName(&$errors, $field_list, $field_name){//validasi untuk name
        $pattern = "/^[a-zA-Z '-]+$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
            $errors[$field_name] = 'tidak boleh kosong';
        else if (!preg_match($pattern, $field_list[$field_name]))
            $errors[$field_name] = 'harus alfabet';
    }
	function validatePassword(&$errors, $field_list, $field_name){//validasi untuk password
		$pattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/";
    	$pattern2 = "/^.{6,}$/";
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
       		$errors[$field_name] = 'tidak boleh kosong';
       	else if (!preg_match($pattern, $field_list[$field_name]))
        	$errors[$field_name] = 'Harus ada huruf Besar, kecil dan angka';
    	else if (!preg_match($pattern2, $field_list[$field_name]))
        	$errors[$field_name] = 'panjang minimal 6 karakter';
	}
    function validateCpassword(&$errors, $field_list, $field_name, $field_Cpassword){//validasi untuk confirm password
        if (!isset($field_list[$field_Cpassword]) || empty($field_list[$field_Cpassword]))
            $errors[$field_Cpassword] = 'tidak boleh kosong';
        else if ($field_list[$field_name] != $field_list[$field_Cpassword])
            $errors[$field_Cpassword] = 'confirm password invalid';
    }
    function validateTanggalLahir(&$errors, $field_list, $field_name){//validasi untuk tanggal lahir
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
          $errors[$field_name] = 'tidak boleh kosong';
    }
    function validateEmail(&$errors, $field_list, $field_name){//validasi untuk email
    $pattern = "/^[0-9]*$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
              $errors[$field_name] = 'tidak boleh kosong';
        else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL))
            $errors[$field_name] = 'Email format invalid';
    }
    function validateNoTelephone(&$errors, $field_list, $field_name){//validasi untuk no telephone
        $pattern = "/^[0-9]*$/";
        $pattern2 = "/^\d{11,12}$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
              $errors[$field_name] = 'tidak boleh kosong';
          else if (!preg_match($pattern, $field_list[$field_name]))
              $errors[$field_name] = 'harus angka';
          else if (!preg_match($pattern2, $field_list[$field_name]))
              $errors[$field_name] = 'panjang min 11, ,max 12';
    }
    function validateAlamat(&$errors, $field_list, $field_name){//validasi untuk alamat
        $pattern = "/^[a-zA-Z'-]+$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
            $errors[$field_name] = 'tidak boleh kosong';
        else if (!preg_match($pattern, $field_list[$field_name]))
            $errors[$field_name] = 'harus alfabet';
    }
    function validateNoRekening(&$errors, $field_list, $field_name){//validasi untuk no rekening
        $pattern = "/^[0-9]*$/";
        $pattern2 = "/^\d{12}$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) 
            $errors[$field_name] = 'tidak boleh kosong';
        else if (!preg_match($pattern, $field_list[$field_name]))
            $errors[$field_name] = 'harus angka';
        else if (!preg_match($pattern2, $field_list[$field_name]))
            $errors[$field_name] = 'panjang rekening adalah 12';
    }
    function validateSaldo(&$errors, $field_list, $field_name){//validasi untuk saldo
        global $dbc;
        $pattern = "/^[0-9]*$/";
        if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
            $errors[$field_name] = 'tidak boleh kosong';
         else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_FLOAT))
            $errors[$field_name] = 'saldo harus angka / float';
     }
    function validateUsernamePasswordDB(&$errors, $field_list, $field_table, $field_name, $field_password){//validasi database username dan password
        global $dbc;
        $statement = $dbc->prepare("SELECT $field_name, $field_password FROM $field_table WHERE $field_name = :username and $field_password = SHA2(:namapassword, 0)");
        $statement->bindValue(':username', $field_list[$field_name]);
        $statement->bindValue(':namapassword', $field_list[$field_password]);
        $statement->execute();
        //return $statement;
        if ($statement->rowCount()==0) {
            $errors[$field_password] = 'username atau password salah';
        }
    }
    function validateUsernameDB(&$errors, $field_list, $field_name){//validasi database username
        global $dbc;
        $statement = $dbc->prepare("SELECT * FROM tcustomer WHERE $field_name = :username_customer");
        $statement->bindValue(':username_customer', $field_list[$field_name]);
        $statement->execute();
        //return $statement;
        if ($statement->rowCount()>0) {
            $errors[$field_name] = 'username sudah ada';
        }
    }
    function validateNoRekeningDB(&$errors, $field_list, $field_name){//validasi database no rekening
        global $dbc;
        $statement = $dbc->prepare("SELECT * FROM trekening WHERE $field_name = :nomorRekening");
        $statement->bindValue(':nomorRekening', $field_list[$field_name]);
        $statement->execute();
        //return $statement;
        if ($statement->rowCount()==0) {
            $errors[$field_name] = 'rekening tidak terdaftar MBanking';
        }
    }
    function validateNoRekeningDB2(&$errors, $field_list, $field_name){//validasi database no rekening
        global $dbc;
        $statement = $dbc->prepare("SELECT * FROM tmbanking WHERE $field_name = :nomorRekening");
        $statement->bindValue(':nomorRekening', $field_list[$field_name]);
        $statement->execute();
        //return $statement;
        if ($statement->rowCount()>0) {
          $errors[$field_name] = 'rekening sudah ada';
        }
    }
    function validateNoRekeningDB3(&$errors, $field_list, $field_name){//validasi database no rekening
        global $dbc;
        $statement = $dbc->prepare("SELECT * FROM tmbanking WHERE $field_name = :nomorRekening");
        $statement->bindValue(':nomorRekening', $field_list[$field_name]);
        $statement->execute();
        //return $statement;
        if ($statement->rowCount()>0) {
            if ($_POST['no_rekeningA'] == $_POST['no_rekening']) {
                $errors[$field_name] = 'rekening tidak boleh sama';
            }
        }
    }
    //=====================================================================================