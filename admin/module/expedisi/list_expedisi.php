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
            <small>Expedisi</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Expedisi</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<!-- Info boxes -->
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box">
        				<div class="box-header">
        					<h3 class="box-title">Data Expedisi</h3>

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
		<th>Nama Expedisi</th>
		<th style="width: 110px">Aksi</th>
	</tr>
	<?php
	include "../lib/conf.php";
	include "../lib/kon.php";
	$kueriExpedisi = mysqli_query($con, "SELECT * FROM tbl_expedisi ORDER BY nama_expedisi");
	while ($exp = mysqli_fetch_array($kueriExpedisi)) {
	?>
	<tr>
		<td><?php echo $exp['nama_expedisi']; ?></td>
		<td>
			<div class="btn-group">
				<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_expedisi&id_expedisi=<?php echo $exp['id_expedisi']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
				<a href="<?php echo $admin_url; ?>module/expedisi/aksi_hapus.php?id_kategori=<?php echo $kat['id_kategori']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
			</div>
		</td>
	</tr>
	<?php } ?>
</table>
					</div>

					<div class="box-footer">
						<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_expedisi"><button class="btn btn-primary">Tambah Expedisi</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php } ?>