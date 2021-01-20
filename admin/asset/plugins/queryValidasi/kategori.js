$("#kategori").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
$("#error_nama").html('');
// ambil data form dengan serialize
var dataform = $("#kategori").serialize();
    $.ajax({
        url: "module/kategori/aksi_simpan.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                $("#error_nama").html(hasil.error.nama);
            } else {
                // do something, misalnya menampilkan berhasil
                $("#pesan").html("<script> swal(\'Data Berhasil Disimpan\', \"success\"); window.location = \'adminweb.php?module=kategori\';");
                // kosongkan lagi error form
                $("#nama").val('');
            }
        }
    });
});