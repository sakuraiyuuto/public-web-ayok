<?php
	include("../sistem/cek_session.php");
	include("../sistem/koneksi_database.php");
?>
<html>
<head>
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
				<input class=input type=text name=cari maxlength=100 placeholder="Cari jasa disini"style="width:80%;height:30px;border-radius:30px;padding-left:10px;border:none;">
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
	<?php
		$cari=$_POST['cari'];		
	?>
	<div class="block6">
		<div class="font3">
			<h2>Menampilkan Hasil Pencarian dari "<?php echo $cari;?>"</h2>
		</div>
		<div class="block2">
			<div class="block7">
			<?php	

			$perintah5="SELECT * FROM jasa WHERE nama_jasa LIKE '%".$cari."%' ORDER BY urutan DESC";
			$hasil5=mysqli_query($konek, $perintah5);
			if($row5=mysqli_fetch_array($hasil5))
			{	
				$perintah="SELECT * FROM jasa WHERE nama_jasa LIKE '%".$cari."%' ORDER BY urutan DESC";
				$hasil=mysqli_query($konek, $perintah);
				while($row=mysqli_fetch_array($hasil))
				{	
					$perintah2="SELECT * FROM kategori WHERE id_kategori2='$row[0]'";
					$hasil2=mysqli_query($konek, $perintah2);
					while($row2=mysqli_fetch_array($hasil2))
					{
						$perintah3="SELECT * FROM foto where id_jasa='$row[1]'";
						$hasil3=mysqli_query($konek, $perintah3);
						while($row3=mysqli_fetch_array($hasil3))
						{
							$imageURL='../../database/akun/foto_jasa/'.$row3[1];
						}
						echo "<a href=\"tampilanjasa.php?data1=$row[2]&data2=$row[3]\">";
						echo "<div class=\"box8\">";
						if($row[10]>'0')
						{
							echo "<div class=\"verified\">Verifikasi ✔️</div>";
						}
						else  
						{
							echo "<div class=\"notverified\">Belum verifikasi</div>";
						}
			
						$perintah4="SELECT * FROM ratingjasa where id_jasa='$row[1]'";
						$hasil4=mysqli_query($konek, $perintah4);
						if($row4=mysqli_fetch_array($hasil4))
						{
							$ratingfinalround=$row4[1];
							if($ratingfinalround<1)
							{
								$ratingfinal="☆";
							}
							else if($ratingfinalround==1)
							{
								$ratingfinal="★";
							}
							else if($ratingfinalround<2)
							{
								$ratingfinal="★☆";
							}
							else if($ratingfinalround==2)
							{
								$ratingfinal="★★";
							}
							else if($ratingfinalround<3)
							{
								$ratingfinal="★★☆";
							}
							else if($ratingfinalround==3)
							{
								$ratingfinal="★★★";
							}
							else if($ratingfinalround<4)
							{
								$ratingfinal="★★★☆";
							}
							else if($ratingfinalround==4)
							{
								$ratingfinal="★★★★";
							}
							else if($ratingfinalround<5)
							{
								$ratingfinal="★★★★☆";
							}
							else if($ratingfinalround==5)
							{
								$ratingfinal="★★★★★";
							}
			
							if($row[10]>'0')
							{
								echo "<div class=\"ratingverified\">";
								echo $ratingfinal;
								echo "</div>";
							}
							else 
							{
								echo "<div class=\"ratingnotverified\">";
								echo $ratingfinal;
								echo "</div>";
							}
						}
								
							echo "<img src=\"$imageURL\"><br>";	
							echo "<b>$row[3]</b>";echo "<br>";
							echo "📞";echo "$row[8]";echo "<br>";
							echo "<b>Alamat :<br></b>";
							echo "$row[5]";echo "<br><br>";
							echo "$row[4]";
							$_SESSION['nama_jasa']=$row[3];
							echo "</div>";	
							echo "</a>";
					}
						
				}
			}
			else 
			{
				echo "<h3><center>Jasa tidak ditemukan.</h3></center>";
			}
			?>
			</div>
		</div>
	</div>
</body>
</html>