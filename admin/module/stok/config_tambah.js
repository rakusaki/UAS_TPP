$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	// $("#loading").hide();
	
	$("#sub").click(function(){ // Ketika user mengganti atau memilih data provinsi
		// $("#exp").hide(); // Sembunyikan dulu combobox kota nya
		// $("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "module/stok/tambah.php", // Isi dengan url/path file php yang dituju
			data: {barcode : $("#barcode").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				// $("#loading").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kota
				// lalu munculkan kembali combobox kotanya
				$("#que").html(response.data_que).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
});
