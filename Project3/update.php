<?php
	$id = '';
	$name = '';
	$desc = '';
	$price = '';
	$gambar = '';
	if(isset($_GET['ID'])){
		$tempID = $_GET['ID'];
		include "dataSelect.inc";
	}
	else{
		header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project3/dataPuppies.php");
	}

	if(isset($_POST['update'])){
		include "editdb.inc";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Puppies</title>
	<style type="text/css">
		body {
			font-family: arial;
		}
		select {
			width: 99%;
		}
		fieldset{
			width: 50%;
			background-color: blue;
			margin-left: 325px;
		}
		h1, legend {
			text-align: center;
			font-family: algerian;
		}
		table{
			background-color: cyan;
			margin-left: 150px;
		}



	</style>
</head>
<body>
	<h1>EDIT PAGE</h1>
	<fieldset>
	<legend>Animal Details</legend>
		<form action="" enctype="multipart/form-data" method="POST">
				<table>
					<tr>
						<td><label for="name">Puppy Name</label></td>
						<td><input type="text" name="name" size="31" value='<?php if(isset($_POST["reset"])){ echo "";} else{echo $name;}?>'/></td>
					</tr>

					<tr>
						<td><label for="breedID">Breed ID</label></td>
						<td><select name="breedID">
							<?php
								$statement = $dbc->query("SELECT * FROM breeds");
								foreach ($statement as $row) {
									echo "<option value=\"{$row['Breed']}\">{$row['BreedName']}</option>";
								}
							?>
						</select></td>
					</tr>

					<tr>
						<td><label for="desc">Description</label></td>
						<td><input type="text" name="desc" size="31" value='<?php if(isset($_POST["reset"])){ echo "";} else{echo $desc;}?>'/></td>
					</tr>

					<tr>
						<td><label for="price">Price</label></td>
						<td><input type="text" name="price" size="31" value='<?php if(isset($_POST["reset"])){ echo "";} else{echo $price;}?>'/></td>
					</tr>

					<tr>
						<td><label for="gambar">Picture</label></td>
						<td>
							<input type="file" name="gambar" accept="image/* "/>
							<input type="hidden" name="id" value='<?php echo $id; ?>'/>
						</td>
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="update" value="Update"/>
						<input type="submit" name="reset" value="Reset"/>
						<input type="submit" name="back" value='Back<?php if(isset($_POST["back"])){ header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project3/dataPuppies.php");}?>'/>
					</td>
					</tr>
				</table>
		</form>
	</fieldset>
</body>
</html>