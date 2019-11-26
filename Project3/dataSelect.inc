<?php
	$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
	$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $dbc->prepare("SELECT animals.ID, animals.PuppyName, breeds.BreedName, animals.Description, animals.Price, animals.Picture FROM breeds, animals WHERE animals.BreedID = breeds.Breed AND  animals.ID = :id");
	$statement->bindValue(':id', $tempID);
	$statement->execute();

	foreach ($statement as $row){
		$id = ''."{$row['ID']}";
		$name = ''."{$row['PuppyName']}";
		$desc = ''."{$row['Description']}";
		$price = ''."{$row['Price']}";
		$gambar = ''."{$row['Picture']}";
	}

?>
