<?php 
	include("../sistem/koneksi_database.php");
	include("../sistem/cek_session.php");
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/editjasa.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>			
	<div class="kotak90">
	<div class="block5">
		<img src="../gambar/logo/ayok.png">
		<p>ayo <b>kerja !</b></p>
		<h1>Perbarui jasa</h1>
		<?php
			$id_akun=$_SESSION['id_akun'];
			$perintah = "SELECT * FROM jasa where id_akun='$id_akun'";
			$hasil=mysqli_query($konek, $perintah);
			if($row=mysqli_fetch_array($hasil))
			{	
				$perintah2="SELECT * FROM kategori WHERE id_kategori2='$row[0]'";
				$hasil2=mysqli_query($konek, $perintah2);
				while($row2=mysqli_fetch_array($hasil2))
				{
		?>
					<form name="form1" action="../sistem/editjasaproses.php" method="post" onsubmit="return validate()">
						<font>
						Nama Jasa </font><br>
						<input type="text" name="nama_jasa" id="nama_jasa" maxlength="200" value="<?php echo $row['nama_jasa']; ?>" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Nama Jasa Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br>
						<font>Kategori</font>
						<select class="input" name="kategorijasa" class="form-control" required=""
							oninvalid="this.setCustomValidity('Silahkan Pilih Kategori Jasa')"
							oninput="setCustomValidity('')">
							<option value="<?php echo $row2['nama_kategori']; ?>" selected hidden><?php echo $row2['nama_kategori']; ?></option>
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
						<input type="text" name="keterangan" id="keterangan" value="<?php echo $row['keterangan']; ?>" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Keterangan Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br><br>
						<font>Alamat </font>
						<input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')"
							oninput="setCustomValidity('')"><br><br>
						<font><b>Rentang Harga</b></font><br><br>
						<font>Harga Terendah</font>
						<select class="input" name="hargamin" class="form-control" required=""
							oninvalid="this.setCustomValidity('Silahkan Pilih Harta Terendah')"
							oninput="setCustomValidity('')">
							<option value="<?php echo $row['hargamin']; ?>" selected hidden><?php echo $row['hargamin']; ?></option>
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
							<option value="<?php echo $row['hargamax']; ?>" selected hidden><?php echo $row['hargamax']; ?></option>
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
						<input type="text" name="telepon" id="telepon" value="<?php echo $row['telepon']; ?>" placeholder="..."  class="form-control" required="" autocomplete="off"
							oninvalid="this.setCustomValidity('Telepon Tidak Boleh Kosong')"
							oninput="setCustomValidity('')">
						<input type="hidden" name="id_akun" value='$id_akun'>
						<div class="row">
							<div class="partition1">
								<a href="profilpenyediajasa.php">Kembali</a>
							</div>
							<div class="partition3">
								
							</div>
							<div class="partition2">
								<button type="submit" name="register">Perbarui
								</button>
							</div>
							</p>
							</form>
							<?php
				}
			}
							?>
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
<?php
	include("../footer.php");
?>