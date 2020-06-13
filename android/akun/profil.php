<?php 
	include("../sistem/koneksi_database.php");
	include("../sistem/cek_session.php");
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/profile.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		//jika kotak pencarian kosong
		function validate()
		{
			obj = document.form1;
			cari = obj.cari.value;
			submitOK="True";
			if (cari =="")
			{
				alert("Masukkan kata kunci untuk cari!");
				obj.cari.focus();
				return false;
			}

			if (submitOK == false)
			{
				return false;
			}
		}
	</script>
	<script>
		function myFunction() 
		{
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") 
			{
				x.className += " responsive";
			} 
			else 
			{
				x.className = "topnav";
			}
		}
	</script>

	<div class="profilisi">
		<div class="profilatas">	
			<div class="profilpict">
				<img src="../gambar/akun/profil.png"style="width:100%;height:100%;">
			</div>
			<div class="kotakprofil">
				
				<div class="namauser">
					<?php
						session_start();
						echo $_SESSION['nama'];
					?>
				</div>
			</div>
				
		</div>

		<div class="profilbawah">
		<div class="menuprofil">
				<a href="#" class="nav__link nav__link--active">
					<i class="material-icons nav__icon">face</i>
					<span class="nav__text">Data Pribadi</span>
				</a>
				<a href="profilpenyediajasa.php" class="nav__link">
					<i class="material-icons nav__icon">card_travel</i>
					<span class="nav__text">Penyedia Jasa</span>
				</a>
			</div>		
				<div class="biodatauser">
					<div class="data1">
						<?php
							echo "<b>Id Akun</b>";?>
					</div>
					<div class="data2">
						<?php
							echo $_SESSION['id_akun'];
							$_SESSION['id_akun_utama']=$_SESSION['id_akun'];
							echo "<br>"
						?>
					</div>
				</div>

				<div class="biodatauser">
					<div class="data1">
						<?php
							echo "<b>Nama</b>";
						?>
					</div>
					<div class="data2">
						<?php
							echo  $_SESSION['nama'];echo "<br>";?>
					</div>
				</div>

				<div class="biodatauser">
					<div class="data1">
						<?php
							echo "<b>Email</b>";?></div>
					<div class="data2">
						<?php
							echo $_SESSION['email'];echo "<br>";
						?>
					</div>
				</div>

				<div class="biodatauser">
					<div class="data1">
						<?php
							echo "<b>Nomor Telepon</b>";
						?>
					</div>
					<div class="data2">
						<?php
							echo $_SESSION['nomor_telepon'];echo "<br>";
						?>
					</div>
				</div>

				<div class="buttonlogout">
					<a href="../sistem/logout.php" class="button">Logout</a>
				</div>
		</div>	
	</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="nav">
  <a href="../index.php" class="nav__link">
    <i class="material-icons nav__icon">dashboard</i>
    <span class="nav__text">Home</span>
  </a>
  <a href="bookmark.php" class="nav__link">
    <i class="material-icons nav__icon">bookmark</i>
    <span class="nav__text">Bookmark</span>
  </a>
  <a href="#" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">person</i>
    <span class="nav__text">Profile</span>
  </a>
</nav>
</body>