<!doctype html>
<html>
    <head>
        <title>AJAX Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    </head>
    <body>
        <div style="width: 400px; margin: auto">
            <h1>AJAX Form</h1>
            <form id="formku">
                <div id="pesan"></div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <!-- untuk pesan error validasi -->
                    <span class="text-danger" id="error_namalengkap"></span>
                    <input id="nama" class="form-control" type="text" name="namalengkap">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <!-- untuk pesan error validasi -->
                    <span class="text-danger" id="error_alamat"></span>
                    <input id="alamat" class="form-control" type="text" name="alamat">
                </div>
                <div class="form-group">
                    <button id="tombolsimpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <small>&COPY; harviacode.com</small>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script>
            $("#formku").submit(function(e) {
                // mencegah default submit form
                e.preventDefault();
                // kosongkan error form
                $("#error_namalengkap").html('');
                $("#error_alamat").html('');
                // ambil data form dengan serialize
                var dataform = $("#formku").serialize();
                $.ajax({
                    url: "test.php",
                    type: "post",
                    data: dataform,
                    success: function(result) {
                        var hasil = JSON.parse(result);
                        if (hasil.hasil !== "sukses") {
                            // tampilkan pesan error
                            $("#error_namalengkap").html(hasil.error.namalengkap);
                            $("#error_alamat").html(hasil.error.alamat);
                        } else {
                            // do something, misalnya menampilkan berhasil
                            $("#pesan").html("<script> alert(\'Data Berhasil Disimpan\');");
                            // kosongkan lagi error form
                            $("#nama").val('');
                            $("#alamat").val('');
                        }
                    }
                });
            });
        </script>
    </body>
</html>