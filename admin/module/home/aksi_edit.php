<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

include "../../../lib/conf.php";
include "../../../lib/kon.php";

$idAdmin = $_POST['id_admin'];

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];

$path = "../../upload/".$nama_file;
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
	if ($ukuran_file <= 1000000) {
		if (move_uploaded_file($tmp_file, $path)) {
			$queryEdit = mysqli_query($con, "UPDATE tbl_admin SET 
							username = '$username',
							password = '$password',
							nama = '$nama',
							email = '$email',
							gambar = '$nama_file'
							WHERE id_admin = '$idAdmin'");
			if ($queryEdit) {
				echo "<script> alert('Data Produk Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=home';</script>";
			}
			else {
				echo "<script> alert('Data Produk Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=home';</script>";
			}
		}
		else {
			echo "<script> alert('Data Gambar Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=home';</script>";
		}
	}
	else {
		echo "<script> alert('Data Gambar Gagal Diubah Karena Ukuran File Melebihi 1MB'); window.location = '$admin_url'+'adminweb.php?module=home';</script>";
	}
}
else {
	echo "<script> alert('Data Gambar Gagal Diubah');</script>";
}
}
?>