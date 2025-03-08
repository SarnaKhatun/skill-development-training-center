@extends('admin.layouts.master')
@section('manage-notefile', 'menu-open')
@section('index', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>File/Note</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">File/Note</li>
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
                                <h3 class="card-title">All File/Note</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($files->isNotEmpty())
                                            @foreach ($files as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->title ?? '' }}</td>
                                                    <td>{{ $item->description ?? '' }}</td>
                                                    <td>
                                                       {{$item->date}}
                                                    </td>
                                                    {{-- <td>{{ date('d M Y', strtotime($item->created_at)) }}</td> --}}
                                                    <td class="text-center">
                                                        <span class="action-btn ">
                                                            <a href="{{route('admin.file.download', $item->id)  }}" class="btn-green"><i class="fa-solid fa-download"></i></a>
                                                           @if(Auth::user()->role==1)
                                                            <a href="{{ route('admin.file.destroy', $item->id) }}"
                                                                class=" btn-delete deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @endif
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