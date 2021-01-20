<table class="table table-striped table-bordered zero-configuration" id="example2">
	<thead>
	<tr>
		<th>Kategori</th>
		<th style="width: 110px">Aksi</th>
	</tr>
	</thead>
	<?php
	$page = (isset($_POST['page']))? $_POST['page'] : 1;
  	$limit = 10;
  	$limit_start = ($page - 1) * $limit;
  	$no = $limit_start + 1;

	include "../lib/conf.php";
	include "../lib/kon.php";
	$query = "SELECT * FROM tbl_kategori ORDER BY nama_kategori LIMIT $limit_start, $limit";
	$dewan1 = $con->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
	while ($row = $res1->fetch_array()) {
	?>
	<tbody>
	<tr>
		<td><?php echo $row['nama_kategori']; ?></td>
		<td>
			<div class="btn-group">
				<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_kategori&id_kategori=<?php echo $row['id_kategori']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
				<a href="<?php echo $admin_url; ?>module/kategori/aksi_hapus.php?id_kategori=<?php echo $row['id_kategori']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
			</div>
		</td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="col-sm-5">
  	<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
	<?php
  	$query_jumlah = "SELECT count(nama_kategori) AS jumlah FROM tbl_kategori";
  	$dewan1 = $con->prepare($query_jumlah);
  	$dewan1->execute();
  	$res1 = $dewan1->get_result();
  	$row = $res1->fetch_array();
  	$total_records = $row['jumlah'];
	?>
	<p>Total baris : <?php echo $total_records; ?></p>
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