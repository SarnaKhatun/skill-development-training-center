@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('due_download', 'active')

@section('main-content')
<div class="content-wrapper mb-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Due Fees</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Due Fees</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Due Fees download
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8  mx-auto">
                                <div class="card-body">
                                    <form action="{{ route('admin.student.due.download') }}" method="get"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class=" p-4">
                                            <div class="col-10 mx-auto">
                                                <div class="form-group">
                                                    <label for="">Batch Select<span class="text-danger">*</span></label>
                                                    <select name="batch_id" required
                                                        class="form-control custom_form_control">
                                                        <option value="">Select Batch
                                                        </option>
                                                        <option value="0">All
                                                        </option>
                                                        @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}">
                                                            {{ $batch->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        @error('time')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-10 mx-auto text-center">
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn_sub_info btn-lg ">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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