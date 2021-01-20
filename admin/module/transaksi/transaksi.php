<?php
include "../lib/conf.php";
include "../lib/kon.php";
$id_order = $_GET['id'];

$queryorder = mysqli_query($con, "SELECT * FROM tbl_member m, tbl_order_masuk o WHERE m.id_member = o.id_member AND id_order_masuk ='$id_order' ");
$order = mysqli_fetch_array($queryorder);
$id_member = $order['id_member'];



$query_produk = mysqli_query($con, "SELECT * FROM tbl_produk p, tbl_detail_order d, tbl_biaya_kirim b, tbl_order_masuk o WHERE p.id_produk = d.id_produk AND d.id_biaya = b.id_biaya AND d.id_order = o.id_order_masuk AND d.id_order = '$id_order'");
$dpt = mysqli_fetch_array($query_produk);

$query_total_produk = mysqli_query($con, "SELECT SUM(total) AS totpro FROM tbl_detail_order WHERE id_order = '$id_order'");
$tot = mysqli_fetch_array($query_total_produk);

$id_kurir = $dpt['expedisi'];
$sqlkurir = mysqli_query($con, "SELECT * FROM tbl_expedisi WHERE id_expedisi = $id_kurir");
$kur = mysqli_fetch_array($sqlkurir);

if ($dpt['status'] == "P") {
    $status = "Menunggu Konfirmasi";
}
elseif ($dpt['status'] == "T") {
    $status = "Prosess";
}
elseif ($dpt['status'] == "K") {
    $status = "Pengiriman";
}
elseif ($row['status'] == "D") {
    $status = "Pesanan Telah Sampai";
}
elseif ($dpt['status'] == "S") {
    $status = "Selesai";
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Manajement <small>Order</small></h1>
        <ol class="breadcrumb">
            <li><a href="adminweb.php?module=pesanan"><i class="fa fa-bar-chart"></i> Order</a></li>
            <li class="active">Detail Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-footer">
            <a class="btn btn-info" href="<?php $admin_url; ?>adminweb.php?module=pesanan">Kembali</a>
            <?php?>
        </div>
        <!-- COLOR PALETTE -->
        <div class="box box-default color-palette-box" id="cetak">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-shopping-cart"></i>
                            <h3 class="box-title">Rincian Order</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <dl>

                                <dt>No Pemesanan</dt>
                                <dd>#IDP0<?= $id_order; ?></dd>
                                <dd>Status Order :
                                    <span class=" text-bold 
                                    <?php if ($dpt['status'] == 'K') : echo 'text-success';
                                    else : echo 'text-danger';
                                    endif; ?>">(<?= $status; ?>)
                                    </span></dd>
                                <dd>Tanggal Pemesanan : <span class="text-primary"><?= date('d M Y, h:i A', strtotime($dpt['tgl_order'])); ?></span></dd>
                                <?php
                                if (!empty($dpt['tgl_kirim'])) { ?>
                                    <dd>Tanggal Pengiriman : <span class="text-primary"><?= date('d M Y, h:i A', strtotime($dpt['tgl_kirim'])); ?>, <?= date('', strtotime($dpt['tgl_kirim'])); ?></span></dd>
                                <?php
                                } else {
                                    echo ' <dd>Tanggal Pengiriman : - </dd> ';
                                }
                                ?>
                                <hr>

                                <dt>Alamat Pengiriman</dt>
                                <dd class=" text-capitalize">Nama : <?= $order['nama']; ?></dd>
                                <dd>No Telpon : <?= $order['no_hp']; ?></dd>
                                <dd>Alamat : <?= $order['alamat']; ?></dd>
                                <hr>

                                <dt>Status Pengiriman</dt>
                                <dd>Pengiriman - <?= $kur['nama_expedisi']; ?> : <span class=" text-primary">Rp. <?php echo number_format($dpt['biaya'], 0, '', '.'); ?></span></dd>
                                <hr>

                                <dt>Produk Pemesanan</dt>
                                <div class="row">
                                    <?php
                                    $query_produk = mysqli_query($con, "SELECT * FROM tbl_produk p, tbl_detail_order d, tbl_biaya_kirim b, tbl_order_masuk o WHERE p.id_produk = d.id_produk AND d.id_biaya = b.id_biaya AND d.id_order = o.id_order_masuk AND d.id_order = '$id_order'");
                                    while ($dp = mysqli_fetch_assoc($query_produk)) {

                                    ?>
                                        <div class="col-sm-8 col-md-6">
                                            <div class="info-box" style="border: 1px solid #d2d6de;">
                                                <span class="info-box-icon"> <img src="upload/<?php echo $dp['gambar']; ?>" style="width: 100%;" /></span>
                                                <div class="info-box-content">

                                                    <span class="info-box-text"><?= $dp['jumlah']; ?>x</span>
                                                    <span class="info-box-number"><?= $dp['nama_produk']; ?></span>
                                                    <span class="progress-description">
                                                        Harga Satuan : <span class=" text-primary">Rp. <?php echo number_format($dp['harga'], 0, '', '.'); ?></span><br>
                                                        Sub Total untuk Produk : <span class=" text-primary">Rp. <?php echo number_format($dp['total'], 0, '', '.'); ?></span><br>
                                                    </span>
                                                </div><!-- /.info-box-content -->
                                            </div><!-- /.info-box -->
                                        </div><!-- /.col -->
                                    <?php
                                    } ?>
                                </div><!-- /.row -->
                                <hr>
                                <dt>Detail Pembayaran</dt>
                                <dd>Total Produk : <span class=" text-primary">Rp.<?php echo number_format($tot['totpro'], 0, '', '.'); ?></span></dd>
                                <?php $tax = $tot['totpro'] * 0.05; ?>
                                <dd>PPn 5% : <span class=" text-primary">Rp.<?php echo number_format($tax, 0, '', '.'); ?></span></dd>
                                <dd>Total Pengiriman : <span class=" text-primary">Rp. <?php echo number_format($dpt['biaya'], 0, '', '.'); ?></span></dd>
                                <dd class=" text-bold">Total Pembayaran : <span class=" text-primary">Rp. <?php echo number_format($tot['totpro'] + $dpt['biaya'] + $tax, 0, '', '.'); ?></span> </dd>
                                <hr>


                            </dl>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- END TYPOGRAPHY -->
        </div>
        <div class="box-footer">

            <button class="btn btn-info" style="float:right;" onclick="printContent('cetak')">Print Order</button>

        </div>
    </section><!-- /.content -->
</div>