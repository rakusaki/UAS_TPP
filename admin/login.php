<?php

include "../lib/kon.php";
include "../lib/conf.php";

$username = $_POST ['username'];
$pass = $_POST ['password'];

if (!ctype_alnum($username) OR !ctype_alnum($pass)){
	echo "<center>LOGIN GAGAL <br>
			username atau password anda salah";
	echo "<a href=$admin_url><b>ULANGI LAGI</b></a></center>";

} else {
	$login = mysqli_query($con, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$pass'");
	$ketemu = mysqli_num_rows($login);
	$r= mysqli_fetch_array($login);

	if ($ketemu > 0){
		session_start();

		$_SESSION[namauser]=$r[username];
		$_SESSION[passuser]=$r[password];
			
		header('location:adminweb.php?module=home');

	}
	else{
		echo "<center>LOGIN GAGAL <br>
		username atau password anda salah";
	echo "<a href=$admin_url><br>
	<b>ULANGI LAGI</b></a></center>";
	}
}
?>