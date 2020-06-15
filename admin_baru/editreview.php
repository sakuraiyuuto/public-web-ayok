<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["log"])) {
	header('location: index.php');
}
?>
<html>
<head>
	<title>Edit Reviews</title>
</head>
<body>
	<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>
	<a href="timeline1.php">Manajemen Akun User</a>
	<a href="timeline2.php">Manajemen Reviews</a>
	<a href="timeline3.php">Manajemen Jasa</a>
	<a href="timeline4.php">Manajemen Laporan Jasa</a>
	<a href="timeline5.php">Manajemen Akun Admin</a>
	
	<h2>Edit Reviews</h2>
<?php		
$idrvw  = $_GET['id'];

$sql = mysqli_query($link,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
					INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun WHERE b.id = '$idrvw'");
$rvw = mysqli_fetch_assoc($sql);

?>
	<center>
	<table border = '1' width = '650px' cellpadding = '8'>
		<tr>
			<th>Id Jasa</th>
			<th>Id Review</th>
			<th>Id Akun</th>
			<th>Content</th>
			<th>Rating</th>
		<tr>
			<td align = 'center'><?= $rvw['id_jasa']; ?></td>
			<td align = 'center'><?= $rvw['id']; ?></td>
			<td align = 'center'><?= $rvw['id_akun']; ?></td>
			<td><?= $rvw['content']; ?></td>
			<td align = 'center'><?= $rvw['rating']; ?></td>
		</tr>
	</table>
	</center>
	<form action = "" method = "post">
		Id Review:<input type = "hidden" name = "id" value = '<?= $rvw['id']; ?>'><br>
		<b><?= $rvw['id']; ?></b><br>
		<table cellpadding = '5'>
			<tr>
				<td align = 'left'><b>Content</b></td>
				<td><textarea name = "content"><?= $rvw['content']; ?></textarea></td>
			</tr>
			<tr>
				<td align = 'left'><b>Rating</b></td>
				<td><input type = "text" name = "rating" value = '<?= $rvw['rating']; ?>'></td>
			</tr>
			<tr>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
				<td colspan = '2' align = 'right'><input type = "submit" value = 'Batal' name = 'batal'></td>
			</tr>
		</table>
	</form>
<?php 				
if(isset($_POST['ubah'])){
	$content = $_POST['content'];
	$rating = $_POST['rating'];
	$update = mysqli_query($link,"UPDATE reviews SET content = '$content', rating = '$rating' WHERE id = '$idrvw'");
	$sql = mysqli_fetch_assoc($update);
	echo"<script>
			document.location.href = 'timeline2.php';
		</script>";
}
else if(isset($_POST['batal'])) {
	header("Location: timeline2.php");
}
?>
</body>
</html>