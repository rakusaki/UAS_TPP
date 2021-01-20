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
        	<li class="active">Edit Produk</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<!-- Info boxes -->
        	<div class="row">
        		<div class="col-xs-12">
        			<div class="box">
        				<div class="box-header">
        					<h3 class="box-title">Form Edit Produk</h3>
        				</div>
<?php
include "../lib/conf.php";
include "../lib/kon.php";

$idProduk = $_GET['id_produk'];
$queryEdit = mysqli_query($con, "SELECT * FROM tbl_produk WHERE id_produk='$idProduk'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idProduk = $hasilQuery['id_produk'];
$idKategori = $hasilQuery['id_kategori_produk'];
$idMerek = $hasilQuery['id_merek'];
$namaProduk = $hasilQuery['nama_produk'];
$gambar = $hasilQuery['gambar'];
$deskripsi = $hasilQuery['deskripsi'];
$hargaProduk = $hasilQuery['harga'];
$slide = $hasilQuery['slide'];
$rekomendasi = $hasilQuery['rekomendasi'];
?>
<form class="form-horizontal" action="../admin/module/produk/aksi_edit.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_produk" value="<?php echo $idProduk; ?>">
	<div class="box-body">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
			<div class="col-sm-10">
				<select class="form-control" name="idKategori">
					<?php
					$kueriKategori = mysqli_query($con, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
					while ($kat = mysqli_fetch_array($kueriKategori)) {
					?>
					<option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['nama_kategori']; ?>
					</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Merek</label>
			<div class="col-sm-10">
				<select class="form-control" name="idMerek">
					<?php
					$kueriMerek = mysqli_query($con, "SELECT * FROM tbl_merek ORDER BY nama_merek");
					while ($mer = mysqli_fetch_array($kueriMerek)) {
					?>
					<option value="<?php echo $mer['id_merek']; ?>"><?php echo $mer['nama_merek']; ?>
					</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk" value="<?php echo $namaProduk; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
			<div class="col-sm-10">
				<img src="upload/<?php echo $gambar;?>" heigt="100" width="150">
				<input type="file" id="gambar" name="gambar" value="<?php echo $gambar; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk" value="<?php echo $deskripsi ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="Harga Produk" value="<?php echo $hargaProduk ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slide</label>
			<div class="col-sm-10">
				<div class="radio">
					<label>
						<input type="radio" name="slide" id="slide" value="Y" checked="">Ya
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="slide" id="slide" value="N">Tidak
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Produk Rekomendasi</label>
			<div class="col-sm-10">
				<div class="radio">
					<label>
						<input type="radio" name="rekomendasi" id="rekomendasi" value="Y" checked="">Ya
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="rekomendasi" id="rekomendasi" value="N">Tidak
					</label>
				</div>
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