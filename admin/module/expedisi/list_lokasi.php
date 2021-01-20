<?php

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
else {
?>
<script>
   $(document).ready(function(){
        load_data();
        function load_data(page){
             $.ajax({
                  url:"../admin/module/biayakirim/data.php",
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
            <small>Destinasi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Lokasi</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Lokasi</h3>

                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search...">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>

                  </div>
                </div>
        <div class="box-body table-responsive no-padding">
  <div>
    <div class="table-responsive" id="data"></div>  
  </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php } ?>