<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Ayo Kerja !</title>
	<link rel="stylesheet" href="admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="block4">
<p>ayo <b>kerja !</b></p>

<h1>Login Admin</h1>
<script type="text/javascript">

	function validate(){
		obj = document.form1;
		email = obj.email.value;
		submitOK="True";
		
		if (email ==""){
			alert("Email harus diisi!");
			obj.email.focus();
			return false;

		}
		
		if (password ==""){
			alert("Password harus diisi!");
			obj.password.focus();
			return false;
		}
		
		if (submitOK == false){
			return false;
		}
	}

</script>

<body>
<?php

if(isset($_POST['login'])) {
	$email = $_POST[email];
	$pass = $_POST[pass];
	
	$result = mysqli_query($konek,"SELECT * FROM admin WHERE email='$email' AND password='$pass'");
	if($row	= mysqli_fetch_array($result)){
		$_SESSION['user']=$row[1]; $_SESSION['userid']=$row[0];
		echo"<b>Login Berhasil</b>";
		echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
	}
	else {
		echo"<b>Login Gagal</b><br><br>";
		echo"
		<form method='POST' action='index.php'>
		    <table cellpadding='0' cellspacing='0'>
			    <tr>
			        <td>Username &nbsp;</td>
			        <td><input type='text' name='email'></td>
			    </tr>
			    <tr>
			        <td>Password &nbsp;</td>
			        <td><input type='password' name='pass'></td>
			    </tr>
			</table><br><input type='submit' name='login' value='Login' style='text-align:center;width:100px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;border-radius:30px;margin-top:3%;margin-bottom:3%;'>
		</form>";
	}
}
else{
    echo"
		<form method='POST' action='index.php'>
		    <table cellpadding='0' cellspacing='0'>
			    <tr>
			        <td>Email &nbsp;</td>
			        <td><input type='text' name='email'></td>
			    </tr>
			    <tr>
			        <td>Password &nbsp;</td>
			        <td><input type='password' name='pass'></td>
			    </tr>
			</table><br><input type='submit' name='login' value='Login' style='text-align:center;width:100px;cursor:pointer;border:none;background-color:rgb(220,180,60);color:white;border-radius:30px;margin-top:3%;margin-bottom:3%;'>
		</form>";
}
?>
</div>
</body>
</html>