<?php
include "../lib/kon.php";
header("Content-Type: application/json; charset=UTF-8");

$host     = "localhost";    // Server database
$username = "root";         // Username database
$password = "";             // Password database
$database = "ecommerce"; // Nama database

$conn = new mysqli($host, $username, $password, $database);

$buah = $_GET["query"];

$query  = $conn->query("SELECT * FROM tbl_produk WHERE barcode LIKE '%$buah%' ORDER BY barcode DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['nama_produk'],
        'buah'  => $data['barcode']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>