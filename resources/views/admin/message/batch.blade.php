@extends('admin.layouts.master')
@section('manage-sms', 'menu-open')
@section('batch_sms', 'active')

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
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Message</h3>
                            </div>
                            <div class="card-body">
                                <form id="send_sms" action="{{ route('admin.message.batch.send') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="institute_division">Course<small
                                                        class="text-danger">*</small></label>
                                                <select name="course_id" id="course_id"
                                                    class="form-control custom_form_control">
                                                    <option>Select One</option>
                                                    @foreach ($courses as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="institute_division">Session<small
                                                        class="text-danger">*</small></label>
                                                <select name="session_id" id="session_id"
                                                    class="form-control custom_form_control">
                                                    <option>Select One</option>
                                                    @foreach ($sessions as $item)
                                                        <option value="{{ $item->id }}">
                                                             {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Year<small class="text-danger">*</small></label>
                                                <select name="year" id="select_year" required
                                                    class="form-control custom_form_control">
                                                    <option>Select One</option>
                                                    @foreach (generateYearList() as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('year')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
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
                    <div class="col-7">
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
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Session</th>
                                            <th class="text-center">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">



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
            $("#bday_send").click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });
               var hi= $('#selectedIds').val(all_ids.join(','));
               console.log(hi);
                $('#send_sms').submit();
            });
        });
    </script>
    <script>
        $(document).on('change', '#course_id', function() {
            console.log('hi liza');
            var course_id = $(this).val();
            console.log(course_id);
            var session_id = $('#session_id').val();
            var year = $('#select_year').val();
            if (course_id) {
                $.ajax({
                    url:"{{ route('admin.message.student.select') }}", // Ensure this generates a correct URL string
                    type: "get",
                    data: {
                        course_id: course_id,
                        session_id: session_id,
                        year:year
                    },
                    success: function(result) {
                        if (result) {
                            $("#tbody").html(result);
                        } else {
                            $('#tbody').html('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            }
        });
        $(document).on('change', '#session_id', function() {
            var session_id = $(this).val();
            var course_id = $('#course_id').val();
            var year = $('#select_year').val();
            if (session_id) {
                $.ajax({
                    url:"{{ route('admin.message.student.select') }}", // Ensure this generates a correct URL string
                    type: "get",
                    data: {
                        course_id: course_id,
                        session_id: session_id,
                        year:year
                    },
                    success: function(result) {
                        if (result) {
                            $("#tbody").html(result);
                        } else {
                            $('#tbody').html('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            }
        });
          $(document).on('change', '#select_year', function() {
            var year = $(this).val();
            var course_id = $('#course_id').val();
            var session_id = $('#session_id').val();
            if (session_id) {
                $.ajax({
                    url:"{{ route('admin.message.student.select') }}", // Ensure this generates a correct URL string
                    type: "get",
                    data: {
                        course_id: course_id,
                        session_id: session_id,
                        year:year
                    },
                    success: function(result) {
                        if (result) {
                            $("#tbody").html(result);
                        } else {
                            $('#tbody').html('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            }
        });
    </script>
@endpush