$("#kas").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
// $("#error_nama").html('');
// ambil data form dengan serialize
var dataform = $("#kas").serialize();
    $.ajax({
        url: "tambah_kasir.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                // $("#error_nama").html(hasil.error.nama);
            } else {
                // do something, misalnya menampilkan berhasil
                // $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\'); window.location = \'$kasir_url\'+\'kasir.php\';");
                // kosongkan lagi error form
                $("#barcode").val('');
                $("#qt").val('');
            }
        }
    });
});