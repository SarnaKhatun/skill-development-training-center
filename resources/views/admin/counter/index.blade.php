@extends('admin.layouts.master')
@section('manage-frontend', 'menu-open')
@section('counter', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>counter</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">counter</li>
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
                                     <h4 style="text-align:center">Counter</h4>
                                    @if(!isset($counter))
                                        <form action="{{ route('admin.counter.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Completed Students <small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o1" value="{{ old('count_o1') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o1'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Expert Instructor<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o2" value="{{ old('count_o2') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o2'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">Tutorials in our store<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o3" value="{{ old('count_o3') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o3'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="phone">Students get employed<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o4" value="{{ old('count_o4') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o4'){{ $message }} @enderror</span>
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
                                        <form action="{{ route('admin.counter.update',$counter->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row p-5 ">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Completed Students <small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o1" value="{{ $counter->count_o1 }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o1'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Expert Instructor<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o2" value="{{ $counter->count_o2 }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o2'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">Tutorials in our store<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o3" value="{{ $counter->count_o3 }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o3'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="phone">Students get employed<small class="text-danger">*</small></label>
                                                        <input type="text" name="count_o4" value="{{ $counter->count_o4 }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('count_o4'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-7 ">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info float-right">Update</button>
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
