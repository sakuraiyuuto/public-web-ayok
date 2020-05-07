<?php
	include("../sistem/upload.php");
?>
<form action="admin/upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
<?php

// Include the database configuration file
include 'sistem/koneksi_database.php';

// Get images from the database
$id_jasa="25dwfwqxqi8fBEN";
$query = $konek->query("SELECT * FROM foto where id_jasa='$id_jasa'");

if($query->num_rows > 0)
{
    while($row = $query->fetch_assoc())
	{
        $imageURL = 'fotojasa/'.$row["nama_foto"];
		?>
		<img src="<?php echo $imageURL; ?>" alt="" />
		<?php 
	}
}
else
{ 
		?>
    <p>No image(s) found...</p>
	<?php 
} 
	?>