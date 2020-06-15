<?php
include("koneksi.php");

$idadmn  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM admin WHERE id_admin = '$idadm'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data Admin Berhasil Dihapus');
		document.location.href = 'timeline5.php';
	</script>";
?>