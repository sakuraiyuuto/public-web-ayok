<?php
	include("../sistem/koneksi_database.php");
	include("../sistem/cek_session_login.php");
?>
<html>
<head>
	<title>Ayo Kerja</title>
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
		$perintah1 = "SELECT * FROM jasa WHERE id_akun ='$id_akun'";
		$result2 = mysqli_query($konek , $perintah1 );
		if($row2=mysqli_fetch_array($result2))
		{	
			$perintah2="SELECT * FROM kategori WHERE nama_kategori='$kategorijasa'";
			$hasil2=mysqli_query($konek, $perintah2);
			while($row2=mysqli_fetch_array($hasil2))
			{	
				$id_kategorijasa=$row2[1];
			}
					
			$isi= "UPDATE jasa SET id_kategorijasa='$id_kategorijasa', id_akun='$id_akun', nama_jasa='$nama_jasa', keterangan='$keterangan', alamat='$alamat', hargamin='$hargamin', hargamax='$hargamax', telepon='$telepon' where id_akun='$id_akun'";
			$result=mysqli_query($konek, $isi) or die ("Error - update data gagal");
			if($result)
			{
				echo "<script>
						alert ('Anda berhasil perbarui jasa anda!');
						window.location.replace(\"../akun/profil.php\");
					</script>";
			}
			else 
			{
				echo "input gagal";
			}
		}
		else 
		{
			echo "input gagal2";
		}
		
	?>
		