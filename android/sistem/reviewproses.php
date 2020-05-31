<?php
	include("cek_session.php");
	include("koneksi_database.php");

	$id_jasa=$_SESSION['id_jasa'];
	$id_akun= $_SESSION['id_akun_utama'];
	$review=$_POST['review'];
	$rating=$_POST['rating'];

	$perintah1 = "INSERT into reviews VALUES ('$id_jasa', '', '$id_akun', '$review', '$rating')";
	$result=mysqli_query($konek, $perintah1);
	if($result)
	{
		$id_akun_utama=$_SESSION['id_akun_utama'];
		$perintah5="SELECT * from reviews where id_jasa='$id_jasa' ORDER BY id DESC";
		$result5=mysqli_query($konek, $perintah5);

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

		$perintah3 = "SELECT * FROM ratingjasa WHERE id_jasa ='$id_jasa'";
		$result3 = mysqli_query($konek , $perintah3 );
		if($row3=mysqli_fetch_array($result3))
		{	
			$perintah2 = "UPDATE ratingjasa SET rating='$ratingfinalround' WHERE id_jasa='$id_jasa'";
			$result2=mysqli_query($konek, $perintah2);
			if($result2)
			{
				echo "<script>
							alert ('Review berhasil!');
							 window.history.back();
						</script>";
			}
		}
		else 
		{
			$perintah6 = "INSERT INTO ratingjasa VALUES ('$id_jasa', '$ratingfinalround')";
			$result6=mysqli_query($konek, $perintah6);
			if($result6)
			{
				echo "<script>
							alert ('Review berhasil!');
							 window.history.back();
						</script>";
			}
		}
	}
?>