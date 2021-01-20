$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	// $("#loading").hide();
	
	$("#kabupaten").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#kecamatan").hide(); // Sembunyikan dulu combobox kecamatan nya
		// $("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "asset/plugins/queryAlamat/kecamatan.php", // Isi dengan url/path file php yang dituju
			data: {kabupaten : $("#kabupaten").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				// $("#loading").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kecamatan
				// lalu munculkan kembali combobox kecamatannya
				$("#kecamatan").html(response.data_kecamatan).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
});
