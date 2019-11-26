<?php
	$dbc = new PDO('mysql:host=localhost;dbname=puppies', 'root', '');
	$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $dbc->query("SELECT animals.ID, animals.PuppyName, breeds.BreedName, animals.Description, animals.Price, animals.Picture 
		FROM breeds, animals WHERE animals.BreedID = breeds.Breed");

	foreach ($statement as $row) {
			echo "<tr>";
			echo "<td>{$row['PuppyName']}</td>";
			echo "<td>{$row['BreedName']}</td>";
			echo "<td>{$row['Description']}</td>";
			echo "<td>$ {$row['Price']}</td>";
			echo "<td><img src='puppies_images/{$row['Picture']}'></td>";
			echo "<td><a href='update.php?ID={$row['ID']}'>Edit</a></td>";
			echo "</tr>";
		}
?>
