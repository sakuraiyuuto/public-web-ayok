<?php 

error_reporting(0);

ini_set('display_errors', 0);


$server  = "localhost";
$username = "ayok";
$password = "Ayokerja17";
$database = "ayok_ayok";

//koneksi dan memilih database di server 
$konek = mysqli_connect($server , $username, $password , $database);

?>