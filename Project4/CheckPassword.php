<?php
	$prive = '';
	if (isset($_GET['prive'])){
		$prive = $_GET['prive'];
	}
	function checkPassword($user, $pass){
				$dbc = new PDO('mysql:host=localhost;dbname=myapp', 'root', '');
				$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$statement = $dbc->prepare("SELECT * FROM admins  WHERE username = :username and password = SHA2(:password, 0)");
				$statement->bindValue(':username', $user);
				$statement->bindValue(':password', $pass);
				$statement->execute();

				return $statement->rowCount() > 0;
	}
	
	if(isset($_POST['login'])){
		if(checkPassword($_POST['username'], $_POST['pswd'])){
			session_start();
			$_SESSION['isAdmin'] = true;
			if($prive == 'view1'){
				header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/private1.php");
			}
			else if($prive == 'view2'){
				header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/private2.php");
			}
			else{
				header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/index.php");
			}
		}
	}
	
 ?>