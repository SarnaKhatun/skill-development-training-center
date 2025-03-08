@extends('student.layouts.master')
@section('manage-student', 'menu-open')
@section('admission', 'active')

@section('main-content')
    <style>
        .student-profile .card {
            border-radius: 10px;
        }
        .student-profile .card .card-header .profile_img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 10px auto;
            border: 10px solid #ccc;
            border-radius: 50%;
        }
        .student-profile .card h3 {
            font-size: 20px;
            font-weight: 700;
        }
        .payment-box .card h3 {
            font-size: 20px;
            font-weight: 700;
        }
        .student-profile .card p {
            font-size: 16px;
            color: #000;
        }
        .student-profile .table th,
        .student-profile .table td {
            font-size: 14px;
            padding: 5px 10px;
            color: #000;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!--<div class="col-sm-6">-->
                    <!--    <h1>Payment</h1>-->
                    <!--</div>-->
                    <!--<div class="col-sm-6">-->
                    <!--    <ol class="breadcrumb float-sm-right">-->
                    <!--        <li class="breadcrumb-student"><a href="#">Dashboard</a></li>-->
                    <!--        <li class="breadcrumb-student active"> Payment</li>-->
                    <!--    </ol>-->
                    <!--</div>-->
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
                                <h3 class="card-title">Payment History</h3>
                            </div>
                            <!-- card-header -->
                            <div class="card-body">
                                <!-- Student Profile -->
                                <div class="student-profile py-4">
                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-transparent border-0">
                                                        <h3 class="mb-0 p-1" style="background-color:#5A66F1;color:white;text-align:center">Student Information</h3>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th width="30%">Name</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->name_en }}</td>
                                                            </tr>
                                                             <tr>
                                                                <th width="30%">Roll</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->student_roll }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Course Name</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->course->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Batch</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->batch->name }}</td>
                                                            </tr>
                                                           <!-- <tr>
                                                                <th width="30%">Admission Fee</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->admission_fee }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Discount</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->discount }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Payable Amount</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->payable_amount }}</td>
                                                            </tr>-->
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-transparent border-0">
                                                        <h3 class="mb-0 p-1" style="background-color:#5A66F1;color:white;text-align:center">Transaction History</h3>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th width="30%">Date</th>
                                                                <td width="30%" style="font-weight: bold">Amount</td>
                                                            </tr>
                                                            @foreach ($admissionPayment as $item)
                                                                <tr>
                                                                    <th width="30%" style="font-weight: 500">{{ $item->date }} </th>
                                                                    <td width="30%">{{ $item->amount }} BDT</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <th width="30%"></th>
                                                                <td width="30%" style="font-weight: 500">Paid :{{ $student->paid ?? '0.00'}} BDT</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%"></th>
                                                                <td width="30%" style="font-weight: 500" >Due : <span id="dueamount">{{ $student->due }}</span> BDT </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card-body -->
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
    $(document).on('keyup','#amount',function(){
        var value =$(this).val();
        var due = parseFloat($('#dueamount').text())
        payable = Math.min(value, due);
        $('#amount').val(payable) || 0;

    });
</script>
@endpush