<?php 
    //Session adalah cara yang digunakan untuk meyimpan pada server komputer untuk digunakan pada beberapa halaman termasuk halaman itu sendiri
    session_start();
    //memanggil isi dari file connectionPDO.php
    include "connectionPDO.php";
    include "databaseCRUD.php";
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/loginAdmin.css"><!-- link css dari folder css -->
        <title>Form</title>
    </head>
    <body>
            <?php
            $errors = array();//array untuk menampung pesan error
            if (isset($_POST['username_admin']))//yang dilakukan ketika username_customer di set
            {
                //validasi myang diinputkan user
                include 'validate.php';//meanggil file untuk melakukan validasi jika kosong, alfabet, number dll
                validateUsername($errors, $_POST, "username_admin");//memanggil function untuk validasi username
                validatePassword($errors, $_POST, "password_admin");//memanggil function untuk validasi password
                if (sizeof($errors)==0) {
                    //jika validasi diatas sudah tidak terdatat error, maka dilanjutkan dengan validasi database
                    validateUsernamePasswordDB($errors, $_POST, "tadmin", "username_admin", "password_admin");//memanggil function untuk validasi databse username dan password
                }
                
                if ($errors)
                {
                    //jika masih terdapat error, tampilkan kembali form login admin.
                    include 'formLoginAdmin.php';
                }
                else
                {
                    //jika tidak ada error, maka session isAdmin = true, dan diarahkan ke indexAdmin dengan membawa nilai username admin.
                    $_SESSION['isAdmin'] = true;
                    $username_admin_enc = base64_encode(strtolower($_POST['username_admin']));
                    header("Location:indexAdmin.php?username_admin=$username_admin_enc");
                }
            }
            else
            // tampilkan kembali form
            include 'formLoginAdmin.php';
            ?>
    </body>
</html>
