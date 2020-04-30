<?php
session_start();
include("admin/koneksi.php");
echo $_SESSION['email'];
?>