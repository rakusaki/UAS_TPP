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
                            <h4>Data Kategori</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
								<tr>
									<th>Kategori</th>
									<th style="width: 110px">Aksi</th>
								</tr>
								<?php
								include "../lib/conf.php";
								include "../lib/kon.php";
								$kueriKategori = mysqli_query($con, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
								while ($kat = mysqli_fetch_array($kueriKategori)) {
								?>
								<tr>
									<td><?php echo $kat['nama_kategori']; ?></td>
									<td>
										<div class="btn-group">
											<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_kategori&id_kategori=<?php echo $kat['id_kategori']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
											<a href="<?php echo $admin_url; ?>module/kategori/aksi_hapus.php?id_kategori=<?php echo $kat['id_kategori']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</table>
						<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_kategori"><button class="btn btn-primary">Tambah Kategori</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>