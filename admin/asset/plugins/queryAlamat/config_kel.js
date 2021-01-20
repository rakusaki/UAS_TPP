$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	// $("#loading").hide();
	
	$("#kecamatan").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#kelurahan").hide(); // Sembunyikan dulu combobox kelurahan nya
		// $("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "asset/plugins/queryAlamat/kelurahan.php", // Isi dengan url/path file php yang dituju
			data: {kecamatan : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				// $("#loading").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kelurahan
				// lalu munculkan kembali combobox kelurahannya
				$("#kelurahan").html(response.data_kelurahan).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
});
