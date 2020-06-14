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
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	
	<h2>Data Jasa</h2>
<?php
$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status from jasa a 
					INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2");

if(isset($_POST['search'])) {
    $id = $_POST['keyword'];
	
	$sql = mysqli_query($link,"SELECT * FROM jasa WHERE id_jasa LIKE '%$id%'");
}

else if(isset($_POST['refresh'])) {
	$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status from jasa a 
					INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2");
}

else {
	$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status from jasa a 
					INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2");
}

?>

	<form action = "" method = "post">
		<input type = "text" name = "keyword" placeholder = 'cari jasa' size = '40' autocomplete = "off">
		<input type = "submit" value = 'Cari' name = 'search'>
		<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
	</form>

	<center>
		<table border = '1' width = '650px' cellpadding = '8'>
			<tr>
				<th>Id Kategori Jasa</th>
				<th>Id Jasa</th>
				<th>Id Akun</th>
				<th>Nama Jasa</th>
				<th>Keterangan</th>
				<th>Alamat</th>
				<th>Harga Min</th>
				<th>Harga Max</th>
				<th>Telepon</th>
				<th>Verifikasi Status</th>
				<th>Action</th>
			</tr>
	
<?php while($row = mysqli_fetch_assoc($sql)) : ?>
			<tr>
				<td align = 'center'>
					<?= $row['id_kategorijasa']; ?>
				</td>
				<td align = 'center'>
					<?= $row['id_jasa']; ?>
				</td>
				<td align = 'center'>
					<?= $row['id_akun']; ?>
				</td>
				<td align = 'center'>
					<?= $row['nama_jasa']; ?>
				</td>
				<td>
					<?= $row['keterangan']; ?>
				</td>
				<td>
					<?= $row['alamat']; ?>
				</td>
				<td>
					<?= $row['hargamin']; ?>
				</td>
				<td>
					<?= $row['hargamax']; ?>
				</td>
				<td align = 'center'>
					<?= $row['telepon']; ?>
				</td>
				<td align = 'center'>
					<?= $row['verifikasi_status']; ?>
				</td>
				<td align = 'center'>
					<a href = "editjasa.php?id=<?= $row['id_jasa']; ?>">Edit</a>
					<a href = "deletejasa.php?id=<?= $row['id_jasa']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
				</td>
			</tr>
<?php endwhile; ?>
		</table>
	</center>
</body>
</html>
