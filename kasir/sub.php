<?php
$tot = $_POST['tot'];
$bay = $_POST['bay'];

// if (empty($exp)) {
// $tot = $sub + $tax;	
// }
// else {
$to = $bay - $tot;
// }
$html = "<tr>
            <th style='padding-right: 35px;'><h3>Kembali</h3></th>
            <th style='padding-right: 15px;'><h3>Rp.</h3></th>
            <th style='text-align: right;'><input type='text' name='kembali' value='".$to."' hidden><h3>".number_format($to)."</h3></th>
        </tr>";
// $html .= "<input type='text' name='tot' value='".$tot."' hidden>";
// $html = "Total <span>Rp ".number_format($tot)."<span>";
// $html = "Total <span>".$sub."</span>";

$callback = array('data_tot'=>$html);

echo json_encode($callback);
?>