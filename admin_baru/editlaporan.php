<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["log"])) {
	header('location: index.php');
}
?>
<html>
<head>
	<title>Edit Laporan</title>
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	<a href="timeline5.php">Manajemen Akun Admin</a>
	
	<h2>Edit Laporan</h2>
<?php		
$idlaporan  = $_GET['id'];

$sql = mysqli_query($link,"SELECT * from report");
$laporan = mysqli_fetch_assoc($sql);

?>
	<center>
	<table border = '1' width = '650px' cellpadding = '8'>
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
	</center>
	<form action = "" method = "post">
		Id Laporan:<input type = "hidden" name = "id" value = '<?= $laporan['id']; ?>'><br>
		<b><?= $laporan['id']; ?></b><br>
		<table cellpadding = '5'>
			<tr>
				<td align = 'left'><b>Id Jasa</b></td>
				<td><input type = "text" name = "idjasa" value = '<?= $laporan['id_jasa']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Id Akun</b></td>
				<td><input type = "text" name = "idakun" value = '<?= $laporan['id_akun']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Jenis Laporan</b></td>
				<td><input type = "text" name = "jenis" value = '<?= $laporan['jenis_laporan']; ?>'></td>
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
<?php 				
if(isset($_POST['ubah'])){
	$jenislaporan = $_POST['jenis'];
	$laporan = $_POST['laporan'];
	
	$update = mysqli_query($link,"UPDATE report SET jenis_laporan = '$jenislaporan', laporan = '$laporan' WHERE id = '$idlaporan'");
	$sql = mysqli_fetch_assoc($update);
	echo"<script>
			document.location.href = 'timeline4.php';
		</script>";
}
else if(isset($_POST['batal'])) {
	header("Location: timeline4.php");
}
?>
</body>
</html>