<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idKategori = $_GET['id_kategori'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_kategori WHERE id_kategori='$idKategori'");
	if ($queryHapus) {
		echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
	}
	else {
		echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
	}
}
?>