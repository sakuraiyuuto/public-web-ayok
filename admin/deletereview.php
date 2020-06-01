<?php
include("index.php");

$idrvw  = $_GET['id'];

$delete = mysqli_query($konek,"DELETE FROM reviews WHERE id = '$idrvw'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'index.php?timeline';
	</script>";
?>