@extends('admin.layouts.master')
@section('manage-certificate', 'menu-open')
@section('certificate_create', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Certificate</li>
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
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="card-body">
                                     <h4 style="text-align:center">Certificate Delivery Request</h4>
                                        <form action="{{ route('admin.certificate.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row p-5">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Number of Certificates <small class="text-danger">*</small></label>
                                                        <input type="text" name="total_student" required value="{{ old('total_student') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="" placeholder="মোট সার্টিফিকেটের সংখ্যা">
                                                        <span class="text-danger">@error('total_student'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Message<small class="text-danger">*</small></label>
                                                        <textarea name="message" id="" cols="30" rows="10" required class="form-control" placeholder="এই ডেলিভারি সম্পকে কিছু চাইলে লিখতে পারেন। অথবা কমা ব্যবহার করে ছাত্রছাত্রীর রোলগুলো লিখতে পারেন। "></textarea>
                                                        <span class="text-danger">@error('trx'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Courier Address<small class="text-danger">*</small></label>
                                                        <textarea name="courier_address" id="" cols="30" rows="10" class="form-control" placeholder="এই ডেলিভারি সম্পকে কিছু চাইলে লিখতে পারেন। অথবা কমা ব্যবহার করে ছাত্রছাত্রীর রোলগুলো লিখতে পারেন। "></textarea>
                                                        <span class="text-danger">@error('trx'){{ $courier_address }} @enderror</span>
                                                    </div>
                                                </div>
                                                <p style="font-size: 14px;color:red">সার্টিফিকেটের কুরিয়ার চার্জ আপনার একাউন্ট ব্যালেন্স থেকে কেটে নেওয়া হবে।</p>
                                                <p style="font-size: 14px">পার্সেল আপনার কাছে পৌঁচতে ডেরিভারি এপ্রুভ হতে কমপক্ষে ৩ দিন সময় লাগবে।</p>
                                                <div class="col-12 text-center pt-5">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info">Submit</button>
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
