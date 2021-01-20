<?php
include "../../../lib/kon.php";
$date = $_POST['datetimes'];
$tahun_awal = substr($date, 6, -13);
$bulan_awal = substr($date, 0, -21);
$tgl_awal = substr($date, 3, -18);
$tahun_akhir = substr($date, 19);
$bulan_akhir = substr($date, 13, -8);
$tgl_akhir = substr($date, 16, -5);
$set_tgl_awal = $tahun_awal . '-' . $bulan_awal . '-' . $tgl_awal;
$set_tgl_akhir = $tahun_akhir . '-' . $bulan_akhir . '-' . $tgl_akhir;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Laporan Member</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
    <style>
        .container {
            margin: auto;

        }

        table {
            font-size: 8pt;
        }
    </style>
</head>

<body>

    <div class="container">
        <div>
            <a class="btn btn-primary" style="margin-top:20px;" href="../../adminweb.php?module=karyawan">Kembali</a>
            <button class="btn btn-success" style="margin-top:20px; float:right" onclick="printContent('cetak')">Cetak</button>
        </div>

        <div id="cetak">
            <h2>Laporan Detail Member</h2>
            <p>Tanggal : <?= date('d M Y', strtotime($set_tgl_awal)); ?> s/d <?= date('d M Y', strtotime($set_tgl_akhir)); ?></p>
            <table class="table table-bordered" cellpadding="10" border="1">
                <thead>
                    <tr>
                        <th style="width: 10px;">No. </th>
                        <!-- <th style="width: 100px;">Tanggal Daftar</th> -->
                        <th style="width: 10px;">ID Member</th>
                        <th style="width: 150px;">Username</th>
                        <th style="width: 150px;">Nama Lengkap</th>
                        <th style="width: 100px;">Email</th>
                        <th>No Telp</th>
                        <th style="width: 150px;">Alamat</th>
                        <th>Status</th>
                        <th style="width: 10px;">Jml Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $querys = mysqli_query($con, "SELECT * FROM tbl_member");
                    $cek = mysqli_num_rows($querys);
                    if (empty($cek)) {
                        echo ' <tr><th colspan="14" height="100px"><center>tidak member terdaftar pada masa ini</center></th></tr> ';
                    }
                    $i = 1;
                    while ($c = mysqli_fetch_array($querys)) {

                    ?>
                        <tr>
                            <td><?= $i; $i++; ?></td>
                            <td>#ID0<?= $c['id_member']; ?></td>
                            <td><?= $c['username']; ?></td>
                            <td><?= $c['nama']; ?></td>
                            <td><?= $c['email']; ?></td>
                            <td><?= $c['no_hp']; ?></td>
                            <td><?= $c['alamat']; ?></td>
                            <td><?= $c['status']; ?></td>
                            <td>
                                <?php
                                $id_member = $c['id_member'];
                                $sql = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE id_member = '$id_member' AND status ='S' ");
                                $x = mysqli_num_rows($sql);
                                echo $x;
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>