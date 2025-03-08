@extends('admin.layouts.master')
@section('manage-branch', 'menu-open')
@section('branch', 'active')
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
                        <h1>Branch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                Branch Edit</li>
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
                                <h3 class="card-title">Edit Branch</h3>
                                <a href="{{ route('admin.branch.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <div class="tabdiv">
                                            <form action="{{ route('admin.branch.update', $branch->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="personal-tab" data-toggle="tab"
                                                            href="#personal" role="tab" aria-controls="personal"
                                                            aria-selected="true">Personal Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " id="contact-tab" data-toggle="tab"
                                                            href="#contact" role="tab" aria-controls="contact"
                                                            aria-selected="false">institute
                                                            Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " id="institute-tab" data-toggle="tab"
                                                            href="#institute" role="tab" aria-controls="institute"
                                                            aria-selected="false">Institute <i>Info</i></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="personal" role="tabpanel"
                                                        aria-labelledby="personal-tab">
                                                        <h4 class="text-center pb-3">Personal Information</h4>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Name <small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="name" required
                                                                        value="{{ $branch->name }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('name')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Fathers Name<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="fathers_name" required
                                                                        value="{{ $branch->fathers_name }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('fathers_name')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="email" name="email" required
                                                                        value="{{ $branch->email }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('email')
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
                                                                        value="{{ $branch->mothers_name }}" required
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('mothers_name')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="phone" required
                                                                        value="{{ $branch->phone }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('phone')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Nationality<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" required name="nationality"
                                                                        value="{{ $branch->nationality }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
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
                                                                    {{-- <input type="text" name="gender"
                                                                            value="{{$branch->gender}}"
                                                                            class="form-control custom_form_control"
                                                                            id=""> --}}
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender"
                                                                            @if ($branch->gender = 'Male') checked @endif
                                                                            value="Male" name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender"
                                                                            @if ($branch->gender = 'Female') checked @endif
                                                                            value="Female" name="flexRadioDefault"
                                                                            id="flexRadioDefault2">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
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
                                                                    <label for="">Religion<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="religion"
                                                                        value="{{ $branch->religion }}" required
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('religion')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Image</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="image"
                                                                                value="{{ $branch->image }}"
                                                                                class="custom-file-input" id="imageInput">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    @if ($branch->image)
                                                                        <img src="{{ asset($branch->image) }}"
                                                                            class="custom-img-style mt-3" alt="No Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <img src="{{ asset('backend/images/no-image.png') }}"
                                                                        id="imagePreview" class="custom-img"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3 group-end"
                                                            style="justify-content: end">
                                                            <a class="btn btn-success btnNext">Next</a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                                        aria-labelledby="contact-tab">
                                                        <h4 class="text-center pb-3">Contact Information</h4>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Division<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="division_id" id="division_id"
                                                                        class="form-control custom_form_control" required>
                                                                        <option>Select One</option>
                                                                        @foreach (get_divisions() as $division)
                                                                            <option value="{{ $division->id }}"
                                                                                @if ($division->id == $branch->division_id) selected @endif>
                                                                                {{ $division->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('division_id')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">District<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="district_id" id="district_id"
                                                                        class="form-control custom_form_control" required>
                                                                        @foreach (get_district_by_division_id($branch->division_id) as $district)
                                                                            <option value="{{ $district->id }}"
                                                                                @if ($district->id == $branch->district_id) selected @endif>
                                                                                {{ $district->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('district_id')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Upazilla<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="upazilla_id" id="upazilla_id"
                                                                        class="form-control custom_form_control" required>
                                                                        @foreach (get_upazilla_by_district_id($branch->district_id) as $upazilla)
                                                                            <option value="{{ $upazilla->id }}"
                                                                                @if ($upazilla->id == $branch->upazilla_id) selected @endif>
                                                                                {{ $upazilla->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('upazilla_id')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Post Office<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" required name="post_office"
                                                                        value="{{ $branch->post_office }}"
                                                                        class="form-control custom_form_control">
                                                                    <span class="text-danger">
                                                                        @error('post_office')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Address<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" required name="address"
                                                                        value="{{ $branch->address }}"
                                                                        class="form-control custom_form_control">
                                                                    <span class="text-danger">
                                                                        @error('address')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3 group-end"
                                                            style="justify-content: end">
                                                            <a class="btn btn-danger btnPrevious btnsty">Previous</a>
                                                            <a class="btn btn-success btnNext btnsty">Next</a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="institute" role="tabpanel"
                                                        aria-labelledby="institute-tab">
                                                        <h4 class="text-center pb-3">Institute Information</h4>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Institute Name (En)<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="institute_name_en"
                                                                        value="{{ $branch->institute_name_en }}"
                                                                        class="form-control custom_form_control" required
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('institute_name_en')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Institute Name (Bn)<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="institute_name_bn"
                                                                        value="{{ $branch->institute_name_bn }}" required
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('institute_name_bn')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Institute Age<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="text" name="institute_age"
                                                                        value="{{ $branch->institute_age }}" required
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('institute_age')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Institute Email<small
                                                                            class="text-danger">*</small></label>
                                                                    <input type="email" name="institute_email"
                                                                        value="{{ $branch->institute_email }}"
                                                                        class="form-control custom_form_control"
                                                                        id="" required>
                                                                    <span class="text-danger">
                                                                        @error('institute_email')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="institute_division">Institute
                                                                        Division<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="institute_division"
                                                                        id="institute_division"
                                                                        class="form-control custom_form_control" required>
                                                                        @foreach (get_divisions() as $division)
                                                                            <option value="{{ $division->id }}"
                                                                                @if ($division->id == $branch->institute_division) selected @endif>
                                                                                {{ $division->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('institute_division')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Institute District<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="institute_district"
                                                                        id="institute_district"
                                                                        class="form-control custom_form_control" required>
                                                                        @foreach (get_district_by_division_id($branch->division_id) as $district)
                                                                            <option value="{{ $district->id }}"
                                                                                @if ($district->id == $branch->institute_district) selected @endif>
                                                                                {{ $district->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('institute_district')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Institute Upazilla<small
                                                                            class="text-danger">*</small></label>
                                                                    <select name="institute_upazilla"
                                                                        id="institute_upazilla"
                                                                        class="form-control custom_form_control" required>
                                                                        @foreach (get_upazilla_by_district_id($branch->district_id) as $upazilla)
                                                                            <option value="{{ $upazilla->id }}"
                                                                                @if ($upazilla->id == $branch->institute_upazilla) selected @endif>
                                                                                {{ $upazilla->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('institute_upazilla')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="youtube_link">Institute Post Code</label>
                                                                    <input type="text" name="institute_post_code"
                                                                        value="{{ $branch->institute_post_code }}"
                                                                        required class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('institute_post_code')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="institute_address">Institute
                                                                        Address</label>
                                                                    <input type="text" name="institute_address"
                                                                        value="{{ $branch->institute_address }}" required
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('institute_address')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="facebook_link">Facebook Link</label>
                                                                    <input type="text" name="facebook_link"
                                                                        value="{{ $branch->facebook_link }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('facebook_link')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="youtube_link">Youtube Link</label>
                                                                    <input type="text" name="youtube_link"
                                                                        value="{{ $branch->youtube_link }}"
                                                                        class="form-control custom_form_control"
                                                                        id="">
                                                                    <span class="text-danger">
                                                                        @error('youtube_link')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">NID Card Image</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="nid_card_img"
                                                                                class="custom-file-input" id=""
                                                                                value="{{ $branch->nid_card_img }}">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    @if ($branch->nid_card_img)
                                                                        <img src="{{ asset($branch->nid_card_img) }}"
                                                                            class="custom-img-style mt-3" alt="No Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Trade Licence
                                                                        Image</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="trade_licence_img"
                                                                                class="custom-file-input" id=""
                                                                                value="{{ $branch->trade_licence_img }}">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    @if ($branch->trade_licence_img)
                                                                        <img src="{{ asset($branch->trade_licence_img) }}"
                                                                            class="custom-img-style mt-3" alt="No Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Signature Image (width: 80px, height:40px)</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="signature_img"
                                                                                class="custom-file-input" id=""
                                                                                value="{{ $branch->signature_img }}">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    @if ($branch->signature_img)
                                                                        <img src="{{ asset($branch->signature_img) }}"
                                                                            class="custom-img-style mt-3" alt="No Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3 group-end"
                                                            style="justify-content: end">
                                                            <a class="btn btn-danger btnPrevious btnsty">Previous</a>
                                                            <button type="submit"
                                                                class="btn btn-success btnSubmit btnsty">Submit</button>
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
        $(document).ready(function() {
            $('#division_id').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('admin/get-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html(
                                '<option value="" >Select District</option>'
                            );
                            $.each(data, function(key, value) {
                                console.log(value.name_en)
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name) +
                                    '</option>');
                            });
                            $('select[name="upazilla_id"]').html(
                                '<option value=""  disabled>Select Upazilla</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('admin/get-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="upazilla_id"]').html(
                                '<option value="" >Select upazilla</option>'
                            );
                            $.each(data, function(key, value) {
                                console.log(value.name_en)
                                $('select[name="upazilla_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name) +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#institute_division').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('admin/get-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="institute_district"]').html(
                                '<option value="" >Select Institute District</option>'
                            );
                            $.each(data, function(key, value) {
                                console.log(value.name_en)
                                $('select[name="institute_district"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name) +
                                    '</option>');
                            });
                            $('select[name="institute_upazilla"]').html(
                                '<option value=""  disabled>Select Institute Upazilla</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            $('#institute_district').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('admin/get-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="institute_upazilla"]').html(
                                '<option value="" >Select Institute upazilla</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="institute_upazilla"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name) +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        });
    </script>
@endpush