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
        	<li class="active">Edit Expedisi</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<!-- Info boxes -->
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box">
        				<div class="box-header">
        					<div id="pesan"></div>
        					<h3 class="box-title">Form Edit Expedisi</h3>
        				</div>
<?php
include "../lib/conf.php";
include "../lib/kon.php";

$idExpedisi = $_GET['id_expedisi'];
$queryEdit = mysqli_query($con, "SELECT * FROM tbl_expedisi WHERE id_expedisi='$idExpedisi'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idExpedisi = $hasilQuery['id_expedisi'];
$namaExpedisi = $hasilQuery['nama_expedisi'];
?>
<form class="form-horizontal" id="edit_expedisi" action="../admin/module/expedisi/aksi_edit.php" method="post">
	<input type="hidden" name="id_expedisi" value="<?php echo $idExpedisi; ?>">
	<div class="box-body">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nama Expedisi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nama" name="namaExpedisi" placeholder="Nama Expedisi" value="<?php echo $namaExpedisi; ?>">
				<span class="text-danger" id="error_nama"></span>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary pull-right">Simpan</button>
	</div>
</form>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php } ?>