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
                                    <li class="breadcrumb-item active">Create Activity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Activity</h4>
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
                                <form method="POST" action="{{ route('admin.activity.add') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" accept="image/*" name="image"
                                                id="image">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description" id="description">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">End date</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Activity</button>
                                </form>
                            </div> <!-- end row -->

                            <hr>
                            <div class="col-12 pt-4">
                                <div class="card-box text-white">

                                    <table id="datatable" class="table text-white table-striped table-bordered"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (count($getActivities) > 0)
                                                @foreach ($getActivities as $getActivity)
                                                    <tr>
                                                        <td>{{ $getActivity->title }}</td>
                                                        <td>{{ $getActivity->description }}</td>
                                                        <td><img height="50"
                                                                src="{{ !is_null($getActivity->image) ? URL::asset('storage/' . $getActivity->image) : 'no image' }}">
                                                        </td>
                                                        <td>{{ $getActivity->start_date }} </td>
                                                        <td>{{ $getActivity->end_date }} </td>
                                                        <td>
                                                            <a href="{{ route('admin.activity.edit', $getActivity->id) }}"
                                                                class="btn btn-primary btn-sm m-1">edit
                                                                Activity</a>

                                                            <form method="POST"
                                                                action="{{ route('admin.activity.destroy', $getActivity->id) }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm m-1">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif


                                        </tbody>
                                    </table>
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
