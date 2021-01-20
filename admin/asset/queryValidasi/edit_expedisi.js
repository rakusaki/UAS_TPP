$("#edit_expedisi").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
$("#error_nama").html('');
// ambil data form dengan serialize
var dataform = $("#edit_expedisi").serialize();
    $.ajax({
        url: "module/expedisi/aksi_edit.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                $("#error_nama").html(hasil.error.nama);
            } else {
                // do something, misalnya menampilkan berhasil
                $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\'); window.location = \'adminweb.php?module=expedisi\';");
                // kosongkan lagi error form
                $("#nama").val('');
            }
        }
    });
});