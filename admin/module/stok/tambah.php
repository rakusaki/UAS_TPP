<?php

include "../../../lib/kon.php";

$barcode = $_POST['barcode'];

$kueriBarcode = mysqli_query($con, "SELECT * FROM tbl_produk WHERE barcode = '".$barcode."'");
$kab = mysqli_fetch_array($kueriBarcode); 
	
$id_produk = $kab['id_produk'];

$kueriKabupaten = mysqli_query($con, "SELECT * FROM tbl_etalase WHERE id_produk = '".$id_produk."'");
while ($ka = mysqli_fetch_array($kueriKabupaten)) {
					
$html = "<input type='text' name='id' value='".$ka['id_produk']."' hidden>".$ka['nama_produk'].";";
$html .="<input type='text' name='qty' value=''>;";


$callback = array('data_que'=>$html);

echo json_encode($callback);
} 
?>