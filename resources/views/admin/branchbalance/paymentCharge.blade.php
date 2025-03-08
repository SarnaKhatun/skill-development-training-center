@extends('admin.layouts.master')
@section('manage-balance', 'menu-open')
@section('charge', 'active')
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payment Charges</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment Charges</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="card p-5">
                            <div class="card-header">
                                <h3 class="card-title">Payment Charges</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-4">
                                <table id="" class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Method</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($paymentmethods->isNotEmpty())
                                            @foreach ($paymentmethods as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->method ?? '' }}</td>
                                                    <td>{{ $item->percentage ?? '' }}</td>
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
