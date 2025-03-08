@extends('admin.layouts.master')
@section('manage-result', 'menu-open')
@section('result_create', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Result Create</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Result Create</li>
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
                                <h3 class="card-title">All Student</h3>
                                <a href="{{ route('admin.result.batch.search') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-plus"></i>
                                    Back
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.result.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                  <label for="">Result Publish Date<small class="text-danger">*</small></label>
                                                <input type="date" name="result_date" id="result_date"
                                                    class="form-control custom_form" required>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Roll /Reg</th>
                                                <th class="text-center">Image</th>
                                                <th>Name,Parents</th>
                                                <th>Course</th>
                                                <th>Contact</th>
                                                <th class="text-center">Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($students->isNotEmpty())
                                                @foreach ($students as $key => $item)
                                                    <tr>
                                                        <td>Roll - {{ $item->student_roll }} <br> Reg -
                                                            {{ $item->student_registration_no }}</td>
                                                        <td class="text-center">
                                                            @if ($item->image)
                                                                <img src="{{ asset($item->image) }}"
                                                                    class="custom-img-style" alt="No Image">
                                                            @else
                                                                <img src="{{ asset('backend/images/no-image.png') }}"
                                                                    class="custom-img-style" alt="No Image">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>{{ $item->name_en ?? '' }}</b><br>
                                                            Father:{{ $item->fathers_name ?? '' }}<br>
                                                            Mother:{{ $item->mothers_name ?? '' }}
                                                        </td>
                                                        <td><b>{{ $item->course->name ?? '' }}</b><br>
                                                            Session:{{ $item->session->name ?? '' }} <br>
                                                            Admission:{{ $item->admission_date ?? '' }} <br>
                                                            Result Published:{{ $item->result->date ?? '' }}
                                                        </td>
                                                        <td> {{ $item->phone }}</td>
                                                        <td class="text-center">
                                                            <span class="action-btn">
                                                                @if ($item->result)
                                                                    {{ $item->result->cgpa ?? '' }}
                                                                @else
                                                                    <input type="hidden" name="student_id[]"
                                                                        value="{{ $item->id }}">
                                                                    <select name="cgpa[]"  class="form-control ">
                                                                        <option value="">Select CGPA
                                                                        </option>
                                                                        <option value="A+"> A+ </option>
                                                                        <option value="A"> A </option>
                                                                        <option value="B"> B </option>
                                                                        <option value="C"> C </option>
                                                                        <option value="D"> D </option>
                                                                        <option value="E"> E </option>
                                                                        <option value="F"> F </option>
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        @error('priority')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">submit</button>
                                    </div>
                                </form>
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
                    url: "",
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

    <script>
        // Get today's date
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(today.getDate()).padStart(2, '0');

        // Format date as YYYY-MM-DD
        const formattedDate = `${year}-${month}-${day}`;

        // Set the value of the date input to today's date
        document.getElementById('result_date').value = formattedDate;
    </script>
@endpush