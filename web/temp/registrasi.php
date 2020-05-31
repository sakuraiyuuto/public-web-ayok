<?php
include_once("admin/koneksi.php");

function registrasi($data){
	global $konek;

	$email = strtolower(stripslashes($data["email"]));
	$nomor_telepon = strtolower(stripslashes($data["nomor_telepon"]));
	$password = mysqli_real_escape_string($konek, $data["password"]);
	$password2 = mysqli_real_escape_string($konek, $data["password2"]);

	// cek username sudah ada atau belum 
	$perintah1 = "SELECT email FROM user WHERE email ='$email'";
	$result = mysqli_query($konek , $perintah1 );

	if(mysqli_fetch_assoc($result)){
		echo "	<script>
					alert ('email sudah telah terdaftar!');
				</script>";
		return false;
	}


	// cek konfirmasi password
	if($password !== $password2){
		echo"<script>
			alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	//enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	//tambahkan userr= ke database
	$perintah = "INSERT INTO user VALUES('' ,'$email', '$nomor_telepon', '$password')";
	mysqli_query($konek , $perintah);

	return mysqli_affected_rows($konek);
}

if( isset($_POST["register"]) ){

	if(registrasi($_POST)> 0){
		echo "<script>
			 alert('user baru berhasil ditambahkan!');
			 </script>";
	} else {
		echo mysqli_error($konek);  
	}

}

?>

<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="admin/style.css">
</head>

<script type="text/javascript">
				function validate(){
					obj = document.form1;
					email = obj.email.value;
					password = obj.password.value;
					nomor_telepon = obj.nomor_telepon.value;
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
					
					if (nomor_telepon ==""){
						alert("Nomor Telepon harus diisi!");
						obj.nomor_telepon.focus();
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
<h1>Daftar akun</h1>

<form name="form1" action="" method="post" onsubmit="return validate()">
<font>
			Email </font>
			<input type="email" name="email" id="email">
			<font>Nomor Telepon </font>
			<input type="number" name="nomor_telepon" id="nomor_telepon">
			<font>Password </font>
			<input type="password" name="password" id="password">
			<font>Konfirmasi Password</font>
			<input type="password" name="password2" id="password2"><p>
			<button type="submit" name="register" style="text-align:center;height:30px;width:100px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;
			border-radius:30px;margin-top:5%;margin-bottom:3%;" onclick="self.history.go(-2)">Register</button>
</p>
</form>

</body>
</html>