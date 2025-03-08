@extends('student.layouts.master')
@section('manage-password', 'menu-open')
@section('password', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Password</li>
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
                                {{-- <h3 class="card-title text-center"> counter</h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="card-body">
                                     <h4 style="text-align:center">Change Password</h4>
                                    <form action="{{ route('update.password',$user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row p-5">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Old Password <small class="text-danger">*</small></label>
                                                    <input type="text" name="old_password" class="form-control custom_form_control" id="">
                                                    <span class="text-danger">@error('old_password'){{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">New Password<small class="text-danger">*</small></label>
                                                    <input type="text" name="password"  class="form-control custom_form_control" id="">
                                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
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
