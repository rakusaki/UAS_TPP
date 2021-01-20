<?php

session_start();
$sid = session_id();

session_regenerate_id();

include "../lib/kon.php";
// $date = $_POST['datetimes'];
// $tahun_awal = substr($date, 6, -13);
// $bulan_awal = substr($date, 0, -21);
// $tgl_awal = substr($date, 3, -18);
// $tahun_akhir = substr($date, 19);
// $bulan_akhir = substr($date, 13, -8);
// $tgl_akhir = substr($date, 16, -5);
// $set_tgl_awal = $tahun_awal . '-' . $bulan_awal . '-' . $tgl_awal;
// $set_tgl_akhir = $tahun_akhir . '-' . $bulan_akhir . '-' . $tgl_akhir;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Nota Penjualan</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
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
            <a class="btn btn-primary" style="margin-top:20px;" href="kasir.php">Kembali</a>
            <button class="btn btn-success" style="margin-top:20px; float:right" onclick="printContent('cetak')">Cetak</button>
        </div>

        <div id="cetak">
            <h2 style="text-align: center">
                Selanat Datang di Toko Komputer
                <br>
                Build Your Own PC (BYOP)
                <br>
                <br>
            </h2>
            <!-- <p>Tanggal : <?= date('d M Y', strtotime($set_tgl_awal)); ?> s/d <?= date('d M Y', strtotime($set_tgl_akhir)); ?></p> -->
            <?php

            $querys = mysqli_query($con, "SELECT * FROM tbl_kasir WHERE session='".$sid."'");
            $cek = mysqli_fetch_array($querys);
            if (empty($cek)) {
                echo ' <tr><th colspan="14" height="100px"><center>tidak ada penjualan</center></th></tr> ';
                $hid = 'hidden';
            }
            $i = 1;
            $t = 0;
            ?>
            <table>
                <tr>
                    <td>No Nota</td>
                    <td>:</td>
                    <td>#IDP0<?php echo $cek['id']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo $cek['tgl']; ?></td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td>:</td>
                    <td><?php echo $cek['id_kasir']; ?></td>
                </tr>
            </table>
            <table class="table table-responsive" style="width: 50%;">
                <thead>
                    <tr>
                        <th style="width: 50px;">No. </th>
                        <!-- <th style="width: 100px;">Tanggal Pemesanan</th> -->
                        <!-- <th>Nomor Nota</th> -->
                        <!-- <th>Status Order</th> -->
                        <!-- <th>Kota Tujuan</th> -->
                        <!-- <th>Kurir</th> -->
                        <!-- <th style="width: 100px;">Ongkir</th> -->
                        <!-- <th>Pembeli</th> -->
                        <th>Nama Produk</th>
                        <!-- <th style="width: 10px;">Berat(Kg)</th> -->
                        <th style="width: 50px;">Qty</th>
                        <th style="width: 120px; text-align: center;">Harga</th>
                        <th style="width: 120px; text-align: center;">subTotal</th>
                        <!-- <th style="width: 100px;">Total Bayar</th> -->
                    </tr>
                </thead>
                <?php
                $query = mysqli_query($con, "SELECT *, k.id as id_nota, d.id as id FROM tbl_detail_kasir d, tbl_kasir k WHERE d.id_session=k.session AND k.session='".$sid."' ORDER BY k.tgl DESC");
                while ($k = mysqli_fetch_array($query)) {
                    $id_order = $k['id_nota'];
                ?>
                <tbody>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <!-- <td dir='rtl'><?= date('d M Y', strtotime($k['tgl'])); ?></td> -->
                            <!-- <td>#IDP0<?= $k['id_nota']; ?></td> -->
                            <!-- <?php
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
                            <td><?= $status ?></td> -->
                            <!-- <?php
                            $id_kurir = $k['expedisi'];
                            $sqlkurir = mysqli_query($con, "SELECT * FROM tbl_expedisi k,tbl_biaya_kirim b, provinces p WHERE k.id_expedisi = b.expedisi AND p.id=b.provinsi AND k.id_expedisi = ' $id_kurir'");
                            $kur = mysqli_fetch_array($sqlkurir);
                            $prov = $kur['name'];
                            ?>
                            <td><?= $prov; ?></td>
                            <td><?= $kur['nama_expedisi']; ?></td> -->
                            <!-- <td dir='rtl'>Rp. <?php echo number_format($k['harga'], 0, '', '.'); ?></td> -->
                            <!-- <td><?= $m['nama']; ?></td> -->
                            <td>
                                <?php
                                $id_detail = $k['id'];
                                $sqlproduk = mysqli_query($con, "SELECT * FROM tbl_detail_kasir d, tbl_produk p WHERE d.id_produk = p.id_produk  AND id = '$id_detail'");
                                while ($p = mysqli_fetch_array($sqlproduk)) {
                                    echo "<span>" . $p['nama_produk'] . "</span><br>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $qty = mysqli_query($con, "SELECT * FROM tbl_detail_kasir WHERE id = '$id_detail'");
                                while ($X = mysqli_fetch_array($qty)) {
                                    echo "<span>" . $X['qty'] . "</span><br>";
                                }
                                ?>
                            </td>

                            <td dir='rtl'>
                                <?php
                                $sqlproduk = mysqli_query($con, "SELECT * FROM tbl_detail_kasir where id = '$id_detail'");
                                while ($p = mysqli_fetch_array($sqlproduk)) {
                                    echo "<span> Rp. " .  number_format($p['harga'], 0, '', '.') . "</span><br>";
                                }
                                ?>
                            </td>
                            <td dir='rtl'>
                                <?php
                                $qty = mysqli_query($con, "SELECT * FROM tbl_detail_kasir WHERE id = '$id_detail'");
                                while ($X = mysqli_fetch_array($qty)) {
                                    echo "<span> Rp. " .  number_format($X['total'], 0, '', '.') . "</span><br>";
                                }
                                ?>
                            </td>
                            <!-- <td dir='rtl'>
                                Rp. <?php echo number_format($k['total'], 0, '', '.'); ?>
                            </td> -->
                        </tr>

                    <?php

                        $jmlh_total[$t] =  $k['total'];
                        $t++;
                    }
                    ?>
                    <?php
                    if (!empty($hid)) {
                    } else {
                    ?>
                        <tr>
                            <th colspan="4"><b>Total : </b></th>

                            <!-- <?php
                                    $sql = mysqli_query($koneksi, "SELECT sum(total) AS total_bayar FROM tbl_detail_kasir");
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
    <h4 style="text-align: center">
        Terimakasih Telah Berbelanja di Toko Komputer
        <br>
        Build Your Own PC (BYOP)
        <br>
        <br>
    </h4>

</body>

</html>