<!DOCTYPE html>
<html lang="en">
	<head>
	<title>My Form Login</title>
	<link rel="stylesheet" type="text/css" href="css_gambar/style1.css">
	</head>
	<?php 
		$pesanSurname = @$_GET['pesanSurname'];
		$pesanFname = @$_GET['pesanFname'];
		$pesanEmail = @$_GET['pesanEmail'];
		$pesanMnumber = @$_GET['pesanMnumber'];
		$pesanPasswd = @$_GET['pesanPasswd'];
		$pesanCpasswd = @$_GET['pesanCpasswd'];
		$surname = @$_GET['surname'];
		$fname = @$_GET['fname'];
		$email = @$_GET['email'];
		$Mnumber = @$_GET['Mnumber'];
		$passwd = @$_GET['passwd'];
		$Cpasswd = @$_GET['Cpasswd'];

	 ?>
<body>
	<div class="Background">
		<div class="Main">
			<h1>Registration Form</h1>
			<fieldset>
				<legend><b>Person Details</b></legend>
				<form action="validasiForm.php" method="POST">
					<div>
						<label class="label" for="surname">Surname</label>
						<input type="text" name="surname" id="surname" value="<?php echo $surname ?>"/>
						<span><?php echo $pesanSurname?></span>
					</div>
					<div>
						<label class="label" for="fname">First Name</label>
						<input type="text" name="fname" id="fname" value="<?php echo $fname ?>"/>
						<span><?php echo $pesanFname?></span>
					</div>
					<div>
						<label class="label" for="email">Email Address</label>
						<input type="text" name="email" id="email" value="<?php echo $email ?>"/>
						<span><?php echo $pesanEmail?></span>
					</div>
					<div>
						<label class="label" for="Mnumber">Mobile Number</label>
						<input type="text" name="Mnumber" id="Mnumber" value="<?php echo $Mnumber ?>"/>
						<span><?php echo $pesanMnumber?></span>
					</div>
					<div>
						<label class="label" for="passwd">Password</label>
						<input type="password" name="passwd" id="passwd" value="<?php echo $passwd ?>"/>
						<span><?php echo $pesanPasswd?></span>
					</div>
					<div>
						<label class="label" for="Cpasswd">Confirm Password</label>
						<input type="password" name="Cpasswd" id="Cpasswd" value="<?php echo $Cpasswd ?>"/>
						<span><?php echo $pesanCpasswd?></span>
					</div>
					<div class="Register">
						<label>&nbsp;</label>
						<input type="submit" name="Register" value="Register"/>
						<label>&nbsp;</label>
						<input type="reset" name="reset" value="Reset"/>
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</body>
</html>