<?php

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=$base_url><b>LOGIN</b></a></center>";
}
else {
?>
<script>
   $(document).ready(function(){
        load_data();
        function load_data(page){
             $.ajax({
                  url:"../admin/module/proses/data.php",
                  method:"POST",
                  data:{page:page},
                  success:function(data){
                       $('#data').html(data);
                  }
             })
        }
        $(document).on('click', '.halaman', function(){
             var page = $(this).attr("id");
             load_data(page);
        });
   });
   </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Proses</small>
            <div id="pesan"></div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Proses</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <?php
                    $sqlw = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE status = 'P' ");
                    $set = mysqli_num_rows($sqlw);

                    ?>
                    <a href="adminweb.php?module=pesanan" class="text-black">
                    <div class="info-box">
                        <span class="info-box-icon bg-teal"><i class="fa fa-get-pocket"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Menunggu Konfirmasi</span>
                                <span class="info-box-number"><?= $set; ?></span>
                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </a>
                </div><!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>
                <?php
                $sqlw = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE status = 'T' ");
                $set = mysqli_num_rows($sqlw);

                ?>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="adminweb.php?module=proses" class="text-black">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Dalam Proses</span>
                                <span class="info-box-number"><?= $set; ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </a>
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <?php
                    $sqlw = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE status = 'K' ");
                    $set = mysqli_num_rows($sqlw);

                    ?>
                  <a href="adminweb.php?module=kirim" class="text-black">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sedang Dikirim</span>
                                <span class="info-box-number"><?= $set; ?></span>
                            </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                  </a>
                </div><!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <?php
                    $sqlw = mysqli_query($con, "SELECT * FROM tbl_order_masuk WHERE status = 'S' ");
                    $set = mysqli_num_rows($sqlw);

                    ?>
                    <a href="adminweb.php?module=selesai" class="text-black">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa fa-thumbs-o-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Transaksi Berhasil</span>
                                <span class="info-box-number"><?= $set; ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </a>
                </div><!-- /.col -->
            </div>
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Proses</h3>

                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search...">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <form action="module/proses/cetak.php" method="POST">
                            <div class="col-sm-3">
                                <lebel>Date Range :</lebel>
                                <input type="text" class="form-control" name="datetimes" />
                            </div>
                            <div class="col-sm-9">
                                <lebel></lebel><br>
                                <button type="submit" class="btn btn-info" name="submit">Cetak Laporan Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body">
  <div>
    <div class="table-responsive" id="data"></div>  
  </div>
          <!-- </div> -->
        
        </div>
      </div>
    </div>
  </section>
</div>
<?php } ?>