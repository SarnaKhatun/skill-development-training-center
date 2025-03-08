@extends('admin.layouts.master')
@section('manage-certificate', 'menu-open')
@section('certificate_search', 'active')

@section('main-content')
<style>
    .custom_form{
        width:300px !important;
    }
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Certificate</li>
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
                                <h3 class="card-title"> Certificate Download</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <input type="hidden" value="{{ $branch_id }}" id="branch_id">

                                <div class="row" style="justify-content: space-between">
                                    <div class="col-sm-3 col-6">
                                        <form id="downloadForm" action="{{ route('admin.certificate.download') }}" method="get">
                                            @csrf
                                            <input type="hidden" name="ids" id="selectedIds">
                                            <div class="d-flex align-items-start">
                                                <input type="date" name="issue_date" id="issue_date"
                                                    class="form-control custom_form" required>
                                                <button class="btn btn-primary" style="margin-left: 20px"
                                                    id="certificate_download">Download</button>
                                            </div>
                                        </form>
                                    </div>
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
                                <div class="showtable">
                                    @include('admin.certificate.studenttable')
                                </div>

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
        }
        bindCheckboxEvents();

        function updateDataTable() {
            const params = {
                searchData: $(".searchData").val(),
                branch_id:$('#branch_id').val(),
                page: $(".page-item.active .page-link").text(),
            };
            const url = "{{ route('admin.certificate.branch.student') }}?" + $.param(params);

            $.get(url, function(response) {
                if (response) {
                    $(".showtable").html(response);
                    $('.pagination').html(response?.pagination);
                    bindCheckboxEvents();
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
    <script>
        /*  $(function(e) {
                    $("#certificate_download").click(function(e) {
                        e.preventDefault();
                        var all_ids = [];
                        $('input:checkbox[name=ids]:checked').each(function() {
                            all_ids.push($(this).val());
                        });
                        $.ajax({
                            url: "{{ route('admin.certificate.download') }}",
                            type: "GET",
                            data: {
                                ids: all_ids,
                                _token: "{{ csrf_token() }}"
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
                });*/
        /*  $(function() {
              $("#certificate_download").click(function(e) {
                  e.preventDefault();
                  var all_ids = [];
                  $('input:checkbox[name=ids]:checked').each(function() {
                      all_ids.push($(this).val());
                  });
                  $.ajax({
                      url: "{{ route('admin.certificate.download') }}",
                      type: "GET",
                      data: {
                          ids: all_ids,
                          _token: "{{ csrf_token() }}"
                      },
                      success: function(response) {
                          if (response.success) {
                              toastr.success(response.success, 'Success');
                              // Since the file is downloaded, no need to reload the page
                          } else if (response.error) {
                              toastr.error(response.error, 'Error');
                          }
                      }
                  });
              });
          });*/
        $(function() {
            $("#certificate_download").click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });
                $('#selectedIds').val(all_ids.join(','));
                $('#downloadForm').submit();
                /* setTimeout(function() {
                     location.reload();
                 },2000);*/
            });
        });
    </script>

    <script>
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('issue_date').value = formattedDate;
</script>
{{-- <script>--}}
{{--        $(document).on('click', '.pagination a', function(event) {--}}
{{--            event.preventDefault();--}}
{{--            var page = $(this).attr('href').split('page=')[1];--}}
{{--            var branch_id = $('#branch_id').val();--}}
{{--            var search = $('#data_search').val();--}}
{{--            fetch_data(page, branch_id, search);--}}
{{--        });--}}

{{--        function fetch_data(page, branch_id, search) {--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('admin.certificate.pagination') }}",--}}
{{--                data: {--}}
{{--                    page: page,--}}
{{--                    branch_id: branch_id,--}}
{{--                    search: search,--}}
{{--                },--}}
{{--                success: function(data) {--}}
{{--                    $('.data_pagination').html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        //product search--}}
{{--        $(document).on('keyup', '#data_search', function() {--}}
{{--            var search = $(this).val();--}}
{{--            var branch_id = $('#branch_id').val();--}}
{{--            if (search.length > 1) {--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('admin.certificate.search') }}",--}}
{{--                    method: "get",--}}
{{--                    data: {--}}
{{--                        search: search,--}}
{{--                        branch_id:branch_id,--}}
{{--                    },--}}
{{--                    success: function(response) {--}}
{{--                        if (response) {--}}
{{--                            $(".data_pagination").html(response);--}}
{{--                        } else {--}}
{{--                            $('#empty_msg').html(--}}
{{--                                ` <div class="text-center">Product Not Found</div>  `--}}
{{--                            );--}}
{{--                        }--}}
{{--                    }--}}
{{--                })--}}
{{--            } else {--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('admin.certificate.search') }}",--}}
{{--                    method: "get",--}}
{{--                    data: {--}}
{{--                        search: search,--}}
{{--                        branch_id:branch_id,--}}
{{--                    },--}}
{{--                    success: function(response) {--}}
{{--                        if (response) {--}}
{{--                            $(".data_pagination").html(response);--}}
{{--                        }--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endpush
