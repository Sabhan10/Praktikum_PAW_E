<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Form</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<fieldset>
		<form action="tambahkanData.php" method="POST">
			<legend>Animals Details</legend>
			<table>
				<tr>
					<td>Puppy name</td>
					<td><input type="text" name="puupyname" placeholder="Insert Puppy name"><?php echo @$xpuupyname; ?></td>
				</tr>
				<tr>
					<td>Breed ID</td>
					<td><select name="breedid">
					<option value="">-pilih-</option>
					<!-- include koneksi.php -->
						<?php 
							include'koneksi.php';
							$queri=$konek->prepare('SELECT * FROM breeds');
							$queri->execute();
							foreach ($queri as $row) {
								echo "<option value='$row[0]'>$row[1]</option>";
							}
						 ?>
					<!-- = -->
					</select><?php echo @$xbreedid; ?></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="description" placeholder="description"><?php echo @$xdescription; ?></td>
				</tr>

				<tr>
					<td>price</td>
					<td><input type="text" name="price" placeholder="price"><?php echo @$xprice; ?></td>
				</tr>

				<tr>
					<td>picture</td>
					<td><input type="text" name="picture" placeholder="picture"><?php echo @$xpicture; ?></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" value="submit"><input type="reset" value="reset"></td>
				</tr>
			
			</table>
		</form>
		</fieldset>
	</body>
</html>