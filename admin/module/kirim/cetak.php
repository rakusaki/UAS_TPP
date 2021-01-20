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
    <title>Cetak Laporan Penjualan</title>

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
            <a class="btn btn-primary" style="margin-top:20px;" href="../../adminweb.php?module=kirim">Kembali</a>
            <button class="btn btn-success" style="margin-top:20px; float:right" onclick="printContent('cetak')">Cetak</button>
        </div>

        <div id="cetak">
            <h2>Laporan Detail Penjualan</h2>
            <p>Tanggal : <?= date('d M Y', strtotime($set_tgl_awal)); ?> s/d <?= date('d M Y', strtotime($set_tgl_akhir)); ?></p>
            <table class="table table-bordered" cellpadding="7" border="1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th style="width: 100px;">Tanggal Pemesanan</th>
                        <th>Nomor Nota</th>
                        <th>Status Order</th>
                        <th>Kota Tujuan</th>
                        <th>Kurir</th>
                        <th style="width: 100px;">Ongkir</th>
                        <th>Pembeli</th>
                        <th style="width: 150px;">Produk</th>
                        <!-- <th style="width: 10px;">Berat(Kg)</th> -->
                        <th>Qty</th>
                        <th style="width: 100px;">Satuan</th>
                        <th style="width: 100px;">subTotal</th>
                        <th style="width: 100px;">Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $querys = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE status = 'K' AND (tgl_order BETWEEN '$set_tgl_awal' AND '$set_tgl_akhir') ");
                    $cek = mysqli_num_rows($querys);
                    if (empty($cek)) {
                        echo ' <tr><th colspan="14" height="100px"><center>tidak ada penjualan</center></th></tr> ';
                        $hid = 'hidden';
                    }
                    $i = 1;
                    $t = 0;
                    while ($c = mysqli_fetch_array($querys)) {
                        $id_member = $c['id_member'];
                        $sqlmem = mysqli_query($con, "SELECT * FROM tbl_member WHERE id_member = '$id_member' ");
                        $m = mysqli_fetch_array($sqlmem);

                        $id_order = $c['id_order_masuk'];

                        $sql = mysqli_query($con, "SELECT * FROM tbl_detail_order d, tbl_biaya_kirim e WHERE d.id_biaya = e.id_biaya AND d.id_order = '$id_order' ");
                        $k = mysqli_fetch_array($sql);

                    ?>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <td dir='rtl'><?= date('d M Y', strtotime($c['tgl_order'])); ?></td>
                            <td>#IDP0<?= $c['id_order_masuk']; ?></td>
                            <?php
                            if ($c['status'] == "P") {
                                $status = "Menunggu Konfirmasi";
                            }
                            elseif ($c['status'] == "T") {
                                $status = "Prosess";
                            }
                            elseif ($c['status'] == "K") {
                                $status = "Pengiriman";
                            }
                            elseif ($c['status'] == "S") {
                                $status = "Selesai";
                            }
                            ?>
                            <td><?= $status ?></td>
                            <?php
                            $id_kurir = $k['expedisi'];
                            $sqlkurir = mysqli_query($con, "SELECT * FROM tbl_expedisi k,tbl_biaya_kirim b, provinces p WHERE k.id_expedisi = b.expedisi AND p.id=b.provinsi AND k.id_expedisi = ' $id_kurir'");
                            $kur = mysqli_fetch_array($sqlkurir);
                            $prov = $kur['name'];
                            ?>
                            <td><?= $prov; ?></td>
                            <td><?= $kur['nama_expedisi']; ?></td>
                            <td dir='rtl'>Rp. <?php echo number_format($k['biaya'], 0, '', '.'); ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td>
                                <?php
                                $id_order = $c['id_order_masuk'];
                                $sqlproduk = mysqli_query($con, "SELECT * FROM tbl_detail_order d, tbl_produk p WHERE d.id_produk = p.id_produk  AND id_order = '$id_order'");
                                while ($p = mysqli_fetch_array($sqlproduk)) {
                                    echo "<span>" . $p['nama_produk'] . "</span><br>";
                                }
                                ?>
                            </td>
                            <td dir='rtl'>
                                <?php
                                $qty = mysqli_query($con, "SELECT * FROM tbl_detail_order WHERE id_order = '$id_order'");
                                while ($X = mysqli_fetch_array($qty)) {
                                    echo "<span>" . $X['jumlah'] . "</span><br>";
                                }
                                ?>
                            </td>

                            <td dir='rtl'>
                                <?php
                                $sqlproduk = mysqli_query($con, "SELECT * FROM tbl_detail_order where id_order = '$id_order'");
                                while ($p = mysqli_fetch_array($sqlproduk)) {
                                    echo "<span> Rp. " .  number_format($p['harga'], 0, '', '.') . "</span><br>";
                                }
                                ?>
                            </td>
                            <td dir='rtl'>
                                <?php
                                $qty = mysqli_query($con, "SELECT * FROM tbl_detail_order WHERE id_order = '$id_order'");
                                while ($X = mysqli_fetch_array($qty)) {
                                    echo "<span> Rp. " .  number_format($X['total'], 0, '', '.') . "</span><br>";
                                }
                                ?>
                            </td>
                            <td dir='rtl'>
                                Rp. <?php echo number_format($c['total'], 0, '', '.'); ?>
                            </td>
                        </tr>

                    <?php

                        $jmlh_total[$t] =  $c['total'];
                        $t++;
                    }
                    ?>
                    <?php
                    if (!empty($hid)) {
                    } else {
                    ?>
                        <tr>
                            <th colspan="12"><b>Total : </b></th>

                            <!-- <?php
                                    $sql = mysqli_query($koneksi, "SELECT sum(total) AS total_bayar FROM tbl_order_masuk");
                                    $tot = mysqli_fetch_array($sql);
                                    ?>
                            <td>Rp. <?php echo number_format($tot['total_bayar'], 0, '', '.'); ?></td> -->
                            <td dir='rtl'><b>Rp. <?php echo number_format(array_sum($jmlh_total), 0, '', '.'); ?></b></td>
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