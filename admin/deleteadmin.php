<?php
include("koneksi.php");

$idadmn  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM admin WHERE id_admin = '$idadmn'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
	
		alert('Data Admin Berhasil Dihapus');
		document.location.href = 'manajemen_akun_admin.php';
	</script>";
?>