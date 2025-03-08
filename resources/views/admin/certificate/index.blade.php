@extends('admin.layouts.master')
@section('manage-certificate', 'menu-open')
@section('certificate_index', 'active')
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Certificate</li>
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
                                <h3 class="card-title">Certificate Delivery History</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Total Certificate</th>
                                            <th>Courier Details</th>
                                            <th>Request Date</th>
                                            @if (Auth::guard('admin')->user()->role == '1')
                                                <th> Branch Code</th>
                                            @endif
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($certificates->isNotEmpty())
                                            @foreach ($certificates as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->total_student ?? '' }}</td>
                                                    <td>{{ $item->courier_address ?? '' }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    @if (Auth::guard('admin')->user()->role == '1')
                                                        <td> {{ $item->branch->center_code }}</td>
                                                    @endif
                                                    <td class="text-center">
                                                        @if (Auth::guard('admin')->user()->role == '1')
                                                            @if ($item->status == 1)
                                                                <button class="badge bg-success">Approved</button>
                                                            @else
                                                                <a href="{{ route('admin.certificate.status', $item->id) }}"
                                                                    class="badge bg-warning">Pending</a>
                                                            @endif
                                                        @else
                                                            @if ($item->status == 0)
                                                                <button class="badge bg-warning">Pending</button>
                                                            @else
                                                                <button class="badge bg-success">Approved</button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a data-toggle="modal"
                                                                data-target="#exampleModal{{ $item->id }}"
                                                                class=" btn-view">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Details Show</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><b>Message</b></p>
                                                                    <p>{{ $item->message ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
