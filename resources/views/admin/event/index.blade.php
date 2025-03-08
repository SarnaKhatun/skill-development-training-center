@extends('admin.layouts.master')
@section('manage-frontend', 'menu-open')
@section('event', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Event</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Events</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All event</h3>
                                <a href="{{ route('admin.event.create') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i>
                                    Create
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th class="text-center">Image</th>
                                            <th>Title</th>
                                            <th>Event Date</th>
                                            <th>Event Time</th>
                                            <th>Location</th>
                                            <th>Short Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($events->isNotEmpty())
                                            @foreach($events as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        @if($item->image)
                                                            <img  src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->title ?? "" }}</td>
                                                    <td>{{ $item->date ?? "" }}</td>
                                                    <td> {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}</td>
                                                    <td>{{ $item->location ?? "" }}</td>
                                                    <td>{{ $item->short_description }}</td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.event.edit',$item->id) }}" class=" btn-edit ">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.event.delete',$item->id) }}" class=" btn-delete deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('.status').on('switchChange.bootstrapSwitch', function (event, state) {
                var staffId = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "",
                    data: {
                        id: staffId,
                        // status: state ? 1 : 0,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.success('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.error('Sorry something went to wrong');
                    }
                });
            });
        });
    </script>
@endpush
