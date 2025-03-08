@extends('admin.layouts.master')
@section('manage-certificate', 'menu-open')
@section('certificate_search', 'active')

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
                                    <form action="{{ route('admin.certificate.branch.student') }}" method="get"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class=" p-4">
                                            <div class="col-10 mx-auto">
                                                <div class="form-group">
                                                    <label for="">Branch Select<span class="text-danger">*</span></label>
                                                    <select name="branch_id" required
                                                        class="form-control custom_form_control">
                                                        <option value="">Select Branch
                                                        </option>
                                                        @foreach ($branches as $branch)
                                                        <option value="{{ $branch->id }}">
                                                            {{ $branch->institute_name_en }}  ( {{ $branch->center_code }})
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
                                                        class="btn btn_sub_info btn-lg ">Search</button>
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