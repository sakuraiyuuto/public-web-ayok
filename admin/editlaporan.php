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
	<link rel="stylesheet" href="editlaporan.css">
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
					<a href="manajemen_jasa.php">				
						<span>Jasa</span>
					</a>
				</li>
				<li>
					<a href="manajemen_review.php">
						<span>Reviews</span>
					</a>
				<li>
					<a class="active" href="manajemen_laporan_jasa.php">
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
			$idlaporan  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT * from report");
			$laporan = mysqli_fetch_assoc($sql);
		?>
					<div class="judul-konten">
							<font>Edit Laporan</font>
					</div>
						<div class="table-data">
							<table>
								<tr>
									<th>Id Laporan</th>
									<th>Id Jasa</th>
									<th>Id Akun</th>
									<th>Jenis Laporan</th>
									<th>Laporan</th>
								<tr>
									<td align = 'center'><?= $laporan['id']; ?></td>
									<td align = 'center'><?= $laporan['id_jasa']; ?></td>
									<td align = 'center'><?= $laporan['id_akun']; ?></td>
									<td align = 'center'><?= $laporan['jenis_laporan']; ?></td>
									<td><?= $laporan['laporan']; ?></td>
								</tr>
							</table>
						</div>		
						<div class="kolom-edit">
							<form action = "" method = "post">
								Id Laporan:<input type = "hidden" name = "id" value = '<?= $laporan['id']; ?>'><br>
								<b><?= $laporan['id']; ?></b><br>
								<table cellpadding = '5'>
									<tr>
										<td align = 'left'><b>Jenis Laporan</b></td>
										<td>
											<select class="input" name="jenis_laporan" class="form-control" required="">>
												<option value="<?= $laporan['jenis_laporan']; ?>" selected hidden><?= $laporan['jenis_laporan']; ?></option>
												<option>Jasa tidak sesuai keterangan di aplikasi</option>
												<option>Jasa melakukan pelayanan yang sangat buruk</option>
												<option>Jasa melakukan penipuan</option>
												<option>Penyedia Jasa melakukan tindak kriminal</option>
												<option>Jasa mengandung SARA dan kata-kata tidak pantas</option>
												<option>Lain-lain</option>
											</select>
										</td>
									</tr>
									<tr>
										<td align = 'left'><b>Laporan</b></td>
										<td><textarea name = "laporan"><?= $laporan['laporan']; ?></textarea></td>
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
			$jenislaporan = $_POST['jenis_laporan'];
			$laporan = $_POST['laporan'];
			
			$update = mysqli_query($link,"UPDATE report SET jenis_laporan = '$jenislaporan', laporan = '$laporan' WHERE id = '$idlaporan'");
			$sql = mysqli_fetch_assoc($update);
			echo"<script>
					document.location.href = 'editlaporan.php?id=$idlaporan';
				</script>";
		}
		else if(isset($_POST['batal'])) {
			header("Location: manajemen_laporan_jasa.php");
		}
	?>
</body>
</html>