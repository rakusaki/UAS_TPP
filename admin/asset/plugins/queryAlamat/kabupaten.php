<?php

include "../../../../lib/kon.php";

$prov_id = $_POST['provinsi'];

$kueriKabupaten = mysqli_query($con, "SELECT * FROM regencies WHERE province_id = '".$prov_id."' ORDER BY name");

$html = "<option value=''>Pilih Kabupaten</option>";
while ($kab = mysqli_fetch_array($kueriKabupaten)) {
					
$html .= "<option value='".$kab['id']."'>".$kab['name']."</option>";
} 

$callback = array('data_kabupaten'=>$html);

echo json_encode($callback);
?>