<?php
	include("sistem/koneksi_database.php");
	include("sistem/cek_session_login.php");

	$id_akun_utama=$_SESSION['id_akun_utama'];
	$perintah5="SELECT * from reviews where id_jasa='$id_jasa' ORDER BY id DESC";
	$result5=mysqli_query($konek, $perintah5);

	// echo $ratingfinal;
	// $_SESSION['rating_final']=$ratingfinal;
	// echo $ratingfinalround;
	// echo"<br>";
	// echo '<div><span class="text-warning mr-2">'. $ratingfinal.'</span>';
	// $_SESSION['rating_final']=$ratingfinal;
	// echo '<b>'.$ratingfinalround.'</b></div>';
	
	// while($row5=mysqli_fetch_array($result5))
	// {
	// 	$rating=$row5[4];
	// 	echo "<div class=\"review\">";
	// 	$id_akun=$row5[2];

	// 	$perintah8="SELECT * FROM user where id_akun='$id_akun'";
	// 	$hasil8=mysqli_query($konek, $perintah8);
	// 	while($row8=mysqli_fetch_array($hasil8)) 
	// 	{	
	// 		echo "<b>"; 
	// 		echo $row8[1]; 
	// 		echo "</b><br>";
	// 	}
	// 	if($rating<1)
	// 	{
	// 		echo "☆";
	// 	}
	// 	else if($rating<2)
	// 	{
	// 		echo "★";
	// 	}
	// 	else if($rating<3)
	// 	{
	// 		echo "★★";
	// 	}
	// 	else if($rating<4)
	// 	{
	// 		echo "★★★";
	// 	}
	// 	else if($rating<5)
	// 	{
	// 		echo "★★★★";
	// 	}
	// 	else if($rating==5)
	// 	{
	// 		echo "★★★★★";
	// 	}
	// 	echo $row5[4];echo "<br>";
	// 	echo "<b>Ulasan :</b>";	echo "<br>";
	// 	echo $row5[3];
	// 	echo "</div>";
	// }
		
	
	$perintah4 = "SELECT * FROM reviews WHERE id_jasa='$id_jasa' and id_akun='$id_akun_utama'";
	$result4 = mysqli_query($konek , $perintah4);
	if($row4=mysqli_fetch_array($result4))
	{
		$rating=$row4[4];
		echo "<hr><div class=\"hasreview\">";
		echo "<b>ULASAN ANDA :</b><br><br>";
		$perintah8="SELECT * FROM user where id_akun='$id_akun_utama'";
		$hasil8=mysqli_query($konek, $perintah8);
		while($row8=mysqli_fetch_array($hasil8)) 
		{	
			echo "<b>"; 
			echo $row8[1];
			echo "</b><br>";
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
		echo $row4[4];echo "<br>";
		echo "<b>Ulasan :</b>";	echo "<br>";
		echo $row4[3]."<br>";
		echo "<a href=\"../sistem/deletereview.php\"><b>Hapus Komentar</b></a>";
		echo "</div>";
	}
	else 
	{
		echo "<form name=\"form2\" method=\"post\" action=\"../sistem/reviewproses.php\" onsubmit=\"return validate()\">";
		echo "<table border=0>";
		echo "<select class=\"input form-control mb-2\" name=\"rating\" required>
				<option>- Beri Rating -</option>
				<option value=\"1\">★</option>
				<option value=\"2\">★★</option>
				<option value=\"3\">★★★</option>
				<option value=\"4\">★★★★</option>
				<option value=\"5\">★★★★★</option>
				</select>";
		echo "<textarea class=\"reviewinput form-control\" type=\"text\" name=\"review\" size=\"60\"  placeholder=\"Ulasan...\"></textarea>";
		echo "<input type=\"submit\" value=\"Submit\" class=\"mt-1\" style=\"text-decoration:none;color:white;padding:7px 13px;background-color:rgb(240,180,40);
		border-radius:10px;border:none;cursor:pointer;\">";
		echo "</form>";
	}
?>