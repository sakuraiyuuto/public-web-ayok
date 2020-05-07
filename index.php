<?php 
	include("sistem/koneksi_database.php");
	include("sistem/cek_session_login.php");
	$_SESSION['index'] = true;
?>

<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="sistem/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="topnav" id="myTopnav">
		<a href="akun/profil.php"><b>Profil Saya</b></a>
		<a href="sistem/logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
		<div class="box1">
			<form name=form1 method=post action=carijasa.php onsubmit="return validate()">
				<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:none;">
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
		
		<div class="block2">
			<h3><center>Pilihan Kategori Jasa</center></h3>
			<div class="block7">
				<a href="jasa/reparasi.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/reparasi.png"><br>		
						Reparasi
					</div>
				</a>
		
				<a href ="jasa/konstruksi.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/konstruksi.png"><br>		 
						Konstruksi
					</div>
				</a>
			
				<a href ="jasa/desain.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/desain.png"><br>	
						Desain
					</div>
				</a>
				
				<a href ="jasa/kesehatan.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/kesehatan.png"><br>	
						Kesehatan
					</div>
				</a>
			</div>
				
			<div class="block7">
				<a href ="jasa/rumahtangga.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/rumahtangga.png"><br>	
						Rumah Tangga
					</div>
				</a>
				
				<a href ="jasa/penampilan.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/penampilan.png"><br>	
						Penampilan
					</div>
				</a>
				
				<a href ="jasa/kebersihan.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/kebersihan.png"><br>	
						Kebersihan
					</div>
				</a>
				
				<a href ="jasa/transportasi.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/transportasi.png"><br>	
						Transportasi
					</div>
				</a>
				
				<a href ="jasa/layananit.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/layananit.png"><br>	
						Layanan IT
					</div>
				</a>
				
				<a href ="jasa/pengajar.php">
					<div class="box7">
						<img src="gambar/kategori_jasa/pengajar.png"><br>	
						Pengajar
					</div>
				</a>
				
				<a href ="jasa/semuajasa.php">
					<div class="box7">
						<img src="gambar/icon/lainlain.png"><br>	
						Lain-lain
					</div>
				</a>
				
			</div>
		</div>
	</div>

<?php
include("footer.php");?>