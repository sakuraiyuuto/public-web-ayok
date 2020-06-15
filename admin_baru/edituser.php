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
	
	<h2>Edit User</h2>
<?php		
$idusr  = $_GET['id'];

$sql = mysqli_query($link,"SELECT * from user WHERE id_akun = '$idusr'");
$usr = mysqli_fetch_assoc($sql);

?>
	<center>
	<table border = '1' width = '650px' cellpadding = '8'>
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
	</center>
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
				<td><input type = "text" name = "tlp" required value = '<?= $usr['nomor_telepon']; ?>' onkeypress="return hanyaAngka(event)"></td>
			</tr>
			<tr>
				<td align = 'left'><b>Password</b></td>
				<td><input type = "password" name = "pw1"></td>
			</tr>
			<tr>
				<td align = 'left'><b>Konfirmasi Password</b></td>
				<td><input type = "password" name = "pw2"></td>
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
	$pass1 = $_POST['pw1'];
	$pass2 = $_POST['pw2'];
		
	if($pass1 == $pass2 and $nama !== '' and $email !== '' and $pass1 !== '' and $pass2 !== '') {
		$password = password_hash($pass2, PASSWORD_DEFAULT);
		$update = mysqli_query($link,"UPDATE user SET nama = '$nama', email = '$email', nomor_telepon = '$notlp', password = '$password' WHERE id_akun = '$idusr'");
		$sql = mysqli_fetch_assoc($update);		
		echo"<script>
			document.location.href = 'timeline1.php';
		</script>";
	}
	
	else {
		echo'<script type="text/javascript">
				alert("Edit User Gagal, Isi semua form dan/atau cek password");
			</script>';
	}
}

else if(isset($_POST['batal'])) {
	header("Location: timeline1.php");
}
?>
</body>
</html>