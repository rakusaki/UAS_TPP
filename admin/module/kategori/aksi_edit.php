<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idKategori = $_POST['id_kategori'];
	$namaKategori = trim($_POST['namaKategori']);

if ($namaKategori == '') {
    $data['error']['nama'] = 'Nama Kategori tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	$queryEdit = mysqli_query($con, "UPDATE tbl_kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'");
	// if ($queryEdit) {
	// 	echo "<script> alert('Data Kategori Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
	// }
	// else {
	// 	echo "<script> alert('Data Kategori Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idKategori';</script>";
	// }
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}
// tampilkan response dalam format json
echo json_encode($data);
}
?>