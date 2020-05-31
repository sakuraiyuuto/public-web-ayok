<?php
    require "init.php";

    $email = $_GET["user_email"];
    $password = $_GET["user_password"];
	
	$perintah = "SELECT * FROM user where email = '$email'";
	$result = mysqli_query($con , $perintah);
	if(mysqli_num_rows($result) === 1)
	{
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"]))
		{
			$email_login = $row['email'];
			$status = "ok";
			echo json_encode(array("response"=>$status,"email"=>$email_login));
		}
		else
		{
			$status = "failed";
			echo json_encode(array("response"=>$status));
		}
	}
	else 
	{
		$status = "failed";
        echo json_encode(array("response"=>$status));
	}
	
    mysqli_close($con);
?>