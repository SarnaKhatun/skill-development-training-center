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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Running Batch</h3>
                                <a href="{{ route('admin.batch.create') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i>
                                    Create
                                    <a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="example1">
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
                                            @foreach ($batches->where('status', 1) as $key => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name ?? '' }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                        - {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</td>
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
                                                            <a href="{{ route('admin.batch.statusChange', $item->id) }}"
                                                                class="btn-green clg-batch">
                                                                <i class="fa-solid fa-school-lock"></i>
                                                            </a>
                                                            <a href="{{ route('admin.batch.delete', $item->id) }}"
                                                                class=" btn-delete deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
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
    {{-- <script>
        $(document).ready(function(){
            $('.status').on('switchChange.bootstrapSwitch', function (event, state) {
                var staffId = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "",
                    data: {
                        id: staffId,
                        // status: state ? 1 : 0,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.success('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.error('Sorry something went to wrong');
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).on('click', '.clg-batch', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure To Close Batch?',
                text: "Close This Batch!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Closed!',
                        'This Batch has been Closed.',
                        'success'
                    )
                }
            });
        });
    </script>
@endpush