@extends('admin.layouts.master')
@section('manage-notefile', 'menu-open')
@section('create', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>File</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">File</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title text-center"> counter</h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="card-body">
                                     <h4 style="text-align:center">File Upload</h4>
                                        <form action="{{ route('admin.file.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Title <small class="text-danger">*</small></label>
                                                        <input type="text" name="title" value="{{ old('title') }}"  class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="username">Date<small class="text-danger">*</small></label>
                                                        <input type="date" name="date" value="{{ old('date') }}"  class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('date'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="email">File<small class="text-danger">*</small></label>
                                                        <input type="file" name="file" value="{{ old('file') }}"  class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('file'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Short Description<small class="text-danger">*</small></label>
                                                        <textarea name="description" id="" cols="30" rows="4" class="form-control ">{{ old('description') }}</textarea>
                                                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </div>
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
