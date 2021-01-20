<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$idMember = $_POST['id_member'];
	$nama = trim($_POST['nama']);
	$username = trim($_POST['username']);
	$pass = trim($_POST['pass']);
	$email = trim($_POST['email']);
	$no_telp = trim($_POST['no_telp']);
	$alamat = trim($_POST['alamat']);
	$status = trim($_POST['slide']);

if ($nama == '') {
    $data['error']['nama'] = 'Nama Tidak Boleh Kosong';
}
if ($username == '') {
    $data['error']['username'] = 'Username Tidak Boleh Kosong';
}
if ($pass == '') {
    $data['error']['pass'] = 'Password Tidak Boleh Kosong';
}
if ($email == '') {
    $data['error']['email'] = 'Email Tidak Boleh Kosong';
}
if ($no_telp == '') {
    $data['error']['no_telp'] = 'No Telpon Tidak Boleh Kosong';
}
if ($alamat == '') {
    $data['error']['alamat'] = 'Alamat Tidak Boleh Kosong';
}
if (empty($data['error'])) {
    // jika validasi berhasil
    $data['hasil'] = 'sukses';

	$queryEdit = mysqli_query($con, "UPDATE tbl_member SET 
							nama = '$nama',
							username = '$username',
							password = '$pass',
							email = '$email',
							no_hp = '$no_telp',
							alamat = '$alamat',
							status = '$status'
							WHERE id_member = '$idMember'");
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