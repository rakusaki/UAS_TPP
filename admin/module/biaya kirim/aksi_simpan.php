<?php

include "../../../lib/conf.php";
include "../../../lib/kon.php";
//untuk menangkap variabel 'namaBiaya' yang dikirim oleh form_tambah.php

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
//query untuk menyimpan ke tbl_biaya
$querySimpan = mysqli_query($con, "INSERT INTO tbl_biaya_kirim (provinsi, kabupaten, kecamatan, kelurahan, biaya, expedisi) VALUES ('$provinsi','$kabupaten','$kecamatan','$kelurahan','$biaya','$expedisi')");
//jika query berhasil maka akan tampil ke alert dan halaman akan kembali ke daftar biaya
// if ($querySimpan) {
// 	echo "<script> alert('Data Biaya Berhasil Disimpan'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
// //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah_biaya.php
// }
// else {
// 	echo "<script> alert('Data Biaya Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
// }
// }
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}
// tampilkan response dalam format json
echo json_encode($data);
?>