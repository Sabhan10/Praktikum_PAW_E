<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Puppies</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		</head>
	<body class="center">
	<?php 
	include 'koneksi.php';
	$queri=$konek->prepare('SELECT animals.Puppyname, breeds.BreedName,
	animals.Description,
	animals.price ,
	animals.Picture FROM animals INNER JOIN breeds ON animals.BreedID=breeds.Breed');

	$queri->execute();
	echo "
	<h1>Puppies Data</h1>
	<table>
	<tr>
		<td>Puppy Name</td>
		<td>Breed Name</td>
		<td>Description</td>
		<td>Price</td>
		<td>Picture</td>
	</tr>
	";

	foreach ($queri as $row) {
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>$".$row[3]."</td>";
		echo "<td><img src='img/".$row[4]."' alt=''></td>";
		echo "</tr>";
	}
	echo "</table>";
	 ?><br/>
		<a href="formTambah.php" >Add Puppies Data</a>
	</body>
</html>