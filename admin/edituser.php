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
			$idusr  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT * from user WHERE id_akun = '$idusr'");
			$usr = mysqli_fetch_assoc($sql);
		?>
					<div class="judul-konten">
							<font>Edit Akun User</font>
					</div>
						<div class="table-data">
							<table>
								<tr>
								<th>Id User</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Nomor Telepon</th>
								<th>Password</th>
							<tr>
								<td align = 'center'><?= $usr['id_akun']; ?></td>
								<td align = 'center'><?= $usr['nama']; ?></td>
								<td align = 'center'><?= $usr['email']; ?></td>
								<td align = 'center'><?= $usr['nomor_telepon']; ?></td>
								<td><?= $usr['password']; ?></td>
							</tr>
							</table>
						</div>		
						<div class="kolom-edit">
						<form action = "" method = "post">
							Id Akun:<input type = "hidden" name = "id_user" value = '<?= $usr['id_akun']; ?>'><br>
							<b><?= $usr['id_akun']; ?></b><br>
							<table cellpadding = '5'>
								<tr>
									<td align = 'left'><b>Nama</b></td>
									<td><input type = "text" name = "nama"  value = '<?= $usr['nama']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Nama')"
										oninput="setCustomValidity('')"></input>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Email</b></td>
									<td><input type = "email" name = "email"  value = '<?= $usr['email']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Email')"
										oninput="setCustomValidity('')"></input>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Nomor Telepon</b></td>
									<td><input type = "number" name = "tlp" value = '<?= $usr['nomor_telepon']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Nomor Telepon')"
										oninput="setCustomValidity('')"></input>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Password</b></td>
									<td><input type = "password" name = "pw1" placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Password')"
										oninput="setCustomValidity('')"></input>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Konfirmasi Password</b></td>
									<td><input type = "password" name = "pw2" placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Password Konfirmasi')"
										oninput="setCustomValidity('')"></input>
									</td>
								</tr>
								<tr>
									<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
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
			$pass1 = $_POST['pw1'];
			$pass2 = $_POST['pw2'];
				
			if($pass1 == $pass2 and $nama !== '' and $email !== '' and $pass1 !== '' and $pass2 !== '') {
				$password = password_hash($pass2, PASSWORD_DEFAULT);
				$update = mysqli_query($link,"UPDATE user SET nama = '$nama', email = '$email', nomor_telepon = '$notlp', password = '$password' WHERE id_akun = '$idusr'");
				$sql = mysqli_fetch_assoc($update);		
				echo"<script>
					document.location.href = 'edituser.php?id=$idusr';
				</script>";
			}
			else {
				echo'<script type="text/javascript">
						alert("Edit User Gagal, Isi semua form dan/atau cek password");
					</script>';
			}
		}
	?>
</body>
</html>