@extends('admin.layouts.master')
@section('manage-regirter', 'menu-open')
@section('regirter_add', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Registration</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Registration</li>
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
                                <h3 class="card-title"> Student Registration</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    $admin=Auth::guard('admin')->user()->branch_id==1;
                                    $branch_id=Auth::guard('admin')->user()->branch_id;
                                    $branch=App\Models\Branch::where('id',$branch_id)->first();
                                @endphp
                                @if(!$admin)
                                   <h6>Your Current Ballance:{{ $branch->registration_balance }} </h6>
                                @endif
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex align-items-start pt-2 pl-2">
                                            <p>Exam Date</p>
                                            <input type="date" name="exam_date" id="exam_date"
                                                class="form-control custom_form" required>
                                            <button class="btn btn-primary ml-2" id="register">Register</button>
                                        </div>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select_all_ids"></th>
                                            <th>Sl</th>
                                            <th class="text-center">Image</th>
                                            <th>Name,Parents</th>
                                            <th>Course</th>
                                            <th>Contact</th>
                                            <th>Fee</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($students->isNotEmpty())
                                            @foreach($students as $key=>$item)
                                                <tr id="order_ids{{$item->id}}">
                                                    <td><input type="checkbox" class="check_ids" name="ids" value="{{$item->id}}"></td>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        @if($item->image)
                                                            <img  src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                                                        @else
                                                            <img  src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>{{ $item->name_en ?? "" }}</b><br>
                                                        Father:{{ $item->fathers_name ?? "" }}<br>
                                                        Mother:{{ $item->mothers_name ?? "" }}
                                                    </td>
                                                    <td><b>{{ $item->course->name ?? "" }}</b><br>
                                                        Session:{{ $item->session->name?? "" }} <br>
                                                        Admission:{{ $item->admission_date?? "" }} <br>
                                                     </td>
                                                    <td> {{ $item->phone }}</td>
                                                    <td> {{ $item->course->admin_fee }}</td>
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
     $(function(e) {
        $("#register").click(function(e) {
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function() {
                all_ids.push($(this).val());
            });
            exam_date=$('#exam_date').val();
            $.ajax({
                url: "{{ route('admin.register.store') }}",
                type: "GET",
                data: {
                    ids: all_ids,
                    exam_date:exam_date,
                    _token: "{{csrf_token()}}"
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success, 'Success');
                        location.reload();
                    } else if (response.error) {
                        toastr.error(response.error, 'Error');
                    }
                }
            });
        });
    });
</script>
 <script>
    function changedate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('exam_date').value = formattedDate;
    }
    changedate();
</script>
@endpush