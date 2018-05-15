<?php
SESSION_START();

if($_SESSION["user"]==true)
{
echo "Welcome"." ".$_SESSION["user"];
}else{
	header('location:login.php');	
}
?>
<a href="logout.php"> logout </a>