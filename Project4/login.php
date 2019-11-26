<?php

	require 'CheckPassword.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<style>
	body {
			font-family: algerian;
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
		}
		.login{
			background-color: cyan;
			width: 0px;
			margin-left: 120px;
		}
	</style>
</head>
<body>
<fieldset>
	<legend>LOGIN</legend>
		<h1>Menu Login</h1>
		<form action='<?php include 'view.php' ?>' method="POST">
			<div class="login">
				<table>
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" name="username" size="31" value="<?php echo (isset($_POST['username']))?$_POST['username']:'';?>"/></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="pswd" size="31" value="<?php echo (isset($_POST['pswd']))?$_POST['pswd']:'';?>"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="login" value="Login"/></td>
					</tr>
				</table>
			</div>
		</form>
</fieldset>
</body>
</html>