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
	$login = mysqli_query($con, "SELECT * FROM tbl_admin WHERE username='$username'");
	$ketemu = mysqli_num_rows($login);
	$r= mysqli_fetch_array($login);

	if ($ketemu > 0){
		echo "<center>LOGIN GAGAL <br>
		username sudah ada";
		echo "<a href=$admin_url><br>
		<b>ULANGI LAGI</b></a></center>";
	}
	else{
		$reg = mysqli_query($con, "INSERT INTO tbl_admin (username, password) VALUES ('$username', '$pass')");	
		header('location:index.php');
	}
}
?>