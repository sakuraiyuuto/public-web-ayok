<?php 
	include("sistem/koneksi_database.php");
	include("sistem/cek_session_login.php");
	$_SESSION['index'] = true;
?>

<html>
<head>
	<title>Ayo Kerja !</title>
	<script src="https://kit.fontawesome.com/8c5a0c8768.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="sistem/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
		<!--navigation bar-->
	<div class="topnav" id="myTopnav">
	<img src="gambar/logo/ayok.png">
		<a href="akun/profil.php"><b>Profil Saya</b></a>
		<a href="sistem/logout.php"><b>Log Out</b></a>
		<div class="box1">
			<form name=form1 method=post action=carijasa.php onsubmit="return validate()">
				<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:1px solid gray;">
				<input type=submit style="width:40px;height:30px;border-radius:10px;border:none;cursor:pointer;border:none;background-color:white;margin-left:1px;" value="Cari">
			</form>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	

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

			if (submitOK == false
			
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

	
	<div class="block1">
		<div class="font1">
			<h1>Hot Offers !</h1>
			Cari jasa terbaik dan<br>
			terverifikasi yang kami <br>
			rekomendasikan !
			<br>
			<a href="akun/iklanrekomendasi.php">
				<div class="button1">
					Cek rekomendasi ! >>
				</div>
			</a>
	</div>
		</div>
		
		<div class="block2">
			<h3><center>Pilihan Kategori Jasa</center></h3>
			
			<div class="block7">
			<!--Reparasi-->
				<a href="jasa/elektronik.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-charging-station"></i> 
					</div>
					<br>
						Elektronik
					
					</div>
				</a>
				
				<a href="jasa/bengkel.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-tools"></i> 
					</div><br>		
						Bengkel
					</div>
				</a>
				
			<!--konstruksi-->
				<a href ="jasa/arsitek.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-home"></i> 
					</div><br>		 
						Arsitek
					</div>
				</a>
			
				<a href ="jasa/tukang.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-hammer"></i> 
					</div><br>	
						Tukang
					</div>
				</a>
				
			<!--desain-->
				<a href ="jasa/logoposterbanner.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-object-ungroup"></i> 
					</div><br>	
						Logo, Poster dan Banner
					</div>
				</a>
		
				<a href ="jasa/pakaian.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-tshirt"></i> 
					</div><br>	
						Pakaian
					</div>
				</a>
				
				<a href ="jasa/lukisan.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-palette"></i> 
					</div><br>	
						Lukisan
					</div>
				</a>
				
			<!--kesehatan-->
				<a href ="jasa/dokter.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-heartbeat"></i> 
					</div><br>	
						Dokter
					</div>
				</a>
				
				<a href ="jasa/pijat.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-sign-language"></i> 
					</div><br>	
						Pijat
					</div>
				</a>
				
				<a href ="jasa/terapi.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-spa"></i> 
					</div><br>	
						Terapi
					</div>
				</a>
				
			<!--rumah tangga-->
				<a href ="jasa/asistenrumahtangga.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-broom"></i> 
					</div><br>	
						Asisten Rumah Tangga
					</div>
				</a>
				
				<a href ="jasa/tukangkebun.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-tree"></i> 
					</div><br>	
						Tukang Kebun
					</div>
				</a>
				
				<a href ="jasa/pengasuhbayidananak.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-child"></i> 
					</div><br>	
						Pengasuh Bayi dan Anak
					</div>
				</a>
				
				<a href ="jasa/angkutanpindahrumah.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-people-carry"></i> 
					</div><br>	
						Angkutan Pindah Rumah
					</div>
				</a>
				
			<!--penampilan-->
				<a href ="jasa/perawatantubuh.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-hot-tub"></i> 
					</div><br>	
						Perawatan Tubuh
					</div>
				</a>
				
				<a href ="jasa/salon.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-female"></i> 
					</div><br>	
						Salon
					</div>
				</a>
				
				<a href ="jasa/pangkasrambut.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-scissors"></i> 
					</div><br>	
						Pangkas Rambut
					</div>
				</a>
				
				<a href ="jasa/makeupacara.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-"></i> 
					</div><br>	
						Make Up Acara
					</div>
				</a>
				
			<!--kebersihan-->	
				<a href ="jasa/layanankebersihanrumah.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-pump-soap"></i> 
					</div><br>	
						Layanan Kebersihan Rumah
					</div>
				</a>
				
				<a href ="jasa/cucikendaraan.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-soap"></i> 
					</div><br>	
						Cuci Kendaraan
					</div>
				</a>
				
			<!--transportasi-->
				<a href ="jasa/supir.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-car"></i> 
					</div><br>	
						Supir
					</div>
				</a>
				
			<!--Layanan IT-->
				<a href ="jasa/appsistemweb.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-laptop-house"></i> 
					</div><br>	
						App, Sistem dan Web
					</div>
				</a>
				
				<a href ="jasa/dataoriented.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-database"></i> 
					</div><br>	
						Data Oriented
					</div>
				</a>
			
			<!--Layanan IT-->
				<a href ="jasa/gurules.php">
					<div class="box7">
					<div class='jasa_icon'>
					<div class='jasa_icon'>
					<i class="fas fa-chalkboard-teacher"></i> 
					</div></i> 
					</div><br>	
						Guru Les
					</div>
				</a>
				
				<a href ="jasa/personaltrainer.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-dumbbell"></i> 
					</div><br>	
						Personal Trainer
					</div>
				</a>
			<!--Semua Jasa-->
			
				<a href ="jasa/semuajasa.php">
					<div class="box7">
					<div class='jasa_icon'>
					<i class="fas fa-plus"></i> 
					</div><br>	
						Lihat Semua Jasa
					</div>
				</a>
			</div>
		</div>
	</div>

<?php
include("footer.php");?>