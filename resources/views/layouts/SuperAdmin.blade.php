<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2020 09:40:27 GMT -->
<head>

    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/dashboard/')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/dashboard/')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/dashboard/')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/dashboard/')}}/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/dashboard/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/dashboard/')}}/css/app.min.css"  rel="stylesheet" type="text/css" />

    <style>
        /* Absolute Center Spinner */
        .dataTables_filter{
            /*margin-top: -55px;*/
        }

        .nav-item:active{
            background-color: #4267b2;
            color: white;
        }

        .table.dataTable tbody th, table.dataTable tbody td{
            white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
        }

        .table thead th{
            background-color: #4267B2;
            color: white;

        }


    </style>


    @yield('css')

</head>

<body data-topbar="dark" data-layout="horizontal">
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <i class="ri-loader-line spin-icon"></i>
        </div>
    </div>
</div>
<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar" style="background-color: #0e3775">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset($gn->logo)}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset($gn->logo)}}" alt="" height="20">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset($gn->logo)}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset($gn->logo)}}" alt="" style="height: 50px;">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-toggle="collapse" data-target="#topnav-menu-content">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->



            </div>

            <div class="d-flex">






                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/dashboard/')}}/images/users/avatar-2.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('super.admin.logout')}}"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                    </div>
                </div>



            </div>
        </div>
    </header>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('super.admin.dashboard')}}">
                                <i class="ri-dashboard-line mr-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('super.admin.general.settings')}}">
                                <i class="ri-dashboard-line mr-2"></i> General Settings
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line mr-2"></i>User Management <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                <a href="{{route('super.admin.create.user')}}" class="dropdown-item">Create User</a>
                                <a href="{{route('super.admin.all.admin')}}" class="dropdown-item">All Admin</a>
                                <a href="{{route('super.admin.all.accountmanager')}}" class="dropdown-item">All Account Manager</a>
                                <a href="{{route('super.admin.all.basestaff')}}" class="dropdown-item">All Base Staff</a>
                                <a href="{{route('super.admin.all.mis')}}" class="dropdown-item">All MIS</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line mr-2"></i>Master Data <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                <a href="{{route('super.admin.claim.manager')}}" class="dropdown-item">Claim Manager</a>
                                <a href="{{route('super.admin.deposit.manager')}}" class="dropdown-item">Claim Deposit Manager</a>
                                <a href="{{route('super.admin.insurance.manager')}}" class="dropdown-item">Insurance Manager</a>
                                <a href="{{route('super.admin.webportal.manager')}}" class="dropdown-item">Web Portal Manager</a>
                                <a href="{{route('super.admin.file.manager')}}" class="dropdown-item">File Manager</a>
                                <a href="{{route('super.admin.arfollowup.manager')}}" class="dropdown-item">Ar Followup Manager</a>
                                <a href="" class="dropdown-item">Practice Wize Claim</a>
                                <a href="apps-chat.html" class="dropdown-item">Ar Followup Bucket Upload</a>
                                <a href="apps-chat.html" class="dropdown-item">Ar Followup Bucket</a>
                                <a href="apps-chat.html" class="dropdown-item">Disposition</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line mr-2"></i>Practice <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                <a href="{{route('super.admin.practice.management')}}" class="dropdown-item">Practice Management</a>
                                <a href="apps-chat.html" class="dropdown-item">Assign Practice</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="ri-dashboard-line mr-2"></i> Message
                            </a>
                        </li>






                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid" style="max-width: 100%">
                @yield('superadmin')
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                       <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} © {{$gn->site_name}}.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/dashboard/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->


<!-- jquery.vectormap map -->
<script src="{{asset('assets/dashboard/')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/dashboard/')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/dashboard/')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


<script src="{{asset('assets/dashboard/')}}/libs/dropzone/min/dropzone.min.js"></script>
<script src="{{asset('assets/dashboard/')}}/js/app.js"></script>

@yield('js')

<script>
    $('#preloader').delay(350).fadeOut("slow");
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')


</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2020 09:42:27 GMT -->
</html>
