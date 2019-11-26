<?php 
    //memangil file-file yang dibutuhkan
    require "cekPermissionAdmin.php";
    include "connectionPDO.php";
    include "databaseCRUD.php";
    include "cekUser_ini.php";
    $id_customer_enc = $_GET['id_customer'];//get value id customer yanf di enkripsi
    $username_admin_enc = $_GET['username_admin'];//get value usename admin yang di enkripsi
    $id_customer = base64_decode($_GET['id_customer']);//get value id customer yanf di enkripsi kemudian di decrypt
    $username_admin = base64_decode($_GET['username_admin']);//get value usename admin yang di enkripsikemudian di decrypt

    cekUsernameAdmin("username_admin", "tadmin");//memanggil function untuk cek username admin
    cekIdCustomer("id_customer", "tcustomer");//memanggil function untuk cek id customer
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/addRekening.css"><!-- link css pada folder css -->
        <title>Form Add Rekening</title>
    </head>
    <body>
            <?php
            $errors = array();//array untuk menyimpan pesan error
            if (isset($_POST['no_rekening']))//yang dilakukan jika no_rekening di set
            {
                include 'validate.php';//memanggil file untuk validasi alfa, numeric dll
                validateNoRekening($errors, $_POST, "no_rekening");//memanggil function untuk validasi no rekening
                if (sizeof($errors)==0) {//yang dilakukan ketika sudah tidak ada error dengan validasi diatas
                    validateNoRekeningDB($errors, $_POST, "no_rekening");//memanggil function untuk validasi database no rekening
                    validateNoRekeningDB2($errors, $_POST, "no_rekening");//memanggil function untuk validasi database no rekening
                }
                if ($errors)
                {
                    //menampilkan kembali form jika masih terdapat error
                    include 'formAddRekening.php';
                }
                else
                {
                    insertTMbanking_enc($statement, $_POST, $_GET, "tmbanking", "no_rekening", "id_customer");//memanggil function untuk insert ke tabel TMbanking
                    if ($statement->rowCount()>0) {
                        //menampilkan pesan berhasil
                        echo "<script type=\"text/javascript\">window.alert('Tambah Rekening Berhasil');
                        window.location.href = 'indexAdmin.php?username_admin=$username_admin_enc';</script>";
                    } 
                }
            }
            else
            //menampilkan form 
                include 'formAddRekening.php';
            ?>
    </body>
</html>
