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
            <small>Produk</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Form Tambah Produk</li>
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
        					<h3 class="box-title">Tambah Produk</h3>
        				</div>
<form class="form-horizontal" id="produk" action="../admin/module/produk/aksi_simpan.php" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
			<div class="col-sm-10">
				<select class="form-control" id="kategori" name="idKategori">
					<option value="">Pilih Kategori</option>
					<?php
					include "../lib/kon.php";
					$kueriKategori = mysqli_query($con, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
					while ($kat = mysqli_fetch_array($kueriKategori)) {
					?>
					<option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['nama_kategori']; ?></option>
					<?php } ?>
				</select>
				<span class="text-danger" id="error_kategori"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Merek</label>
			<div class="col-sm-10">
				<select class="form-control" id="merek" name="idMerek">
					<option value="">Pilih Merek</option>
					<?php
					include "../lib/kon.php";
					$kueriMerek = mysqli_query($con, "SELECT * FROM tbl_merek ORDER BY nama_merek");
					while ($mer = mysqli_fetch_array($kueriMerek)) {
					?>
					<option value="<?php echo $mer['id_merek']; ?>"><?php echo $mer['nama_merek']; ?></option>
					<?php } ?>
				</select>
				<span class="text-danger" id="error_merek"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nama" name="namaProduk" placeholder="Nama Produk">
				<span class="text-danger" id="error_nama"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
			<div class="col-sm-10">
				<input type="file" id="gbr" name="gambar" value="">
				<span class="text-danger" id="error_gbr"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="deskripsi" name="deskripsiProduk" placeholder="Deskripsi Produk">
				<span class="text-danger" id="error_deskripsi"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="harga" name="hargaProduk" placeholder="Harga Produk">
				<span class="text-danger" id="error_harga"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slide</label>
			<div class="col-sm-10">
				<div class="radio">
					<label>
						<input type="radio" name="slide" id="slide" value="Y">Ya
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="slide" id="slide" value="N" checked="">Tidak
					</label>
				</div>
				<span class="text-danger" id="error_slide"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Produk Rekomendasi</label>
			<div class="col-sm-10">
				<div class="radio">
					<label>
						<input type="radio" name="rekomendasi" id="rekomendasi" value="Y">Ya
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="rekomendasi" id="rekomendasi" value="N" checked="">Tidak
					</label>
				</div>
				<span class="text-danger" id="error_rekomendasi"></span>
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