@extends('admin.layouts.master')
@section('manage-regirter', 'menu-open')
@section('regirter_history', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student list</li>
                        </ol>
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
                                <h3 class="card-title">All Registered Student</h3>
                                <div class="row" style="justify-content: space-between">
                                    <div class="col-sm-3 col-6"></div>
                                    <div class="col-sm-3 col-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <input type="text" id="search"
                                                   placeholder='Search Here...'
                                                   class="form-control searchData custom_form_control"
                                                   aria-label="Sizing example input"
                                                   aria-describedby="inputGroup-sizing-sm">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-search"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form id="dateChange" action="{{ route('admin.register.update_date') }}" method="get">
                                @csrf
                                <input type="hidden" name="ids" id="selectedIds">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex align-items-start pt-2 pl-2">
                                            <p>Exam Date Update</p>
                                            <input type="date" name="exam_date" id="exam_date"
                                                class="form-control custom_form" required>
                                            <button class="btn btn-primary" style="margin-left: 20px"
                                                id="admit_dateChange">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card-body showtable">

                                @include('admin.register.student')
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
            function bindCheckboxEvents() {
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
            };
            bindCheckboxEvents();

            function changedate() {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day}`;
                document.getElementById('exam_date').value = formattedDate;
            }
            changedate();

            function updateDataTable() {
                const params = {
                    searchData: $(".searchData").val(),
                    page: $(".page-item.active .page-link").text(),
                };
                const url = "{{ route('admin.register.index') }}?" + $.param(params);

                $.get(url, function(response) {
                    if (response) {
                        $(".showtable").html(response);
                        $('.pagination').html(response?.pagination);
                        bindCheckboxEvents();
                        changedate();
                    }
                });
            }
            // search change
            $(document).on("keyup", ".searchData", updateDataTable);


            // change page number
            $(document).on("click", ".pagination li a", function(e) {
                e.preventDefault();
                $(this).parent().addClass("active").siblings().removeClass("active");
                updateDataTable();
            });

            $(function() {
                $("#admit_dateChange").click(function(e) {
                    e.preventDefault();
                    var all_ids = [];
                    $('input:checkbox[name=ids]:checked').each(function() {
                        all_ids.push($(this).val());
                    });
                    $('#selectedIds').val(all_ids.join(','));
                    $('#dateChange').submit();
                    // $('input:checkbox[name=ids]').prop('checked', false);
                    // $('#selectedIds').val('');
                    /* setTimeout(function() {
                         location.reload();
                     },2000);*/
                });

            });
        });
    </script>
@endpush
