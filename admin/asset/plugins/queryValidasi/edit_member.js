$("#edit_member").submit(function(e) {
// mencegah default submit form
e.preventDefault();
// kosongkan error form
$("#error_nama").html('');
$("#error_user").html('');
$("#error_pass").html('');
$("#error_email").html('');
$("#error_telp").html('');
$("#error_prov").html('');
$("#error_alamat").html('');
// ambil data form dengan serialize
var dataform = $("#edit_member").serialize();
    $.ajax({
        url: "module/member/aksi_edit.php",
        type: "post",
        data: dataform,
        success: function(result) {
        var hasil = JSON.parse(result);
            if (hasil.hasil !== "sukses") {
                // tampilkan pesan error
                $("#error_nama").html(hasil.error.nama);
                $("#error_user").html(hasil.error.user);
                $("#error_pass").html(hasil.error.pass);
                $("#error_email").html(hasil.error.email);
                $("#error_telp").html(hasil.error.telp);
                $("#error_prov").html(hasil.error.prov);
                $("#error_alamat").html(hasil.error.alamat);
            } else {
                // do something, misalnya menampilkan berhasil
                $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\'); window.location = \'adminweb.php?module=member\';");
                // kosongkan lagi error form
                $("#nama").val('');
                $("#username").val('');
                $("#pass").val('');
                $("#email").val('');
                $("#no_telp").val('');
                $("#prov").val('');
                $("#alamat").val('');
            }
        }
    });
});