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
                                    <li class="breadcrumb-item active">Edit Activity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Activity</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="card-box">
                        <div class="row">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <form method="POST" action="/admin/activity/update/{{ $getActivity->id }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $getActivity->title }}"
                                                name="title" id="title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" value="{{ $getActivity->image }}"
                                                accept="image/*" name="image" id="image">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control"
                                                value="{{ $getActivity->description }}" name="description" id="description">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control"
                                                value="{{ $getActivity->start_date }}" name="start_date" id="start_date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">End date</label>
                                            <input type="date" class="form-control"value="{{ $getActivity->end_date }}"
                                                name="end_date" id="end_date">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div> <!-- end row -->
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
