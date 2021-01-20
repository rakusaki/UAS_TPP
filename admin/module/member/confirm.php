<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {

	include "../../../lib/conf.php";
	include "../../../lib/kon.php";

	$id_member = $_GET['id'];
	$kmem = mysqli_query($con, "SELECT * FROM tbl_member WHERE id_member=$id_member");
	$mem = mysqli_fetch_array($kmem);
	$status = $mem['status'];

// if (empty($data['error'])) {
    // jika validasi berhasil
	if ($status == "Y") {
		$queryEdit = mysqli_query($con, "UPDATE tbl_member SET 
								status = 'N'
								WHERE id_member = '$id_member'");
	}
	else {
		$queryEdit = mysqli_query($con, "UPDATE tbl_member SET 
								status = 'Y'
								WHERE id_member = '$id_member'");
	}
		if ($queryEdit) {

	    // $html = "<script> alert('Data Berhasil Dikonfirmasi'); window.location = 'adminweb.php?module=proses';";
			echo "<script>window.location = '$admin_url'+'adminweb.php?module=karyawan';</script>";
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