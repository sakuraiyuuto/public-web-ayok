<?php 

error_reporting(0);

ini_set('display_errors', 0);


$server_database  = "localhost";
$username_database = "root";
$password_database = "";
$nama_database = "ayok";

//koneksi dan memilih database di server 
$konek = mysqli_connect($server_database , $username_database, $password_database , $nama_database);

?>