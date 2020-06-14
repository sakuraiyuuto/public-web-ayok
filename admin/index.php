<?php 
session_start();
include("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
</head>
<body>
	<h1>Login Admin</h1>
	<form method='POST' action='index.php'>
		<table cellpadding='0' cellspacing='0'>
			<tr>
			    <td>Username &nbsp;</td>
			    <td><input type='text' name='email'></td>
			</tr>
			<tr>
				<td>Password &nbsp;</td>
			    <td><input type='password' name='password'></td>
			</tr>
		</table><br><input type='submit' name='login' value='Login' style='text-align:center;width:100px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;border-radius:30px;margin-top:3%;margin-bottom:3%;'>
	</form>
<?php
if(isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$result = mysqli_query($link,"SELECT * FROM admin WHERE email='$email'");
	$row = mysqli_num_rows($result);
	
	if(($row) === 1) {
		$fetch_pass = mysqli_fetch_assoc($result);
		$cek_password = $fetch_pass["password"];
		if($cek_password <> $password) {
			echo"<script>alert('Password salah');</script>";
		}
		
		else {
			$_SESSION['log'] = true;
			echo"<script>document.location.href = 'timeline1.php';</script>";
		}
	}
	
	else {
		echo"<script>alert('Email dan/atau Password salah');</script>";
	}
}
?>
</body>
</html>
