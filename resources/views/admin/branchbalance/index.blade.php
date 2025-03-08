@extends('admin.layouts.master')
@section('manage-balance', 'menu-open')
@section('balance_index', 'active')
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Recharge History</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Recharge History</li>
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
                                <h3 class="card-title">Recharge History</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Amount</th>
                                            <th>Charge</th>
                                            <th>Net Amount</th>
                                            <th>Method</th>
                                            <th>Mobile Number/Check Number</th>
                                            @if(Auth::guard('admin')->user()->role == '1')
                                              <th> Branch Code</th>
                                            @endif
                                            <th>Payment Date</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ballance->isNotEmpty())
                                            @foreach ($ballance as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->amount ?? '' }}</td>
                                                    <td>{{ $item->charge ?? '' }}</td>
                                                    <td>{{ $item->received_amount ?? '' }}</td>
                                                    <td>{{ $item->method->method ?? '' }}</td>
                                                    <td>{{ $item->trx ?? 'N/A' }}</td>
                                                    @if(Auth::guard('admin')->user()->role == '1')
                                                       <td> {{ $item->branch->center_code }}</td>
                                                    @endif
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        @if(Auth::guard('admin')->user()->role == '1')
                                                           @if($item->status==1 )
                                                               <button class="badge bg-success">Approved</button>
                                                            @else
                                                               <a href="{{ route('admin.branchbalance.status',$item->id) }}" class="badge bg-warning">Pending</a>
                                                            @endif
                                                        @else
                                                           @if($item->status==0 )
                                                             <button class="badge bg-warning">Pending</button>
                                                           @else
                                                            <button class="badge bg-success">Approved</button>
                                                           @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
