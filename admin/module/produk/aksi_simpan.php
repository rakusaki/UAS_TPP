<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

include "../../../lib/conf.php";
include "../../../lib/kon.php";

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$idKategori = $_POST['idKategori'];
$idMerek = $_POST['idMerek'];
$namaProduk = trim($_POST['namaProduk']);
$deskripsi = trim($_POST['deskripsiProduk']);
$hargaProduk = trim($_POST['hargaProduk']);
$slide = $_POST['slide'];
$rekomendasi = $_POST['rekomendasi'];

$path = "../../upload/".$nama_file;

if ($idKategori == "") {
	echo "<script> alert('Pilih Kategori Produk'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else if ($idMerek == "") {
	echo "<script> alert('Pilih Merek Produk'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else if ($namaProduk == "") {
	echo "<script> alert('Nama Produk Harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else if ($nama_file == "") {
	echo "<script> alert('Silahkan Upload Gambar'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else if ($deskripsi == "") {
	echo "<script> alert('Deskripsi Produk Harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else if (!is_numeric($hargaProduk )) {
	echo "<script> alert('Harga Produk Harus Angka'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
else {

if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
	if ($ukuran_file <= 1000000) {
		if (move_uploaded_file($tmp_file, $path)) {
			$querySimpan = mysqli_query($con, "INSERT INTO tbl_produk (id_kategori_produk, id_merek, nama_produk, deskripsi, harga, gambar, slide, rekomendasi) VALUES ('$idKategori','$idMerek','$namaProduk','$deskripsi','$hargaProduk','$nama_file','$slide','$rekomendasi')");
			if ($querySimpan) {
				echo "<script> alert('Data Produk Berhasil Disimpan'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
			}
			else {
				echo "<script> alert('Data Produk Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
			}
		}
		else {
			echo "<script> alert('Data Gambar Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
		}
	}
	else {
		echo "<script> alert('Data Gambar Gagal Disimpan Karena Ukuran File Melebihi 1MB'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}
else {
	echo "<script> alert('Data Gambar Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
}
}
?>