<?php
include("koneksi.php");

$idjasa  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM jasa WHERE id_jasa = '$idjasa'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data Jasa Berhasil Dihapus');
		document.location.href = 'manajemen_jasa.php';
	</script>";
?>