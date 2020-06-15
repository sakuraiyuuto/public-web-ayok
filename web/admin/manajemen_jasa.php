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
	<link rel="stylesheet" href="manajemen_jasa.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a href="manajemen_akun_user.php">
						<span>Akun User</span>
					</a>
				</li>
				<li>
					<a class="active" href="#">				
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
						<div class="judul-konten">
							<font>Manajemen Jasa</font>
						</div>
						<div class="kotak-pencarian">
						<form action = "" method = "post">
							<input type = "text" name = "keyword" placeholder = 'cari jasa' size = '40' autocomplete = "off">
							<input type = "submit" value = 'Cari' name = 'search'>
							<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
						</form>
						</div>
						<div class="table-data">
						<table>
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
						</div>						
		</div>
	</div>
</body>
</html>
