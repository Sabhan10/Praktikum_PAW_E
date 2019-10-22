<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tambahkan Data</title>
	</head>
	<body>
	<?php 
	include 'koneksi.php';
	require'validate.inc';
	$xpuupyname =""; 
	$xbreedid =""; 
	$xdescription ="" ;
	$xprice = "";
	$xpicture= "";
	if (isset($_POST['puupyname']) || isset($_POST['breedid']) || isset($_POST['description']) 
		|| isset($_POST['price'])|| isset($_POST['picture'])){

		validasi_nama($xpuupyname,$_POST, 'puupyname' ) ;
		validasi_price($xbreedid,$_POST, 'breedid' ) ;
		validasi_nama($xdescription,$_POST, 'description' ) ;
		validasi_price($xprice,$_POST, 'price' ) ;
		validasi_pct($xpicture,$_POST, 'picture' ) ;

		if ($xpuupyname !="" || $xbreedid !="" || $xdescription !=""  || $xprice !="" || $xpicture !=""){
			include 'formTambah.php';
		}
		else{
			$PuppyName=$_POST['puupyname'];
			$breedid=$_POST['breedid'];
			$description=$_POST['description'];
			$price=$_POST['price'];
			$picture=$_POST['picture'];
			$statement=$konek->prepare("INSERT INTO animals(PuppyName, BreedID, Description, price, Picture) VALUES (:puupyname, :breedid, :description, :price ,:picture)");
			
			$statement->bindValue(':puupyname',$PuppyName);
			$statement->bindValue(':breedid',$breedid);
			$statement->bindValue(':description',$description);
			$statement->bindValue(':price',$price);
			$statement->bindValue(':picture',$picture);
			$statement->execute();
			echo "<script>alert('Berhasil ditambahkan Ke Dalam tabel'); window.location = './.'</script>";
		}
	}else{
		include 'formTambah.php';
	}
	 ?>

	</body>
</html>