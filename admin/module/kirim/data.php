<?php
include "../../../lib/kon.php";
include "../../../lib/conf.php";
?>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID Order</th>
              <th>Pemesan</th>
              <th>Status Order</th>
              <th>Tanggal Order</th>
              <th>Alamat</th>
              <th style="width: 110px">Kirim Pesanan</th>
              <th>Aksi</th>
            </tr>  
          </thead>
          <tbody>
            <?php
              $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $limit = 10;
              $limit_start = ($page - 1) * $limit;
              $no = $limit_start + 1;

              $query = "SELECT *, o.status as stats FROM tbl_order_masuk o, tbl_member m, provinces p WHERE m.id_member=o.id_member AND p.id=m.id_prov AND o.status='K' ORDER BY id_order_masuk LIMIT $limit_start, $limit";
              $dewan1 = $con->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
              while ($row = $res1->fetch_array()) {
              if ($row['stats'] == "P") {
                  $status = "Menunggu Konfirmasi";
              }
              elseif ($row['stats'] == "T") {
                  $status = "Prosess";
              }
              elseif ($row['stats'] == "K") {
                  $status = "Pengiriman";
              }
              elseif ($row['stats'] == "D") {
                  $status = "Pesanan Telah Sampai";
              }
              elseif ($row['stats'] == "S") {
                  $status = "Selesai";
              }
              $orgDate = $row['tgl_order'];
              $date = str_replace('-"', '/', $orgDate);
              $newDate = date("Y-m-d h:i:m A", strtotime($date));
              $x = $newDate;
            ?>
              <tr>
                <td><?php echo $row["id_order_masuk"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $x ?></td>
                <td><?php echo $row["name"]; ?></td>
                <!-- <form action="module/pesanan/confirm.php" id="edit_konfirm" method="post"> -->
                <td style="width: 90px"><a href="module/kirim/confirm.php?id=<?php echo $row['id_order_masuk']; ?>" id="act" onClick="return confirm('Anda yakin ingin mengkonfirmasi pesanan ini?')" class="btn btn-danger">Terkirim</button></a></td>
                <!-- </form> -->
                <td>
                <div class="btn-group">
                  <a href="<?php echo $admin_url; ?>adminweb.php?module=detail_transaksi&id=<?php echo $row['id_order_masuk']; ?>" class="btn btn-warning"><i class="fa fa-file-text-o"></i></button></a>
                  <!-- <a href="<?php echo $admin_url; ?>module/transaksi/aksi_hapus.php?id=<?php echo $row['id_order_masuk']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a> -->
                </div>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM tbl_order_masuk WHERE status='K'";
          $dewan1 = $con->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row = $res1->fetch_array();
          $total_records = $row['jumlah'];
        ?>
        <table>
        <tr>
          <th width="200">Total Pesanan : <?php echo $total_records; ?></th>
        </tr>
        </table>
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
          </div></div>
        </div>