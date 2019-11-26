<?php
		$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $dbc->prepare("UPDATE animals SET 
										PuppyName = :PuppyName,
										BreedID = :BreedID,
										Description = :Description,
										Price = :Price,
										Picture = :Picture
										WHERE id = :id");
		$statement->bindValue(':PuppyName', $_POST['name']);
		$statement->bindValue(':BreedID', $_POST['breedID']);
		$statement->bindValue(':Description', $_POST['desc']);
		$statement->bindValue(':Price',$_POST['price']);
		$statement->bindValue(':Picture', $_FILES['gambar']['name']);
		$statement->bindValue(':id', $_POST['id']);
		$statement->execute();

		header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project3/dataPuppies.php");

?>
