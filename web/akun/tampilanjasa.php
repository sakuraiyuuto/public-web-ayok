<?php
	include("../sistem/cek_session.php");
	include("../sistem/koneksi_database.php");
	header("tampilanjasa.php");
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
			<form name=form1 method=post action="carijasa.php" onsubmit="return validate()">
				<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa klik disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:none;">
				<input type=submit style="width:40px;height:30px;border-radius:10px;border:none;cursor:pointer;border:none;background-color:white;margin-left:1px;" value="Cari">
			</form>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
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
	
	<div class="block6">
		<div class="font3">
			<h2>Jasa pilihan kamu :</h2>
		</div>
		
		
		<div class=kiri>
		
		
		<div class="block2">
			<h3><center>
			<?php 
			$id_akun=$_GET['data1'];
			$nama_jasa=$_GET['data2'];
			$id_akun_utama=$_SESSION['id_akun_utama'];

			$perintah = "SELECT * FROM jasa where id_akun='$id_akun'";
			$hasil=mysqli_query($konek, $perintah);
			if($row=mysqli_fetch_array($hasil))
			{	
				if($row[10]>'0')
				{
					echo "<a href=\"iklanrekomendasi.php\"><div class=\"verified\">Verifikasi ✔️</div></a>";
				}
				else  
				{
					echo "<div class=\"notverified\">Belum verifikasi</div>";
				}
			}
			echo $nama_jasa;
			$id_jasa=$row[1];
			$perintah7 = "SELECT * FROM ratingjasa where id_jasa='$id_jasa'";
			$hasil7=mysqli_query($konek, $perintah7);
			if($row7=mysqli_fetch_array($hasil7))
			{
				$ratingfinaltop=$row7[1];
				if($ratingfinaltop<1)
				{
					$ratingfinalstar="☆";
				}
				else if($ratingfinaltop==1)
				{
					$ratingfinalstar="★";
				}
				else if($ratingfinaltop<2)
				{
					$ratingfinalstar="★☆";
				}
				else if($ratingfinaltop==2)
				{
					$ratingfinalstar="★★";
				}
				else if($ratingfinaltop<3)
				{
					$ratingfinalstar="★★☆";
				}
				else if($ratingfinaltop==3)
				{
						$ratingfinalstar="★★★";
				}
				else if($ratingfinaltop<4)
				{
					$ratingfinalstar="★★★☆";
				}
				else if($ratingfinaltop==4)
				{
					$ratingfinalstar="★★★★";
				}
				else if($ratingfinaltop<5)
				{
					$ratingfinalstar="★★★★☆";
				}
				else if($ratingfinaltop==5)
				{
					$ratingfinalstar="★★★★★";
				}
					
				if($row[10]>'0')
				{
					echo "<div class=\"ratingverified\">";echo $row7[1]." / ".$ratingfinalstar;echo"</div>";
				}
				else  
				{
					echo "<div class=\"ratingnotverified\">";echo $row7[1]." / ".$ratingfinalstar;echo"</div>";
				}
			}
			?>
			</center></h3>
		</div>
		
		
		
		
		
		
		<div class="box9">
		<div class="part">
		<?php
		
		echo "<div class=\"part\">";
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
						echo "</div>";
						
						
						
						
						
		
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
			
					}
				}
			}
		echo "</div>";
	echo "</div>";
		}
		?>
		</div>
		
		
		
		
		
		<section>
		<div class="sosmed">
					 <div class="isi-sosmed">
						 <a href="https://github.com/sakuraiyuuto/public-web-ayok" target="_blank"><img img style="width:50px;" src="./assets/images/github.png"> </a>
						 <a href="https://web.whatsapp.com/" target="_blank"><img img style="width:50px;" src="./assets/images/wa2.png"></a>
						 <a href="https://www.instagram.com/" target="_blank"><img img style="width:50px;" src="./assets/images/ig.png"> </a>
						 <a href="mail.google.com" target="_blank"><img img style="width:50px;"  src="./assets/images/gmail.png"></a>
						 <a href="https://www.facebook.com/" target="_blank"><img style="width:50px;" src="./assets/images/fb.png"></a>

					 </div>
				 </div>
				 </section>
				 
		
		
		
	
		
		
		
		
	<div class="reportbookmark">
		<a href="report.php">Laporkan</a>
		<?php
		$id_akun=$_SESSION['id_akun_utama'];
		$perintah11="SELECT * FROM bookmark WHERE id_jasa='$id_jasa' AND id_akun='$id_akun'";
		$result11=mysqli_query($konek, $perintah11);
		if($row11=mysqli_fetch_array($result11))
		{
			?>
				<a href="admin/bookmarkproses.php" style="color:white;background-color:black;">Tersimpan</a>
			<?php 
		}
		else
		{
			?>
				<a href="../sistem/bookmarkproses.php">Simpan</a>
			<?php
		}

			?>
	</div>
		
		
		
		
		
		
		
		</div>
	
	
	
	
	
	

	
	<div class=kanan>
	
	
	<div class="reviewbox">
		<h2>Rating dan Ulasan</h2>
		<?php
			include ("review.php"); 
		?>
	</div>
	</div>
	</div>
		<?php
			include ("footer.php");
		?>
