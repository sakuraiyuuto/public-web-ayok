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
	<link rel="stylesheet" href="edituser.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="side-nav">
		<nav>
			<ul>
				<li>
					<a class="active" href="manajemen_akun_user.php">
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
				$idusr  = $_GET['id'];
				$sql = mysqli_query($link,"SELECT * from user WHERE id_akun = '$idusr'");
				$usr = mysqli_fetch_assoc($sql);
			?>
					<div class="judul-konten">
							<font>Edit Akun User</font>
					</div>
						<div class="table-data">
							<table>
							</table>
						</div>		
						<div class="kolom-edit">
							<form action = "" method = "post">
								Id Akun:<input type = "hidden" name = "id_user" value = '<?= $usr['id_akun']; ?>'><br>
								<b><?= $usr['id_akun']; ?></b><br>
								<table cellpadding = '5'>
									<tr>
										<td align = 'left'><b>Nama</b></td>
										<td><input type = "text" name = "nama" required value = '<?= $usr['nama']; ?>'></td>
									</tr>
									<tr>
										<td align = 'left'><b>Email</b></td>
										<td><input type = "text" name = "email" required value = '<?= $usr['email']; ?>'></td>
									</tr>
									<tr>
										<td align = 'left'><b>Nomor Telepon</b></td>
										<td><input type = "text" name = "tlp" required value = '<?= $usr['nomor_telepon']; ?>'></td>
									</tr>
									<tr>
										<td align = 'left'><b>Password</b></td>
										<td><input type = "password" required name = "pw"></td>
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
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$notlp = $_POST['tlp'];
	$pass = $_POST['pw'];
	$password = password_hash($pass, PASSWORD_DEFAULT);
	$update = mysqli_query($link,"UPDATE user SET nama = '$nama', email = '$email', nomor_telepon = '$notlp', password = '$password' WHERE id_akun = '$idusr'");
	$sql = mysqli_fetch_assoc($update);
	echo"<script>
			document.location.href = 'edituser.php';
		</script>";
}
else if(isset($_POST['batal'])) {
	header("Location: manajemen_akun_user.php");
}
?>
</body>
</html>