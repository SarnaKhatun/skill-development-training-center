@extends('admin.layouts.master')
{{-- @section('dashboard')
    active
@endsection --}}
@section('main-content')
    <style>
        .container {
            max-width: 1500px;
        }

        .small-box {
            transition: all .5s ease-in-out;
            padding: 22px;
        }

        .small-box:hover {
            margin-top: -5px;
        }

        .card__header {
            height: 140px;
            display: flex;
            /* justify-content: center; */
            align-items: center;
        }

        ul li {
            list-style: none
        }

        p {
            margin-bottom: 0;
        }
        .small-box .icon>i{
            font-size: 70px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Dashboard</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container card pt-2 px-3">
                <!-- Small boxes (Stat box) -->
                <div class="row w-100 card p-3" style="background-color: beige">
                    <div class="col-12 col-ms-sm-12 col-md-10">
                        <div class="row">
                            <div class="col-12 col-xl-2">
                                <div class="logo">
                                    @if(get_setting('header_logo') && get_setting('header_logo')->value)
                                        <img src="{{ asset(get_setting('header_logo')->value) }}" style="width: 110px; object-fit:cover">
                                    @else
                                        <img  src="https://sydtcenter.org/admin/files/company/syd logo Final 03-03-23.png"  style="width: 110px;object-fit:cover">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-xl-10">
                                <div class="content">
                                    <h3 style="color: #FF0000">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার অনুমোদিত </h3>
                                    <p style="color: #450080">Skills Development Training Ltd. পরিচালিত </p>
                                    <p style="color:#FF0000">গভঃ রেজিঃ নং- C-192419/2023 , Centre
                                        Code:{{ $branch->center_code }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100 card p-3 ">
                    <div class="row bg-success p-3"
                        style="display: flex;
                    align-items: center;
                    justify-content: center;">
                        <div class="col-12 col-ms-sm-12 col-md-10 ">
                            <div class="content text-center">
                                <h3>{{ $branch->institute_name_bn }} </h3>
                                <p style="color: #FFFF00">প্রযুক্তির সঠিক ব্যবহার নিশ্চিত করি, স্বনির্ভর বাংলাদেশ গড়ে তুলি...</p>  
                                <p style="color: #fffffe">{{ get_setting('address')->value ?? 'N/A' }} , Phone
                                    :{{ get_setting('phone')->value ?? 'N/A' }}
                                    ,{{ get_setting('whats_up')->value ?? 'N/A' }}</p>
                                <p style="color: #fffffe">Website: <span><a href="{{ route('home') }}"
                                            style="text-decoration: none;color:#450080">sdtl.com.bd</a></span> , Email
                                    :{{ get_setting('email')->value ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- small box -->
                            <div class="small-boxa">
                                <div class="notices d-flex items-center">
                                    <h4 class="mb-0 d-flex pl-3" style="align-items: center">Notices:</h4>
                                    <marquee>
                                        <ul class="mb-0">
                                            <li class="p-3">{{ get_setting('branch_notice')->value ?? '' }}</a></li>

                                        </ul>
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                     @if(Auth::user()->role==1 || Auth::user()->role==2)
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info card__header">
                                <div class="inner">
                                    <h4>Profile</h4>
                                    <h4>Name : {{ $branch->name }}</h4>
                                    <p>Running Year : {{ $branch->created_at->format('F j, Y') }}
                                        ({{ $branch->created_at->diffForHumans() }})</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-android-person"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-sm-6 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success card__header">
                                <div class="inner">
                                    <h4>Nearby Admission Request:</h4>
                                    <h6>New : {{$nearequest->nearby}}</h6>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ number_format($student->total_std) }}</h3>
                                    <p>Total Student</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ number_format($register->total_register) }}</h3>
                                    <p>Registered Student </p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-id-card"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ number_format($certified->total_certified) }}</h3>

                                    <p>Certified Student</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                     @if(Auth::user()->role==1 || Auth::user()->role==2)
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <a href="" class="small-box bg-danger d-block">
                                <div class="inner">
                                    <h3>{{ $success_std_Count->success_std }}</h3>
                                    <p>Successfull Student</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-briefcase"></i>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ number_format($account_balance->balance) }}</h3>
                                    <p> Account Ballance</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-cash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ number_format($amount->payable_amount) }}</h3>
                                    <p>Payable Course Fee</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-cash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ number_format($collect_money->paid) }}</h3>
                                    <p>Collected Fees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-cash"></i>
                                </div>
                            </div>
                        </div>

                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <a href="" class="small-box bg-danger d-block">
                                <div class="inner">
                                    <h3>0</h3>

                                    <p>SMS</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-regular fa-message"></i>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                    </div>
                    @endif
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection