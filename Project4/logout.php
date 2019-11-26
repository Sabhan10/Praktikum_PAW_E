<?php  

session_start();
unset($_SESSION['isAdmin']);
session_destroy();
header("Location: http://{$_SERVER['HTTP_HOST']}/PAW_2019/Project4/index.php");

?>
