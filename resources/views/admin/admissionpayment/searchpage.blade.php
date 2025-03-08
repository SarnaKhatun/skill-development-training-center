@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('admissionPayment', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Admission Payment</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.admissionPayment.search') }}" method="get">
                                    @csrf
                                    <div class="row p-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Student Roll<span
                                                    class="text-danger">*</span></label>
                                                <input type="text" name="search" required
                                                    value="{{ old('search') }}"
                                                    class="form-control custom_form_control"
                                                    id="" >
                                                <span class="text-danger">
                                                    @error('search')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
