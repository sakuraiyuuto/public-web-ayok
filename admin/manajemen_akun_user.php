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
	<link rel="stylesheet" href="manajemen_akun_user.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a class="active" href="#">
						<span>Akun User</span>
					</a>
				</li>
				<li>
					<a href="manajemen_jasa.php">				
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
					$sql = mysqli_query($link,"SELECT * FROM user");

					if(isset($_POST['search'])) {
						$id_akun = $_POST['keyword'];
						$sql = mysqli_query($link,"SELECT * FROM user WHERE id_akun LIKE '%$id_akun%'");
					}

					else if(isset($_POST['refresh'])) {
						$sql = mysqli_query($link,"SELECT * FROM user");
					}

					else {
						$sql = mysqli_query($link,"SELECT * FROM user");
					}

					?>	
						<div class="judul-konten">
							<font>Manajemen Akun User</font>
						</div>
						<div class="kotak-pencarian">
						<form action = "" method = "post">
							<input type = "text" name = "keyword" placeholder = 'cari user' size = '40' autocomplete = "off">
							<input type = "submit" value = 'Cari' name = 'search'>
							<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
						</form>
						</div>
						
						<div class="table-data">
						<table>
								<tr>
									<th>No</th>
									<th>Id User</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Nomor Telepon</th>
									<th>Password</th>
									<th>Action</th>
								</tr>
								<?php $i=1;?>
					<?php while($row = mysqli_fetch_assoc($sql)) : ?>
								<tr>
									<td>
										<?=$i;?>
									</td>
									<td align = 'center'>
										<?= $row['id_akun']; ?>
									</td>
									<td>
										<?= $row['nama']; ?>
									</td>
									<td align = 'center'>
										<?= $row['email']; ?>
									</td>
									<td>
										<?= $row['nomor_telepon']; ?>
									</td>
									<td>
										<?= $row['password']; ?>
									</td>
									<td align = 'center'>
										<a href = "edituser.php?id=<?= $row['id_akun']; ?>">Edit</a>
										<a href = "deleteuser.php?id=<?= $row['id_akun']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
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