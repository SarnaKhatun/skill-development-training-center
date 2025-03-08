@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('admission', 'active')
@section('main-content')
    <style>
        .btnsty {
            margin-right: 5px;
        }
        .nav-tabs {
            display: none !important;
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
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                Student Create</li>
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
                                <h3 class="card-title">Create Student</h3>
                                <a href="{{ route('admin.student.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                    <div class="col-12 col-md-8 offset-md-2">
                                        <div class="card-body">
                                            <div class="tabdiv">
                                                <form action="{{ route('admin.student.update',$student->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="personal-tab" data-toggle="tab"
                                                                href="#personal" role="tab" aria-controls="personal"
                                                                aria-selected="true">Personal Information</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " id="contact-tab" data-toggle="tab"
                                                                href="#contact" role="tab" aria-controls="contact"
                                                                aria-selected="false">Contact Information</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " id="education-tab" data-toggle="tab"
                                                                href="#education" role="tab" aria-controls="education"
                                                                aria-selected="false">Education Qualification</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " id="institute-tab" data-toggle="tab"
                                                                href="#institute" role="tab" aria-controls="institute"
                                                                aria-selected="false">Course Information</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="personal" role="tabpanel"
                                                            aria-labelledby="personal-tab">
                                                            <h4 class="text-center pb-3">Personal Information</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Name (en)  <small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="name_en"
                                                                            value="{{$student->name_en }}"
                                                                            class="form-control custom_form_control"
                                                                             required>
                                                                        <span class="text-danger">
                                                                            @error('name_en')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Name (bn)  <small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="name_bn"
                                                                            value="{{$student->name_bn}}"
                                                                            class="form-control custom_form_control"
                                                                             required>
                                                                        <span class="text-danger">
                                                                            @error('name_bn')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Fathers Name<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="fathers_name"
                                                                            value="{{$student->fathers_name}}"
                                                                            class="form-control custom_form_control"
                                                                             required>
                                                                        <span class="text-danger">
                                                                            @error('fathers_name')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Mothers Name<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="mothers_name"
                                                                            value="{{$student->mothers_name}}"
                                                                            class="form-control custom_form_control"
                                                                             required>
                                                                        <span class="text-danger">
                                                                            @error('mothers_name')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Date of Birth<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="date" name="dob"
                                                                            value="{{$student->dob}}"
                                                                            class="form-control custom_form_control"
                                                                             required>
                                                                        <span class="text-danger">
                                                                            @error('dob')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Nationality<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="nationality"
                                                                            value="{{$student->nationality}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required>
                                                                        <span class="text-danger">
                                                                            @error('nationality')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Gender<small
                                                                                class="text-danger">*</small></label>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" @if($student->gender=='Male') checked
                                                                                @endif name="gender" value="Male" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                                  Male
                                                                                </label>
                                                                              </div>
                                                                              <div class="form-check">
                                                                                <input class="form-check-input" type="radio" @if($student->gender=='Female') checked
                                                                                @endif name="gender" value="Female" name="flexRadioDefault" id="flexRadioDefault2">
                                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                                  Female
                                                                                </label>
                                                                              </div>
                                                                        <span class="text-danger">
                                                                            @error('gender')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Blood Group<small
                                                                                class="text-danger">*</small></label>
                                                                        <select name="blood_group" id="blood_group" required class="form-control custom_form_control">
                                                                            <option value="A+" @if($student->blood_group=="A+") selected
                                                                            @endif>A+</option>
                                                                            <option value="A-" @if($student->blood_group=="A-") selected
                                                                            @endif>A-</option>
                                                                            <option value="B+" @if($student->blood_group=="B+") selected
                                                                            @endif>B+</option>
                                                                            <option value="B-" @if($student->blood_group=="B-") selected
                                                                            @endif>B-</option>
                                                                            <option value="O+" @if($student->blood_group=="O+") selected
                                                                            @endif>O+</option>
                                                                            <option value="O-" @if($student->blood_group=="O-") selected
                                                                            @endif>O-</option>
                                                                            <option value="AB+" @if($student->blood_group=="AB+") selected
                                                                            @endif>AB+</option>
                                                                            <option value="AB-" @if($student->blood_group=="AB-") selected
                                                                            @endif>AB-</option>
                                                                            <option value="Unknown" @if($student->blood_group=="Unknown") selected
                                                                            @endif>Unknown</option>
                                                                        </select> 
                                                                        <span class="text-danger">
                                                                            @error('blood_group')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Religion<small
                                                                                class="text-danger">*</small></label>
                                                                        <select name="religion" id="religion" required class="form-control custom_form_control">
                                                                            <option value="">Select one</option>
                                                                            <option value="Muslim" @if($student->religion=="Muslim") selected
                                                                            @endif>Muslim</option>
                                                                            <option value="Hindu" @if($student->religion=="Hindu") selected
                                                                            @endif>Hindu</option>
                                                                            <option value="Buddhist" @if($student->religion=="Buddhist") selected
                                                                            @endif>Buddhist</option>
                                                                            <option value="Christian" @if($student->religion=="Christian") selected
                                                                            @endif>Christian</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('religion')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">NID/Birth Number</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="text" name="stu_nid" value="{{$student->stu_nid}}"
                                                                                    class="form-control custom_form_control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile">Image</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" name="image"
                                                                                    class="custom-file-input" id="imageInput">
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <img src="{{ asset($student->image) }}"
                                                                            id="imagePreview" class="custom-img"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 group-end" style="justify-content: end">
                                                                <a class="btn btn_new_info btnNext"><i class="fa-solid fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                            <h4 class="text-center pb-3">Contact Information</h4>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email">Email (student)<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="email" name="email"
                                                                            value="{{$student->email}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required>
                                                                        <span class="text-danger">
                                                                            @error('email')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Phone Number (Student)<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="phone"
                                                                            value="{{$student->phone}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                        <span class="text-danger">
                                                                            @error('phone')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Present Address <span style="font-size:12px">[House, Village, Post-office(code),Upazila, District]</span><small class="text-danger">*</small></label>
                                                                        <input type="text" required name="present_address" value="{{$student->present_address}}" class="form-control custom_form_control">
                                                                        <span class="text-danger">@error('present_address'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Premanent Address <span style="font-size:12px">[House, Village, Post-office(code),Upazila, District]</span><small class="text-danger">*</small></label>
                                                                        <input type="text" required name="premanent_address" value="{{$student->premanent_address}}" class="form-control custom_form_control">
                                                                        <span class="text-danger">@error('premanent_address'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Gurdian Phone Number<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="gurdian_phone"
                                                                            value="{{$student->gurdian_phone}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                        <span class="text-danger">
                                                                            @error('gurdian_phone')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 group-end" style="justify-content: end">
                                                                <a class="btn btn_new_black btnPrevious btnsty"><i class="fa-solid fa-arrow-left"></i></a>
                                                                <a class="btn btn_new_info btnNext btnsty"><i class="fa-solid fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                                            <h4 class="text-center pb-3">Academic  Information</h4>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Exam<small class="text-danger">*</small></label>
                                                                        <select name="exam_id" id="exam_id" required class="form-control custom_form_control">
                                                                            <option >Select One</option>
                                                                            @foreach ($examinations as $exam)
                                                                               <option value="{{ $exam->id }}" @if($student->exam_id==$exam->id) selected
                                                                               @endif>{{ $exam->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">@error('exam_id'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Board<small class="text-danger">*</small></label>
                                                                        <select name="board_id" id="board_id" required class="form-control custom_form_control">
                                                                            <option >Select One</option>
                                                                            @foreach ($boards as $board)
                                                                               <option value="{{ $board->id }}" @if($student->board_id==$board->id) selected
                                                                                @endif>{{ $board->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">@error('board_id'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Year<small class="text-danger">*</small></label>
                                                                        <select name="exam_year" id="exam_year" required class="form-control custom_form_control">
                                                                            <option >Select One</option>
                                                                            @foreach (generateYearList() as $year)
                                                                               <option value="{{ $year }}" @if($student->exam_year==$year) selected
                                                                                @endif>{{ $year }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">@error('exam_year'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Roll<small class="text-danger">*</small></label>
                                                                        <input type="text" required name="roll" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="{{$student->roll}}" class="form-control custom_form_control">
                                                                        <span class="text-danger">@error('roll'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Registration<small class="text-danger">*</small></label>
                                                                        <input type="text" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="registration" value="{{$student->registration}}" class="form-control custom_form_control">
                                                                        <span class="text-danger">@error('registration'){{ $message }}@enderror</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 group-end" style="justify-content: end">
                                                                <a class="btn btn_new_black btnPrevious btnsty"><i class="fa-solid fa-arrow-left"></i></a>
                                                                <a class="btn btn_new_info btnNext btnsty"><i class="fa-solid fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="institute" role="tabpanel"
                                                            aria-labelledby="institute-tab">
                                                            <h4 class="text-center pb-3">Course Information</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Admission Date<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="date" name="admission_date"
                                                                            value="{{$student->admission_date}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required>
                                                                        <span class="text-danger">
                                                                            @error('admission_date')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Session<small
                                                                                class="text-danger">*</small></label>
                                                                                <select name="session_id" id="session_id" required class="form-control custom_form_control">
                                                                                    <option >Select One</option>
                                                                                    @foreach ($sessions as $session)
                                                                                       <option value="{{ $session->id }}" @if($student->session_id==$session->id) selected
                                                                                        @endif>{{ $session->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                        <span class="text-danger">
                                                                            @error('session_id')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Session Year<small class="text-danger">*</small></label>
                                                                        <select name="session_year" id="year" required
                                                                            class="form-control custom_form_control">
                                                                            <option>Select One</option>
                                                                            @foreach (generateYearList() as $year)
                                                                                <option value="{{ $year }}" @if ($year==$student->session_year) selected @endif>{{ $year }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('session_year')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Session Start<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="date" name="session_start"
                                                                            value="{{$student->session_start}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required>
                                                                        <span class="text-danger">
                                                                            @error('session_start')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Session End<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="date" name="session_end"
                                                                            value="{{$student->session_end}}"
                                                                            class="form-control custom_form_control"
                                                                            id="" required>
                                                                        <span class="text-danger">
                                                                            @error('session_end')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Course<small
                                                                                class="text-danger">*</small></label>
                                                                                <select name="course_id" id="course_id" required class="form-control custom_form_control">
                                                                                    <option >Select One</option>
                                                                                    @foreach ($courses as $course)
                                                                                       <option value="{{ $course->id }}" @if($student->course_id==$course->id) selected
                                                                                        @endif>{{ $course->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                        <span class="text-danger">
                                                                            @error('course_id')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Batch<small
                                                                                class="text-danger">*</small></label>
                                                                                <select name="batch_id" id="batch_id" required class="form-control custom_form_control">
                                                                                    <option >Select One</option>
                                                                                    @foreach ($batches as $batch)
                                                                                       <option value="{{ $batch->id }}" @if($student->batch_id==$batch->id) selected
                                                                                        @endif>{{ $batch->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                        <span class="text-danger">
                                                                            @error('batch_id')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Admission Fee<small
                                                                                class="text-danger">*</small></label>
                                                                        <input type="text" name="admission_fee"
                                                                            value="{{$student->admission_fee}}"
                                                                            class="form-control custom_form_control"
                                                                            id="admission_fee" required oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                        <span class="text-danger">
                                                                            @error('admission_fee')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Discount</label>
                                                                        <input type="text" name="discount"
                                                                            value="{{$student->discount}}"
                                                                            class="form-control custom_form_control"
                                                                            id="discount"  oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                        <span class="text-danger">
                                                                            @error('discount')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Payable Amount<small
                                                                            class="text-danger">*</small></label>
                                                                        <input type="text" name="payable_amount"
                                                                            value="{{$student->payable_amount}}" readonly
                                                                            class="form-control custom_form_control"
                                                                            id="payable_amount"  oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                        <span class="text-danger">
                                                                            @error('payable_amount')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 group-end" style="justify-content: end">
                                                                <a class="btn btn_new_black btnPrevious btnsty"><i class="fa-solid fa-arrow-left"></i></a>
                                                                <button type="submit"
                                                                    class="btn btn_new_info btnSubmit btnsty">Submit</button>
                                                            </div>
                                                            <!--/. form element wrap -->

                                                        </div>
                                                    </div>
                                                </form>
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

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#imageInput').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btnNext').click(function() {
                var $nextTab = $('.nav-tabs .nav-link.active').parent().next('li').find('a');
                if ($nextTab.length > 0) {
                    $nextTab.tab('show');
                }
            });
            $('.btnPrevious').click(function() {
                var $prevTab = $('.nav-tabs .nav-link.active').parent().prev('li').find('a');
                if ($prevTab.length > 0) {
                    $prevTab.tab('show');
                }
            });
        });
    </script>
    <script>
         $(document).on('keyup', '#discount', function() {
            var admission_fee = parseFloat($('#admission_fee').val()) || 0;
            var value = parseFloat($(this).val()) || 0;
            discount = Math.min(value, admission_fee);
            var payable_amount = admission_fee - discount;
            if (discount > 0) {
                $('#payable_amount').val(payable_amount) || 0;
            } else {
                $('#payable_amount').val(admission_fee);
            }
            $('#discount').val(discount) || 0;
        });
        $(document).on('keyup', '#admission_fee', function() {
            var value = parseFloat($(this).val()) || 0;
            $('#discount').val('');
            $('#payable_amount').val(value);
        });
    </script>
@endpush