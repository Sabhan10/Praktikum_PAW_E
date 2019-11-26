<?php 
    //memangggil file-file yang dibutuhkan
    require "cekPermissionCustomer.php";
    include "connectionPDO.php";
    include "databaseCRUD.php";
    include "cekUser_ini.php";
    $username_customer_enc = $_GET['username_customer'];//get value darai username_customer yang di enkripsi
    $id_customer_enc = $_GET['id_customer'];//get value dari id_customer yang di enkripsi
    $username_customer = base64_decode($_GET['username_customer']);//get value darai username_customer
    $id_customer = base64_decode($_GET['id_customer']);//get value dari id_customer

    cekIdCustomer("id_customer", "tcustomer");//memanggil function untuk cek id customer
    cekUsernameCustomer("username_customer", "tcustomer");//memanggil function untuk cek username customer


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/transferRekening.css"><!-- link css pada folder css -->
        <title>Form</title>
    </head>
    <body>
            <?php
            $errors = array();//array untuk menyimpan pesan error
            if (isset($_POST['no_rekening']))//yang dilakukan ketika no_rekening di set
            {
                include 'validate.php';//memanggil file untuk validasi alfa, numeric dll
                validateNoRekening($errors, $_POST, "no_rekening");//memenggil function untuk validasi no_rekening tujuan
                validateNoRekening($errors, $_POST, "no_rekeningA");//memanggil function untuk validasi no_rekening pengirim
                validateSaldo($errors, $_POST, "saldo_rekening");//memanggil function untuk validasi nominal transfer
                if (sizeof($errors)==0) {//yang dilakukan jika sudah tidak terdapat error pada fnction diatas

                    validateNoRekeningDB($errors, $_POST, "no_rekening");//validasi database no_rekening
                    validateNoRekeningDB3($errors, $_POST, "no_rekening");//validasi database no_rekening
                }
                if ($errors)
                {
                    include 'formTransferRekening.php';//form ditampilkan kembali jika masih terdapat error 
                }
                else
                {   //memanggil function untuk select saldo pengirim
                    selectSaldo1($statement, $_POST, "trekening","no_rekening", "saldo_rekening", "no_rekeningA");
                    //mengeluarkan value dari select pada pemanggilan function selectSaldo1
                    foreach ($statement as $rekening ) {
                        $saldoPengirim = $rekening['saldo_rekening']-$nominal;
                    }
                    //memanggil function untuk select saldo pengirim
                    selectSaldo2($statement, $_POST, "trekening","no_rekening", "saldo_rekening");
                    //mengeluarkan value dari select pada pemanggilan function selectSaldo2
                    foreach ($statement as $rekening ) {
                        $saldoPenerima = $rekening['saldo_rekening']+$nominal;
                    }
                    $confirm = 0;
                    //memanggil function untuk update saldo pengirim
                    update1($statement, $_POST, "trekening", "no_rekening", "saldo_rekening", $saldoPengirim, "no_rekeningA", $confirm);
                    if ($confirm == 1) {//updpate bisa dilakukan jika nilai variable confirm == 1
                        $statement->execute();

                         //memanggil function untuk update saldo pengirim
                        update2($statement, $_POST, "trekening", "no_rekening", "saldo_rekening", $saldoPenerima);

                        //memanggil function untuk insert transaksi pada tabel ttransaksi untuk pengirim
                        insertTransaksi1($statement, $_POST, "ttransaksi", "no_rekening", "tre_no_rekening", "nominal_transaksi", "status_transaksi", "tanggal_transaksi", "waktu_transaksi", "saldo", "no_rekeningA", $nominal, "KREDIT", $date_field, $time_field, $saldoPengirim);
                        //memanggil function untuk insert transaksi pada tabel ttransaksi untuk pengirim
                        insertTransaksi2($statement, $_POST, "ttransaksi", "no_rekening", "tre_no_rekening", "nominal_transaksi", "status_transaksi", "tanggal_transaksi", "waktu_transaksi", "saldo", "no_rekeningA", $nominal, "DEBET", $date_field, $time_field, $saldoPenerima);
                    }

                    if ($confirm == 0) {/*menampilkan pesan jika saldo tidak mencukupi dan kembali ke home*/
                        echo "<script type=\"text/javascript\">window.alert('Saldo tidak cukup, saldo minimal adalah Rp50000');
                            window.location.href = '../index.php?username_customer=$username_customer_enc';</script>"; 
                    }
                    else{/*menampilkan pesan jika transaksi berhasil dan kembali ke home*/
                        echo "<script type=\"text/javascript\">window.alert('Transaksi Berhasil');
                            window.location.href = '../index.php?username_customer=$username_customer_enc';</script>"; 
                    }
                }
            }
            else
            // tampilkan kembali form
            include 'formTransferRekening.php';
            ?>
    </body>
</html>
