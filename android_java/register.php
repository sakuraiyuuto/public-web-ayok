<?php

require "init.php";
$nama = $_GET["user_name"];
$email = $_GET["user_email"];
$nomor_telepon = $_GET["user_phone_number"];
$password = $_GET["user_password"];

$sql = "select * from user where email = '$email'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
    $status = "exist";
}
else 
{
	//enkripsi
	$id_akun=base_convert(microtime(false), 8, 36).substr($email,0,3);
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "insert into user(id_akun,nama,email,nomor_telepon,password) values('$id_akun','$nama','$email','$nomor_telepon','$password_hash');";
    if(mysqli_query($con,$sql))
    {
        $status = "ok";
    }
    else 
	{
        $status = "error";
    }
}

echo json_encode(array("response"=>$status));

mysqli_close($con);
?>