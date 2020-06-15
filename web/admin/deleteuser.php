<?php
include("koneksi.php");

$idusr  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM user WHERE id_akun = '$idusr'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'timeline1.php';
	</script>";
?>