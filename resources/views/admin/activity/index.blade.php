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
                        <div class="col-12 p-2 d-flex justify-content-between">
                            <a href="{{ route('admin.activity.create') }}" class="btn btn-primary btn-sm m-1">Click to Add
                                Activity</a>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="calendar" class="mt-4 mt-lg-0">

                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <!-- BEGIN MODAL -->
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Activity</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body p-3"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-success save-event waves-effect waves-light">Create
                                            event</button>
                                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                            data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->
                <!-- end row -->
            @section('scripts')
                <script>
                    $("#calendar").fullCalendar({
                        // editable: true,
                        header: {
                            left: "prev,next today",
                            center: "title",
                            right: "month,agendaWeek,agendaDay",
                        },
                        events: JSON.parse('{!! $events !!}')
                    });
                </script>
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
