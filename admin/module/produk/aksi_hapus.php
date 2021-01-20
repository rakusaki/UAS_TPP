<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idProduk = $_GET['id_produk'];
	$queryHapus = mysqli_query($con, "DELETE FROM tbl_produk WHERE id_produk='$idProduk'");
	if ($queryHapus) {
		echo "<script> alert('Data Produk Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
	}
	else {
		echo "<script> alert('Data Produk Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
	}
}
?>