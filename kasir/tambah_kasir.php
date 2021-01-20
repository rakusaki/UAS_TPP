<?php

include "../lib/kon.php";
include "../lib/conf.php";

$sid = $_POST['session'];
$barcode = $_POST['barcode'];
$qty = $_POST['qt'];

$kueriBarcode = mysqli_query($con, "SELECT * FROM tbl_produk WHERE barcode = '".$barcode."'");
$kab = mysqli_fetch_array($kueriBarcode); 
	
$id_produk = $kab['id_produk'];
$hargaProduk = trim($kab['harga']);
$sub = $qty*$hargaProduk;

if ($barcode == '') {
    $data['error']['barcode'] = 'Barcode tidak boleh kosong';
}
if (empty($data['error'])) {
	$data['hasil'] = 'sukses';

	$querySimpan = mysqli_query($con, "INSERT INTO tbl_detail_kasir (id_produk, harga, qty, total, id_session) VALUES ('$id_produk','$hargaProduk','$qty','$sub','$sid')");
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
?>