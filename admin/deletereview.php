<?php
include("koneksi.php");

$idrvw  = $_GET['id'];

$delete = mysqli_query($link,"DELETE FROM reviews WHERE id = '$idrvw'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'timeline2.php';
	</script>";
?>