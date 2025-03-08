@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('admission', 'active')

@section('main-content')
    <style>
        .student-profile .card {
            border-radius: 10px;
        }

        .student-profile .card .card-header .profile_img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 10px auto;
            border: 10px solid #ccc;
            border-radius: 50%;
        }

        .student-profile .card h3 {
            font-size: 20px;
            font-weight: 700;
        }

        .student-profile .card p {
            font-size: 16px;
            color: #000;
        }

        .student-profile .table th,
        .student-profile .table td {
            font-size: 14px;
            padding: 5px 10px;
            color: #000;
        }
    </style>
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
                            <li class="breadcrumb-student"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-student active">Student</li>
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
                                <h3 class="card-title">Student Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Student Profile -->
                                <div class="student-profile p-5 ">
                                    <div class="student_data">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-transparent text-center">
                                                         @if ($student->image)
                                                            <img src="{{ asset($student->image) }}" class="profile_img"
                                                                alt="No Image">
                                                        @else
                                                            <img src="{{ asset('backend/images/no-image.png') }}"
                                                                class="profile_img" alt="No Image">
                                                        @endif
                                                        <h3>{{ $student->name_en ?? '' }}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0"><strong class="pr-1">Roll:</strong>{{ $student->student_roll }}</p>
                                                        <p class="mb-0"><strong
                                                                class="pr-1">Registration:</strong>{{ $student->student_registration_no }}</p>
                                                    </div>
                                                    
                                                    <div class="text-center pt-5 pb-3">
                                                        <button class="btn btn_new_info" style="width:65% !important"
                                                        data-toggle="modal" data-target="#changePassword"> Change password</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <h3 style="background-color: #5A66F1;color:white;text-align:center" class="p-1">Personal Information</h3>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">

                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%">Name in English</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->name_en ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Name in Bangla</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->name_bn ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Mobile Number</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->phone ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Email</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->email ?? '' }}</td>
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
                                                                        <th width="30%">Gurdian Phone</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->gurdian_phone ?? '' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%">Date Of Birth</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->dob ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">NID/Birth Number</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->stu_nid ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Gender</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->gender ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Bood Group</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->blood_group ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Nationality</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->nationality ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Religion</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->religion ?? '' }}</td>
                                                                    </tr>
                                                                     <tr>
                                                                        <th width="30%">Present Address</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->present_address ?? '' }}</td>
                                                                    </tr>
                                                                     <tr>
                                                                        <th width="30%">Permanent Address</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->premanent_address ?? '' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                @if ($student->document_image)
                                                <strong>Student Document :</strong>
                                                    <a href="{{ asset($student->document_image) }}" download>
                                                        <img src="{{ asset($student->document_image) }}" alt="No Image" width="100%" height="200">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-lg-9">
                                                <h3 style="background-color: #5A66F1;color:white;text-align:center" class="p-1">Course Information</h3>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%">Admission Date</th>
                                                                        <td width="2%">:</td>
                                                                        <td> {{ \Carbon\Carbon::parse($student->admission_date)->format('j F Y') }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Course Title</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->course->name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Session</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->session->name ?? '' }} - {{ $student->session_year ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Start Year</th>
                                                                        <td width="2%">:</td>
                                                                        <td> {{ \Carbon\Carbon::parse($student->session_start)->format('j F Y') }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">End Year</th>
                                                                        <td width="2%">:</td>
                                                                        <td>  {{ \Carbon\Carbon::parse($student->session_end)->format('j F Y') }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%">Batch</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->batch->name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Admission Fee</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->admission_fee ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Discount</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->discount ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Payable Amount</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->payable_amount ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Paid</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->paid ?? '' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                            </div>
                                            <div class="col-lg-9">
                                                <h3 style="background-color: #5A66F1;color:white;text-align:center" class="p-1">Academic Information</h3>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">

                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%">exam</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->exam->name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Board</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->board->name ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%">Passing Year</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->exam_year ?? '' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card shadow-sm">
                                                            <div class="card-header bg-transparent border-0">
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th width="30%"> Roll</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->roll ?? '' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="30%"> Registration</th>
                                                                        <td width="2%">:</td>
                                                                        <td>{{ $student->registration ?? '' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
     {{-- model --}}
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.student.password') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" value="{{ $student->id }}" name="std_id">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Password<small class="text-danger">*</small></label>
                                    <input type="text" name="password" value="{{ old('password') }}"
                                        class="form-control custom_form_control" id="" required>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush