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
                                    <li class="breadcrumb-item active">Create {{ App\Models\User::find($user_id)->name }}
                                        Activity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create {{ App\Models\User::find($user_id)->name }} Activity</h4>
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
                                <form method="POST"
                                    action="{{ route('admin.activity.store.user', ['user_id' => $user_id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control" accept="image/*" name="image"
                                                id="image">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="description" id="description">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="start_date" id="start_date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">End date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Activity to
                                        {{ App\Models\User::find($user_id)->name }}</button>
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
