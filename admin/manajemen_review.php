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
	<link rel="stylesheet" href="manajemen_review.css">
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
					<a href="manajemen_jasa.php">				
						<span>Jasa</span>
					</a>
				</li>
				<li>
					<a class="active"  href="#">
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
				$sql = mysqli_query($link,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
									INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");

				if(isset($_POST['search'])) {
					$id = $_POST['keyword'];
					
					$sql = mysqli_query($link,"SELECT * FROM reviews WHERE id LIKE '%$id%'");
				}

				else if(isset($_POST['refresh'])) {
					$sql = mysqli_query($link,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
									INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");
				}

				else {
					$sql = mysqli_query($link,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
									INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");
				}
			?>

						<div class="judul-konten">
							<font>Manajemen Review</font>
						</div>
						<div class="kotak-pencarian">
						<form action = "" method = "post">
							<input type = "text" name = "keyword" placeholder = 'cari review' size = '40' autocomplete = "off">
							<input type = "submit" value = 'Cari' name = 'search'>
							<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
						</form>
						</div>
						
						<div class="table-data">
						<table>
							<tr>
								<th>No</th>
								<th>Id Jasa</th>
								<th>Id Review</th>
								<th>Id Akun</th>
								<th>Ulasan</th>
								<th>Rating</th>
								<th>Action</th>
							</tr>
				<?php $i=1;?>
				<?php while($row = mysqli_fetch_assoc($sql)) : ?>
							<tr>
								<td>
									<?= $i;?>
								</td>
								<td align = 'center'>
									<?= $row['id_jasa']; ?>
								</td>
								<td align = 'center'>
									<?= $row['id']; ?>
								</td>
								<td align = 'center'>
									<?= $row['id_akun']; ?>
								</td>
								<td>
									<?= $row['content']; ?>
								</td>
								<td align = 'center'>
									<?= $row['rating']; ?>
								</td>
								<td align = 'center'>
									<a href = "editreview.php?id=<?= $row['id']; ?>">Edit</a>
									<a href = "deletereview.php?id=<?= $row['id']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
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
