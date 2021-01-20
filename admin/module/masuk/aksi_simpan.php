<?php
include "../../../lib/conf.php";
include "../../../lib/kon.php";
//untuk menangkap variabel 'namaMerek' yang dikirim oleh form_tambah.php
$namaMerek = trim($_POST['namaMerek']);

if ($namaMerek == '') {
    $data['error']['nama'] = 'Nama Merek tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	//query untuk menyimpan ke tbl_merek
	$querySimpan = mysqli_query($con, "INSERT INTO tbl_merek (nama_merek) VALUES ('$namaMerek')");
	//jika query berhasil maka akan tampil ke alert dan halaman akan kembali ke daftar merek
	// if ($querySimpan) {
	// 	echo "<script> alert('Data Merek Berhasil Disimpan'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	// //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah_merek.php
	// }
	// else {
	// 	echo "<script> alert('Data Merek Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_merek';</script>";
	// }
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}
// tampilkan response dalam format json
echo json_encode($data);
?>