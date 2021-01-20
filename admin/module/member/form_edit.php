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
                            <h4>Edit Karyawan</h4>
                        </div>
						<?php
						include "../lib/conf.php";
						include "../lib/kon.php";

						$idMember = $_GET['id'];
						$queryEdit = mysqli_query($con, "SELECT * FROM tbl_member");

						$hQ = mysqli_fetch_array($queryEdit);
						$idMember = $hQ['id_member'];
						$namaMember = $hQ['nama'];
						?>
						<form class="form-horizontal" id="edit_member" action="../admin/module/member/aksi_edit.php" method="post">
							<input type="hidden" name="id_member" value="<?php echo $idMember; ?>">
							<div class="box-body">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Nama Member</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Member" value="<?php echo $namaMember; ?>">
										<span class="text-danger" id="error_nama"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="Nama Member" value="<?php echo $hQ['username']; ?>">
										<span class="text-danger" id="error_user"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="pass" name="pass" placeholder="Nama Member" value="<?php echo $hQ['password']; ?>" readonly>
										<span class="text-danger" id="error_pass"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="email" name="email" placeholder="Nama Member" value="<?php echo $hQ['email']; ?>">
										<span class="text-danger" id="error_email"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nama Member" value="<?php echo $hQ['no_hp']; ?>">
										<span class="text-danger" id="error_telp"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Nama Member" value="<?php echo $hQ['alamat']; ?>">
										<span class="text-danger" id="error_alamat"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-10">
										<div class="radio">
											<label>
												<input type="radio" name="slide" id="slide" value="Y" <?php if ($hQ['status'] == "Y") { echo 'checked'; } ?>>Aktif
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="slide" id="slide" value="N" <?php if ($hQ['status'] == "N") { echo 'checked'; } ?>>Non-Aktif
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary pull-right">Ubah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>