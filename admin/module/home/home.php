<?php

include "../lib/conf.php";
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <?php
    include "../lib/conf.php";
    include "../lib/kon.php";
    $kueriAdmin = mysqli_query($con, "SELECT * FROM tbl_admin");
    $adm = mysqli_fetch_array($kueriAdmin);
    $username = $adm['username'];
    $idAdmin = $adm['id_admin'];
    $password = $adm['password'];
    $nama = $adm['nama'];
    $email = $adm['email'];
    $gambar = $adm['gambar'];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="upload/<?php echo $gambar; ?>" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0"><?php echo $nama; ?></h3>
                                <p class="text-muted mb-0"><a href="mailto:<?php echo $email; ?>">Email Saya</a></p>
                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-5">
                            </div>
                            <h3 class="profile-username text-center"><span><b></b></span></h3>
                            <p class="text-muted text-center"></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>NIM</b> <a class="pull-right">18.12.0593</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Prodi</b> <a class="pull-right">Sistem Informasi</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="pull-right">18-S1SI-01</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 text-center">
                                <button class="btn btn-danger px-5">Follow Now</button>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="../admin/module/home/aksi_edit.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" value="<?php echo $nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img src="upload/<?php echo $gambar;?>" heigt="100" width="150">
                                        <br>
                                        <input type="file" id="gambar" name="gambar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-dark">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
<?php } ?>