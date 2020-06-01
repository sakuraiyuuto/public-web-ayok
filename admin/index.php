<?php
session_start();
$konek = mysqli_connect('localhost','root','','ayok');

if(isset($_GET['logout'])){ 
	session_destroy(); 
	include"login.php";
}

else if($_SESSION['user']!=''){
	include"timeline.php";
}

else{
	include"login.php";
}

?>