@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('download', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Students Download
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-md-8  mx-auto">
                                    <div class="card-body">
                                        <form action="{{ route('admin.student.download') }}" method="get"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class=" p-4">
                                                <div class="col-10 mx-auto">
                                                    <div class="form-group">
                                                        <label for="">Branch Select<span
                                                                class="text-danger">*</span></label>
                                                        <select name="branch_id" required
                                                            class="form-control custom_form_control">
                                                            <option value="">Select Branch</option>
                                                            @if (Auth::guard('admin')->user()->branch_id == 1)
                                                                <option value="0">All</option>
                                                            @endif
                                                            @foreach ($branches as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->institute_name_en }}
                                                                    ({{ $item->center_code }})</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">
                                                            @error('time')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-10 mx-auto">
                                                    <div class="form-group">
                                                        <label for="">Year<small
                                                                class="text-danger">*</small></label>
                                                        <select name="year" id="year" required
                                                            class="form-control custom_form_control">
                                                            <option>Select One</option>
                                                            @foreach (generateYearList() as $year)
                                                                <option value="{{ $year }}">{{ $year }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">
                                                            @error('year')
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
    <script></script>
@endpush