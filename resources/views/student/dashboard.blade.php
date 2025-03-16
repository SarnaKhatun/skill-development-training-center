@extends('student.layouts.master')
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
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            text-align: center;
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
                                <p style="color: #FFFF00">প্রযুক্তির সঠিক ব্যবহার নিশ্চিত করি, স্বনির্ভর বাংলাদেশ গড়ে তুলি।</p>
                                <p style="color: #fffffe">{{ get_setting('address')->value ?? 'N/A' }} , Phone
                                    :{{ get_setting('phone')->value ?? 'N/A' }}
                                    ,{{ get_setting('whats_up')->value ?? 'N/A' }}</p>
                                <p style="color: #fffffe">Website: <span><a href="{{ route('home') }}"
                                            style="text-decoration: none;color:#450080">sdtl.com.bd</a></span> , Email
                                    :{{ get_setting('email')->value ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-12">
                            <!-- small box -->
                            <div class="small-box bg-info card__header ">
                                <div class="inner text-center">
                                    <h4>{{ $student->name_en ?? ''}}</h4>
                                    <p>Roll : {{ $student->student_roll ?? ''}} , Reg : {{ $student->student_registration_no ?? ''}}</p>

                                </div>
                                <div class="icon">
                                    <i class="ion-android-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 class="text-center">{{ $student->due == 0 ? 'Thank You' : 'Pay Your Due, Please!'}} </h3>
                                </div>
                                <div class="icon">
                                    <i class="ion-cash"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 class="text-center">{{ $student->due == 0 ? 'Paid' : "Due = " .$student->due.'৳'  }} </h3>
                                </div>
                                <div class="icon">
                                    <i class="ion-cash"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $student->result->cgpa ?? 'Not Published' }}</h3>

                                    <p>Result</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
