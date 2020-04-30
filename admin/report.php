<?php
include("cek_session.php");
include("koneksi.php");

$id_akun=$_SESSION['id_akun_utama'];
$id_jasa=$_SESSION['id_jasa'];

$perintah1="SELECT * FROM report WHERE id_akun='$id_akun' and id_jasa='$id_jasa'";
$result1=mysqli_query($konek, $perintah1);
if($row1=mysqli_fetch_array($result1)){
	echo "<script>
					alert ('Anda sudah melaporkan jasa ini!');
					 window.history.back();
				</script>";
}
else {
?>
<html>
<head>
<title>Ayo Kerja !</title>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav" id="myTopnav">
  <a href="../index.php"><b>Home</b></a>
  <a href="../logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
  <div class="box1">
  <form name=form1 method=post action="../carijasa.php" onsubmit="return validate()">
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
<div class="block6">
	<div class="font3">
		<h2>Laporkan Jasa</h2>
		</div>
		<div class="block2">
		<h3><center>Laporan anda terhadap jasa*</center></h3>
		<form name="form1" method="post" action="reportproses.php">
		<h5>Apa penyebab anda melaporkan jasa ini?<br><br>
		<select class="input" name="jenis_laporan">
<option></option>
<option>Jasa tidak sesuai keterangan di aplikasi</option>
<option>Jasa melakukan pelayanan yang sangat buruk</option>
<option>Jasa melakukan penipuan</option>
<option>Penyedia Jasa melakukan tindak kriminal</option>
<option>Jasa mengandung SARA dan kata-kata tidak pantas</option>
<option>Lain-lain</option>
</select><BR><br>
		Deskripsikan laporan anda<br><br>
		<input type="text" name="laporan" placeholder="Deskripsi Laporan" size="40"><br><br><br>
		<input type="submit" value="Laporkan" style="width:90px"><br><br>
		</form>
		<font><i>*Dengan melaporkan jasa ini, anda sepenuhnya sadar dan yakin bahwa jasa yang dimaksud melakukan pelanggaran hak konsumen (dalam hal ini pengguna jasa) dan melakukan hal-hal yang
		tidak seharusnya dilakukan sehingga merugikan pihak konsumen. Anda juga siap bertanggung jawab atas laporan yang anda berikan.</font>
		</div>
		</div>
<?php
}
?>