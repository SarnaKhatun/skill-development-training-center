@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>course</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">course</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All course</h3>
                                <a href="{{ route('admin.course.create') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i>
                                    Create
                                <a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th class="text-center">Course Fee</th>
                                            <th class="text-center">Discount</th>
                                            <th>Total Video</th>
                                            <th>Total Hours</th>
                                            <th>Total Sheet</th>
                                            <th>Total MCQ</th>
                                            <th>Priority</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($courses->isNotEmpty())
                                            @foreach($courses as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? "" }}</td>
                                                    <td>{{$item->course_fee}}</td>
                                                    <td>{{$item->discount}} </td>
                                                    <td>{{$item->total_video}} </td>
                                                    <td>{{$item->total_hours}} </td>
                                                    <td>{{$item->total_sheet}} </td>
                                                    <td>{{$item->total_mcq}} </td>
                                                    <td>{{$item->priority}} </td>
                                                    <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        @if ($item->status == 1)
                                                            <a href="{{ route('admin.course.statusChange', $item->id) }}"><span
                                                                    class="badge bg-primary">Active</span></a>
                                                        @else
                                                            <a href="{{ route('admin.course.statusChange', $item->id) }}"><span
                                                                    class="badge bg-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.course.show',$item->id) }}" class=" btn-view">
                                                                <i class="fa fa-eye"></i>
                                                             </a>
                                                            <a href="{{ route('admin.course.edit',$item->id) }}" class="btn-edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.course.delete',$item->id) }}" class=" btn-delete deleteButton" >
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
@endpush