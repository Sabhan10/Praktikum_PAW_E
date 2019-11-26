<?php  
    /*menaggil file-file yang dibutuhkan*/
	require "cekPermissionCustomer.php";
	include "connectionPDO.php";
    include "databaseCRUD.php";
    include "cekUser_ini.php";
    $username_customer_enc = $_GET['username_customer'];//mendapatkan nilai dari usrname_customer yang di enkripsi
    $id_customer_enc = $_GET['id_customer'];//mendapatkan nilai dari id_customer yang di enkripsi
    $username_customer = base64_decode($_GET['username_customer']);//mendapatkan nilai dari usrname_customer yang di enkripsi kemudian di decrypt
    $id_customer = base64_decode($_GET['id_customer']);//mendapatkan nilai dari id_customer yang di enkripsi kemudian di decrypt

    cekIdCustomer("id_customer", "tcustomer");//memanggil function untuk cek id customer
    cekUsernameCustomer("username_customer", "tcustomer");//memanggil function untuk cek username customer

?>
<!DOCTYPE html>
<html lang = "id">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../css/riwayatTransaksi.css"><!-- link css pada folder css -->
	<title>Riwayat Transaksi</title>
</head>
<body>
	<div class="header">
        <img src="../Foto/HeaderWeb.jpg" alt="Foto" class="lebar"><!-- link image pada folder image -->
    </div>
	<div class="sidebox">
		<h1> Keterangan : </h1>
		<p>Berikut adalah daftar transaksi anda.</p>
	</div>
	<div class="isi">
    <!-- link ke homer dengan membawa nilai username_customer -->
	<?php echo "
		<ul>
			<li><a href=\"../index.php?username_customer=$username_customer_enc\">Home</a> </li>
		</ul>";
	?>
	<br>
        <?php
            /*untuk menampilkan tanggal dan waktu serta keterangan pagi, siang, sore dan malam*/
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
        <h2>Daftar Riwayat Transaksi</h2>
        <form method="POST"> 
            <label for="no_rekening">Pilih No.Rekening :</label>
                <select name="no_rekening" id="no_rekening">
                    <option value="initial">[pilih no rekening]</option>
                    <?php 
                        selectOneDB_enc($statement, $_GET, "tmbanking", "no_rekening", "id_customer");//memanggil function untuk select no_rekening dari tabel tmbanking berdasarkan id_customer
                        $trace = 0;
                        foreach ($statement as $rekening ) {//mengeluarkan nilai select dari pemanggilan function diatas
                                $trace++;
                            if ($rekening['no_rekening'] == $_POST['no_rekening']) {
                                $select = 'selected';
                                echo "<option value=\"{$rekening['no_rekening']}\" $select>{$rekening['no_rekening']}</option>";
                            }
                            else{
                                echo "<option value=\"{$rekening['no_rekening']}\">{$rekening['no_rekening']}</option>";
                            }
                        }
                     ?>
                 </select>
            <input type="submit" name="submit" value="cek">
			<table>
				<tr>
					<td>Tanggal</td>
					<td>Waktu</td>
					<td>No Rekening Tujuan</td>
					<td>Nominal</td>
					<td>Status</td>
					<td>Saldo</td>
				</tr>
				<?php 
					if (isset($_POST['no_rekening'])) {//lakukan ketika no_rekening di set
						selectOneRowDB($statement, $_POST, "ttransaksi", "no_rekening");//pemanggilan function untuk select one row dari tabel transaksi berdasarkan no_rekening
						foreach ($statement as $transaksi) {//mengeluarkan nilai select dari pemanggilan function diatas
							echo "<tr>
									<td>{$transaksi['TANGGAL_TRANSAKSI']}</td>
									<td>{$transaksi['WAKTU_TRANSAKSI']}</td>
									<td>{$transaksi['TRE_NO_REKENING']}</td>
									<td>Rp.".number_format("{$transaksi['NOMINAL_TRANSAKSI']}",2,",",".")."
									<td>{$transaksi['STATUS_TRANSAKSI']}</td>
									<td>Rp.".number_format("{$transaksi['SALDO']}",2,",",".")."</td>
								  </tr>";
						}

					/*}*/
					}
				?>
			</table>
        </form>
	</div>
	<div id="footer">
		<p> ================================================= TUGAS APLIKASI (PENGEMBANGAN APLIKASI WEB) ================================================= </p>
	</div>
</body>
</html>