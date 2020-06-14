<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["log"])) {
	header('location: index.php');
}
?>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	<h2>Edit User</h2>
<?php		
$idusr  = $_GET['id'];

$sql = mysqli_query($link,"SELECT * from user WHERE id_akun = '$idusr'");
$usr = mysqli_fetch_assoc($sql);

?>
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
				<td><input type = "password" name = "pw"></td>
			</tr>
			<tr>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Batal' name = 'batal'></td>
			</tr>
		</table>
	</form>
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
			document.location.href = 'timeline1.php';
		</script>";
}
else if(isset($_POST['batal'])) {
	header("Location: timeline1.php");
}
?>
</body>
</html>