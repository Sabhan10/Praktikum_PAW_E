<?php 
    // memanggil fungsi fungsi yang diburuhkan untuk proses di halaman ini
    require "cekPermissionAdmin.php";
    include "connectionPDO.php";
    include "databaseCRUD.php";
    include "cekUser_ini.php";
    $username_admin_enc = $_GET['username_admin'];//get value username_admin yang di enkripsi
    $username_admin = base64_decode($_GET['username_admin']);//get value username_admin yang di enkripsi kemudian di decrypt
    cekUsernameAdmin("username_admin", "tadmin");//memanggil function untuk cek username admin
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
            $errors = array();//array untuk menyimpan pesan error
            if (isset($_POST['username_customer']))//yang dilakukan jika username_customer di set
            {
                include 'validate.php';//menanggil file untuk validate alfa, numeric dll
                validateUsername($errors, $_POST, "username_customer");//memanggil function untuk validasi username
                validateName($errors, $_POST, "nama_customer");//memanggil function untuk validasi name
                validateTanggalLahir($errors, $_POST, "tanggal_lahir");//memanggil function untuk validasi tanggal lahir
                validateEmail($errors, $_POST, "email_customer");//memanggil function untuk validasi email
                validateNoTelephone($errors, $_POST, "no_telephone_customer");//memanggil function untuk validasi no telephone
                validateAlamat($errors, $_POST, "alamat");//memanggil function untuk validasi alamat
                validatePassword($errors, $_POST, "password_customer");//memanggil function untuk validasi password
                validateCpassword($errors, $_POST, "password_customer", "c_password");//memanggil function untuk validasi confirm password
                validateNoRekening($errors, $_POST, "no_rekening");//memanggil function untuk validasi no rekening

                if (sizeof($errors)==0) {
                    validateUsernameDB($errors, $_POST, "username_customer"); //memanggil function untuk validasi database username
                    validateNoRekeningDB($errors, $_POST, "no_rekening");//memanggil function untuk validasi database no rekening
                    validateNoRekeningDB2($errors, $_POST, "no_rekening");//memanggil function untuk validasi database no rekening

                }
                if ($errors)
                {
                    include 'formAddCustomer.php';// tampilkan kembali form jika masih terdapat error
                }
                else
                {
                    insertCustomer($statement, $_POST, "tcustomer", "username_customer", "nama_customer", "password_customer", "jk_customer", "alamat", "tanggal_lahir", "email_customer", "no_telephone_customer");//memanggil function untuk insert customer pada tabel tcustomer
                    selectOneDB($statement, $_POST, "tcustomer", "id_customer", "username_customer");//memanggil function untuk select id customer pada tabel tcustomer berdasarkan username_customer
                    
                    if ($statement->rowCount()>0) {
                        foreach ($statement as $id_customer) {//mengeluarkan nilai select dari pemanggilan function diatas
                            $id = $id_customer['id_customer'];
                        }
                    }
                    insertTMbanking($statement, $_POST, $id_customer, "tmbanking","no_rekening", "id_customer");//memanggil function untuk insert pada tabel TMbanking
                    //menampilkan pesan tambah akun sukses
                    echo "<script type=\"text/javascript\">window.alert('Tambah akun Sukses');
                        window.location.href = \"indexAdmin.php?username_admin=$username_admin_enc\";</script>"; 
                }
            }
            else
            // tampilkan kembali form
                include 'formAddCustomer.php';
            ?>
    </body>
</html>
