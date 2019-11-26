<?php 
    //memanggil file-file yang dibutuhkan
    require "cekPermissionCustomer.php";
    include "connectionPDO.php";
    include "databaseCRUD.php";
    include "cekUser_ini.php";
    $username_customer_enc = $_GET['username_customer'];//get value username customer
    $username_customer = base64_decode($_GET['username_customer']);//get value username yang di enkripsi dan di decrypt
    $cek = base64_decode($_GET['cek']);//get value cek yang di enkripsi dan di decrypt

    cekUsernameCustomer("username_customer", "tcustomer");//memanggil function untuk cek username customer
    cek("cek");//memanggil function untuk cek nilai pada variable 'cek'
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/editProfile_isCustomer.css"><!-- link css pada folder css -->
        <title>Form</title>
    </head>
    <body>
            <?php
            $errors = array();//array untuk menampung pesan arror
            if (isset($_POST['username_customer']))//yang dilakukan jika username_customer di set
            {
                $cek++;//auto increment 1
                include 'validate.php';//memanggil file untuk validasi alfa, numeric dll
                validateUsername($errors, $_POST, "username_customer");//memanggil function untuk validasi username
                validateName($errors, $_POST, "nama_customer");
                //memanggil function untuk validasi nama
                validateEmail($errors, $_POST, "email_customer");//memanggil function untuk validasi username
                validateNoTelephone($errors, $_POST, "no_telephone_customer");//memanggil function untuk validasi no telephone
                validateAlamat($errors, $_POST, "alamat");//memanggil function untuk validasi alamat
                validatePassword($errors, $_POST, "password_customer");//memanggil function untuk validasi password
                validateCpassword($errors, $_POST, "password_customer", "c_password");//memanggil function untuk validasi confirm password
               if (sizeof($errors)==0) {//yang dilakukan jika tidak terdapat error pada validasi diatas
                    if ($_GET['username_customer'] != base64_encode(strtolower($_POST['username_customer']))) {//dilakukan jika username lama tidak sama dengan username baru
                        validateUsernameDB($errors, $_POST, "username_customer");//memanggil function untuk validasi database username
                    }

                }
                
                if ($errors)
                {
                    //menampilkan kembali form jika masih terdapat error
                    include 'formEditProfile_isCustomer.php';
                }
                else
                {
                    updateCustomerDB($statement, $_POST, $_GET, "tcustomer", "username_customer", "nama_customer", "password_customer", "jk_customer", "alamat", "tanggal_lahir", "email_customer", "no_telephone_customer");//memanggil function untuk update data pada tabel tcustomer
                    //menampilkan pesan berhasil dan kembali ke home dengan membawa value usename_admin
                    echo "<script type=\"text/javascript\">window.alert('Edit Detail akun Sukses');
                            window.location.href = '../index.php?username_customer=$username_customer_enc';</script>"; 
                }
            }
            else
            // tampilkan kembali form
            include 'formEditProfile_isCustomer.php';
            ?>
    </body>
</html>
