<?php
include("koneksi.php");
include("cek_session.php");

$id_jasa=$_SESSION['id_jasa'];
$id_akun=$_SESSION['id_akun_utama'];
$jenis_laporan=$_POST['jenis_laporan'];
$laporan=$_POST['laporan'];

$perintah="INSERT INTO report VALUES ('$id_akun', '$id_jasa', '$jenis_laporan', '$laporan','')";
$hasil=mysqli_query($konek, $perintah);
if($hasil){
	echo "<script>
					alert ('Laporan berhasil dikirim!');
					 window.history.go(-2);
				</script>";
}			
				?>