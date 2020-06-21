<?php
	include("../sistem/cek_session.php");
	include("../sistem/koneksi_database.php");
	header("tampilanjasa.php");

?>
<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="../sistem/style.css">
	<link rel="stylesheet" href="../sistem/bootstrap.min.css">
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
	$id_akun=$_GET['data1'];
	$nama_jasa=$_GET['data2'];
	$id_akun_utama=$_SESSION['id_akun_utama'];
?>
	<div class="container mb-5">
		<div class="col-12">
			<div class="row">
				
				<div class="col-md-8" style="margin-top: 80px;">
					<h3 class="row"><?php echo $nama_jasa; ?></h3>
					<div class="row mb-2">

						<div class="col-md-6">
							<div class="row">
								<img src="../gambar/jasa.png" class="rounded-circle mr-2" width="50" height="50" style="object-fit:container; object-position:center;">
								<?php 
								$perintah = "SELECT * FROM jasa where id_akun='$id_akun'";
								$hasil=mysqli_query($konek, $perintah);
								if($row=mysqli_fetch_array($hasil))
								{	
									if($row[10]>'0')
									{
										echo "<a href=\"iklanrekomendasi.php\"><div class=\"verified badge badge-success\">Verifikasi ✔️</div></a>";
									}
									else  
									{
										echo "<div><div class=\"notverified badge badge-info\">Belum verifikasi</div>";
									}
								}
								// echo $nama_jasa;
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
										echo "<div class=\"ratingnotverified\">";echo $row7[1]." / ".'<span class="text-warning">'.$ratingfinalstar.'</span>';echo"</div></div></div></div>";
									}
								}
								?>
							
							<div class="col-md-6">
								<div class="row pull-right align-bottom">
									<a href="report.php" class="btn btn-sm btn-danger mr-2">Laporkan</a>
									<a href="../sistem/bookmarkproses.php" class="btn btn-sm btn-primary">Simpan</a>
								</div>
							</div>

						</div>

						<!-- Gambar -->
						<div class="row">
							<div>
								 <?php 
									$query = $konek->query("SELECT * FROM foto where id_jasa='$id_jasa'");
									if ($row = mysqli_fetch_assoc($query)){
										$foto = $row['nama_foto'];
									}
								 ?> 
								<img src="../../database/akun/foto_jasa/<?php echo $foto; ?>" class="img-thumbnail">
							</div>
						</div>

						<!-- Tentang jasa -->
						<div class="row">
							<h4 class="mt-2">Tentang Jasa</h4>
							<div class="card col-12 mt-2 py-3">
								<?php
								$perintah = "SELECT * FROM jasa where id_akun='$id_akun'";
								$hasil=mysqli_query($konek, $perintah);
								if($row=mysqli_fetch_array($hasil))
								{	
									$perintah2="SELECT * FROM kategori WHERE id_kategori2='$row[0]'";
									$hasil2=mysqli_query($konek, $perintah2);
									while($row2=mysqli_fetch_array($hasil2))
									{	
										echo '<div class="row"><div class="col-6">';
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
									echo '</div>';

									echo '<div class="col-6">';
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
									echo "<div class=\"part\">";
									echo '</div></div>';
								}
								?>
							</div>
						</div>

						<hr class="row">

						<h4 class="row mt-2">Reviews</h4>

							<div class="row">
								<?php 
								$id_akun_utama=$_SESSION['id_akun_utama'];
								$perintah5="SELECT * from reviews where id_jasa='$id_jasa' ORDER BY id DESC";
								$result5=mysqli_query($konek, $perintah5);
								while($row5=mysqli_fetch_array($result5)):
									$rating=$row5[4];
									$id_akun=$row5[2];
								 ?>

								<div class="card col-12 mt-2 p-2">
									<!-- <span class="text-warning"> -->
									<?php
									$perintah8="SELECT * FROM user where id_akun='$id_akun'";
									$hasil8=mysqli_query($konek, $perintah8);
									while($row8=mysqli_fetch_array($hasil8)) 
									{	
										echo "<span><b>"; 
										echo $row8[1]; 
										echo "</b></span><br>";
										echo '<span class="text-warning">';
									}
									if($rating<1)
									{
										echo "☆";
									}
									else if($rating<2)
									{
										echo "★";
									}
									else if($rating<3)
									{
										echo "★★";
									}
									else if($rating<4)
									{
										echo "★★★";
									}
									else if($rating<5)
									{
										echo "★★★★";
									}
									else if($rating==5)
									{
										echo "★★★★★";
									} 

									 ?>
									</span>
									<p><?php echo $row5[3]; ?></p>
								</div>
							<?php endwhile; ?>
							</div>


							<hr class="row">
							<div class="row mt-5">
								<div class="col-md-12">
									<div class="row">
										<h2>Rating dan Ulasan</h2>
									</div>
									<div class="row">
										<div class="col-md-12 px-0">
											<?php
												include ("review.php"); 
											?>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<!-- /.col 8 -->
					</div>
					<!-- /.row -->
			</div>
		</div>
	</div>
<!-- <div class="reviewbox container">
	<h2>Rating dan Ulasan</h2>
	<?php
		include ("review.php"); 
	?>
</div>
</div>
	<?php
		include ("footer.php");
	?> -->