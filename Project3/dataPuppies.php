<!DOCTYPE html>
<html>
<head>
	<title>Table View</title> 
	<style type="text/css">
		body{
			font-family: arial;
		}
		table {
			width: 100%;
			background-color: red;
			border: 1px solid black;
		}
		th, td{
			height: 15px;
			text-align: center;
			border: 1px solid black;
		}
		h1{
			text-align: center;
		}
		th{
			background-color:blue;
		}
		td{
			background-color: cyan;
		}



	</style>
</head>
<body>
			<h1>Puppies Data</h1>
			<table>
				<tr>
					<th>Name</th>
					<th>Breed</th>
					<th>Description</th>
					<th>Price</th>
					<th>Picture</th>
					<th>Action</th>
				</tr>
			<?php 
				include "viewDatabase.inc";
			?>
			</table>
</body>
</html>