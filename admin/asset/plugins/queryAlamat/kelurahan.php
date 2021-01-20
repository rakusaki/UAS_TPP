<?php

include "../../../../lib/kon.php";

$kec_id = $_POST['kecamatan'];

$kueriKelurahan = mysqli_query($con, "SELECT * FROM villages WHERE district_id = '".$kec_id."' ORDER BY name");

$html = "<option value=''>Pilih Kelurahan</option>";
while ($kel = mysqli_fetch_array($kueriKelurahan)) {
					
$html .= "<option value='".$kel['id']."'>".$kel['name']."</option>";
} 

$callback = array('data_kelurahan'=>$html);

echo json_encode($callback);
?>