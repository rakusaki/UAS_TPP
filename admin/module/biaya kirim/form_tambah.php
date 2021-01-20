<?php
include "../lib/kon.php";
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
            <small>Biaya Kirim</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Form Tambah Biaya Kirim</li>
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
        					<h3 class="box-title">Tambah Biaya Kirim</h3>
        				</div>
<form class="form-horizontal" id="biaya" action="../admin/module/biaya kirim/aksi_simpan.php" method="post">
	<div class="box-body">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>
			<div class="col-sm-10">
				<?php
				$kueriProvinsi = mysqli_query($con, "SELECT * FROM provinces ORDER BY name");
				?>
				<select class="form-control" name="provinsi" id="provinsi">
					<option value="">Pilih Provinsi</option>
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
				<select class="form-control" name="kabupaten" id="kabupaten">
					<option value="">Pilih Kabupaten</option>
					<option></option>
				</select>
				<span class="text-danger" id="error_kab"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>
			<div class="col-sm-10">
				<select class="form-control" name="kecamatan" id="kecamatan">
					<option value="">Pilih Kecamatan</option>
					<option></option>
				</select>
				<span class="text-danger" id="error_kec"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kelurahan</label>
			<div class="col-sm-10">
				<select class="form-control" name="kelurahan" id="kelurahan">
					<option value="">Pilih Kelurahan</option>
					<option></option>
				</select>
				<span class="text-danger" id="error_kel"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Expedisi</label>
			<div class="col-sm-10">
				<?php
				$kueriExpedisi = mysqli_query($con, "SELECT * FROM tbl_expedisi ORDER BY nama_expedisi");
				?>
				<select class="form-control" name="expedisi" id="expedisi">
					<option value="">Pilih Expedisi</option>
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
				<input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
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
