<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idExpedisi = $_GET['id_expedisi'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_expedisi WHERE id_expedisi='$idExpedisi'");
	if ($queryHapus) {
		echo "<script> alert('Data Expedisi Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=expedisi';</script>";
	}
	else {
		echo "<script> alert('Data Expedisi Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=expedisi';</script>";
	}
}
?>