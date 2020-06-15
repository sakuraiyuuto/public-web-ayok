<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["log"])) {
	header('location: index.php');
}
?>
<html>
<head>
	<title>Edit Jasa</title>
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
				return true;
		}
	</script>
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	<a href="timeline5.php">Manajemen Akun Admin</a>
	
	<h2>Edit Jasa</h2>
<?php		
$idjasa  = $_GET['id'];

$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status, d.nama_foto from jasa a 
					INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2 INNER JOIN foto d ON a.id_jasa = d.id_jasa WHERE a.id_jasa = '$idjasa'");
$jasa = mysqli_fetch_assoc($sql);

?>
	<center>
	<table border = '1' width = '650px' cellpadding = '8'>
		<tr>
			<th>Id Kategori Jasa</th>
			<th>Id Jasa</th>
			<th>Id Akun</th>
			<th>Nama Jasa</th>
			<th>Foto Jasa</th>
			<th>Keterangan</th>
			<th>Alamat</th>
			<th>Harga Min</th>
			<th>Harga Max</th>
			<th>Telepon</th>
			<th>Verifikasi Status</th>	
		</tr>
		<tr>
			<td align = 'center'><?= $jasa['id_kategorijasa']; ?></td>
			<td align = 'center'><?= $jasa['id_jasa']; ?></td>
			<td align = 'center'><?= $jasa['id_akun']; ?></td>
			<td align = 'center'><?= $jasa['nama_jasa']; ?></td>
			<td align = 'center'><?php echo "<img src='gambar/penyedia_jasa/$jasa[nama_foto]' width='70' height='90'/>";?></td>
			<td><?= $jasa['keterangan']; ?></td>
			<td><?= $jasa['alamat']; ?></td>
			<td align = 'center'><?= $jasa['hargamin']; ?></td>
			<td align = 'center'><?= $jasa['hargamax']; ?></td>
			<td align = 'center'><?= $jasa['telepon']; ?></td>
			<td align = 'center'><?php $verif = $jasa['verifikasi_status']; if($verif == '0') { echo"Tidak";} else { echo"Ya";} ?></td>
		</tr>
	</table>
	</center>
	<form action = "" method = "post">
		Id Jasa:<input type = "hidden" name = "id" value = '<?= $jasa['id_jasa']; ?>'><br>
		<b><?= $jasa['id_jasa']; ?></b><br>
		<table cellpadding = '5'>
			<tr>
				<td align = 'left'><b>Nama Jasa</b></td>
				<td><input type = "text" name = "nama" value = '<?= $jasa['nama_jasa']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Keterangan</b></td>
				<td><input type = "text" name = "hargamin" value = '<?= $jasa['keterangan']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Alamat</b></td>
				<td><textarea name = "alamat"><?= $jasa['alamat']; ?></textarea></td>
			</tr>
			<tr>
				<td align = 'left'><b>Harga Min</b></td>
				<td><input type = "text" name = "hargamin" value = '<?= $jasa['hargamin']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Harga Max</b></td>
				<td><input type = "text" name = "hargamax" value = '<?= $jasa['hargamax']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Telepon</b></td>
				<td><input type = "text" name = "telepon" onkeypress="return hanyaAngka(event)" value = '<?= $jasa['telepon']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Verifikasi Status</b></td>
				<td><select style="width: 100%;" name="verifikasi">
<?php $verif = $jasa['verifikasi_status']; if($verif == '0'){ $status = 'Tidak';} else {$status = 'Ya';}?>
						<option selected="selected" hidden value = "data die"><?php echo"$status"; ?></option>
						<option value = 'Ya' name = 'terverifikasi'>Ya</option>
						<option value = 'Tidak' name = 'tidakterverifikasi'>Tidak</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Batal' name = 'batal'></td>
			</tr>
		</table>
	</form>
<?php 				
if(isset($_POST['ubah'])){
	$namajasa = $_POST['nama'];
	$keterangan = $_POST['keterangan'];
	$alamat = $_POST['alamat'];
	$hargamin = $_POST['hargamin'];
	$hargamax = $_POST['hargamax'];
	$telepon = $_POST['telepon'];
	$verifikasi = $_POST['verifikasi'];
	$update = mysqli_query($link,"UPDATE jasa SET nama_jasa = '$namajasa', keterangan = '$keterangan', alamat = '$alamat', hargamin = '$hargamin', hargamax = '$hargamax', telepon = '$telepon', verifikasi_status = '$verifikasi' WHERE id_jasa = '$idjasa'");
	$sql = mysqli_fetch_assoc($update);
	echo"<script>
			document.location.href = 'timeline3.php';
		</script>";
}
else if(isset($_POST['batal'])) {
	header("Location: timeline3.php");
}
?>
</body>
</html>