<?php 
include("admin/koneksi.php");
include("admin/cek_session_login.php");
?>
<html>
<head>
<title>AYOK</title>
<link rel="stylesheet" href="admin/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav" id="myTopnav">
  <a href="profil.php"><b>Profil Saya</b></a>
  <a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
  <div class="box1">
  <form name=form2 method=post action=carijasa.php>
<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:none;">
<input type=submit style="width:40px;height:30px;border-radius:10px;border:none;cursor:pointer;border:none;background-color:white;margin-left:1px;" value="Cari">
</form>
</div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<script type="text/javascript">
				function validate(){
					obj = document.form1;
					nama_jasa = obj.nama_jasa.value;
					kategorijasa = obj.kategorijasa.selectedIndex;
					keterangan = obj.keterangan.value;
					alamat = obj.alamat.value;
					hargamin = obj.hargamin.selectedIndex;
					hargamax = obj.hargamax.selectedIndex;
					telepon = obj.telepon.value;
					submitOK="True";

					if (nama_jasa ==""){
						alert("Nama Jasa harus diisi!");
						obj.nama_jasa.focus();
						return false;
					}

					if (kategorijasa ==""){
						alert("Kategori Jasa harus dipilih!");
						obj.kategorijasa.focus();
						return false;
					}
					
					if (keterangan ==""){
						alert("Keterangan harus diisi!");
						obj.keterangan.focus();
						return false;
					}
					
					if (alamat ==""){
						alert("Alamat harus diisi!");
						obj.alamat.focus();
						return false;
					}
					
					if (hargamin ==""){
						alert("Mohon isi harga terendah.");
						obj.hargamax.focus();
						return false;
					}
					
					if (hargamax ==""){
						alert("Mohon isi harga tertinggi.");
						obj.hargamin.focus();
						return false;
					}
					
					if (telepon ==""){
						alert("Mohon isi nomor telepon");
						obj.telepon.focus();
						return false;
					}
					
					if (submitOK == false){
						return false;
					}
				}
			</script>
			
			
<div class="block5">
<img src="images/logo.png">
<p>ayo <b>kerja !</b></p>
<h1>Daftar jasa</h1>

<form name="form1" action="inputjasaproses.php" method="post" onsubmit="return validate()">
<font>
			Nama Jasa </font><br>
			<input type="text" name="nama_jasa" id="nama_jasa" maxlength="200"><br>
			<font>Kategori</font>
			<select class="input" name="kategorijasa">
			<option selected=""></option>
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
			<input type="text" name="keterangan" id="keterangan"><br>
			<font>Alamat </font>
			<input type="text" name="alamat" id="alamat"><br><br>
			<font><b>Rentang Harga</b></font><br><br>
			<font>Harga Terendah</font>
			<select class="input" name="hargamin">
			<option selected=""></option>
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
<select class="input" name="hargamax">
<option selected=""></option>
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
			<input type="text" name="telepon" id="telepon">
			<div class="row">
			<div class="partition1">
			<a href="profil.php">Kembali</a></div>
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