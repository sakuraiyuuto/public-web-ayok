

<!DOCTYPE html>
<html>
<head>
  <title>SIAKAD INFORMATIKA</title>
  <style>
    table{
      border-collapse: collapse;
    }
    a:link, a:visited {

      color: darkblue;
      padding: 14px 24px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    a:hover, a:active {
      background-color: #009688;
      color: white;      
    }
  </style>

</head>
<body style="">
  <center>
    <table cellpadding="10" width="1100px">
      <tr>
        <th height="100px" bgcolor="#003963" colspan="3" style="color:#F8BC20; font-size: 40px; text-align: center;">
          INFORMATIKA<font color="white"> UNTAN</font>
        </th>
      </tr>
      <tr align="left" valign="top" style="text-align: center; background-color: #FAFAFA; font-family:arial; font-size:18px;">
        <td align="left" colspan="3" height="auto" >
          <b>

            <a  href="../admin/index.php?home">Home</a> &nbsp;&nbsp; 
            <a href="../admin/index.php?mhs">Mahasiswa</a> &nbsp;&nbsp;
            <a href="../admin/index.php?mk">Mata Kuliah</a>&nbsp;&nbsp;
            <a href="../admin/index.php?krs">KRS</a>
            <a href="../admin/index.php?nilai">Nilai</a>
            <a href="../admin/index.php?raport">Raport</a>
            <a href="../admin/logout.php" style="color:red;">LOG OUT</a>
          </b>
        </td>     
      </tr>
      <tr>
       
        <td colspan=2 align="left" valign="top" height="auto"  style="background-color: lightgrey">
          <?php
          
          
          if (isset($_GET['mhs'])) {
            include '../mhs/index.php';
          } elseif (isset($_GET['mk'])) {
            include '../mk/index.php';
          } elseif (isset($_GET['krs'])){
            include '../krs/index.php';
          } elseif (isset($_GET['nilai'])) {
            include '../nilai/index.php';
          } elseif (isset($_GET['raport'])){
            include('../raport/index.php');
          } elseif(isset($_GET['home'])){
            echo "<h1>Selamat Datang Admin</h1>";
          }
          
          
          ?>