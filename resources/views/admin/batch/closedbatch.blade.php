@extends('admin.layouts.master')
@section('manage-batch', 'menu-open')
@section('batch', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>batch</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        {{-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Batch</li>
                        </ol> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Closed Batch</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th class="text-center">Secdule</th>
                                            <th class="text-center">Days</th>
                                            <th>Branch</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($batches->isNotEmpty())
                                            @foreach ($batches as $key => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name ?? '' }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                        - {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                                                    </td>
                                                    <td>{{ $item->weekdays }}</td>
                                                    <td>
                                                        {{ $item->branch->center_code }}
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    {{-- <td class="text-center">
                                                    <div class="card-body">
                                                        <input type="checkbox" id="status_{{ $item->id }}" name="status" data-id="{{ $item->id }}" class="status" {{ $item->status ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                                    </div>
                                                </td> --}}
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.batch.edit', $item->id) }}"
                                                                class="btn-edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            {{-- <a href="{{ route('admin.batch.delete',$item->id) }}" class=" btn-delete deleteButton" >
                                                            <i class="fa fa-trash"></i>
                                                        </a> --}}
                                                            <a href="{{ route('admin.batch.download.student.batch', $item->id) }}"
                                                                class=" btn-view">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
