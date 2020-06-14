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
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	
	<h2>Data Laporan</h2>
<?php
$sql = mysqli_query($link,"SELECT * from report");

if(isset($_POST['search'])) {
    $id = $_POST['keyword'];
	
	$sql = mysqli_query($link,"SELECT * FROM report WHERE id LIKE '%$id%'");
}

else if(isset($_POST['refresh'])) {
	$sql = mysqli_query($link,"SELECT * from report");
}

else {
	$sql = mysqli_query($link,"SELECT * from report");
}

?>

	<form action = "" method = "post">
		<input type = "text" name = "keyword" placeholder = 'cari review' size = '40' autocomplete = "off">
		<input type = "submit" value = 'Cari' name = 'search'>
		<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
	</form>

	<center>
		<table border = '1' width = '650px' cellpadding = '8'>
			<tr>
				<th>Id Laporan</th>
				<th>Id Jasa</th>
				<th>Id Akun</th>
				<th>Jenis Laporan</th>
				<th>Laporan</th>
				<th>Action</th>
			</tr>
	
<?php while($row = mysqli_fetch_assoc($sql)) : ?>
			<tr>
				<td align = 'center'>
					<?= $row['id']; ?>
				</td>
				<td align = 'center'>
					<?= $row['id_jasa']; ?>
				</td>
				<td align = 'center'>
					<?= $row['id_akun']; ?>
				</td>
				<td>
					<?= $row['jenis_laporan']; ?>
				</td>
				<td>
					<?= $row['laporan']; ?>
				</td>
				<td align = 'center'>
					<a href = "editlaporan.php?id=<?= $row['id']; ?>">Edit</a>
					<a href = "deletelaporan.php?id=<?= $row['id']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
				</td>
			</tr>
<?php endwhile; ?>
		</table>
	</center>
</body>
</html>
