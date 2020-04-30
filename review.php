<?php
include("admin/koneksi.php");
include("admin/cek_session_login.php");

$id_akun_utama=$_SESSION['id_akun_utama'];
$perintah5="SELECT * from reviews where id_jasa='$id_jasa' ORDER BY id DESC";
$result5=mysqli_query($konek, $perintah5);

foreach($konek->query("SELECT SUM(rating) FROM reviews WHERE id_jasa='$id_jasa'") as $row) {
$total=$row['SUM(rating)'];
}

foreach($konek->query("SELECT COUNT(*) FROM reviews WHERE id_jasa='$id_jasa'") as $row) {
echo "Telah diberi rating : "; echo $row['COUNT(*)'];echo " kali<br>";
$jumlah=$row['COUNT(*)'];
}
	
$ratingfinal=$total/$jumlah;
$ratingfinalround=round($ratingfinal,1);
	if($ratingfinalround<1){
		$ratingfinal="☆";
	}
	else if($ratingfinalround==1){
		$ratingfinal="★";
		}
	else if($ratingfinalround<2){
		$ratingfinal="★☆";
	}
	else if($ratingfinalround==2){
		$ratingfinal="★★";
		}
		else if($ratingfinalround<3){
		$ratingfinal="★★☆";
		}
		else if($ratingfinalround==3){
			$ratingfinal="★★★";
		}
		else if($ratingfinalround<4){
		$ratingfinal="★★★☆";
		}
		else if($ratingfinalround==4){
			$ratingfinal="★★★★";
		}
		else if($ratingfinalround<5){
		$ratingfinal="★★★★☆";
		}
	else if($ratingfinalround==5){
		$ratingfinal="★★★★★";
		}
		echo $ratingfinal;
		$_SESSION['rating_final']=$ratingfinal;
		echo $ratingfinalround;
	echo"<br>";
	
	while($row5=mysqli_fetch_array($result5)){
		$rating=$row5[4];
echo "<div class=\"review\">";
$id_akun=$row5[2];

$perintah8="SELECT * FROM user where id_akun='$id_akun'";
$hasil8=mysqli_query($konek, $perintah8);
while($row8=mysqli_fetch_array($hasil8)) {	

echo "<b>"; echo $row8[1]; echo "</b><br>";}
			if($rating<1){
echo "☆";
	}
	else if($rating<2){
		echo "★";
	}
		else if($rating<3){
		echo "★★";
		}
		else if($rating<4){
		echo "★★★";
		}
		else if($rating<5){
		echo "★★★★";
		}
	else if($rating==5){
		echo "★★★★★";
		}
			echo $row5[4];echo "<br>";
			echo "<b>Ulasan :</b>";	echo "<br>";
			echo $row5[3];
			echo "</div>";
}
		
	
$perintah4 = "SELECT * FROM reviews WHERE id_jasa='$id_jasa' and id_akun='$id_akun_utama'";
	$result4 = mysqli_query($konek , $perintah4);
if($row4=mysqli_fetch_array($result4)){
	$rating=$row4[4];
	echo "<div class=\"hasreview\">";
echo "<b>ULASAN ANDA :</b><br><br>";
$perintah8="SELECT * FROM user where id_akun='$id_akun_utama'";
$hasil8=mysqli_query($konek, $perintah8);
while($row8=mysqli_fetch_array($hasil8)) {	

echo "<b>"; echo $row8[1];echo "</b><br>";}
			if($rating<1){
echo "☆";
	}
	else if($rating<2){
		echo "★";
	}
		else if($rating<3){
		echo "★★";
		}
		else if($rating<4){
		echo "★★★";
		}
		else if($rating<5){
		echo "★★★★";
		}
	else if($rating==5){
		echo "★★★★★";
		}
			echo $row4[4];echo "<br>";
			echo "<b>Ulasan :</b>";	echo "<br>";
			echo $row4[3]."<br>";
			echo "<a href=\"deletereview.php\"><b>Hapus Komentar</b></a>";
			echo "</div>";
}
else {
	echo "<div class=\"reviewform\">";
	echo "<form name=\"form2\" method=\"post\" action=\"reviewproses.php\" onsubmit=\"return validate()\">";
	echo "<table border=0>";
echo "<tr><td>Rating</td>";
echo "<td><select class=\"input\" name=\"rating\" required>
			<option></option>
<option value=\"1\">★</option>
<option value=\"2\">★★</option>
<option value=\"3\">★★★</option>
<option value=\"4\">★★★★</option>
<option value=\"5\">★★★★★</option>
</select>
</td></tr>";
echo "<tr><td>Review</td>";
echo "<td><input class=\"reviewinput\" type=\"text\" name=\"review\" size=\"60\"  placeholder=\"Review\"></td></tr>";
echo "<tr><td><input type=\"submit\" value=\"Submit\" style=\"text-decoration:none;color:white;padding:7px 13px;background-color:rgb(240,180,40);
border-radius:10px;border:none;cursor:pointer;\"></td></tr>";
echo "</form>";
echo "</table>";
echo "</div>";
}
	?>