<?php 
	include("../sistem/koneksi_database.php");
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/register.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


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

	<!--form register -->
	<div class="register-form">
		<div class ="box">
			<div class="tombol-kembali">
				<a href="../akun/login.php" style="text-align:center"> Kembali</a> 
			</div>
			<div class="heading">
				<h1>Daftar Akun</h1>
			</div>
			<?php 
				//pesan error email terdaftar
				if(isset($_SESSION["email_sudah_terdaftar"]))
				{
					if($_SESSION["email_sudah_terdaftar"]==true)
					{
						?>
							<p style="font-size:90%;color :red; font-style: italic;">Email Sudah Terdaftar</p>
						<?php
						$_SESSION["email_sudah_terdaftar"] = false;
					}
				}
				if(isset($_SESSION["password_tidak_cocok"]))
				{
					if($_SESSION["password_tidak_cocok"]==true)
					{
						?>
							<p style="font-size:90%;color :red; font-style: italic;">Password dan Password Konfirmasi Tidak Cocok</p>
						<?php
						$_SESSION["password_tidak_cocok"] = false;
					}
				}
			?>
				
		
			<div class="form-fields">
				<form name="form1" action="../sistem/registrasiproses.php" method="post" onsubmit="return validate()">
					<div class="input-box">
						<p>Nama Lengkap</p>
						<input type="text" name="nama" id="nama" placeholder="..." class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')"
						oninput="setCustomValidity('')"></input>
					</div>
					<div class="input-box">
						<p>Email</p>
						<input type="email" name="email" id="email" placeholder="..." class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Email Harus Sesuai Format')"
						oninput="setCustomValidity('')"></input>
					</div>
					<div class="input-box">
						<p>Nomor Telepon</p>
						<input type="number" name="nomor_telepon" id="nomor_telepon" placeholder="..." class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')"
						oninput="setCustomValidity('')"></input>
					</div>
					<div class="input-box">
						<p>Password</p>
						<input type="password" name="password1" id="password1" placeholder="..." class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Masukkan Password Anda')"
						oninput="setCustomValidity('')"></input>
					</div>
					<div class="input-box">
						<p>Konfirmasi Password</p>
						<input type="password" name="password2" id="password2" placeholder="..." class="form-control" required="" autocomplete="off"
						oninvalid="this.setCustomValidity('Masukkan Password Anda')"
						oninput="setCustomValidity('')"></input>
					</div>
					<div class="term">
						<p>
							By continuing, I confirm that I have read & agree to the "Terms & Conditions" and "Privacy Policy".
						</p>
					</div>
					<div class="button-box">
						<button type="submit" name="register">Register</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</body>
</html>