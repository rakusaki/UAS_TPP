<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idMerek = $_GET['id_merek'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_merek WHERE id_merek='$idMerek'");
	if ($queryHapus) {
		echo "<script> alert('Data Merek Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	}
	else {
		echo "<script> alert('Data Merek Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	}
}
?>