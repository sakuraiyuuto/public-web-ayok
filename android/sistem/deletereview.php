<?php
	include("koneksi_database.php");
	include("cek_session.php");

	$id_jasa=$_SESSION['id_jasa'];
	$id_akun=$_SESSION['id_akun_utama'];

	$perintah1="DELETE FROM reviews WHERE id_akun='$id_akun' and id_jasa='$id_jasa'";
	$result1=mysqli_query($konek, $perintah1);
	if($result1)
	{
		foreach($konek->query("SELECT SUM(rating) FROM reviews WHERE id_jasa='$id_jasa'") as $row) 
		{
			$total=$row['SUM(rating)'];
		}

		foreach($konek->query("SELECT COUNT(*) FROM reviews WHERE id_jasa='$id_jasa'") as $row) 
		{
			$jumlah=$row['COUNT(*)'];
		}
			
		$ratingfinal=$total/$jumlah;
		$ratingfinalround=round($ratingfinal,1);

		$perintah2 = "UPDATE ratingjasa SET rating='$ratingfinalround' WHERE id_jasa='$id_jasa'";
		$result2=mysqli_query($konek, $perintah2);
		if($result2)
		{	
			echo "<script>
						alert ('Komentar dihapus');
						 window.history.back();
				</script>";
		}
	}
?>