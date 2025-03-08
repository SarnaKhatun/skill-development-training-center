@extends('admin.layouts.master')
@section('manage-frontend', 'menu-open')
@section('bannerSection', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Banner Section</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Banner Section</li>
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
                                {{-- <h3 class="card-title text-center"> bannerSection</h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="card-body">
                                     <h4 style="text-align:center">Banner Section</h4>
                                    @if(!isset($bannerSection))
                                        <form action="{{ route('admin.bannerSection.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Title <small class="text-danger">*</small></label>
                                                        <input type="text" name="title" value="{{ old('title') }}" required class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Sub Title<small class="text-danger">*</small></label>
                                                        <input type="text" name="sub_title" value="{{ old('sub_title') }}" required class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('sub_title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">You tube Link</label>
                                                        <input type="text" name="youtube_link" value="{{ old('youtube_link') }}"  class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('youtube_link'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Image<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" required
                                                                    class="custom-file-input" id="imageInput">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="{{ asset('backend/images/no-image.png') }}"
                                                            id="imagePreview" class="custom-img" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Description<small class="text-danger">*</small></label>
                                                         <textarea name="description" id="" required class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                                                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.bannerSection.update',$bannerSection->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Title <small class="text-danger">*</small></label>
                                                        <input type="text" name="title" value="{{ $bannerSection->title }}" required class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Sub Title<small class="text-danger">*</small></label>
                                                        <input type="text" name="sub_title" value="{{ $bannerSection->sub_title }}" required class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('sub_title'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">You tube Link</label>
                                                        <input type="text" name="youtube_link" value="{{ $bannerSection->youtube_link }}"  class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('youtube_link'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Image<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" 
                                                                    class="custom-file-input" id="imageInput">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="{{ asset($bannerSection->image) }}"
                                                            id="imagePreview" class="custom-img" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Description<small class="text-danger">*</small></label>
                                                         <textarea name="description" id="" required class="form-control" cols="30" rows="10">{{$bannerSection->description}}</textarea>
                                                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
