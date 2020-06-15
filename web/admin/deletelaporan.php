<?php
include("koneksi.php");

$idrpt  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM report WHERE id = '$idrpt'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'timeline4.php';
	</script>";
?>