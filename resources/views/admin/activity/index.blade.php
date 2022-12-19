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
                                    <li class="breadcrumb-item active">Activity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Activity</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 p-2 d-flex justify-content-between">
                            <a href="{{ route('admin.activity.create') }}" class="btn btn-primary btn-sm m-1">Add
                                Activity</a>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="calendar" class="mt-4 mt-lg-0">
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>


                        </div>
                        <!-- end col-12 -->
                    </div> <!-- end row -->
                    <!-- end row -->
                @section('scripts')
                    {{-- <script>
                                $(document).ready(function(){
                                    $.ajaxSetup({
                                        headers:{
                                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content');
                                        }
                                    });
                                    var calendar= $('#calender').fullCalender({
                                        
                                    });
                                });
                            </script> --}}
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
