<?php
include("../sistem/koneksi_database.php");
include("../sistem/cek_session.php");

$id_jasa=$_SESSION['id_jasa'];
$id_akun=$_SESSION['id_akun_utama'];

$perintah2="SELECT * FROM bookmark WHERE id_akun='$id_akun' and id_jasa='$id_jasa'";
$result2=mysqli_query($konek, $perintah2);
if($row2=mysqli_fetch_array($result2)){
	
	$perintah3="DELETE FROM bookmark WHERE id_akun='$id_akun' and id_jasa='$id_jasa'";
$result3=mysqli_query($konek, $perintah3);
if($result3){
	echo "<script>
					alert ('Dihapus dari Simpan!');
					 window.history.back();
				</script>";
}
}
				else {
$perintah1="INSERT INTO bookmark VALUES ('$id_akun', '$id_jasa','')";
$result1=mysqli_query($konek, $perintah1);
if($result1){
	echo "<script>
					alert ('Disimpan!');
					 window.history.back();
				</script>";
}
				}
				?>