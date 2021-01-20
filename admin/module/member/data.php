<?php
include "../../../lib/kon.php";
include "../../../lib/conf.php";
?>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Member</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Status</th>
              <th style="width: 110px">Aksi</th>
            </tr>  
          </thead>
          <tbody>
            <?php
              $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $limit = 10;
              $limit_start = ($page - 1) * $limit;
              $no = $limit_start + 1;

              $query = "SELECT * FROM tbl_member ORDER BY nama LIMIT $limit_start, $limit";
              $dewan1 = $con->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
              while ($row = $res1->fetch_array()) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["no_hp"]; ?></td>
                <td style="width: 90px"><?php if ($row["status"] == "Y") { ?> <a href="module/member/confirm.php?id=<?php echo $row['id_member']; ?>" onClick="return confirm('Anda yakin ingin mengubah status user ini?')" class="btn btn-success"><i class="fa" style="width: 50px"></i></button></a> <?php } else { ?> <a href="module/member/confirm.php?id=<?php echo $row['id_member']; ?>" onClick="return confirm('Anda yakin ingin mengubah status user ini?')" class="btn btn-danger"><i class="fa" style="width: 50px"> <?php } ?></td>
                <td>
                <div class="btn-group">
                  <a href="<?php echo $admin_url; ?>adminweb.php?module=detail_karyawan&id=<?php echo $row['id_member']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                  <a href="<?php echo $admin_url; ?>module/member/aksi_hapus.php?id=<?php echo $row['id_member']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                </div>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <div class="col-sm-9">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM tbl_member";
          $dewan1 = $con->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row1 = $res1->fetch_array();
          $total_records = $row1['jumlah'];
          $query_aktif = "SELECT count(*) AS jumlah FROM tbl_member WHERE status='Y'";
          $dewan2 = $con->prepare($query_aktif);
          $dewan2->execute();
          $res2 = $dewan2->get_result();
          $row2 = $res2->fetch_array();
          $total_aktif = $row2['jumlah'];
          $query_non = "SELECT count(*) AS jumlah FROM tbl_member WHERE status='N'";
          $dewan3 = $con->prepare($query_non);
          $dewan3->execute();
          $res3 = $dewan3->get_result();
          $row3 = $res3->fetch_array();
          $total_non = $row3['jumlah'];
        ?>
        <table cellpadding="15">
        <tr>
          <th width="200">Total Member : <?php echo $total_records; ?></th>
          <th width="200">Member Aktif : <?php echo $total_aktif; ?></th>
          <th width="200">Member Non-Aktif : <?php echo $total_non; ?></th>
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