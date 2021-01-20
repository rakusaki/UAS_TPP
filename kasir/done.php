<?php
session_start();
include "../lib/kon.php";
include "../lib/conf.php";


if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else {

$user = $_SESSION['namauser'];

$kueriKasir = mysqli_query($con, "SELECT * FROM tbl_admin WHERE username = '".$user."'");
$kas = mysqli_fetch_array($kueriKasir);

$sid = session_id();
$total = $_POST['tot'];
$id_kasir = $kas['id_admin'];


if ($sid == '') {
    $data['error']['barcode'] = 'Barcode tidak boleh kosong';
}
if (empty($data['error'])) {
	$data['hasil'] = 'sukses';

	$querySimpan = mysqli_query($con, "INSERT INTO tbl_kasir (total, id_kasir, session) VALUES ('$total','$id_kasir','$sid')");
// if ($querySimpan) {
// }
// else {
// 	echo "<script> alert('Data Produk Gagal Disimpan'); window.location = '$kasir_url'+'kasir.php';</script>";
//  	$data['hasil'] = 'gagal';
}
else {
    // jika validasi gagal
    $data['hasil'] = 'gagal';
}

echo json_encode($data);
}
?>