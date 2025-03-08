@extends('admin.layouts.master')
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
                    <div class="col-sm-6">
                        <h1>Payment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-student"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-student active">Admission Payment</li>
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
                                <h3 class="card-title">Payment History & Money Receipt</h3>
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
                                                                <td>{{ $student->name_en ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Phone Number</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->phone ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Gurdian Number</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->gurdian_phone ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Course Name</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->course->name ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Batch</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->batch->name ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Admission Fee</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->admission_fee ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Discount</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->discount ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th width="30%">Payable Amount</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->payable_amount ?? ''}}</td>
                                                            </tr>
                                                             <tr>
                                                                <th width="30%">Address</th>
                                                                <td width="2%">:</td>
                                                                <td>{{ $student->present_address ?? ''}}</td>
                                                            </tr>
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
                                <div class="payment-box">
                                    <div class="col-lg-12">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent border-0">
                                                <h3 class="mb-0 p-1" style="background-color:#5A66F1;color:white;text-align:center">Add Payment</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th width="30%">Date</th>
                                                        <td width="30%" style="font-weight: bold">Amount</td>
                                                        <td width="30%" style="font-weight: bold">Collect</td>
                                                    </tr>
                                                    <tr>
                                                        <form action="{{ route('admin.admissionPayment.store') }}" method="post">
                                                          @csrf
                                                          <input type="hidden"  name="student_id" value="{{ $student->id }}">
                                                            <th width="30%"><input type="date" required class="form-control" name="date" id=""> </th>
                                                            <td width="30%"><input type="text" required class="form-control" name="amount" id="amount" oninput="this.value=this.value.replace(/[^0-9]/g,'')"></td>
                                                            <td width="30%"><button class="btn btn-primary" type="submit" style="background-color: #5A66F1">Collect fee</button></td>
                                                        </form>
                                                    </tr>
                                                </table>
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