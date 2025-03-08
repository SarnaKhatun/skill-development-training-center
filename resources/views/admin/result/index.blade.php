@extends('admin.layouts.master')
@section('manage-result', 'menu-open')
@section('result_index', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Result</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Result</li>
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
                                <h3 class="card-title">All Student Result</h3>
                                  <div class="row" style="justify-content: space-between">
                                    <div class="col-sm-3 col-6"></div>
                                    <div class="col-sm-3 col-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <input type="text" id="search"
                                                   placeholder='Search Here...'
                                                   class="form-control searchData custom_form_control"
                                                   aria-label="Sizing example input"
                                                   aria-describedby="inputGroup-sizing-sm">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                                    class="fa fa-search" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                             <div class="card-body showtable">
                                @include('admin.result.student')
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
        function updateDataTable() {
            const params = {
                searchData: $(".searchData").val(),
                page: $(".page-item.active .page-link").text(),
            };
            const url = "{{ route('admin.result.index') }}?" + $.param(params);

            $.get(url, function(response) {
                if (response) {
                    $(".showtable").html(response);
                    $('.pagination').html(response?.pagination);
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
    </script>
@endpush
