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
                        	<div id="pesan"></div>
                            <h4>Edit Merek</h4>
                        </div>
						<?php
						include "../lib/conf.php";
						include "../lib/kon.php";

						$idMerek = $_GET['id_merek'];
						$queryEdit = mysqli_query($con, "SELECT * FROM tbl_merek WHERE id_merek='$idMerek'");

						$hasilQuery = mysqli_fetch_array($queryEdit);
						$idMerek = $hasilQuery['id_merek'];
						$namaMerek = $hasilQuery['nama_merek'];
						?>
						<form class="form-horizontal" id="edit_merek" action="../admin/module/merek/aksi_edit.php" method="post">
							<input type="hidden" name="id_merek" value="<?php echo $idMerek; ?>">
							<div class="box-body">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Nama Merek</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nama" name="namaMerek" placeholder="Nama Merek" value="<?php echo $namaMerek; ?>">
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
		</div>
	</div>
</div>
<?php } ?>