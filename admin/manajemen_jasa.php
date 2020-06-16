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
					<a href="manajemen_akun_admin.php">
						<span>Akun Admin</span>
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
				$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status, d.nama_foto from jasa a 
									INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2 INNER JOIN foto d ON a.id_jasa = d.id_jasa");
				if(isset($_POST['search'])) {
					$id = $_POST['keyword'];
					$sql = mysqli_query($link,"SELECT * FROM jasa WHERE id_jasa LIKE '%$id%'");
				}
				else if(isset($_POST['refresh'])) {
					$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status, d.nama_foto from jasa a 
									INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2 INNER JOIN foto d ON a.id_jasa = d.id_jasa");
				}
				else {
					$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status, d.nama_foto from jasa a 
									INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2 INNER JOIN foto d ON a.id_jasa = d.id_jasa");
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
									<th>No</th>
									<th>Id Jasa</th>
									<th>Kategori Jasa</th>
									<th>Id Akun</th>
									<th>Foto Jasa</th>
									<th>Nama Jasa</th>
									<th>Keterangan</th>
									<th>Alamat</th>
									<th>Harga Min</th>
									<th>Harga Max</th>
									<th>Telepon</th>
									<th>Verifikasi Status</th>
									<th>Action</th>
								</tr>
					<?php $i=1;?>
					<?php while($row = mysqli_fetch_assoc($sql)) : ?>
								<tr>
									<td><?=$i;?></td>									
									<td align = 'center'>
										<?= $row['id_jasa']; ?>
									</td>
									<?php
										$id_kategorijasa = $row['id_kategorijasa'];
										$perintah2="SELECT * FROM kategori WHERE id_kategori2='$id_kategorijasa'";
										$hasil2=mysqli_query($link, $perintah2);
										while($row2=mysqli_fetch_array($hasil2))
										{	
											$nama_kategorijasa=$row2[3];
										}
									?>	
									<td align = 'center'>
										<?= $nama_kategorijasa; ?>
									</td>
									<td align = 'center'>
										<?= $row['id_akun']; ?>
									</td>
									<td align = 'center'>
										<?php $imageURL = '../database/akun/foto_jasa/'.$row["nama_foto"];?>
										<img src="<?php echo $imageURL; ?>" alt="" width='70' height='90'/>
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
										<?php $verif = $row['verifikasi_status']; if($verif == '0') { echo"Tidak";} else { echo"Ya";} ?>
									</td>
									<td align = 'center'>
										<a href = "editjasa.php?id=<?= $row['id_jasa']; ?>">Edit</a>
										<a href = "deletejasa.php?id=<?= $row['id_jasa']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
									</td>
								</tr>
								<?php $i++;?>
					<?php endwhile; ?>
							</table>
						</div>						
		</div>
	</div>
</body>
</html>
