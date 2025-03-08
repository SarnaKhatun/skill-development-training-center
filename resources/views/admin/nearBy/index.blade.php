@extends('admin.layouts.master')
@section('manage-nearby', 'menu-open')
@section('nearby', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Event</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Nearby</li> --}}
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
                                <h3 class="card-title">All Request</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>District</th>
                                            <th>Upazilla</th>
                                            <th>Address</th>
                                            <th>Message</th>
                                            <th>Request Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($nearby->isNotEmpty())
                                            @foreach($nearby as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? "" }}</td>
                                                    <td>{{ $item->phone ?? "" }}</td>
                                                    <td>{{ $item->district->name ?? "" }}</td>
                                                    <td>{{ $item->upazilla->name }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->message }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.nearbyRequest.delete', $item->id) }}" class=" btn-delete deleteButton"
                                                           title="{{ __('delete') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
@endpush
