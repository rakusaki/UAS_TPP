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
                            <h4>Tambah Etalase</h4>
                        </div>
                        <form class="form-inline" id="kas" method="post" action="">
                            <div id="pesan"></div>
                            <table>
                            <tr>
                            <td><span>
                            Barcode <input type="text" name="barcode" id="barcode">
                            <button type="submit" id="sub" class="btn"><i class="fa fa-plus"></i></button>
                            </span>
                            <!-- <button class="btn btn-md btn-primary" id="addBtn" type="button"> -->
                            </td>
                            </tr>
                            </table>
                        </form>
						<form class="form-horizontal" id="etalase" action="../admin/module/stok/aksi_simpan.php" method="post">
							<div class="box-body">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
									<div class="col-sm-10" id="que">
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