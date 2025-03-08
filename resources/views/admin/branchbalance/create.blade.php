@extends('admin.layouts.master')
@section('manage-balance', 'menu-open')
@section('balance_add', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New Recharge</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">New Recharge</li>
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
                                     <h4 style="text-align:center">Make New Recharge</h4>
                                        <form action="{{ route('admin.branchbalance.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row p-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Amount <small class="text-danger">*</small></label>
                                                        <input type="text" name="amount" value="{{ old('amount') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('amount'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="username">Payment Method<small class="text-danger">*</small></label>
                                                        <select name="method_id" id="" class="form-control custom_form_control" >
                                                            <option value="">Select Payment Method</option>
                                                            @foreach ($paymentmethods as $method)
                                                               <option value="{{ $method->id }}">{{ $method->method }} ({{ $method->percentage }}%)</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">@error('method_id'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">Sender Number / Check Number<small class="text-danger">*</small></label>
                                                        <input type="text" name="trx" value="{{ old('trx') }}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('trx'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="phone">Payment Date<small class="text-danger">*</small></label>
                                                        <input type="date" name="date" value="{{ old('date') }}" class="form-control custom_form_control" id="">
                                                        <span class="text-danger">@error('date'){{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center pt-5">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_sub_info ">Submit</button>
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
