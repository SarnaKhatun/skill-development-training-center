@extends('admin.layouts.master')
@section('manage-staff', 'menu-open')
@section('staff', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Teachers Edit</li>
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
                                <h3 class="card-title">Edit Teacher</h3>
                                <a href="{{ route('admin.staff.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card-body">
                                        <form action="{{ route('admin.staff.update',$staff->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Name <small class="text-danger">*</small></label>
                                                        <input type="text" name="name" value="{{ $staff->name }}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email<small class="text-danger">*</small></label>
                                                        <input type="email" name="email" value="{{ $staff->email }}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number<small class="text-danger">*</small></label>
                                                        <input type="text" name="phone" value="{{$staff->phone}}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password">Password<small class="text-danger">*</small></label>
                                                        <input type="password" name="password" value="{{old('password')}}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="imageInput">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        @if($staff->image)
                                                            <img  src="{{ asset($staff->image) }}" class="custom-img-style" alt="No Image">
                                                        @else
                                                        <img src="{{ asset('backend/images/no-image.png') }}" id="imagePreview" class="custom-img" alt="">
                                                        @endif
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
@endpush