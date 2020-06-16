<?php
include("koneksi.php");

$idrvw  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM reviews WHERE id = '$idrvw'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data Review Berhasil Dihapus');
		document.location.href = 'manajemen_review.php';
	</script>";
?>