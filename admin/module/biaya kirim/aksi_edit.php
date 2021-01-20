<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idBiaya = $_POST['id_biaya'];
	$provinsi = $_POST['provinsi'];
	$kabupaten = $_POST['kabupaten'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$expedisi = $_POST['expedisi'];
	$biaya = trim($_POST['biaya']);

if ($provinsi == '') {
    $data['error']['prov'] = 'Silahkan Pilih Provinsi';
}
if ($kabupaten == '') {
    $data['error']['kab'] = 'Silahkan Pilih Kabupaten';
}
if ($kecamatan == '') {
    $data['error']['kec'] = 'Silahkan Pilih Kecamatan';
}
if ($kelurahan == '') {
    $data['error']['kel'] = 'Silahkan Pilih Kelurahan';
}
if ($expedisi == '') {
    $data['error']['exp'] = 'Silahkan Pilih Expedisi';
}
if (!is_numeric($biaya)) {
    $data['error']['biaya'] = 'Harus Berupa Angka';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';

	$queryEdit = mysqli_query($con, "UPDATE tbl_biaya_kirim SET 
							id_biaya = '$idBiaya',
							provinsi = '$provinsi',
							kabupaten = '$kabupaten',
							kecamatan = '$kecamatan',
							kelurahan = '$kelurahan',
							expedisi = '$expedisi',
							biaya = '$biaya'
							WHERE id_biaya = '$idBiaya'");
	// if ($queryEdit) {
	// 	echo "<script> alert('Data Biaya Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
	// }
	// else {
	// 	echo "<script> alert('Data Biaya Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_biaya&id_biaya='+'$idBiaya';</script>";
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