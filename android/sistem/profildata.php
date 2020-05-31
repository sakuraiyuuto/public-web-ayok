<?php
session_start();
include("sistem/koneksi_database.php");
echo $_SESSION['email'];
?>