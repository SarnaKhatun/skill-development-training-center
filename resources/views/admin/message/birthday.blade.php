@extends('admin.layouts.master')
@section('manage-sms', 'menu-open')
@section('birthday_sms', 'active')

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
                        <h1>Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Message</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Today Birthday</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select_all_ids"></th>
                                            <th class="text-center">Image</th>
                                            <th>Name</th>
                                            <th>Roll /Reg</th>
                                            <th>Course</th>
                                            <th>Session</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($students->isNotEmpty())
                                            @foreach ($students as $key => $item)
                                                <tr id="order_ids{{ $item->id }}">
                                                    <td><input type="checkbox" class="check_ids" name="ids"
                                                            value="{{ $item->id }}"></td>
                                                    <td class="text-center">
                                                        @if ($item->image)
                                                            <img src="{{ asset($item->image) }}" class="custom-img-style"
                                                                alt="No Image">
                                                        @else
                                                            <img src="{{ asset('backend/images/no-image.png') }}"
                                                                class="custom-img-style" alt="No Image">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->name_en ?? '' }}
                                                    </td>
                                                    <td>
                                                        roll: {{ $item->student_roll ?? '' }} <br>
                                                        reg : {{ $item->student_registration_no ?? '' }}
                                                    </td>
                                                    <td>{{ $item->course->name ?? '' }}
                                                    <td>{{ $item->session->name ?? '' }}
                                                    </td>
                                                    <td> {{ $item->cgpa }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Message</h3>
                            </div>
                            <div class="card-body">
                                <form id="send_sms" action="{{ route('admin.message.birthday.send') }}"
                                        method="post">
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
                                        <button class="btn btn-primary" style="margin-left: 20px"
                                            id="bday_send">Send</button>
                                </div>
                            </form>
                            </div>
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
            $("#bday_send").click(function(e) {
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
