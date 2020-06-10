<?php 
	include("sistem/koneksi_database.php");
	include("sistem/cek_session_login.php");
	$_SESSION['index'] = true;
?>

<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="sistem/home.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript">
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


	<div class="home">
		<div class="pencarian_jasa">
			<form name=form1 method=post action=akun/carijasa.php onsubmit="return validate()">
				<input class="input" type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:75%;height:30px;border-radius:30px;padding-left:10px;border:none;">
				<input type=submit style="width:40px;height:30px;border-radius:10px;border:none;cursor:pointer;border:none;background-color:white;margin-left:1px;" value="Cari">
			</form>
		</div>
		<div class="deskirpsi_home">
			<h1>Hot Offers !</h1>
			<p>
				Cari jasa terbaik dan
			</p>
			<p>
				terverifikasi yang kami 
			</p>
			<p>
				rekomendasikan !
			</p>
			<a href="akun/iklanrekomendasi.php">
				<div class="tombol_rekomendasi">
					Cek rekomendasi !
				</div>
			</a>
		</div>
		
		<div class="home_menu">
			<h3><center>Pilihan Kategori Jasa</center></h3>
			
			<div class="kategori_jasa">
				<a href="jasa/elektronik.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/elektronik.png"><br>		
						Elektronik
					</div>
				</a>
				
				<a href="jasa/bengkel.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/bengkel.png"><br>		
						Bengkel
					</div>
				</a>
				
				<a href ="jasa/arsitek.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/arsitek.png"><br>		 
						Arsitek
					</div>
				</a>
			
				<a href ="jasa/tukang.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/tukang.png"><br>	
						Tukang
					</div>
				</a>
				
				<a href ="jasa/logoposterbanner.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/logoposterbanner.png"><br>	
						Logo, Poster dan Banner
					</div>
				</a>
		
				<a href ="jasa/pakaian.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/pakaian.png"><br>	
						Pakaian
					</div>
				</a>
				
				<a href ="jasa/lukisan.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/lukisan.png"><br>	
						Lukisan
					</div>
				</a>
				
				<a href ="jasa/dokter.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/dokter.png"><br>	
						Dokter
					</div>
				</a>
				
				<a href ="jasa/pijat.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/pijat.png"><br>	
						Pijat
					</div>
				</a>
				
				<a href ="jasa/terapi.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/terapi.png"><br>	
						Terapi
					</div>
				</a>
				
				<a href ="jasa/asistenrumahtangga.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/asistenrumahtangga.png"><br>	
						Asisten Rumah Tangga
					</div>
				</a>
				
				<a href ="jasa/tukangkebun.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/tukangkebun.png"><br>	
						Tukang Kebun
					</div>
				</a>
				
				<a href ="jasa/pengasuhbayidananak.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/pengasuhbayidananak.png"><br>	
						Pengasuh Bayi dan Anak
					</div>
				</a>
				
				<a href ="jasa/angkutanpindahrumah.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/angkutanpindahrumah.png"><br>	
						Angkutan Pindah Rumah
					</div>
				</a>
				
				<a href ="jasa/perawatantubuh.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/perawatantubuh.png"><br>	
						Perawatan Tubuh
					</div>
				</a>
				
				<a href ="jasa/salon.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/salon.png"><br>	
						Salon
					</div>
				</a>
				
				<a href ="jasa/pangkasrambut.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/pangkasrambut.png"><br>	
						Pangkas Rambut
					</div>
				</a>
				
				<a href ="jasa/makeupacara.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/makeupacara.png"><br>	
						Make Up Acara
					</div>
				</a>
				
				<a href ="jasa/layanankebersihanrumah.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/layanankebersihanrumah.png"><br>	
						Layanan Kebersihan Rumah
					</div>
				</a>
				
				<a href ="jasa/cucikendaraan.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/cucikendaraan.png"><br>	
						Cuci Kendaraan
					</div>
				</a>
				
				<a href ="jasa/supir.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/supir.png"><br>	
						Supir
					</div>
				</a>
				
				<a href ="jasa/appsistemweb.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/appsistemweb.png"><br>	
						App, Sistem dan Web
					</div>
				</a>
				
				<a href ="jasa/dataoriented.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/dataoriented.png"><br>	
						Data Oriented
					</div>
				</a>
			
				<a href ="jasa/gurules.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/gurules.png"><br>	
						Guru Les
					</div>
				</a>
				
				<a href ="jasa/personaltrainer.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/personaltrainer.png"><br>	
						Personal Trainer
					</div>
				</a>
			<!--Semua Jasa-->
			
				<a href ="jasa/semuajasa.php">
					<div class="kotak_jasa">
						<img src="gambar/kategori_jasa/semuajasa.png"><br>	
						Lihat Semua Jasa
					</div>
				</a>
			</div>
		</div>
	</div>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="nav">
  <a href="#" class="nav__link nav__link--active"">
    <i class="material-icons nav__icon">dashboard</i>
    <span class="nav__text">Home</span>
  </a>
  <a href="akun/bookmark.php" class="nav__link">
    <i class="material-icons nav__icon">bookmark</i>
    <span class="nav__text">Bookmark</span>
  </a>
  <a href="akun/profil.php" class="nav__link">
    <i class="material-icons nav__icon">person</i>
    <span class="nav__text">Profile</span>
  </a>
</nav>

<!--<div class="profilbookmark">
				<a href="bookmark.php">Lihat jasa tersimpan</a>
			</div>
-->
		</body>