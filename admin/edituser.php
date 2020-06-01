<?php
session_start();
include("index.php");
?>
<h2>Edit User</h2>
<?php		
					$idusr  = $_GET['id'];

					$sql = mysqli_query($konek,"SELECT * from user WHERE id_akun = '$idusr'");
					$usr = mysqli_fetch_assoc($sql);

?>
					<form action = "" method = "post">
						Id Akun:<input type = "hidden" name = "id_user" value = '<?= $usr['id_akun']; ?>'><br>
						<b><?= $usr['id_akun']; ?></b><br>
						<table cellpadding = '5'>
							<tr>
								<td align = 'left'><b>Nama</b></td>
								<td><input type = "text" name = "nama" required value = '<?= $usr['nama']; ?>'></td>
							</tr>
							<tr>
								<td align = 'left'><b>Email</b></td>
								<td><input type = "text" name = "email" required value = '<?= $usr['email']; ?>'></td>
							</tr>
							<tr>
								<td align = 'left'><b>Nomor Telepon</b></td>
								<td><input type = "text" name = "tlp" required value = '<?= $usr['nomor_telepon']; ?>'></td>
							</tr>
							<tr>
								<td align = 'left'><b>Password</b></td>
								<td><input type = "password" name = "pw"></td>
							</tr>
							<tr>
								<td colspan = '2' align = 'right'><input type = "submit" value = 'Edit' name = 'ubah'></td>
							</tr>
						</table>
					</form>
<?php 				
					if(isset($_POST['ubah'])){
					    $nama = $_POST['nama'];
					    $email = $_POST['email'];
						$notlp = $_POST['tlp'];
						$pass = $_POST['pw'];
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$update = mysqli_query($konek,"UPDATE user SET nama = '$nama', email = '$email', nomor_telepon = '$notlp', password = '$password' WHERE id_akun = '$idusr'");
						$sql = mysqli_fetch_assoc($update);
						echo"<script>
								document.location.href = 'index.php?timeline';
							</script>";
					}
?>