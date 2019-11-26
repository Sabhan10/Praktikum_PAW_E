<?php
	if(isset($_SESSION['isAdmin'])){
		echo "<a href='http://localhost/PAW_2019/Project4/logout.php'>Logout</a>";
		echo "<a href='http://localhost/PAW_2019/Project4/private1.php'>Detail Data 1</a>";
		echo "<a href='http://localhost/PAW_2019/Project4/private2.php'>Detail Data 2</a>";
		}
	else{
		echo "<a href='http://localhost/PAW_2019/Project4/login.php'>Login</a>";
		echo "<a href='http://localhost/PAW_2019/Project4/private1.php?url=view1'>Detail Data 1</a>";
		echo "<a href='http://localhost/PAW_2019/Project4/private2.php?url=view2'>Detail Data 2</a>";
		}
?>