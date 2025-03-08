@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('admission', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job Info</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Job Info</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                               <h3 class="card-title text-center"> Student Information</h3>
                            </div>
                            <div class="row p-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Name</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->name_en ?? '' }}</td>
                                    </tr>
                                     <tr>
                                        <th width="30%">Father's Name</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->fathers_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Mother's Name</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->mothers_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Roll</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->student_roll ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Registration</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->student_registration_no ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Course</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->course->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Company Name</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->company_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Job Title</th>
                                        <td width="2%">:</td>
                                        <td>{{ $student->job_title ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Job Status</th>
                                        <td width="2%">:</td>
                                        <td>
                                            @if($student->job_status == 0)
                                              Unemployed
                                            @else
                                              Employed
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row p-5">
                                <div class="card-body">
                                     <h4 style="text-align:center">Student Job Information:</h4>
                                        <form action="{{ route('admin.student.job_update',$student->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Company Name <small class="text-danger">*</small></label>
                                                        <input type="text" name="company_name" value="{{$student->company_name}}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('company_name'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Job Title<small class="text-danger">*</small></label>
                                                        <input type="text" name="job_title" value="{{ $student->job_title}}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('job_title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Job Status<small class="text-danger">*</small></label>
                                                        <input type="checkbox"  name="job_status"  class="status" {{ $student->job_status ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                                        <span class="text-danger">@error('job_status'){{ $message }} @enderror</span>
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