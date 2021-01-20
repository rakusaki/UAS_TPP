$("#produk").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
$("#error_kategori").html('');
$("#error_merek").html('');
$("#error_nama").html('');
$("#error_gbr").html('');
$("#error_deskripsi").html('');
$("#error_harga").html('');
// ambil data form dengan serialize
var dataform = $("#produk").serialize();
    $.ajax({
        url: "module/produk/aksi_simpan.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                $("#error_kategori").html(hasil.error.kategori);
                $("#error_merek").html(hasil.error.merek);
                $("#error_nama").html(hasil.error.nama);
                $("#error_gbr").html(hasil.error.gbr);
                $("#error_deskripsi").html(hasil.error.deskripsi);
                $("#error_harga").html(hasil.error.harga);
            } else {
                // do something, misalnya menampilkan berhasil
                $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\'); window.location = \'adminweb.php?module=produk\';");
                // kosongkan lagi error form
                $("#kategori").val('');
                $("#merek").val('');
                $("#nama").val('');
                $("#gbr").val('');
                $("#deskripsi").val('');
                $("#harga").val('');
            }
        }
    });
});