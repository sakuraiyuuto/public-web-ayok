<?php 

error_reporting(0);

ini_set('display_errors', 0);


$server  = "localhost";
$username = "root";
$password = "maman123";
$database = "ayok";

//koneksi dan memilih database di server 
$konek = mysqli_connect($server , $username, $password , $database);

?>