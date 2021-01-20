<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../lib/conf.php";
	include "../lib/kon.php";

	$id = $_GET['id'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_detail_kasir WHERE id='$id'");
	if ($queryHapus) {
		echo "<script> alert('Data Merek Berhasil Dihapus'); window.location = '$kasir_url'+'kasir.php';</script>";
	}
	else {
		echo "<script> alert('Data Merek Gagal Dihapus'); window.location = '$kasir_url'+'kasir.php';</script>";
	}
}
?>