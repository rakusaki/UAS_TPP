<?php
session_start();

include "../lib/kon.php";
include "../lib/conf.php";

$sid = session_id();
?>
<script>
    $(document).ready(function() {

        $("#sub").on("click", function() {
            $("#data").load("data.php");
        });
    });
    // setTimeout(function(){
    // $("#example2").load( "data.php" );
    // }, 500);
</script>
<script>
  $(document).ready(function() {

        $("#act").on("click", function() {
            $("#data").load("data.php");
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<!-- <script>
$(document).ready(function(){
$('.num').blur(function () {
var tot = parseInt($('#total').val());
var bayar = parseInt($('#bayar').val());
var kembali  = bayar-total;
$('#kembali').val(kembali).blur();
});
});
</script> -->
<div id="pesan"></div>
        <table id="example2" class="table table-bordered table-striped verticle-middle">
          <thead>
          <tr>
              <th scope="col" style="width: 200px">Barcode</th>
              <th scope="col" style="width: 400px">Nama Produk</th>
              <th scope="col" style="width: 200px">Harga</th>
              <th scope="col" style="width: 60px">Qty</th>
              <th scope="col" style="width: 200px">SubTotal</th>
              <th scope="col" style="width: 90px">Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $limit = 10;
              $limit_start = ($page - 1) * $limit;
              $no = $limit_start + 1;

              $query = "SELECT * FROM tbl_detail_kasir d JOIN tbl_produk p ON p.id_produk=d.id_produk WHERE d.id_session='".$sid."' ORDER BY d.id DESC LIMIT $limit_start, $limit";
              $dewan1 = $con->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
              $tot = 0;
              while ($row = $res1->fetch_array()) {
                $id = $row['id'];
                $sub = $row['qty']*$row['harga'];
            ?>
              <tr>
                <td><input type="text" name="barcode" style="width: 170px" value="<?php echo $row["barcode"]; ?>" hidden><?php echo $row["barcode"]; ?></td>
                <td style="width: 400px"><input type="text" name="nama" style="width: 170px" value="<?php echo $row["nama_produk"]; ?>" hidden><?php echo $row["nama_produk"]; ?></td>
                <td style="width: 190px; text-align: right;"><input type="text" name="harga" style="width: 170px" value="<?php echo $row["harga"]; ?>" hidden><?php echo $row["harga"]; ?></td>
                <td style="width: 40px; text-align: right;"><span><input type="number" id="qty" name="qty" style="width: 50px" value="<?php echo $row["qty"]; ?>" hidden><?php echo $row["qty"]; ?></span>
                </td>
                <td style="width: 200px; text-align: right;"><input type="text" id="sub" name="sub" style="width: 170px" value="<?php echo $sub; ?>" hidden><?php echo $sub; ?></td>
                <td style="width: 70px"><span><a href="<?php echo $kasir_url; ?>aksi_hapus.php?id=<?php echo $id; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                </td>
              </tr>              
            <?php 
            $tot += $sub;
            }
            ?>
          </tbody>
        </table>

        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM tbl_detail_kasir";
          $dewan1 = $con->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row1 = $res1->fetch_array();
          $total_records = $row1['jumlah'];
          // $query_aktif = "SELECT count(*) AS jumlah FROM tbl_member WHERE status='Y'";
          // $dewan2 = $con->prepare($query_aktif);
          // $dewan2->execute();
          // $res2 = $dewan2->get_result();
          // $row2 = $res2->fetch_array();
          // $total_aktif = $row2['jumlah'];
          // $query_non = "SELECT count(*) AS jumlah FROM tbl_member WHERE status='N'";
          // $dewan3 = $con->prepare($query_non);
          // $dewan3->execute();
          // $res3 = $dewan3->get_result();
          // $row3 = $res3->fetch_array();
          // $total_non = $row3['jumlah'];
        ?>
        <!-- <table cellpadding="15">
        <tr>
          <th width="200">Total Member : <?php echo $total_records; ?></th>
          <th width="200">Member Aktif : <?php echo $total_aktif; ?></th>
          <th width="200">Member Non-Aktif : <?php echo $total_non; ?></th>
        </tr>
        </table> -->
          </div>
        </div>
        <!-- <div class="row"> -->
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <!-- <ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul> -->
          <ul class="pagination">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 2; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-controls="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-controls="true">&laquo;</span></a></li>';
              }

              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }

              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
          </div>
        </div>
        <div class="table-responsive">
            <div class="pull-right">
              <form method="post" action="done.php" id="done">
                <table>
                    <tr>
                        <th style="padding-right: 35px;"><h3>Total</h3></th>
                        <th style="padding-right: 15px;"><h3>Rp.</h3></th>
                        <th style="text-align: right;"><h3><input type="text" id="tot" name="tot" class="num" style="text-align: right;" value="<?php echo $tot ?>" hidden><?php echo number_format($tot) ?></h3></th>
                    </tr>
                    <?php
                    $bayar = 0;
                    ?>
                    <tr>
                        <td>Bayar</td>
                        <td>Rp.</td>
                        <td><input type="text" id="bayar" name="bayar" class="num" style="text-align: right;"></td>
                    </tr>
                </table>
                <br>
                <table>
                  <tr>
                    <td>
                    <a class="btn btn-info pull-right" id="act"><p style="color: white; height: 10px">Hitung Kembalian</p></a>
                    </td>
                    <td style="padding: 35px"></td>
                    <td>
                    <button class="btn btn-danger pull-right"><a id="sim"><p style="color: white; height: 10px">Proses</p></a>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
        </div>
<script src="config_sub.js" type="text/javascript"></script>
<script src="config_done.js" type="text/javascript"></script>
<!-- <script>
    function subbot()
    {
      var x = document.getElementById("kembali")
      var y = document.getElementById("bayar")
      var z = document.getElementById("tot")
      x.value = parseInt((y).value) - parseInt((z).value);
      return String(x.value).replace(/(.)(?=(\d{3})+$)/g,'$1,');
      // var x = document.getElementById("sub_" + prITTD).value
      
    }
</script> -->