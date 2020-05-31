<?php
	include ("../sistem/koneksi_database.php");
	session_start();

	//inisialisasi pertama

	//mengambil data kiriman
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$nomor_telepon=$_POST['nomor_telepon'];
	$password_pencocok=$_POST['password1'];
	$password=$_POST['password2'];
	//enkripsi
	$id_akun=base_convert(microtime(false), 8, 36).substr($email,0,3);
	
	//cek email terdaftar
	$perintah1 = "SELECT email FROM user WHERE email ='$email'";
	$result = mysqli_query($konek , $perintah1 );
	if(mysqli_fetch_assoc($result))
	{
		//cek password 1 dan password 2 sama
		if(($password_pencocok)!=($password))
		{
			echo "<script>
				window.location.replace(\"../akun/registrasi.php\");
				</script>";
				$_SESSION["email_sudah_terdaftar"] = true;
				$_SESSION["password_tidak_cocok"] = true;
			return false;
		}
		echo "<script>
			window.location.replace(\"../akun/registrasi.php\");
			</script>";
		$_SESSION["email_sudah_terdaftar"] = true;
		return false;
	}

	//cek password 1 dan password 2 sama
	if(($password_pencocok)!=($password))
	{
		echo "<script>
				window.location.replace(\"../akun/registrasi.php\");
			</script>";
			$_SESSION["password_tidak_cocok"] = true;
		return false;
	}
	
	//membuat akun
	$password = password_hash($password, PASSWORD_DEFAULT);
	$perintah = "INSERT INTO user (id_akun, nama, email, nomor_telepon, password) VALUES ('$id_akun', '$nama', '$email', '$nomor_telepon', '$password')";
	mysqli_query($konek , $perintah);
	SESSION_START();
	echo "<script>
			alert ('Anda berhasil daftar!');
			window.location.replace(\"../akun/profil.php\");
		  </script>";
		 
	//session_login
	$_SESSION["login"] = true;
	$_SESSION['nama']=$nama;
	$_SESSION['id_akun']=$id_akun;
	$_SESSION['nama']=$nama;
	$_SESSION['email']=$email;
	$_SESSION['nomor_telepon']=$nomor_telepon;
	$_SESSION['password']=$password;
?>