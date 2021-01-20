<?php
include "../../../lib/conf.php";
include "../../../lib/kon.php";
//untuk menangkap variabel 'namaExpedisi' yang dikirim oleh form_tambah.php
$namaExpedisi = $_POST['namaExpedisi'];

if ($namaExpedisi == '') {
    $data['error']['nama'] = 'Nama Expedisi tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	//query untuk menyimpan ke tbl_expedisi
	$querySimpan = mysqli_query($con, "INSERT INTO tbl_expedisi (nama_expedisi) VALUES ('$namaExpedisi')");
	//jika query berhasil maka akan tampil ke alert dan halaman akan kembali ke daftar expedisi
	// if ($querySimpan) {
	// 	echo "<script> alert('Data Expedisi Berhasil Disimpan'); window.location = '$admin_url'+'adminweb.php?module=expedisi';</script>";
	// //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah_expedisi.php
	// }
	// else {
	// 	echo "<script> alert('Data Expedisi Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_expedisi';</script>";
	// }
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}
// tampilkan response dalam format json
echo json_encode($data);
?>