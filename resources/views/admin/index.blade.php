@extends('layouts.admin')

@section('content')
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Calender</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Calender</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">

                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('admin.activity.index') }}">
                                        <div class="card-box tilebox-one bg-primary ">
                                            <i class="icon-people float-right m-0 h2 text-white"></i>
                                            <h6 class="text-uppercase mt-0 text-white">Calender</h6>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('admin.activity.create') }}">
                                        <div class="card-box tilebox-one bg-success">
                                            <i class="icon-present float-right m-0 h2 text-white"></i>
                                            <h6 class="text-white text-uppercase mt-0">Click to view All Global Activities
                                            </h6>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('admin.users.index') }}">
                                        <div class="card-box tilebox-one bg-warning">
                                            <i class="icon-wallet float-right m-0 h2 text-white"></i>
                                            <h6 class="text-white text-uppercase mt-0">Click to view Users</h6>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->
                <!-- end row -->
            @section('scripts')
            @endsection


        </div> <!-- end container-fluid -->

    </div> <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2021 &copy; Cypress
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
