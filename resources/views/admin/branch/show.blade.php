@extends('admin.layouts.master')
@section('manage-branch', 'menu-open')
@section('branch', 'active')
@section('main-content')
    <style>
        .img_size{
            width: 40%;
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
                                Branch Show</li>
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
                                <h3 class="card-title">Show Branch</h3>
                                <a href="{{ route('admin.branch.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="card p-4">
                                                        <h3>Personal Information</h3>
                                                        <p><strong>Name :</strong>{{ $branch->name }}</p>
                                                        <p><strong>Email :</strong> {{ $branch->email }}</p>
                                                        <p><strong>Phone :</strong> {{ $branch->phone }}</p>
                                                        <p><strong>Fathers Name :</strong> {{ $branch->fathers_name }}</p>
                                                        <p><strong>Mothers Name :</strong> {{ $branch->mothers_name }}</p>
                                                        <p><strong>Nationality :</strong> {{ $branch->nationality }}</p>
                                                        <p><strong>Gender :</strong> {{ $branch->gender }}</p>
                                                        <p><strong>Religion :</strong> {{ $branch->religion }}</p>
                                                    </div>
                                                    @if(Auth::user()->role==1 && $branch->id !=1)
                                                        <div class="text-center pt-5">
                                                            <button class="btn btn_new_info" style="width:65% !important"
                                                            data-toggle="modal" data-target="#changePassword"> Change password</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-3">
                                                    <div class="card p-4">
                                                        <h3>Institute Information</h3>
                                                        <p><strong>Center Code :</strong> {{ $branch->center_code }}</p>
                                                        <p><strong>Institute Name (en) :</strong> {{ $branch->institute_name_en }}</p>
                                                        <p><strong>Institute Name (bn) :</strong> {{ $branch->institute_name_bn }}</p>
                                                        <p><strong>Institute Age :</strong> {{ $branch->institute_age }}</p>
                                                        <p><strong>Institute Division :</strong> {{ $branch->division->name }}</p>
                                                        <p><strong>Institute District :</strong> {{ $branch->district->name  }}</p>
                                                        <p><strong>Institute Upazilla :</strong> {{ $branch->upazilla->name }}</p>
                                                        <p><strong>Institute Post Code :</strong> {{ $branch->institute_post_code }}</p>
                                                        <p><strong>Institute Address :</strong> {{ $branch->institute_address }}</p>
                                                        <p><strong>Facebook Link :</strong> {{ $branch->facebook_link }}</p>
                                                        <p><strong>Youtube Link :</strong> {{ $branch->youtube_link }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="card p-4">
                                                        <h3>Contact Information</h3>
                                                        <p><strong>Division :</strong>{{ $branch->division->name }}</p>
                                                        <p><strong>District :</strong>{{ $branch->district->name }}</p>
                                                        <p><strong>Upazilla :</strong>{{ $branch->upazilla->name }}</p>
                                                        <p><strong>Post Office :</strong>{{ $branch->post_office }}</p>
                                                        <p><strong>Address :</strong>{{ $branch->address }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-3 text-center">
                                                   <div class="img-box">
                                                        <strong>Image</strong><br>
                                                        @if($branch->image)
                                                            <img  src="{{ asset($branch->image) }}" class="img_size" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                   </div>
                                                   <div class="img-box">
                                                        <strong>NID Card Image</strong><br>
                                                        @if($branch->nid_card_img)
                                                            <img  src="{{ asset($branch->nid_card_img) }}" class="img_size" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                   </div>
                                                   <div class="img-box">
                                                        <strong>Trade Licence Image</strong><br>
                                                        @if($branch->trade_licence_img)
                                                            <img  src="{{ asset($branch->trade_licence_img) }}" class="img_size" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                   </div>
                                                   <div class="img-box">
                                                        <strong>Signature Image</strong><br>
                                                        @if($branch->signature_img)
                                                            <img  src="{{ asset($branch->signature_img) }}" class="img_size" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
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
 <!-- Modal -->
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
             <form action="{{ route('admin.branch.password') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row">
                    <input type="hidden" value="{{$branch->admin_id}}" name="admin_id">
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
