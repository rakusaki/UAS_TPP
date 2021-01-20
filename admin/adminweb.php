<?php

include "../lib/conf.php";
include "../lib/kon.php";
session_start();
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./../plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./../plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./../plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="asset/plugins/daterangepicker/daterangepicker-bs3.css">

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
    <div id="main-wrapper">

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
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
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
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
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
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
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
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="../app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="../page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="../page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
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
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="adminweb.php?module=home">Home</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="adminweb.php?module=kategori" aria-expanded="false">
                            <i class="fa fa-bars menu-icon"></i><span class="nav-text">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=merek" aria-expanded="false">
                            <i class="fa fa-tags menu-icon"></i><span class="nav-text">Merek</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=produk" aria-expanded="false">
                            <i class="fa fa-th menu-icon"></i><span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Statistik</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="adminweb.php?module=penjualan">Penjualan</a></li>
                            <li><a href="adminweb.php?module=masuk">Stok Masuk</a></li>
                            <li><a href="adminweb.php?module=stok">Stok Tersedia</a></li>
                            <!-- <li><a href="adminweb.php?module=laporan">Laporan</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="adminweb.php?module=karyawan" aria-expanded="false">
                            <i class="fa fa-group menu-icon"></i><span class="nav-text">Karyawan</span>
                        </a>
                    </li>
                    <li>
                        <a href="../kasir/kasir.php" aria-expanded="false">
                            <i class="fa fa-money menu-icon"></i><span class="nav-text">Kasir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <?php
      if ($_GET['module'] == 'home') {
        include "module/home/home.php";
      }
      //Kategori
      elseif ($_GET['module'] == 'kategori') {
        include "module/kategori/list_kategori.php";
      }
      elseif ($_GET['module'] == 'tambah_kategori') {
        include "module/kategori/form_tambah.php";
      }
      elseif ($_GET['module'] == 'edit_kategori') {
        include "module/kategori/form_edit.php";
      }
      //Merek
      elseif ($_GET['module'] == 'merek') {
        include "module/merek/list_merek.php";
      }
      elseif ($_GET['module'] == 'tambah_merek') {
        include "module/merek/form_tambah.php";
      }
      elseif ($_GET['module'] == 'edit_merek') {
        include "module/merek/form_edit.php";
      }
      //Produk
      elseif ($_GET['module'] == 'produk') {
        include "module/produk/list_produk.php";
      }
      elseif ($_GET['module'] == 'tambah_produk') {
        include "module/produk/form_tambah.php";
      }
      elseif ($_GET['module'] == 'edit_produk') {
        include "module/produk/form_edit.php";
      }
      //Stok Masuk
      elseif ($_GET['module'] == 'masuk') {
        include "module/masuk/list_masuk.php";
      }
      elseif ($_GET['module'] == 'tambah_masuk') {
        include "module/masuk/form_tambah.php";
      }
      // elseif ($_GET['module'] == 'edit_masuk') {
      //   include "module/merek/form_edit.php";
      // }
      //Stok Tersedia
      elseif ($_GET['module'] == 'stok') {
        include "module/stok/list_stok.php";
      }
      elseif ($_GET['module'] == 'tambah_etalase') {
        include "module/stok/form_tambah.php";
      }
      // elseif ($_GET['module'] == 'edit_merek') {
      //   include "module/merek/form_edit.php";
      // }
      //Member
      elseif ($_GET['module'] == 'karyawan') {
        include "module/member/list_member.php";
      }
      elseif ($_GET['module'] == 'detail_karyawan') {
        include "module/member/form_edit.php";
      }
      elseif ($_GET['module'] == 'edit_karyawan') {
        include "module/member/form_edit.php";
      }
      else {
        include "module/home/home.php";
      }
      ?>
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
    <script src="asset/queryValidasi/kategori.js" type="text/javascript"></script>
    <script src="asset/queryValidasi/merek.js" type="text/javascript"></script>
    <!-- <script src="asset/plugins/queryValidasi/produk.js" type="text/javascript"></script> -->
    <script src="asset/queryValidasi/edit_kategori.js" type="text/javascript"></script>
    <script src="asset/queryValidasi/edit_merek.js" type="text/javascript"></script>
    <script src="asset/queryValidasi/edit_member.js" type="text/javascript"></script>

    <script src="module/stok/config_tambah.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="asset/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="asset/plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./../plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./../plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./../plugins/d3v3/index.js"></script>
    <script src="./../plugins/topojson/topojson.min.js"></script>
    <script src="./../plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./../plugins/raphael/raphael.min.js"></script>
    <script src="./../plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./../plugins/moment/moment.min.js"></script>
    <script src="./../plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./../plugins/chartist/js/chartist.min.js"></script>
    <script src="./../plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="./../js/dashboard/dashboard-1.js"></script>

    <script src="../kasir/jquery-3.2.1.min.js"></script>
    <script src="../kasir/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Selector input yang akan menampilkan autocomplete.
            $( "#barcode" ).autocomplete({
                serviceUrl: "module/stok/source.php",   // Kode php untuk prosesing data.
                dataType: "JSON",           // Tipe data JSON.
                onSelect: function (suggestion) {
                    $( "#barcode" ).val("" + suggestion.buah);
                }
            });
        })
    </script>

</body>

</html>
<?php } ?>