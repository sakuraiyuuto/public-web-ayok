<?php 
session_start();
if (!isset($_SESSION["login"]))
{
    header("Location: akun/login.php");
    exit;
}
?>