@extends('admin.layouts.master')
@section('manage-sms', 'menu-open')
@section('group_sms', 'active')

@section('main-content')

    <style>
        .custom_form {
            width: 300px !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="card p-2">
                            <div class="card-head">
                                <div class="text-center">
                                    <h5>Group Name : {{ ucfirst($group->name) }}</h5>
                                    <p>Total Member: {{ $group->total_member }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.smsgroup.member.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $group->id }}" name="group_id">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="">Name<small class="text-danger">*</small></label>
                                                <input type="text" name="name"
                                                    class="form-control custom_form_control" required>
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="">Phone<small class="text-danger">*</small></label>
                                                <input type="text" name="phone"
                                                    class="form-control custom_form_control" required>
                                                <span class="text-danger">
                                                    @error('phone')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-primary" style="margin-top:35px !important">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Message</h3>
                            </div>
                            <div class="card-body">
                                <form id="send_sms" action="{{ route('admin.message.group.send') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="ids" id="selectedIds">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="email">Message<small
                                                            class="text-danger">*</small></label>
                                                    <textarea name="message" id="" cols="30" rows="10" required class="form-control"
                                                        placeholder="Write message here ... ">{{ old('message') }}</textarea>
                                                    <span class="text-danger">
                                                        @error('message')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="send_message" style="margin-left:10px">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Group Member's</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select_all_ids"></th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th class="text-center">Created Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                        @foreach ($members as $key => $item)
                                            <tr id="order_ids{{ $item->id }}">
                                                <td><input type="checkbox" class="check_ids" name="ids"
                                                        value="{{ $item->id }}"></td>
                                                <td>{{ $item->name ?? '' }}</td>
                                                <td>{{ $item->phone ?? '' }} </td>
                                                <td>{{ date('d M Y', strtotime($item->created_at)) ?? '' }} </td>
                                                <td>
                                                    <a href="{{ route('admin.smsgroup.member.delete', $item->id) }}"
                                                        class=" btn-delete deleteButton" id="deleteButton">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
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
        $(function() {
            // Function to update "Select All" checkbox based on individual checkboxes
            function updateSelectAll() {
                var allChecked = $('.check_ids:checked').length === $('.check_ids').length;
                $('#select_all_ids').prop('checked', allChecked);
            }

            // Click event for individual checkboxes
            $('.check_ids').change(function() {
                updateSelectAll();
            });

            // Click event for "Select All" checkbox
            $('#select_all_ids').change(function() {
                $('.check_ids').prop('checked', $(this).prop('checked'));
            });
        });
    </script>

<script>
    $(function() {
        $("#send_message").click(function(e) {
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function() {
                all_ids.push($(this).val());
            });
            $('#selectedIds').val(all_ids.join(','));
            $('#send_sms').submit();
        });
    });
</script>
@endpush
