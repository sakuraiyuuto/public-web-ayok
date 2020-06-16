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
	<link rel="stylesheet" href="editjasa.css">
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
					<a class="active" href="manajemen_jasa.php">				
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
				<li>
					<a href="manajemen_akun_admin.php">	
						<span>Akun Admin</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="main-content">
		<div class="isi-content">
		<?php		
			$idjasa  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT a.id_kategorijasa, a.id_jasa, b.id_akun, a.nama_jasa, a.keterangan, a.alamat, a.hargamin, a.hargamax, a.telepon, a.verifikasi_status, d.nama_foto from jasa a 
								INNER JOIN user b ON a.id_akun = b.id_akun INNER JOIN kategori c ON a.id_kategorijasa = c.id_kategori2 INNER JOIN foto d ON a.id_jasa = d.id_jasa WHERE a.id_jasa = '$idjasa'");
			$jasa = mysqli_fetch_assoc($sql);
			$id_kategorijasa = $jasa['id_kategorijasa'];
			$perintah2="SELECT * FROM kategori WHERE id_kategori2='$id_kategorijasa'";
			$hasil2=mysqli_query($link, $perintah2);
			while($row2=mysqli_fetch_array($hasil2))
			{	
				$nama_kategorijasa=$row2[3];
			}		
		?>
		
					<div class="judul-konten">
							<font>Edit Jasa</font>
					</div>
						<div class="table-data">
							<table border = '1' width = '650px' cellpadding = '8'>
								<tr>
									<th>Id Jasa</th>
									<th>Kategori Jasa</th>									
									<th>Id Akun</th>
									<th>Nama Jasa</th>
									<th>Foto Jasa</th>
									<th>Keterangan</th>
									<th>Alamat</th>
									<th>Harga Min</th>
									<th>Harga Max</th>
									<th>Telepon</th>
									<th>Verifikasi Status</th>	
								</tr>
								<tr>
									<td align = 'center'><?= $jasa['id_jasa']; ?></td>
									<td align = 'center'><?= $nama_kategorijasa ?></td>									
									<td align = 'center'><?= $jasa['id_akun']; ?></td>
									<td align = 'center'><?= $jasa['nama_jasa']; ?></td>
									<td align = 'center'>
										<?php $imageURL = '../database/akun/foto_jasa/'.$jasa["nama_foto"];?>
										<img src="<?php echo $imageURL; ?>" alt="" width='70' height='90'/>
									</td>
									<td><?= $jasa['keterangan']; ?></td>
									<td><?= $jasa['alamat']; ?></td>
									<td align = 'center'><?= $jasa['hargamin']; ?></td>
									<td align = 'center'><?= $jasa['hargamax']; ?></td>
									<td align = 'center'><?= $jasa['telepon']; ?></td>
									<td align = 'center'><?php $verif = $jasa['verifikasi_status']; if($verif == '0') { echo"Tidak";} else { echo"Ya";} ?></td>
								</tr>
							</table>
						</div>		
						<div class="kolom-edit">
						<form action = "" method = "post">
							Id Jasa:<input type = "hidden" name = "id" value = '<?= $jasa['id_jasa']; ?>'><br>
							<b><?= $jasa['id_jasa']; ?></b><br>
							<table cellpadding = '5'>
								<tr>
									<td align = 'left'><b>Nama Jasa</b></td>
									<td><input type = "text" name = "nama" value = '<?= $jasa['nama_jasa']; ?>' placeholder="..."  class="form-control" required="" autocomplete="off"
											oninvalid="this.setCustomValidity('Masukkan Nama Jasa')"
											oninput="setCustomValidity('')"></td>
								</tr>
								<td align = 'left'><b>Kategori Jasa</b></td>
								<td>
									<select class="input" name="kategorijasa" class="form-control" required="">
										<option value="<?=$nama_kategorijasa?>" selected hidden><?=$nama_kategorijasa;?></option>
										<option>Reparasi Elektronik</option>
										<option>Bengkel</option>
										<option>Arsitek</option>
										<option>Tukang</option>
										<option>Logo, Poster, dan Banner</option>
										<option>Desain Pakaian</option>
										<option>Lukisan</option>
										<option>Pijat</option>
										<option>Terapi</option>
										<option>Dokter</option>
										<option>Salon</option>
										<option>Pangkas Rambut</option>
										<option>Perawatan Tubuh</option>
										<option>Make Up Acara</option>
										<option>Asisten Rumah Tangga</option>
										<option>Tukang Kebun</option>
										<option>Pengasuh Bayi dan Anak</option>							
										<option>Angkutan Pindah Rumah</option>
										<option>Layanan Kebersihan Rumah</option>
										<option>Cuci Kendaraan</option>
										<option>Supir</option>
										<option>Apps, Sistem, dan Web</option>
										<option>Data Oriented</option>
										<option>Guru Les</option>
										<option>Personal Trainer</option>
									</select>
								</td>
								<tr>
									<td align = 'left'><b>Keterangan</b></td>
									<td><textarea name = "keterangan" placeholder="..."  class="form-control" required="" autocomplete="off"
											oninvalid="this.setCustomValidity('Masukkan Keterangan')"
											oninput="setCustomValidity('')"><?= $jasa['keterangan']; ?></textarea>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Alamat</b></td>
									<td><textarea name = "alamat" placeholder="..."  class="form-control" required="" autocomplete="off"
											oninvalid="this.setCustomValidity('Masukkan Alamat')"
											oninput="setCustomValidity('')"><?= $jasa['alamat']; ?></textarea></td>
								</tr>
								<tr>
									<td align = 'left'><b>Harga Min</b></td>
									<td><select class="input" name="hargamin" class="form-control" required="">
											<option value="<?=$jasa['hargamin'];?>" selected hidden><?=$jasa['hargamin'];?></option>
											<option>Rp1.000</option>
											<option>Rp5.000</option>
											<option>Rp10.000</option>
											<option>Rp20.000</option>
											<option>Rp30.000</option>
											<option>Rp40.000</option>
											<option>Rp50.000</option>
											<option>Rp100.000</option>
											<option>Rp150.000</option>
											<option>Rp200.000</option>
											<option>Rp300.000</option>
											<option>Rp400.000</option>
											<option>Rp500.000</option>
											<option>Rp750.000</option>
											<option>Rp1.000.000</option>
											<option>Rp2.000.000</option>
										</select>
										</td>
								</tr>
								<tr>
									<td align = 'left'><b>Harga Max</b></td>
									<td><select class="input" name="hargamax" class="form-control" required="">
										<option value="<?= $jasa['hargamax']; ?>" selected hidden><?= $jasa['hargamax']; ?></option>
										<option>Rp20.000</option>
										<option>Rp30.000</option>
										<option>Rp40.000</option>
										<option>Rp50.000</option>
										<option>Rp100.000</option>
										<option>Rp150.000</option>
										<option>Rp200.000</option>
										<option>Rp300.000</option>
										<option>Rp400.000</option>
										<option>Rp500.000</option>
										<option>Rp750.000</option>
										<option>Rp1.000.000</option>
										<option>Rp2.000.000</option>
										<option>Rp3.000.000</option>
										<option>Rp4.000.000</option>
										<option>Rp5.000.000</option>
										<option>Rp6.000.000</option>
										<option>Rp7.000.000</option>
										<option>Rp8.000.000</option>
										<option>Rp9.000.000</option>
										<option>Rp10.000.000</option>
										<option>Rp20.000.000</option>
										<option>Rp30.000.000</option>
										<option>Rp40.000.000</option>
										<option>Rp50.000.000</option>
										<option>Rp100.000.000</option>
									</select>
									</td>
								</tr>
								<tr>
									<td align = 'left'><b>Telepon</b></td>
									<td><input type = "text" name = "telepon" value = '<?= $jasa['telepon']; ?>' placeholder="..."  class="form-control" required="" autocomplete="off"
											oninvalid="this.setCustomValidity('Masukkan Telepon')"
											oninput="setCustomValidity('')">
										</td>
								</tr>
								<tr>
									<td align = 'left'><b>Verifikasi Status</b></td>
									<td><select style="width: 100%;" name="verifikasi">
					<?php $verif = $jasa['verifikasi_status']; if($verif == '0'){ $status = 'Tidak';} else {$status = 'Ya';}?>
											<option selected="selected" hidden value = '<?php echo"$verif"; ?>'><?php echo"$status"; ?></option>
											<option value = '1' name = 'terverifikasi'>Ya</option>
											<option value = '0' name = 'tidakterverifikasi'>Tidak</option>
										</select>
									</td>
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
			$kategorijasa = $_POST['kategorijasa'];
			$perintah2="SELECT * FROM kategori WHERE nama_kategori='$kategorijasa'";
				$hasil2=mysqli_query($link, $perintah2);
				while($row2=mysqli_fetch_array($hasil2))
				{	
					$id_kategorijasa=$row2[1];
				}	
			$namajasa = $_POST['nama'];
			$keterangan = $_POST['keterangan'];
			$alamat = $_POST['alamat'];
			$hargamin = $_POST['hargamin'];
			$hargamax = $_POST['hargamax'];
			$telepon = $_POST['telepon'];
			$verifikasi = $_POST['verifikasi'];
			$update = mysqli_query($link,"UPDATE jasa SET id_kategorijasa = '$id_kategorijasa', nama_jasa = '$namajasa', keterangan = '$keterangan', alamat = '$alamat', hargamin = '$hargamin', hargamax = '$hargamax', telepon = '$telepon', verifikasi_status = '$verifikasi' WHERE id_jasa = '$idjasa'");
			$sql = mysqli_fetch_assoc($update);
			echo"<script>
					document.location.href = 'editjasa.php?id=$idjasa';
				</script>";
		}
		else if(isset($_POST['batal'])) {
			echo"<script>
					document.location.href = 'manajemen_jasa.php';
				</script>";
		}
	?>
</body>
</html>