<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DISKOMINFO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/pemantauansitusweb/filelocal/resources/assets/images/icon/logoprovinsikalimantantimur.png">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/slicknav.min.css">
    <!-- start datatable css -->
    <link rel="stylesheet" type="text/css" href="/pemantauansitusweb/filelocal/resources/assets/datatables/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/pemantauansitusweb/filelocal/resources/assets/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/pemantauansitusweb/filelocal/resources/assets/datatables/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/pemantauansitusweb/filelocal/resources/assets/datatables/responsive.jqueryui.min.css">
    <!-- datepicker css -->
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/datepicker/bootstrap-datepicker3.min.css">
    <!-- toastr css -->
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/toastr/toastr.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/typography.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/default-css.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/styles.css">
    <link rel="stylesheet" href="/pemantauansitusweb/filelocal/resources/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="body-bg">
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

        <div id="logincontent">
            @yield('login')
        </div>

        <!-- main wrapper start -->
        <div id="panelcontent">
            <div class="horizontal-main-wrapper">
                <!-- main header area start -->
                <div class="mainheader-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="logo"></div>
                            </div>
                            <!-- profile info & task notification -->
                            <div class="col-md-9 clearfix text-right">
                                <div class="d-md-inline-block d-block mr-md-4">
                                    <ul class="notification-area">
                                        <li class="fullscreen" id="full-view"></li>
                                        <li class="zoom" id="full-view-exit"></li>
                                    </ul>
                                </div>
                                <div class="clearfix d-md-inline-block d-block">
                                    <div class="user-profile m-0">
                                        <div class="avatar"></div>
                                        <h4 class="user-name" data-toggle="dropdown" id="loggedusername"></h4>
                                        <div class="dropdown-menu custom-flat">
                                            <a class="dropdown-item user" data-toggle="modal" data-target="#usermodal" id="usersettings" href="#"> Pengaturan Akun</a>
                                            <a class="dropdown-item help" href="/pemantauansitusweb/filelocal/resources/assets/bukupanduan.docx" id="help"> Bantuan</a>
                                            <a class="dropdown-item signout" href="/pemantauansitusweb/logout" id="logout"> Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header area end -->
                <!-- header area start -->
                <div class="header-area header-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-9  d-none d-lg-block">
                                <div class="horizontal-menu">
                                    <nav>
                                        <ul id="nav_menu">
                                            <li id="menuhome"><a class="home" href="/pemantauansitusweb/horisontal/utama"> <span>Utama</span></a></li>
                                            <li id="menuagency"><a class="stamp" href="/pemantauansitusweb/horisontal/instansi"> <span>Instansi</span></a></li>
                                            <li id="menureport"><a class="clipboard" href="/pemantauansitusweb/horisontal/laporan"> <span>Laporan</span></a></li>
                                            <li id="menutype">
                                                <a class="horizontal" href="javascript:void(0)"> <span>Tipe Menu</span></a>
                                                <ul class="submenu">
                                                    <li><a class="sidebar" href="/pemantauansitusweb/utama"> Menu Kiri</a></li>
                                                    <li><a class="horizontal" href="/pemantauansitusweb/horisontal/utama"> Menu Horisontal</a></li>
                                                </ul>
                                            </li>
                                            <li id="menuuser"><a class="user" href="/pemantauansitusweb/horisontal/pengguna"> <span>Pengguna</span></a></li>
                                            <li id="menuimport"><a class="import" data-toggle="modal" data-target="#importmodal" id="import" href="#"> <span>Impor Data</span></a></li>
                                            <li id="menusignature"><a class="marker" href="/pemantauansitusweb/horisontal/tandatangan"> <span>Tanda Tangan</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- mobilemenu -->
                            <div class="col-12 d-block d-lg-none">
                                <div id="mobilemenu"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area end -->
                <div class="main-content-inner">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <!-- main content area end -->
                <!-- footer area start-->
                <footer>
                    <div class="footer-area">
                        <p id="footerlabel"></p>
                    </div>
                </footer>
                <!-- footer area end-->
            </div>
        </div>

    <!-- main wrapper end -->
    <!-- jquery latest version -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/popper.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/tether.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/bootstrap.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/owl.carousel.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/metisMenu.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/jquery.slicknav.min.js"></script>
    <!-- style js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/style.js"></script>
    <!-- start datatable js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/datatables/jquery.dataTables.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/datatables/dataTables.responsive.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/datatables/responsive.bootstrap.min.js"></script>
    <!-- datepicker js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/pemantauansitusweb/filelocal/resources/assets/datepicker/bootstrap-datepicker.id.min.js"></script>
    <!-- filestyle js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/filestyle/bootstrap-filestyle.min.js"></script>
    <!-- sweetalert js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/sweetalert/docs/assets/sweetalert/sweetalert.min.js"></script>
    <!-- jquery validation js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- toastr js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/toastr/toastr.min.js"></script>
    <!-- others plugins js -->
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/plugins.js"></script>
    
    <script src="/pemantauansitusweb/filelocal/resources/assets/progress/progressbar.js"></script>

    @include('import.importdata')
    @include('user.form.form')
    @toastr_render
    @yield('scripts')
    <script src="/pemantauansitusweb/filelocal/resources/assets/js/scripts.js"></script>
</body>
</html>