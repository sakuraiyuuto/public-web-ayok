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
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	<a href="timeline5.php">Manajemen Akun Admin</a>
	
	<h2>Edit Admin</h2>
<?php		
$idadm  = $_GET['id'];

$sql = mysqli_query($link,"SELECT * from admin WHERE id_admin = '$idadm'");
$adm = mysqli_fetch_assoc($sql);

?>
	<center>
	<table border = '1' width = '650px' cellpadding = '8'>
		<tr>
			<th>Id Admin</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Telepon</th>
		<tr>
			<td align = 'center'><?= $adm['id_admin']; ?></td>
			<td align = 'center'><?= $adm['nama']; ?></td>
			<td align = 'center'><?= $adm['email']; ?></td>
			<td align = 'center'><?= $adm['password']; ?></td>
			<td align = 'center'><?= $adm['nomor_telepon']; ?></td>
		</tr>
	</table>
	</center>
	<form action = "" method = "post">
		Id Admin:<input type = "hidden" name = "id" value = '<?= $adm['id_admin']; ?>'><br>
		<b><?= $adm['id_admin']; ?></b><br>
		<table cellpadding = '5'>
			<tr>
				<td align = 'left'><b>Nama</b></td>
				<td><input type = "text" name = "nama" value = '<?= $adm['nama']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Email</b></td>
				<td><input type = "email" name = "email" value = '<?= $adm['email']; ?>'></td>
			</tr>
			<tr>
				<td align = 'left'><b>Password</b></td>
				<td><input type = "password" name = "password1"></td>
			</tr>
			<tr>
				<td align = 'left'><b>Konfirmasi Password</b></td>
				<td><input type = "password" name = "password2"></td>
			</tr>
			<tr>
				<td align = 'left'><b>Telepon</b></td>
				<td><input type = "text" name = "telepon" onkeypress="return hanyaAngka(event)" value = '<?= $adm['nomor_telepon']; ?>'></td>
			</tr>
			<tr>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Batal' name = 'batal'></td>
			</tr>
		</table>
	</form>
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
			document.location.href = 'timeline5.php';
		</script>";
	}
	
	else {
		echo'<script type="text/javascript">
				alert("Edit Admin Gagal, Isi semua form dan/atau cek password");
			</script>';
	}
}

else if(isset($_POST['batal'])) {
	header("Location: timeline5.php");
}
?>
</body>
</html>