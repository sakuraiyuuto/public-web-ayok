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

	<h2>Data User</h2>
<?php
$sql = mysqli_query($link,"SELECT * FROM user");

if(isset($_POST['search'])) {
    $id_akun = $_POST['keyword'];
	$sql = mysqli_query($link,"SELECT * FROM user WHERE id_akun LIKE '%$id_akun%'");
}

else if(isset($_POST['refresh'])) {
	$sql = mysqli_query($link,"SELECT * FROM user");
}

else {
	$sql = mysqli_query($link,"SELECT * FROM user");
}

?>
	<form action = "" method = "post">
		<input type = "text" name = "keyword" placeholder = 'cari user' size = '40' autocomplete = "off">
		<input type = "submit" value = 'Cari' name = 'search'>
		<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
	</form>
	
	<center>
		<table border = '1' width = '650px' cellpadding = '8'>
			<tr>
				<th>Id User</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Nomor Telepon</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
<?php while($row = mysqli_fetch_assoc($sql)) : ?>
			<tr>
				<td align = 'center'>
					<?= $row['id_akun']; ?>
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
					<a href = "edituser.php?id=<?= $row['id_akun']; ?>">Edit</a>
					<a href = "deleteuser.php?id=<?= $row['id_akun']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
				</td>
			</tr>
<?php endwhile; ?>
		</table>
		<br>
	</center>
</body>
</html>
