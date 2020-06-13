<?php
	// Include the database configuration file
	include ("koneksi_database.php");
	include ("cek_session.php");
	$statusMsg = '';

	// File upload path
	$targetDir = "../../database/akun/foto_jasa/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$id_jasa=$_SESSION['id_jasa'];
	if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
	{
		// Allow certain file formats
		$allowTypes = array('jpg','png','jpeg','gif','pdf');
		if(in_array($fileType, $allowTypes))
		{
			// Upload file to server
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
			{
				// Insert image file name into database
				$perintah1 = "SELECT * FROM foto where id_jasa ='$id_jasa'";
				$result = mysqli_query($konek , $perintah1 );

				if(mysqli_fetch_assoc($result))
				{
					$update = $konek->query("UPDATE foto set id_jasa='$id_jasa', nama_foto='$fileName' where id_jasa='$id_jasa'");
				}
				else 
				{
					$insert = $konek->query("INSERT into foto (id_jasa, nama_foto) VALUES ('$id_jasa', '$fileName')");
				}
				echo "<script>window.location.replace(\"../akun/profilpenyediajasa.php\")</script>";
			}
		}
	}
	// Display status message
?>