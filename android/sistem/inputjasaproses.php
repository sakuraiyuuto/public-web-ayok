<?php
	include("koneksi_database.php");
	include("cek_session_login.php");
?>
<html>
<head>
	<title>AYOK</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		$id_akun=$_SESSION['id_akun'];
		$nama_jasa=$_POST['nama_jasa'];
		$kategorijasa=$_POST['kategorijasa'];
		$keterangan=$_POST['keterangan'];
		$alamat=$_POST['alamat'];
		$hargamin=$_POST['hargamin'];
		$hargamax=$_POST['hargamax'];
		$telepon=$_POST['telepon'];
		$id_jasa=base_convert(microtime(false), 10, 36).substr($nama_jasa,0,3);
	?>

		
	
	<?php
		$perintah1 = "SELECT id_akun FROM jasa WHERE id_akun ='$id_akun'";
		$result2 = mysqli_query($konek , $perintah1 );
		if(mysqli_fetch_assoc($result2))
		{
			echo "<script>
					alert ('Jasa sudah terdaftar!');
					window.location.replace(\"../akun/profil.php\");
				</script>";
			return false;
		}
	?>
	<?php
		$perintah2="SELECT * FROM kategori WHERE nama_kategori='$kategorijasa'";
		$hasil2=mysqli_query($konek, $perintah2);
		while($row2=mysqli_fetch_array($hasil2))
		{	
			$id_kategorijasa=$row2[1];
		}		
		$isi= "INSERT into jasa values ('$id_kategorijasa', '$id_jasa', '$id_akun', '$nama_jasa', '$keterangan', '$alamat', '$hargamin', '$hargamax', '$telepon','','0')";
		$result=mysqli_query($konek, $isi) or die ("Error - Input data gagal");
		if($result)
		{
			$isi2="INSERT into reviews VALUES ('$id_jasa', '', '', '', '5')";
			$result2=mysqli_query($konek, $isi2);
			if($result2) 
			{	
				$isi3="INSERT into ratingjasa VALUES ('$id_jasa', '5')";
				$result3=mysqli_query($konek, $isi3);
				if($result3) 
				{
					echo "<script>
							window.location.replace(\"../akun/profilpenyediajasa.php\");
						</script>";
				}
			}
		}
		else 
		{
			echo "daftar jasa gagal";
		}
	?>