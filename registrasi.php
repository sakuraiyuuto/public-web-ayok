<?php 
include("admin/koneksi.php");
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<script type="text/javascript">
				function validate(){
					obj = document.form1;
					nama = obj.nama.value;
					email = obj.email.value;
					nomor_telepon = obj.nomor_telepon.value;
					password1 = obj.password1.value;
					password2 = obj.password2.value;
					submitOK="True";

					if (nama ==""){
						alert("Nama harus diisi!");
						obj.nama.focus();
						return false;
					}

					if (email ==""){
						alert("Email harus diisi!");
						obj.email.focus();
						return false;
					}
					
					if (nomor_telepon ==""){
						alert("Nomor Telepon harus diisi!");
						obj.nomor_telepon.focus();
						return false;
					}
					
					if (password1 ==""){
						alert("Password harus diisi!");
						obj.password.focus();
						return false; 
					}
					
					if (password2 !== password1){
						alert("Konfirmasi Password Salah!");
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
<h1>Daftar akun</h1>

<form name="form1" action="registrasiproses.php" method="post" onsubmit="return validate()">
<font>
			Nama </font>
			<input type="text" name="nama" id="nama">
			<font>Email </font>
			<input type="email" name="email" id="email">
			<font>Nomor Telepon </font>
			<input type="number" name="nomor_telepon" id="nomor_telepon">
			<font>Password </font>
			<input type="password" name="password1" id="password">
			<font>Konfirmasi Password</font>
			<input type="password" name="password2" id="password2"><p>
			<div class="row">
			<div class="partition1">
			<a href="login.php">Kembali</a></div>
			<div class="partition3">
			</div>
				<div class="partition2">
			<button type="submit" name="register" style="text-align:center;padding:7px 24px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;
			border-radius:30px;margin-top:0px;">Daftar</button></div>
</p>
</form>
</div>
</div>


<?php
include("footer.php");
?>