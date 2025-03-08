@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Course Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Course Details</li>
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
                                <h3 class="card-title">All course Details</h3>
                                  <a href="{{ route('admin.coursedetail.create') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i> Create <a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Lession</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">course</th>
                                            <th class="text-center">Video</th>
                                            <th class="text-center">Priority</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($coursedetails->isNotEmpty())
                                            @foreach($coursedetails as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->header_title ?? "" }}</td>
                                                    <td>{{$item->title ?? ''}}</td>
                                                    <td>{{$item->course->name ?? ''}} </td>
                                                    <td>
                                                         @if ($item->type==1)
                                                         @php
                                                            $embed_url = str_replace("watch?v=", "embed/", $item->url_video);
                                                         @endphp
                                                            <iframe width="200" class="embed-responsive-item" height="140" src="{{ $embed_url }}" frameborder="0" allowfullscreen></iframe>
                                                         @elseif ($item->type==2)
                                                          <video width="200" height="140" controls>
                                                            <source src="{{ asset($item->upload_video) }}" type="video/mp4">
                                                          </video>
                                                         @endif
                                                    </td>
                                                    <td>{{$item->priority}} </td>
                                                    <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                         @if ($item->status == 1)
                                                            <a href="{{ route('admin.coursedetail.statusChange', $item->id) }}"><span
                                                                    class="badge bg-primary">Active</span></a>
                                                        @else
                                                            <a href="{{ route('admin.coursedetail.statusChange', $item->id) }}"><span
                                                                    class="badge bg-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.coursedetail.all_details',$item->id) }}" class="btn-view">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.coursedetail.edit',$item->id) }}" class="btn-edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.coursedetail.delete',$item->id) }}" class=" btn-delete deleteButton" >
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