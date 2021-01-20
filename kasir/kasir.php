<?php
session_start();

include "../lib/conf.php";
include "../lib/kon.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else {
$kueriAdmin = mysqli_query($con, "SELECT * FROM tbl_admin");
$adm = mysqli_fetch_array($kueriAdmin);
$gambar = $adm['gambar'];
$nama = $adm['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
    <!-- <script src="jquery.min.js" type="text/javascript"></script> -->
    <!-- <script src="config_kasir.js" type="text/javascript"></script> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../plugin/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../plugin/bootstrap-daterangepicker/daterangepicker.css"></script>
    <script src="../plugin/bootstrap-datepicker/datepicker.js"></script>
    <script src="../plugin/bootstrap-datepicker/datepicker.css"></script>
    <script src="jquery.min.js" type="text/javascript"></script>

    <script>
    $(document).ready(function(){
        load_data();
        function load_data(page){
            $.ajax({
                url:"data.php",
                method:"POST",
                data:{page:page},
                success:function(data){
                    $('#data').html(data);
                }
            })
        }
        $(document).on('click', '.halaman', function(){
            var page = $(this).attr("id");
            load_data(page);
        });
    });
    </script>

    <script>
    $(document).ready(function() {

        $("#sub").on("click", function() {
            $("#example2").load("data.php #example2");
        });
    });
    </script>
    <script>
        $(document).ready(function() {

            $("#act").on("click", function() {
                $("#data").load("data.php");
            });
        });
    </script>
    <!-- <script>
      $('kas').keypress(function(e){
      if (e.keyCode == 13)
      {
          $('#st').submit();
      }
      });
    </script> -->

        <style>
            body {
                font-family: 'Roboto', Arial, Sans-serif;
                font-size: 15px;
                font-weight: 400;
            }
            .container {
                left: 50%;
                position: absolute;
                top: 7.5%;
                transform: translate(-50%, -7.5%);
            }
            input[type=text]:focus {
                border: 2px solid #757575;
                outline: none;
            }
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
            }
        </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show menu-toggle">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="../images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./../images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="../images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <!-- <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div> -->
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" id="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div id="display"></div>
                        <div class="drop-down d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="../images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="../images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="../images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="../images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table Stripped</h4>
                                <div id="pesan"></div>
                                <!-- <div class="table-responsive">
                                    <div class="pull-right">
                                        <table>
                                            <tr>
                                                <th style="padding-right: 35px;"><h3>Total</h3></th>
                                                <th style="padding-right: 15px;"><h3>Rp.</h3></th>
                                                <th style="text-align: right;"><h3>123.456</h3></th>
                                            </tr>
                                            <tr>
                                                <td>Bayar</td>
                                                <td>Rp.</td>
                                                <td><input type="text" name="" style="text-align: right;"></td>
                                            </tr>
                                            <tr>
                                                <td>Kembali</td>
                                                <td>Rp.</td>
                                                <td style="text-align: right;">123</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> -->
                                <div class="table-responsive"> 
                                    <form class="form-inline" id="kas" method="post" action="tambah_kasir.php">
                                        <div id="pesan"></div>
                                        <table>
                                        <tr>
                                        <td><span>
                                        Barcode <input type="text" name="barcode" id="barcode">
                                        Qty <input style="width: 40px" type="number" name="qt" id="qt">
                                        <input type="text" name="session" id="session" value="<?php echo session_id(); ?>" hidden>
                                        <button type="submit" id="sub" class="btn"><i class="fa fa-plus"></i></button>
                                        </span>
                                        <!-- <button class="btn btn-md btn-primary" id="addBtn" type="button"> -->
                                        </td>
                                        </tr>
                                        </table>
                                    </form>
                                    <hr>
                                    <div class="form-group" id="data">
                                        <div id="pesan"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="pull-right">
                                            <table id="total">
                                                
                                            </table>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <hr> -->
                                    <!-- <div class="duplicate" style="margin-bottom: 5px;"> -->
                                        <!-- <div class="form-group"> -->
                                            <!-- <table class="table table-bordered table-striped verticle-middle" id=""> -->
                                                <!-- <?php
                                                    if (isset($_POST['submit'])) {
                                                        $barcode = $_POST['barcode'];

                                                        $kueriBarcode = mysqli_query($con, "SELECT * FROM tbl_produk WHERE barcode = '".$barcode."'");
                                                        while ($kab = mysqli_fetch_array($kueriBarcode)) {

                                                            $barcode = $kab['barcode'];
                                                            $nama = $kab['nama_produk'];
                                                            $harga = $kab['harga'];

                                                            echo $barcode;

                                                ?> -->
                                                 <!-- <tbody id="tbody"> -->
                                            
                                            <!-- <tr>
                                                <td><input class="cleanVal" type="text" name="barcode" style="width: 170px" value="<?php echo $kab['barcode'] ?>"></td>
                                                <td style="width: 400px"><?php echo $kab['nama_produk'] ?></td>
                                                <td style="width: 190px"><?php echo $kab['harga'] ?></td>
                                                <td style="width: 40px"><span class="label cleanVal"><input type="number" name="qty" style="width: 50px"></span>
                                                </td>
                                                <td style="width: 200px"></td>
                                                <td style="width: 70px"><span><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a><a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr> -->
                                            <!-- <?php
                                                        }
                                                    }
                                            ?> -->
                                                <!-- </tbody> -->
                                            <!-- </table> -->
                                        <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="config_kasir.js" type="text/javascript"></script>
    <script src="done.js" type="text/javascript"></script>
    <!-- <script src="config_sub.js" type="text/javascript"></script> -->
    <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

</body>

</html>
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery.autocomplete.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $( "#barcode" ).autocomplete({
            serviceUrl: "source.php",   // Kode php untuk prosesing data.
            dataType: "JSON",           // Tipe data JSON.
            onSelect: function (suggestion) {
                $( "#barcode" ).val("" + suggestion.buah);
            }
        });
    })
</script>
<!-- <script type="text/javascript">
    var count = 0;
$('body').on('focus', ".duplicate:last input", function() {
    count++;
    var $clone = $('.duplicate:last').clone();
    $clone.find("table").each(function() {
        $(this).attr({
        id: $(this).attr("id") + count,
        });
    });
    $("form").append($clone);
    $(".duplicate:last .cleanVal").val('');
});
</script> -->
<?php } ?>