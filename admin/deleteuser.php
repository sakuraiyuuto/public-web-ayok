<?php
include("index.php");

$idusr  = $_GET['id'];

$delete = mysqli_query($konek,"DELETE FROM user WHERE id_akun = '$idusr'");
$sql = mysqli_fetch_assoc($delete);

echo"<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'index.php?timeline';
	</script>";
?>