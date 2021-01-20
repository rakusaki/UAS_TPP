<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idExpedisi = $_POST['id_expedisi'];
	$namaExpedisi = trim($_POST['namaExpedisi']);

if ($namaExpedisi == '') {
    $data['error']['nama'] = 'Nama Expedisi tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	$queryEdit = mysqli_query($con, "UPDATE tbl_expedisi SET nama_expedisi='$namaExpedisi' WHERE id_expedisi='$expedisi'");
	// if ($queryEdit) {
	// 	echo "<script> alert('Data Kategori Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=expedisi';</script>";
	// }
	// else {
	// 	echo "<script> alert('Data Kategori Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_expedisi&id_expedisi='+'$expedisi';</script>";
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