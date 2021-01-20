$("#edit_biaya").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
$("#error_prov").html('');
$("#error_kab").html('');
$("#error_kec").html('');
$("#error_kel").html('');
$("#error_exp").html('');
$("#error_biaya").html('');
$("#error_slide").html('');
$("#error_rekomendasi").html('');
// ambil data form dengan serialize
var dataform = $("#edit_biaya").serialize();
    $.ajax({
        url: "module/biaya kirim/aksi_edit.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                $("#error_prov").html(hasil.error.prov);
                $("#error_kab").html(hasil.error.kab);
                $("#error_kec").html(hasil.error.kec);
                $("#error_kel").html(hasil.error.kel);
                $("#error_exp").html(hasil.error.exp);
                $("#error_biaya").html(hasil.error.biaya);
                $("#error_slide").html(hasil.error.slide);
                $("#error_rekomendasi").html(hasil.error.rekomendasi);
            } else {
                // do something, misalnya menampilkan berhasil
                $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\'); window.location = \'adminweb.php?module=biaya\';");
                // kosongkan lagi error form
                $("#provinsi").val('');
                $("#kabupaten").val('');
                $("#kecamatan").val('');
                $("#kelurahan").val('');
                $("#expedisi").val('');
                $("#biaya").val('');
                $("#slide").val('');
                $("#rekomendasi").val('');
            }
        }
    });
});