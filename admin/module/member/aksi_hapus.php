<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idMember = $_GET['id'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_member WHERE id_member='$idMember'");
	if ($queryHapus) {
		echo "<script> alert('Data Member Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>";
	}
	else {
		echo "<script> alert('Data Member Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>";
	}
}
?>