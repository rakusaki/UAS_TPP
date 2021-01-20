<?php
include "../../../lib/conf.php";
include "../../../lib/kon.php";
//untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
$namaKategori = trim($_POST['namaKategori']);

if ($namaKategori == '') {
    $data['error']['nama'] = 'Nama Kategori tidak boleh kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';
	//query untuk menyimpan ke tbl_kategori
	$querySimpan = mysqli_query($con, "INSERT INTO tbl_kategori (nama_kategori) VALUES ('$namaKategori')");
	//jika query berhasil maka akan tampil ke alert dan halaman akan kembali ke daftar kategori
	// if ($querySimpan) {
	// 	echo "<script> alert('Data Kategori Berhasil Disimpan'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
	// //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah_kategori.php
	// }
	// else {
	// 	echo "<script> alert('Data Kategori Gagal Disimpan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
	// }
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}
// tampilkan response dalam format json
echo json_encode($data);
?>