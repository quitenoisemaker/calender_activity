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
                                    <li class="breadcrumb-item active">{{ App\Models\User::find($id)->name }} Activity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ App\Models\User::find($id)->name }} Activity</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div>
                                    <a href="{{ route('admin.activity.create.user', ['user_id' => $id]) }}"
                                        class="btn btn-primary btn-sm m-1">Add Activity</a>
                                </div>
                                <div class="col-lg-12">
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

                                                @if (count($userActivities) > 0)
                                                    @foreach ($userActivities as $userActivity)
                                                        <tr>
                                                            <td>{{ $userActivity->title }}</td>
                                                            <td>{{ $userActivity->description }}</td>
                                                            <td><img height="50"
                                                                    src="{{ !is_null($userActivity->image) ? URL::asset('storage/' . $userActivity->image) : 'no image' }}">
                                                            </td>
                                                            <td>{{ $userActivity->start_date }} </td>
                                                            <td>{{ $userActivity->end_date }} </td>
                                                            <td>
                                                                <a href="{{ route('admin.activity.edit.user', ['activity_id' => $userActivity->id, 'user_id' => $id]) }}"
                                                                    class="btn btn-warning
                                                                     btn-sm m-1">Edit
                                                                    User
                                                                    Activity</a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>


                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->
                <!-- end row -->
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
