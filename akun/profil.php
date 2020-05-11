<?php 
	include("../sistem/koneksi_database.php");
	include("../sistem/cek_session.php");
?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="topnav" id="myTopnav">
		<a href="../index.php"><b>Home</b></a>
		<a href="../sistem/logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
		<div class="box1">
			<form name=form1 method=post action=carijasa.php onsubmit="return validate()">
				<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:none;">
				<input type=submit style="width:40px;height:30px;border-radius:10px;border:none;cursor:pointer;border:none;background-color:white;margin-left:1px;" value="Cari">
			</form>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<script type="text/javascript">
		//jika kotak pencarian kosong
		function validate()
		{
			obj = document.form1;
			cari = obj.cari.value;
			submitOK="True";
			if (cari =="")
			{
				alert("Masukkan kata kunci untuk cari!");
				obj.cari.focus();
				return false;
			}

			if (submitOK == false)
			{
				return false;
			}
		}
	</script>
	<script>
		function myFunction() 
		{
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") 
			{
				x.className += " responsive";
			} 
			else 
			{
				x.className = "topnav";
			}
		}
	</script>


	<div class="block1">
		<div class="font2">
			<center> Selamat datang,  
			<?php
				session_start();
				echo $_SESSION['nama'];
			?>.
		</div>
			
		<div class="block2">
			<div class="profilpict">
				<img src="../gambar/akun/profil.png"style="width:100%;height:100%;">
			</div>
			<br>
			<div class="box3">
				<div class="data1">
					<?php
						echo "<b>Id Akun</b>";?>
				</div>
				<div class="data2">
					<?php
						echo $_SESSION['id_akun'];
						$_SESSION['id_akun_utama']=$_SESSION['id_akun'];
						echo "<br>"
					?>
				</div>
			</div>

			<div class="box3">
				<div class="data1">
					<?php
						echo "<b>Nama</b>";
					?>
				</div>
				<div class="data2">
					<?php
						echo  $_SESSION['nama'];echo "<br>";?>
				</div>
			</div>

			<div class="box3">
				<div class="data1">
					<?php
						echo "<b>Email</b>";?></div>
				<div class="data2">
					<?php
						echo $_SESSION['email'];echo "<br>";
					?>
				</div>
			</div>

			<div class="box3">
				<div class="data1">
					<?php
						echo "<b>Nomor Telepon</b>";
					?>
				</div>
				<div class="data2">
					<?php
						echo $_SESSION['nomor_telepon'];echo "<br>";
					?>
				</div>
			</div>
			<div class="profilbookmark">
				<a href="bookmark.php">Lihat jasa tersimpan</a>
			</div>
			<h1><center>Jasa Saya :</center></h1><br>
		</div>
		<div class="box9">
			<div class="part">
				<?php
					$id_akun=$_SESSION['id_akun'];
					$perintah = "SELECT * FROM jasa where id_akun='$id_akun'";
					$hasil=mysqli_query($konek, $perintah);
					if($row=mysqli_fetch_array($hasil))
					{	
						$perintah2="SELECT * FROM kategori WHERE id_kategori2='$row[0]'";
						$hasil2=mysqli_query($konek, $perintah2);
						while($row2=mysqli_fetch_array($hasil2))
						{				
							echo "<div class=\"box3\">";
							echo "<div class=\"data1\"><b>";
							echo "Kategori jasa</b>";
							echo "</div>";
							echo "<div class=\"data2\">";
							echo "$row2[3]";echo "<br>";
							$nama_kategori="$row2[3]";
							$_SESSION['nama_kategori']=$nama_kategori;
							echo "</div></div>";
						}				
					
						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "ID jasa</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[1]";echo "<br>";
						$id_jasa="$row[1]";
						$_SESSION['id_jasa']=$id_jasa;
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Nama Jasa</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[3]";echo "<br>";
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Keterangan</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[4]";echo "<br>";
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Alamat</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[5]";echo "<br>";
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Harga Termurah</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[6]";echo "<br>";
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Harga Termahal</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[7]";echo "<br>";
						echo "</div></div>";

						echo "<div class=\"box3\">";
						echo "<div class=\"data1\"><b>";
						echo "Telepon</b>";
						echo "</div>";
						echo "<div class=\"data2\">";
						echo "$row[8]";echo "<br>";
						echo "</div></div>";

			echo "</div>";
						echo "<div class=\"part2\">";

						$perintah1 = "SELECT * FROM foto where id_jasa ='$id_jasa'";
						$result = mysqli_query($konek , $perintah1 );

						if(mysqli_fetch_assoc($result))
						{
							$query = $konek->query("SELECT * FROM foto where id_jasa='$id_jasa'");
							if($query->num_rows > 0)
							{
    							while($row = $query->fetch_assoc())
								{
									$imageURL = '../gambar/penyedia_jasa/'.$row["nama_foto"];
									// Get images from the database
				?>

									<img src="<?php echo $imageURL; ?>" alt="" />
									</div>
									<?php
									echo "<div class=\"part2\">";
									echo "<form action=\"../sistem/upload.php\" method=\"post\" enctype=\"multipart/form-data\">
									<h3>Perbarui Foto Jasa Anda :</h3>
									<div class=\"foto\">
									<input type=\"file\" name=\"file\"><br><br>
									</div>
									<input type=\"submit\" name=\"submit\" value=\"Upload\" style=\"cursor:pointer\">
									</form>";
									echo "</div>";
									echo "<center><a href=\"editjasa.php\">Edit jasa saya</a></center>";

								}
							}						
						}
						else 
						{
							echo "<div class=\"part\">";
							include("../sistem/upload.php");
							echo "<form action=\"../sistem/upload.php\" method=\"post\" enctype=\"multipart/form-data\">
							Tambahkan foto jasa :
							<div class=\"foto\">
							<input type=\"file\" name=\"file\"><br><br>
							</div>
							<input type=\"submit\" name=\"submit\" value=\"Upload\" style=\"cursor:pointer\">
							</form>";
							
							echo "</div>";
		echo "</div>";
							echo "<center><a href=\"editjasa.php\">Edit jasa saya</a></center>";
						}
					}
					else 
					{
	echo"</div>";
						echo "<div class=\"block2\">";
						echo "<div class =\"box5\">";
						echo "<h3>Anda belum menjadi penyedia jasa.</h3>";
						echo "<p>Ingin menjadi penyedia jasa? <br><br>";
						echo "<a href=\"inputjasa.php\">Daftar Sekarang.</a></p>";
						echo "</div>";
						echo "</div>";
					}
?>
</div></div></div>
<?php
include("../footer.php");
?>