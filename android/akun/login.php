<?php
	session_start();
	include_once("../sistem/koneksi_database.php");

	//jika sudah login
	if (isset($_SESSION["login"]))
	{
		header("Location: ../index.php");
		exit;
	}
	//cek akun terdaftar
	if(isset($_POST["login"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
	
		$perintah = "SELECT * FROM user WHERE email = '$email'";
		$result = mysqli_query($konek , $perintah);

		//cek username
		if (mysqli_num_rows($result) === 1)
		{
			//cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"]))
			{
				//set session akun		
				$_SESSION["login"] = true;
				$_SESSION['id_akun']=$row['id_akun'];
				$_SESSION['nama']=$row['nama'];
				$_SESSION['email']=$row['email'];
				$_SESSION['nomor_telepon']=$row['nomor_telepon'];
				$_SESSION['password']=$row['password'];
				header('location: ../akun/profil.php');
				exit;
			}
		}
		$error = true;
	}
?>

<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>	
<body>
	<!--form login -->
	<div class="login-form">
		<div class ="box">
			<div class="img">
				<img src="../gambar/logo/ayok.png" alt="logo_ayok"/>
			</div>
			<div class="description">
				<p>ayo <b>kerja !</b></p>
			</div>
			<div class="heading">
				<h1>Login</h1>
			</div>
			<div class="form-fields">
				<form name="form1" action="" method="post">
					<?php 
						//pesan error
						if(isset($error)) : 
					?>
					<p style="font-size:90%;color :red; font-style: italic;">Email / Password Salah</p>
					<?php endif; ?>
					<div class="input-box">
						<input 	type="text" name="email" placeholder="Email" class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Masukkan Email Anda')"
						oninput="setCustomValidity('')"></input>
						<span><img src="../gambar/icon/email.png" /></span>
					</div>
					<div class="input-box">
						<input type="password" name="password" placeholder="Password" class="form-control" required=""
						oninvalid="this.setCustomValidity('Masukkan Password Anda')"
						oninput="setCustomValidity('')"></input>
						<span><img src="../gambar/icon/password.png" /></span>
					</div>
					<div class="button-box">
						<button type="submit" name="login">Login</button>
					</div>
				</form>
			</div>
			<div class="buat-akun">
				<p> Belum punya akun? </p>
				<p> <a href="../akun/registrasi.php" style="text-align:center"> Tekan Untuk Mendaftar</a> </p>
			</div>
		</div>
	</div>
</body>
</html>
