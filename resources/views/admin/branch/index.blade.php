@extends('admin.layouts.master')
@section('manage-branch', 'menu-open')
@section('branch', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Branch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Branch</li>
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
                                <h3 class="card-title">All Branch</h3>
                                <a href="{{ route('admin.branch.create') }}" class="btn btn_new_info float-right">
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Institute Name</th>
                                            <th>Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($branches->isNotEmpty())
                                            @foreach($branches as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        @if($item->image)
                                                            <img  src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name ?? "" }}</td>
                                                    <td>{{ $item->email ?? "" }}</td>
                                                    <td>{{ $item->phone ?? "" }}</td>
                                                     <td>{{ $item->institute_name_en ?? "" }}  ({{ $item->center_code ?? "" }})</td>
                                                    <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        @if ($item->status == 1)
                                                            <a href="{{ route('admin.branch.statusChange', $item->id) }}"><span
                                                                    class="badge bg-primary">Active</span></a>
                                                        @else
                                                            <a href="{{ route('admin.branch.statusChange', $item->id) }}"><span
                                                                    class="badge bg-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                   <span class="action-btn">
                                                       <a href="{{ route('admin.branch.edit',$item->id) }}" class=" btn-edit ">
                                                          <i class="fa fa-edit"></i>
                                                       </a>
                                                       <a href="{{ route('admin.branch.show',$item->id) }}" class=" btn-view">
                                                          <i class="fa fa-eye"></i>
                                                       </a>
                                                       {{-- <a href="{{ route('admin.branch.delete',$item->id) }}" class=" btn-delete deleteButton">
                                                          <i class="fa fa-trash"></i>
                                                       </a> --}}
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
@endpush