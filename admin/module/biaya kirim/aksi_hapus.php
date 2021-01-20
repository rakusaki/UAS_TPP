<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idBiaya = $_GET['id_biaya'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_biaya_kirim WHERE id_biaya='$idBiaya'");
	if ($queryHapus) {
		echo "<script> alert('Data Biaya Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
	}
	else {
		echo "<script> alert('Data Biaya Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
	}
}
?>