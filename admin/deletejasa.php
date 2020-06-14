<?php
include("koneksi.php");

$idjasa  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM jasa WHERE id_jasa = '$idjasa'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'timeline3.php';
	</script>";
?>