@extends('student.layouts.master')
@section('manage-message', 'menu-open')
@section('message', 'active')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student list</li>
                    </ol> --}}
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
                            <h3 class="card-title">All Messages</h3>
                            {{-- <a href="{{ route('admin.student.create') }}" class="btn btn_new_info float-right">
                                <i class="fa fa-plus"></i>
                                Create
                                <a> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($messages->isNotEmpty())
                                        @foreach ($messages as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <b>{{ $item->message ?? '' }}</b>
                                                </td>
                                                <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
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
<script>
    $(document).ready(function() {
            $('.status').on('switchChange.bootstrapSwitch', function(event, state) {
                var staffId = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.branch.statusChange') }}" + '/' + staffId,
                    data: {
                        id: staffId,
                        // status: state ? 1 : 0,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
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
</script>
@endpush
