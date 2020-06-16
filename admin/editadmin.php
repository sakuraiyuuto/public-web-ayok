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
	<link rel="stylesheet" href="editadmin.css">
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
			$idadm  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT * from admin WHERE id_admin = '$idadm'");
			$adm = mysqli_fetch_assoc($sql);
		?>
					<div class="judul-konten">
							<font>Edit Akun User</font>
					</div>
						<div class="table-data">
							<table>
								<tr>
									<th>Id Admin</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Nomor Telepon</th>
									<th>Password</th>									
								<tr>
									<td align = 'center'><?= $adm['id_admin']; ?></td>
									<td align = 'center'><?= $adm['nama']; ?></td>
									<td align = 'center'><?= $adm['email']; ?></td>
									<td align = 'center'><?= $adm['nomor_telepon']; ?></td>
									<td align = 'center'><?= $adm['password']; ?></td>									
								</tr>
							</table>
						</div>		
						<div class="kolom-edit">
						<form action = "" method = "post">
							Id Admin:<input type = "hidden" name = "id" value = '<?= $adm['id_admin']; ?>'><br>
							<b><?= $adm['id_admin']; ?></b><br>
							<table cellpadding = '5'>
								<tr>
									<td align = 'left'><b>Nama</b></td>
									<td><input type = "text" name = "nama" value = '<?= $adm['nama']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Nama')"
										oninput="setCustomValidity('')"></td>
								</tr>
								<tr>
									<td align = 'left'><b>Email</b></td>
									<td><input type = "email" name = "email" value = '<?= $adm['email']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Email')"
										oninput="setCustomValidity('')"></td>
								</tr>
								<tr>
									<td align = 'left'><b>Telepon</b></td>
									<td><input type = "text" name = "telepon" value = '<?= $adm['nomor_telepon']; ?>' placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Telepon')"
										oninput="setCustomValidity('')"></td>
								</tr>
								<tr>
									<td align = 'left'><b>Password</b></td>
									<td><input type = "password" name = "password1" placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Password')"
										oninput="setCustomValidity('')"></td>
								</tr>
								<tr>
									<td align = 'left'><b>Konfirmasi Password</b></td>
									<td><input type = "password" name = "password2" placeholder="..." class="form-control" required="" autocomplete="off"
										oninvalid="this.setCustomValidity('Masukkan Password Konfirmasi')"
										oninput="setCustomValidity('')"></td>
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
			$nama = $_POST ['nama'];
			$email = $_POST['email'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$telepon = $_POST['telepon'];
			
			if($password1 == $password2 and $nama !== '' and $email !== '' and $password1 !== '' and $password2 !== '') {
				$passwordvalid = password_hash($password2, PASSWORD_DEFAULT);
				$update = mysqli_query($link,"UPDATE admin SET nama = '$nama', email = '$email', password = '$passwordvalid', nomor_telepon = '$telepon' WHERE id_admin = '$idadm'");
				$sql = mysqli_fetch_assoc($update);		
				echo"<script>
					document.location.href = 'editadmin.php?id=$idadm';
				</script>";
			}
			
			else {
				echo'<script type="text/javascript">
						alert("Edit Admin Gagal, Isi semua form dan/atau cek password");
					</script>';
			}
		}
	?>
</body>
</html>