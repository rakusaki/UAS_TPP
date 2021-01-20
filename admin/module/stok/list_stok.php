<?php

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Data Stok</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
								<tr>
									<th>Barcode</th>
									<th>Nama Produk</th>
									<th colspan="2" style="text-align: center;">Jumlah</th>
									<th></th>
									<th style="width: 110px">Aksi</th>
								</tr>
								<tr>
									<th></th>
									<th></th>
									<th style="text-align: center;">Gudang</th>
									<th style="text-align: center;">Etalase</th>
									<th></th>
								</tr>
								<?php
								include "../lib/conf.php";
								include "../lib/kon.php";
								$kueri = mysqli_query($con, "SELECT *, s.id as ids FROM tbl_stok s,tbl_produk p WHERE s.id_produk=p.id_produk ORDER BY ids");
								while ($mer = mysqli_fetch_array($kueri)) {
								?>
								<tr>
									<td><?php echo $mer['barcode']; ?></td>
									<td><?php echo $mer['nama_produk']; ?></td>
									<td><?php echo $mer['jumlah']; ?></td>
									<td>
										<div class="btn-group">
											<!-- <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_merek&id_merek=<?php echo $mer['id_merek']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a> -->
											<a href="<?php echo $admin_url; ?>module/stok/aksi_hapus.php?id=<?php echo $mer['ids']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</table>
						<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_etalase"><button class="btn btn-primary">Pindah Etalase</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>