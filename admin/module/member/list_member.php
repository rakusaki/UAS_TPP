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
                  url:"../admin/module/member/data.php",
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
                            <h4>Data Member</h4>
                        </div>
                        <!-- <div class="box-footer">
                            <div class="row">
                                <form action="module/selesai/cetak.php" method="POST">
                                    <div class="col-sm-3">
                                        <lebel>Date Range :</lebel>
                                        <input type="text" class="" name="datetimes" />
                                    </div>
                                    <div class="col-sm-9">
                                        <lebel></lebel><br>
                                        <button type="submit" class="btn btn-info" name="submit">Cetak Laporan Selesai</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <div>
                            <div class="table-responsive" id="data"></div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>