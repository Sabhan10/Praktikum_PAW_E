<?php
    //memanggil file-file yang dibutuhkan
    include "./php/cekPermissionCustomer.php"; 
    include "./php/connectionPDO.php";
    include "./php/databaseCRUD.php";
    include "./php/cekUser_ini.php";

    $username_customer = base64_decode($_GET['username_customer']);//get value dari username_customer yang di enkripsi dan di decrypt
    $username_customer_enc = $_GET['username_customer'];// get value username_customer yang di enkripsi
    cekUsernameCustomer2("username_customer", "tcustomer");//memanggil function untuk cek username customer
?>

<!DOCTYPE html>
<html lang = "id">
<head>
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css"><!-- link css pada folder css -->
</head>
<body>
    <div class="header">
        <img src="./Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link image pada folder image -->
    </div>
    <div class="sidebarkiri">
        <h1> Selamat Datang <?php echo $username_customer ?></h1>
        <p> Silakan lakukan transaksi, pilih menu sesuai dengan yang dibutuhkan </p>
    </div>
    <div class="sidebarkanan">
    <div class="sidebox">
        <fieldset>
            <legend>
                My Profile
            </legend>
				<img alt src="./Foto/Sementara.jpg" class="img"><br>
                <?php 
                    selectOneRowDB_enc($statement, $_GET, "tcustomer", "username_customer");//memanggil function untuk select one row pada tabel tcustomer berdasarkan username_customer
                    foreach ($statement as $tcustomer) {//mengeluarkan nilai select pada pemanggilan function diatas
                        //global $id;
                        $id_customer = $tcustomer['ID_CUSTOMER'];//get value id_customer
                        echo "  Username : {$tcustomer['USERNAME_CUSTOMER']}<br>
                                Nama &nbsp;&nbsp;&emsp; : {$tcustomer['NAMA_CUSTOMER']}<br>
								Email &nbsp;&nbsp;&emsp; : {$tcustomer['EMAIL_CUSTOMER']}<br>
								Alamat &emsp; : {$tcustomer['ALAMAT']}<br>
								No. HP &emsp; : {$tcustomer['NO_TELEPHONE_CUSTOMER']}<br><br>
								";
                    }
                 ?>
        </fieldset>
        <?php 
            $id_customer_enc = base64_encode($id_customer);//enkripsi id customer
            echo "
            <ul>
                <li> <a href = \"./php/profileCustomer_isCustomer.php?id_customer=$id_customer_enc&username_customer=$username_customer_enc\"> Profil </a> </li>
                <li> <a href = \"./php/logout.php?username_customer=$username_customer\"> Logout </a> </li>
            </ul>";
        ?>
    </div>
    </div>
    <div class="isi">
        <?php echo"
        <ul>
            <li> <a href = \"./php/transferRekening.php?id_customer=$id_customer_enc&username_customer=$username_customer_enc\"> Transfer </a> </li>
            <li> <a href = \"./php/riwayatTransaksi.php?id_customer=$id_customer_enc&username_customer=$username_customer_enc\"> Riwayat Transaksi </a> </li>
        </ul>";
        ?>
    <br>
    <!-- untuk menampilkan tanggal dan waktu serta keterangan pagi, siang, sore dan malam -->
        <?php
            echo "Tanggal : <b>".date('d-M-Y')."</b> ";
            date_default_timezone_set('Asia/Jakarta');
            $jam=date("H:i:s");
            echo "| Pukul : <b>". $jam." "."</b>";
            $a = date ("H");
            if (($a>=5) && ($a<=11)){
                echo "<b>, Selamat Pagi !!</b>";}
            else if(($a>11) && ($a<=15)){
                echo "<b>, Selamat Siang !!</b>";}
            else if (($a>15) && ($a<=18)){
                echo "<b>, Selamat Sore !!</b>";}
            else { 
                echo ", <b> Selamat Malam </b>";}
        ?> 
        <br>

        <h2>Daftar Rekening</h2>
        <table>
            <tr>
                <td>No</td>
                <td>No. Rekening</td>
                <td>Saldo</td>
            </tr>
        <?php 
            selectOneRowDB($statement, $tcustomer, "tmbanking", "ID_CUSTOMER");//memanggil function untuk select one row pada tabel tmbanking berdasarkan id_customer
            $count=0;
            foreach ($statement as $tcustomer) {//mengeluarkan nilai select pada pemanggilan function diatas
                $count++;
                echo "<tr>
                        <td>$count</td>
                        <td>{$tcustomer['NO_REKENING']}</td>";
                        selectOneRowDB($statement, $tcustomer, "trekening", "NO_REKENING");//memanggil function untuk select one row pada tabel trekening berdasarkan no_rekening
                        foreach ($statement as $saldo) {
                        echo "
                        <td>Rp.".number_format("{$saldo['SALDO_REKENING']}",2,",",".")."</td>";
                    }
                echo "
                        </tr>";
            }
         ?>
        </table>
    </div>
    <div id="footer">
        <p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
    </div>
</body>
</html>