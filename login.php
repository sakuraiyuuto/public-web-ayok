<?php
session_start();
include_once("admin/koneksi.php");

if( isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit;
}
	
if(isset($_POST["login"])){

	$email = $_POST["email"];
	$password = $_POST["password"];

	$perintah = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($konek , $perintah);

	//cek username
	if (mysqli_num_rows($result) === 1){

		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){
			//set session

			$_SESSION["login"] = true;
			
	$_SESSION['id_akun']=$row['id_akun'];
	$_SESSION['nama']=$row['nama'];
	$_SESSION['email']=$row['email'];
	$_SESSION['nomor_telepon']=$row['nomor_telepon'];
	$_SESSION['password']=$row['password'];
			header('location: profil.php');
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
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<script type="text/javascript">
				function validate(){
					obj = document.form1;
					email = obj.email.value;
					submitOK="True";

					if (email ==""){
						alert("Email harus diisi!");
						obj.email.focus();
						return false;
					}
					
					if (password ==""){
						alert("Password harus diisi!");
						obj.password.focus();
						return false;
					}

					if (submitOK == false){
						return false;
					}
				}
			</script>
			
<body>

<div class="block4">
<img src="images/logo.png">
<p>ayo <b>kerja !</b></p>
<h1>Login</h1>
	<form name="form1" action="" method="post" onsubmit="return validate()">
		

		<?php 
			//pesan error
			if( isset($error)) : ?>

			<p style="font-size:90%;color :red; font-style: italic;">Email / Password Salah</p>

		<?php endif; ?>

		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="login" value="Login" style="text-align:center;width:100px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;border-radius:30px;margin-top:3%;margin-bottom:3%;">
		</form>
		<p>
	Belum punya akun?<a href="registrasi.php" style="text-align:center">Daftar sekarang.</a></p>

	
	</div>
</body>
</html>
