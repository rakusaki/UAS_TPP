<?php

include "../../../../lib/kon.php";

$kab_id = $_POST['kabupaten'];

$kueriKecamatan = mysqli_query($con, "SELECT * FROM districts WHERE regency_id = '".$kab_id."' ORDER BY name");

$html = "<option value=''>Pilih Kecamatan</option>";
while ($kec = mysqli_fetch_array($kueriKecamatan)) {
					
$html .= "<option value='".$kec['id']."'>".$kec['name']."</option>";
} 

$callback = array('data_kecamatan'=>$html);

echo json_encode($callback);
?>