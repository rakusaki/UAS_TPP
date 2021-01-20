<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idMerek = $_POST['id_merek'];
	$namaMerek = trim($_POST['namaMerek']);

if ($namaMerek == '') {
    $data['error']['nama'] = 'Nama Merek tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	$queryEdit = mysqli_query($con, "UPDATE tbl_merek SET nama_merek='$namaMerek' WHERE id_merek='$idMerek'");
	// if ($queryEdit) {
	// 	echo "<script> alert('Data Merek Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	// }
	// else {
	// 	echo "<script> alert('Data Merek Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$idMerek';</script>";
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