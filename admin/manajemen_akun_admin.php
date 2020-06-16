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
	<link rel="stylesheet" href="manajemen_akun_admin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<a href="manajemen_review.php">
						<span>Reviews</span>
					</a>
				<li>
					<a href="manajemen_laporan_jasa.php">
						<span>Laporan Jasa</span>
					</a>
				</li>
				<li>
					<a class="active" href="manajemen_akun_admin.php">
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
			$sql = mysqli_query($link,"SELECT * FROM admin");

			if(isset($_POST['search'])) {
				$id_admin = $_POST['keyword'];
				$sql = mysqli_query($link,"SELECT * FROM admin WHERE id_admin LIKE '%$id_admin%'");
			}

			else if(isset($_POST['refresh'])) {
				$sql = mysqli_query($link,"SELECT * FROM admin");
			}

			else {
				$sql = mysqli_query($link,"SELECT * FROM admin");
			}
		?>	
						<div class="judul-konten">
							<font>Manajemen Akun User</font>
						</div>
						<div class="kotak-pencarian">
							<form action = "" method = "post">
								<input type = "text" name = "keyword" placeholder = 'cari admin' size = '40' autocomplete = "off">
								<input type = "submit" value = 'Cari' name = 'search'>
								<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
							</form>
						</div>
						
						<div class="table-data">
						<table>
							<tr>
								<th>No</th>
								<th>Id Admin</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Nomor Telepon</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
				<?php $i=1;?>
				<?php while($row = mysqli_fetch_assoc($sql)) : ?>
							<tr>
								<td><?= $i;?></td>
								<td align = 'center'>
									<?= $row['id_admin']; ?>
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
									<a href = "editadmin.php?id=<?= $row['id_admin']; ?>">Edit</a>
									<a href = "deleteadmin.php?id=<?= $row['id_admin']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
								</td>
							</tr>
							<?php $i++;?>
				<?php endwhile; ?>
							</table>
						</div>	
						<div class="formadmin">
							<h2>Tambah Admin</h2>
							<form method='post' action=''>
								<table cellpadding='0' cellspacing='0'>
									<tr>
										<td>Nama &nbsp;</td>
										<td><input type='text' name='nama'></td>
									</tr>
									<tr>
										<td>Email &nbsp;</td>
										<td><input type='email' name='email'></td>
									</tr>
									<tr>
										<td>Password &nbsp;</td>
										<td><input type='password' name='password1'></td>
									</tr>
									<tr>
										<td>Konfirmasi Password &nbsp;</td>
										<td><input type='password' name='password2'></td>
									</tr>
									<tr>
										<td>Telepon &nbsp;</td>
										<td><input type='text' name='telepon' onkeypress="return hanyaAngka(event)"></td>
									</tr>
									<tr>
										<td><input type='submit' name='submit'></td>
									</tr>
								</table>
							</form>
						</div>
		</div>
	</div>
	
<?php
		if(isset($_POST['submit'])){
			$nama = $_POST ['nama'];
			$email = $_POST['email'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$telepon = $_POST['telepon'];
			
			if($password1 == $password2 and $nama !== '' and $email !== '' and $password1 !== '' and $password2 !== '') {
				$passwordvalid = password_hash($password2, PASSWORD_DEFAULT);
				$sql1 = mysqli_query($link,"INSERT INTO admin (nama,email,password,nomor_telepon) VALUES ('$nama','$email','$passwordvalid','$telepon')"); 
				echo"<meta http-equiv = 'refresh' content = '0; URL = manajemen_akun_admin.php'>";
			}
			
			else {
				echo"<meta http-equiv = 'refresh' content = '0; URL = manajemen_akun_admin.php'>";
				echo'<script type="text/javascript">
						alert("Tambah Admin Gagal, Isi semua form dan/atau cek password");
					</script>';
			}
		}
?>
</body>
</html>
