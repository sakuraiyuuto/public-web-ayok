<?php 
session_start();
include("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
	<div class="bingkai">
		<div class="logoayok">
			<img src="gambar/logo/ayok.png" alt="logo_ayok"/>
		</div>
		<div class="kotaklogin">
			<div class="judul">
				<h1>Login Admin</h1>
			</div>
			<div class="formlogin">
				<form method='POST' action='index.php'>
						<div class="inputheader">
							Email
						</div>
						<div class="inputbox">
							<input type='text' name='email' placeholder="..." required></td>
						</div>
						<div class="inputheader">
							Password
						</div>
						<div class="inputbox">
							<input type='password' name='password' placeholder="..." required>
						</div>
						<div class="tombolsubmit">
							<input type='submit' name='login' value='SIGN IN'>
						</div>
				</form>
			</div>
		
		</div>
	</div>
	
	<?php
		if(isset($_POST["login"])) {
			$email = $_POST["email"];
			$password = $_POST["password"];
			
			$result = mysqli_query($link,"SELECT * FROM admin WHERE email='$email'");
			
			if(mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
				
				if (password_verify($password, $row["password"])){
					$_SESSION['log'] = true;
					echo"<script>document.location.href = 'manajemen_akun_user.php';</script>";
				}
				else {
					echo"<script>alert('Password salah');</script>";
				}
			}
			$error = true;
		}
	?>
</body>
</html>
