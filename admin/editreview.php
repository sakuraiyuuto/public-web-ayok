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
	<link rel="stylesheet" href="editreview.css">
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
					<a class="active" href="manajemen_review.php">
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
			$idrvw  = $_GET['id'];
			$sql = mysqli_query($link,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
								INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun WHERE b.id = '$idrvw'");
			$rvw = mysqli_fetch_assoc($sql);
		?>
					<div class="judul-konten">
							<font>Edit Review</font>
					</div>
						<div class="table-data">
							<table>
								<tr>
									<th>Id Review</th>
									<th>Id Jasa</th>
									<th>Id Akun</th>
									<th>Ulasan</th>
									<th>Rating</th>
								<tr>
									<td align = 'center'><?= $rvw['id']; ?></td>
									<td align = 'center'><?= $rvw['id_jasa']; ?></td>
									<td align = 'center'><?= $rvw['id_akun']; ?></td>
									<td><?= $rvw['content']; ?></td>
									<td align = 'center'><?= $rvw['rating']; ?></td>
								</tr>
							</table>
						</div>		
						<div class="kolom-edit">
							<form action = "" method = "post">
								Id Review:<input type = "hidden" name = "id" value = '<?= $rvw['id']; ?>'><br>
								<b><?= $rvw['id']; ?></b><br>
								<table cellpadding = '5'>
									<tr>
										<td align = 'left'><b>Ulasan</b></td>
										<td>
										<textarea name = "content" placeholder="..."  class="form-control" required="" autocomplete="off"
											oninvalid="this.setCustomValidity('Masukkan Keterangan')"
											oninput="setCustomValidity('')"><?= $rvw['content']; ?></textarea>
										</td>
									</tr>
									<tr>
										<td align = 'left'><b>Rating</b></td>
										<td>
										<select class="input" name="rating" class="form-control" required="">
											<option value="<?= $rvw['rating']; ?>" selected hidden><?= $rvw['rating']; ?></option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>						
										</select>
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
			$content = $_POST['content'];
			$rating = $_POST['rating'];
			$update = mysqli_query($link,"UPDATE reviews SET content = '$content', rating = '$rating' WHERE id = '$idrvw'");
			$sql = mysqli_fetch_assoc($update);
			echo"<script>
					document.location.href = 'editreview.php?id=$idrvw';
				</script>";
		}
		else if(isset($_POST['batal'])) {
			echo"<script>
					document.location.href = 'manajemen_review.php';
				</script>";
		}
	?>
</body>
</html>