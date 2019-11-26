<?php
	session_start();
	if (!isset($_SESSION['isAdmin'])){
		if(isset($_GET['url']) && $_GET['url'] == 'view1'){
			header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/login.php?prive=view1");
		}
		else{
			header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/login.php?prive=view2");
		}
		exit();
	}
?>