<?php 
    session_start(); //memulai session, digunakan untuk autentifikasi, yaitu mekanisme untuk mengatur hak akses suatu halaman web
    include "connectionPDO.php";//memanggil file untuk membuat koneksi ke database
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/login.css"><!-- link ke css pada folder css -->
        <title>Form</title>
    </head>
    <body>
        <?php
            $errors = array();//array untuk menampung pesan error
            if (isset($_POST['username_customer']))//yang dilakukan ketika username_customer di set
            {
                include 'validate.php';//meanggil file untuk melakukan validasi jika kosong, alfabet, number dll
                validateUsername($errors, $_POST, "username_customer");//memanggil function untuk validasi username
                validatePassword($errors, $_POST, "password_customer");//memanggil function untuk validasi password
                if (sizeof($errors)==0) {//jika validasi diatas sudah tidak terdatat error, maka dilanjutkan dengan validasi database
                   validateUsernamePasswordDB($errors, $_POST, "tcustomer", "username_customer", "password_customer");//memanggil function untuk validasi databse username dan password
                }
                if ($errors)//jika terdapat error, maka form login ditampilkan kembali
                {
                    include 'formLogin.php';
                }
                else
                {
                    //jika sudah tidak ada error, maka session == true
                    $_SESSION['isCustomer'] = true;
                    $username_customer = strtolower($_POST['username_customer']);//mendapatkan nilai username_customer ketika di set dan dimasukkan ke variable username_customer
                    $username_customer = base64_encode($username_customer);//enkripsi username customer
                    header("Location: ../index.php?username_customer=$username_customer");//link ke index dengan membawa nilai username_customer
                }
            }
            else
            // tampilkan kembali form
            include 'formLogin.php';
        ?>
    </body>
</html>