@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('mcq-result', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Students' MCQ Results</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student MCQ Result</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Students' MCQ Exam Results</h3>
                                <div class="row" style="justify-content: space-between">
                                    <div class="col-sm-3 col-6 offset-md-2">
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
                                    <div class="col-md-2 mt-2">
                                        <div class="custom_select">
                                            <input type="text" id="reportrange" class="form-control datevalues" name="date_range"
                                                   placeholder="Filter by date" data-format="DD-MM-Y" value="{{ $date_range }}"
                                                   data-separator=" - " autocomplete="off" style="margin-left: 180px;">
                                            <input type="hidden" id="dateadd" class="form-control dateadd" name="dateadd"
                                                   data-format="DD-MM-Y" value="{{ $date_range }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <button class="btn btn-primary datefilter">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body showtable">
                                @include('admin.exam.mcq.result_list_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#reportrange').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            });
        });
    </script>
    <script>
        function updateDataTable() {
            const params = {
                searchData: $(".searchData").val(),
                date_range: $(".dateadd").val(),
                page: $(".page-item.active .page-link").text(),
            };
            const url = "{{ route('admin.mcq.result.list') }}?" + $.param(params);

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

        $(document).on("click", ".datefilter", function(e) {

            var datevalue = $(".datevalues").val();
            $(".dateadd").val(datevalue);
            updateDataTable();

        });


    </script>
@endpush
