<?php 
	include("../sistem/koneksi_database.php");
	include("../sistem/cek_session_login.php");
?>
<html>
<head>
	<title>AYOK</title>
	<link rel="stylesheet" href="../sistem/inputjasa.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="kotak90">
		<div class="block5">
			<img src="../gambar/logo/ayok.png">
			<p>ayo <b>kerja !</b></p>
			<h1>Daftar jasa</h1>
			<form name="form1" action="../sistem/inputjasaproses.php" method="post">
			<font> Nama Jasa </font><br>
			<input type="text" name="nama_jasa" id="nama_jasa" maxlength="200"  placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Nama Jasa Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br>
			<font>Kategori</font>
			<select class="input" name="kategorijasa" class="form-control" required=""
							oninvalid="this.setCustomValidity('Silahkan Pilih Kategori Jasa')"
							oninput="setCustomValidity('')">
				<option disabled value="" selected hidden>...</option>
				<option>Reparasi Elektronik</option>
				<option>Bengkel</option>
				<option>Arsitek</option>
				<option>Tukang</option>
				<option>Logo, Poster, dan Banner</option>
				<option>Desain Pakaian</option>
				<option>Lukisan</option>
				<option>Pijat</option>
				<option>Terapi</option>
				<option>Dokter</option>
				<option>Salon</option>
				<option>Pangkas Rambut</option>
				<option>Perawatan Tubuh</option>
				<option>Make Up Acara</option>
				<option>Asisten Rumah Tangga</option>
				<option>Tukang Kebun</option>
				<option>Pengasuh Bayi dan Anak</option>							
				<option>Angkutan Pindah Rumah</option>
				<option>Layanan Kebersihan Rumah</option>
				<option>Cuci Kendaraan</option>
				<option>Supir</option>
				<option>Apps, Sistem, dan Web</option>
				<option>Data Oriented</option>
				<option>Guru Les</option>
				<option>Personal Trainer</option>
			</select><br>
			<font>Keterangan </font>
			<input type="text" name="keterangan" id="keterangan" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br>
			<font>Alamat </font>
			<input type="text" name="alamat" id="alamat" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br><br>
			<font><b>Rentang Harga</b></font><br><br>
			<font>Harga Terendah</font>
			<select class="input" name="hargamin" class="form-control" required=""
							oninvalid="this.setCustomValidity('Silahkan Pilih Harta Terendah')"
							oninput="setCustomValidity('')">
				<option disabled value="" selected hidden>...</option>
				<option>Rp1.000</option>
				<option>Rp5.000</option>
				<option>Rp10.000</option>
				<option>Rp20.000</option>
				<option>Rp30.000</option>
				<option>Rp40.000</option>
				<option>Rp50.000</option>
				<option>Rp100.000</option>
				<option>Rp150.000</option>
				<option>Rp200.000</option>
				<option>Rp300.000</option>
				<option>Rp400.000</option>
				<option>Rp500.000</option>
				<option>Rp750.000</option>
				<option>Rp1.000.000</option>
				<option>Rp2.000.000</option>
			</select><BR>
			<font>Harga Tertinggi</font>
			<select class="input" name="hargamax" class="form-control" required=""
							oninvalid="this.setCustomValidity('Silahkan Pilih Harga Tertinggi')"
							oninput="setCustomValidity('')">
				<option disabled value="" selected hidden>...</option>
				<option>Rp20.000</option>
				<option>Rp30.000</option>
				<option>Rp40.000</option>
				<option>Rp50.000</option>
				<option>Rp100.000</option>
				<option>Rp150.000</option>
				<option>Rp200.000</option>
				<option>Rp300.000</option>
				<option>Rp400.000</option>
				<option>Rp500.000</option>
				<option>Rp750.000</option>
				<option>Rp1.000.000</option>
				<option>Rp2.000.000</option>
				<option>Rp3.000.000</option>
				<option>Rp4.000.000</option>
				<option>Rp5.000.000</option>
				<option>Rp6.000.000</option>
				<option>Rp7.000.000</option>
				<option>Rp8.000.000</option>
				<option>Rp9.000.000</option>
				<option>Rp10.000.000</option>
				<option>Rp20.000.000</option>
				<option>Rp30.000.000</option>
				<option>Rp40.000.000</option>
				<option>Rp50.000.000</option>
				<option>Rp100.000.000</option>
			</select><br>
			<font>Telepon </font>
			<input type="number" name="telepon" id="telepon" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Telepon Tidak Boleh Kosong')"
							oninput="setCustomValidity('')">
			<div class="row">
				<div class="partition1">
					<a href="profilpenyediajasa.php">Kembali</a>
				</div>
				<div class="partition3">
				</div>
				<div class="partition2">
					<button type="submit" name="register">Daftar</button>
				</div>
				</p>
		</form>
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