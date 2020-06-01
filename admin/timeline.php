<html>
<head>
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
if(isset($_SESSION['user'])) {
	$user  = $_SESSION['user'];
	echo"Selamat Datang <b>$user</b><br><br>";
}
?>

<a href="logout.php" style="background-color:rgb(230,60,40);"><b>Log Out</b></a>

<h2>Data User</h2>
<?php
$sql = mysqli_query($konek,"SELECT * FROM user");

if(isset($_POST['search'])) {
    $email = $_POST['keyword'];
    $nama = $_POST['keyword'];
	$sql = mysqli_query($konek,"SELECT * FROM user WHERE nama LIKE '%$nama%' OR email LIKE '%$email%'");
}

else if(isset($_POST['refresh'])) {
	$sql = mysqli_query($konek,"SELECT * FROM user");
}

else {
	$sql = mysqli_query($konek,"SELECT * FROM user");
}

?>

<form action = "" method = "post">
	<input type = "text" name = "keyword" placeholder = 'cari user' size = '40' autocomplete = "off">
	<input type = "submit" value = 'Cari' name = 'search'>
	<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh'></p>
</form>

<center>
<table border = '1' width = '650px' cellpadding = '8'>
	<tr>
		<th>Id User</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Nomor Telepon</th>
		<th>Password</th>
		<th>Action</th>
	</tr>
	
	<?php while($row = mysqli_fetch_assoc($sql)) : ?>
	<tr>
		<td align = 'center'>
			<?= $row['id_akun']; ?>
		</td>
		<td>
			<?= $row['nama']; ?>
		</td>
		<td align = 'center'>
			<?= $row['email']; ?>
		</td>
		<td>
			<?= $row['nomor_telepon']; ?>
		</td>
		<td>
			<?= $row['password']; ?>
		</td>
		<td align = 'center'>
			<a href = "edituser.php?id=<?= $row['id_akun']; ?>">Edit</a>
			<a href = "deleteuser.php?id=<?= $row['id_akun']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
		</td>
	</tr>
<?php endwhile; ?>
</table>
<br>
</center>
<h2>Data Review</h2>
<?php
$sql = mysqli_query($konek,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
					INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");

if(isset($_POST['search1'])) {
    $id_jasa = $_POST['keyword1'];
    $id_akun = $_POST['keyword1'];
	$content = $_POST['keyword1'];
	$rating = $_POST['keyword1'];
	$sql = mysqli_query($konek,"SELECT * FROM reviews WHERE id_jasa LIKE '%$id_jasa%' OR id_akun LIKE '%$id_akun%' OR content LIKE '%$content%' OR rating LIKE '%$rating%'");
}

else if(isset($_POST['refresh1'])) {
	$sql = mysqli_query($konek,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
					INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");
}

else {
	$sql = mysqli_query($konek,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
					INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun");
}

?>

<form action = "" method = "post">
	<input type = "text" name = "keyword1" placeholder = 'cari review' size = '40' autocomplete = "off">
	<input type = "submit" value = 'Cari' name = 'search1'>
	<p align = 'left'><input type = "submit" value = 'Refresh' name = 'refresh1'></p>
</form>

<center>
<table border = '1' width = '650px' cellpadding = '8'>
	<tr>
		<th>Id Jasa</th>
		<th>Id Review</th>
		<th>Id Akun</th>
		<th>Content</th>
		<th>Rating</th>
		<th>Action</th>
	</tr>
	
	<?php while($row = mysqli_fetch_assoc($sql)) : ?>
	<tr>
		<td align = 'center'>
			<?= $row['id_jasa']; ?>
		</td>
		<td align = 'center'>
			<?= $row['id']; ?>
		</td>
		<td align = 'center'>
			<?= $row['id_akun']; ?>
		</td>
		<td>
			<?= $row['content']; ?>
		</td>
		<td align = 'center'>
			<?= $row['rating']; ?>
		</td>
		<td align = 'center'>
			<a href = "editreview.php?id=<?= $row['id']; ?>">Edit</a>
			<a href = "deletereview.php?id=<?= $row['id']; ?>" onclick = "return confirm('Yakin?');">Hapus</a>
		</td>
	</tr>
<?php endwhile; ?>
</table>
</center>
</body>
</html>
