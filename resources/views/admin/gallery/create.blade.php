@extends('admin.layouts.master')

@section('gallery', 'active')

@push('css')
    <style>
        .card-body.toggle__body {
            position: relative;
        }

        .nav-item.dropdown.toggle__dropdown {
            position: absolute;
            z-index: 999;
            right: 0;
        }
        .nav-item.dropdown.toggle__dropdown i {
            background: #656dc7bf;
            color: #fff;
            width: 30px;
            height: 30px;
            transition: all .5s ease;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
        }

        .nav-item.dropdown.toggle__dropdown i:hover {
            background: #5a66f1;
        }
        .nav-item.dropdown.toggle__dropdown a.nav-link {
            padding-right: 12px;
            padding-top: 12px;
        }
    </style>
@endpush

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Galleries</li>
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
                                <h3 class="card-title">All User</h3>
                                <a href="{{ route('admin.staff.create') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i>
                                    Create
                                    <a>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@push('js')

@endpush
