<?php 
include("admin/cek_session.php");
include("admin/koneksi.php");
?>
<html>
<head>
<title>Ayo Kerja !</title>
<link rel="stylesheet" href="admin/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav" id="myTopnav">
  <a href="index.php"><b>Home</b></a>
  <a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
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

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div class="block6">
	<div class="font3">
		<h2>Kesehatan</h2>
		</div>
		<div class="block2">
<h3><center>Pilihan jasa bidang kesehatan</center></h3>
<div class="block7">

		<a href ="kesehatan/dokter.php">
			<div class="box7">
			<img src="images/dokter.png"style="background-color:white;"><br>	
			Dokter
			</div>
				</a>

		<a href="kesehatan/pijat.php">
		<div class="box7">	
		<img src="images/pijat.png"style="background-color:white;"><br>	
			Pijat
			</div>
			</a>
		
		<a href ="kesehatan/terapi.php">
			<div class="box7">
			<img src="images/terapi.png"style="background-color:white;"><br>	
			Terapi
			</div>
			</a>
			
			
			
			</div>
			</div>
			</div>
			</body>
			</html>