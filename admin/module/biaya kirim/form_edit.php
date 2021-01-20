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
            <small>Biaya</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Edit Biaya</li>
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
        					<h3 class="box-title">Form Edit Biaya</h3>
        				</div>
<?php
include "../lib/conf.php";
include "../lib/kon.php";

$idBiaya = $_GET['id_biaya'];
$queryEdit = mysqli_query($con, "SELECT *, p.name as prov, r.name as kab, d.name as kec, v.name as kel, e.nama_expedisi as exp, b.biaya as bia, b.id_biaya as id FROM provinces p, regencies r, districts d, villages v, tbl_expedisi e, tbl_biaya_kirim b WHERE b.provinsi=p.id AND b.kabupaten=r.id AND b.kecamatan=d.id AND b.kelurahan=v.id AND b.expedisi=e.id_expedisi AND id_biaya='$idBiaya'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idBiaya = $hasilQuery['id_biaya'];
$provinsi = $hasilQuery['prov'];
$kabupaten = $hasilQuery['kab'];
$kecamatan = $hasilQuery['kec'];
$kelurahan = $hasilQuery['kel'];
$expedisi = $hasilQuery['exp'];
$biaya = $hasilQuery['bia'];
?>
<form class="form-horizontal" id="edit_biaya" action="../admin/module/biaya kirim/aksi_edit.php" method="post">
	<input type="hidden" name="id_biaya" value="<?php echo $idBiaya; ?>">
	<div class="box-body">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>
			<div class="col-sm-10">
				<?php
				$kueriProvinsi = mysqli_query($con, "SELECT * FROM provinces ORDER BY name");
				?>
				<select class="form-control" name="provinsi" id="prov">
					<option value="<?php echo $hasilQuery['provinsi']; ?>"><?php echo $provinsi; ?></option>
					<?php
					while ($prov = mysqli_fetch_array($kueriProvinsi)) {
					?>
					<option value="<?php echo $prov['id']; ?>"><?php echo $prov['name']; ?>
					</option>
					<?php } ?>
				</select>
				<span class="text-danger" id="error_prov"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kabupaten</label>
			<div class="col-sm-10">
				<select class="form-control" name="kabupaten" id="kab">
					<option value="<?php echo $hasilQuery['kabupaten']; ?>"><?php echo $kabupaten; ?></option>
					<option></option>
				</select>
				<span class="text-danger" id="error_kab"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>
			<div class="col-sm-10">
				<select class="form-control" name="kecamatan" id="kec">
					<option value="<?php echo $hasilQuery['kecamatan']; ?>"><?php echo $kecamatan; ?></option>
					<option></option>
				</select>
				<span class="text-danger" id="error_kec"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kelurahan</label>
			<div class="col-sm-10">
				<select class="form-control" name="kelurahan" id="kel">
					<option value="<?php echo $hasilQuery['kelurahan']; ?>"><?php echo $kelurahan; ?></option>
					<option></option>
					<span class="text-danger" id="error_kel"></span>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Expedisi</label>
			<div class="col-sm-10">
				<?php
				$kueriExpedisi = mysqli_query($con, "SELECT * FROM tbl_expedisi ORDER BY nama_expedisi");
				?>
				<select class="form-control" name="expedisi" id="exp">
					<option value="<?php echo $hasilQuery['expedisi']; ?>"><?php echo $expedisi; ?></option>
					<?php
					while ($exp = mysqli_fetch_array($kueriExpedisi)) {
					?>
					<option value="<?php echo $exp['id_expedisi']; ?>"><?php echo $exp['nama_expedisi']; ?>
					</option>
					<?php } ?>
				</select>
				<span class="text-danger" id="error_exp"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo $hasilQuery['biaya']; ?>" placeholder="Biaya">
				<span class="text-danger" id="error_biaya"></span>
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