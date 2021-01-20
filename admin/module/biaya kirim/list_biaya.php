<?php

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>
        		Manajemen
            <small>Ongkos Kirim</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Ongkos Kirim</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<!-- Info boxes -->
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box">
        				<div class="box-header">
        					<h3 class="box-title">Data Ongkos Kirim</h3>

        					<div class="box-tools">
        						<div class="input-group" style="width: 150px;">
        							<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search...">
        							<div class="input-group-btn">
        								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
        							</div>
        						</div>

        					</div>
        				</div>
        <div class="box-body table-responsive no-padding">

<table class="table table-hover">
	<tr>
		<th>Destinasi</th>
		<th>Expedisi</th>
		<th>Ongkos Kirim</th>
		<th style="width: 110px">Aksi</th>
	</tr>
	<?php
	include "../lib/conf.php";
	include "../lib/kon.php";
	$kueriOngkir = mysqli_query($con, "SELECT p.name as prov, e.nama_expedisi as expedisi, b.biaya as biaya, b.id_biaya as id FROM provinces p, tbl_expedisi e, tbl_biaya_kirim b WHERE b.provinsi=p.id AND b.expedisi=e.id_expedisi ORDER BY prov");
	while ($ong = mysqli_fetch_array($kueriOngkir)) {
	?>	
	<tr>
		<td><?php echo $ong['prov']; ?></td>
		<td><?php echo $ong['expedisi']; ?></td>
		<td><?php echo $ong['biaya']; ?></td>
		<td>
			<div class="btn-group">
				<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_biaya&id_biaya=<?php echo $ong['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
				<a href="<?php echo $admin_url; ?>module/biaya kirim/aksi_hapus.php?id_biaya=<?php echo $ong['id']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
			</div>
		</td>
	</tr>
	<?php } ?>
</table>
					</div>

					<div class="box-footer">
						<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_biaya"><button class="btn btn-primary">Tambah Ongos Kirim</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php } ?>