<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$id_order = $_GET['id'];

// if (empty($data['error'])) {
    // jika validasi berhasil

	$queryEdit = mysqli_query($con, "UPDATE tbl_order_masuk SET 
							status = 'T'
							WHERE id_order_masuk = '$id_order'");
	if ($queryEdit) {

    // $html = "<script> alert('Data Berhasil Dikonfirmasi'); window.location = 'adminweb.php?module=proses';";
		echo "<script>window.location = '$admin_url'+'adminweb.php?module=proses';</script>";
	}
	// else {
	// 	echo "<script> alert('Data Biaya Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_biaya&id_biaya='+'$idBiaya';</script>";
	// }
// }
// else {
    // jika validasi gagal
    // $data['hasil'] = 'gagal';
// }
// tampilkan response dalam format json
	// $callback = array('data_pes'=>$html);
	
// echo json_encode($callback);
}
?>