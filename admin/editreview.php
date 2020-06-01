<?php
session_start();
include("index.php");
?>
<h2>Edit Review</h2>
<?php		
					$idrvw  = $_GET['id'];

					$sql = mysqli_query($konek,"SELECT a.id_jasa, b.id, c.id_akun, b.content, b.rating from jasa a 
					INNER JOIN reviews b ON a.id_jasa = b.id_jasa INNER JOIN user c ON b.id_akun = c.id_akun WHERE id = '$idrvw'");
					$rvw = mysqli_fetch_assoc($sql);

?>
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
							</tr>
						</table>
					</form>
<?php 				
					if(isset($_POST['ubah'])){
					    $content = $_POST['content'];
					    $rating = $_POST['rating'];
						$update = mysqli_query($konek,"UPDATE reviews SET content = '$content', rating = '$rating' WHERE id = '$idrvw'");
						$sql = mysqli_fetch_assoc($update);
						echo"<script>
								document.location.href = 'index.php?timeline';
							</script>";
					}
?>