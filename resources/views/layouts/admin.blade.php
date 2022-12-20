<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cypress</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Cypress" name="description">
    <meta content="Techlybro" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Plugin css -->
    <link href="{{ asset('assets\libs\fullcalendar\fullcalendar.min.css') }}" rel="stylesheet" type="text/css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}

    <!-- Table datatable css -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="{{ asset('assets\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets\libs\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="{{ asset('assets\css\bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{ asset('assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\css\app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">


                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 text-white m-0">
                                <span class="float-right">
                                    <a href="" class="text-white">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success">
                                    <i class="mdi mdi-settings-outline"></i>
                                </div>
                                <p class="notify-details">New settings
                                    <small class="text-muted">There are new settings available</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-bell-outline"></i>
                                </div>
                                <p class="notify-details">Updates
                                    <small class="text-muted">There are 2 new updates available</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user
                                    <small class="text-muted">You have 10 unread messages</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets\images\users\avatar-1.jpg') }}" alt="user-image"
                            class="rounded-circle">
                        <span
                            class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ Auth::user()->fname }}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-white m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        {{-- <a href="{{ route('change.password') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a> --}}



                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a> --}}

                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span> {{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('admin/home') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        {{-- <img src="{{asset('assets\images\logo.png')}}" alt="" height="22"> --}}
                        <span class="logo-lg-text-dark">J2G</span>
                    </span>
                    <span class="logo-sm">
                        <span class="logo-lg-text-dark">J2G</span>
                        {{-- <img src="{{asset('assets\images\logo-sm.png')}}" alt="" height="24"> --}}
                    </span>
                </a>

                <a href="{{ url('admin/home') }}" class="logo text-center logo-light">
                    <span class="logo-lg text-white">
                    </span>
                    <span class="logo-sm">
                        <span class="logo-lg-text-dark">J2G</span>
                        {{-- <img src="{{asset('assets\images\logo-sm-light.png')}}" alt="" height="24"> --}}
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>




            </ul>
        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ url('admin/home') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.activity.index') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Activity </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Users </span>
                            </a>
                        </li>


                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>





    <!-- Vendor js -->
    <script src="{{ asset('assets\js\vendor.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('assets\libs\morris-js\morris.min.js') }}"></script>
    <script src="{{ asset('assets\libs\raphael\raphael.min.js') }}"></script>
    <!--Pluggins-->
    <script src="{{ asset('assets\libs\moment\moment.min.js') }}"></script>
    <script src="{{ asset('assets\libs\jquery-ui\jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets\libs\fullcalendar\fullcalendar.min.js') }}"></script>
    <!-- Calendar init -->
    <script src="{{ asset('assets\js\pages\calendar.init.js') }}"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('assets\js\pages\dashboard.init.js') }}"></script>

    <!-- Datatable plugin js -->
    <script src="{{ asset('assets\libs\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets\libs\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables\responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets\libs\datatables\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables\buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets\libs\jszip\jszip.min.js') }}"></script>
    <script src="{{ asset('assets\libs\pdfmake\pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets\libs\pdfmake\vfs_fonts.js') }}"></script>

    <script src="{{ asset('assets\libs\datatables\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables\buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets\libs\datatables\dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables\dataTables.select.min.js') }}"></script>


    <!-- Datatables init -->
    <script src="{{ asset('assets\js\pages\datatables.init.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script><script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <!-- App js -->
    <script src="{{ asset('assets\js\app.min.js') }}"></script>

    @yield('scripts')


</body>

</html>
