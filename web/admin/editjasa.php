<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["log"])) {
	header('location: index.php');
}
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="editjasa.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a  href="manajemen_akun_user.php">
						<span>Akun User</span>
					</a>
				</li>
				<li>
					<a class="active" href="manajemen_jasa.php">				
						<span>Jasa</span>
					</a>
				</li>
				<li>
					<a href="manajemen_review.php">
						<span>Reviews</span>
					</a>
				<li>
					<a href="manajemen_laporan_jasa.php">
						<span>Laporan Jasa</span>
					</a>
				</li>
				<li>
					<a href="logout.php">	
						<span>Log Out</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="main-content">
		<div class="isi-content">
		<?php		
			$idjasa  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status from jasa a 
								INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2");
			$jasa = mysqli_fetch_assoc($sql);
		?>
					<div class="judul-konten">
							<font>Edit Jasa</font>
					</div>
						<div class="table-data">
							<table>
							</table>
						</div>		
						<div class="kolom-edit">
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
										<td><input type = "text" name = "telepon" value = '<?= $jasa['telepon']; ?>'></td>
									</tr>
									<tr>
										<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
										<td colspan = '2' align = 'right'><input type = "submit" value = 'Batal' name = 'batal'></td>
									</tr>
								</table>
							</form>
						</div>
		</div>
	</div>
	<?php 				
		if(isset($_POST['ubah'])){
			$namajasa = $_POST['nama'];
			$keterangan = $_POST['keterangan'];
			$alamat = $_POST['alamat'];
			$hargamin = $_POST['hargamin'];
			$hargamax = $_POST['hargamax'];
			$telepon = $_POST['telepon'];
			$update = mysqli_query($link,"UPDATE jasa SET nama_jasa = '$namajasa', keterangan = '$keterangan', alamat = '$alamat', hargamin = '$hargamin', hargamax = '$hargamax', telepon = '$telepon' WHERE id_jasa = '$idjasa'");
			$sql = mysqli_fetch_assoc($update);
			echo"<script>
					document.location.href = 'editjasa.php';
				</script>";
		}
		else if(isset($_POST['batal'])) {
			header("Location: manajemen_jasa.php");
		}
	?>
</body>
</html>