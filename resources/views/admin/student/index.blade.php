@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('admission', 'active')

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
                                {{-- <a href="{{ route('admin.student.create') }}" class="btn btn_new_info float-right">
                                <i class="fa fa-plus"></i>
                                Create
                                <a> --}}
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
                                @include('admin.student.student')
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
        $(document).on('click', '.certified', function() {
            //var id = $('.resultId').val();
            var clickedElement = $(this);
            var id = $(this).data('certi_id');
            Swal.fire({
                title: 'Are You Sure This Student is Certified?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    //window.location.href = link
                    $.ajax({
                        type: "get",
                        url: "{{ route('admin.student.certified') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr.success('Student Certification Accomplished');
                            clickedElement.css("color", "rgb(229, 144, 6)");

                            // location.reload();
                        },
                        error: function(xhr, status, error) {
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr.error('Sorry something went to wrong');
                        }
                    });
                }
            });
        })
    </script>
{{--    <script>--}}
{{--    //pagination--}}
{{--        $(document).on('click', '.pagination a', function(event) {--}}
{{--            event.preventDefault();--}}
{{--            var page = $(this).attr('href').split('page=')[1];--}}
{{--            var condition = "students";--}}
{{--            var search = $('#data_search').val();--}}
{{--            fetch_data(page, condition,search);--}}
{{--        });--}}

{{--        function fetch_data(page, condition,search) {--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('admin.data.pagination') }}",--}}
{{--                data: {--}}
{{--                    page: page,--}}
{{--                    condition: condition,--}}
{{--                    search: search--}}
{{--                },--}}
{{--                success: function(data) {--}}
{{--                    $('.data_pagination').html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        //product search--}}
{{--        $(document).on('keyup', '#data_search', function() {--}}
{{--            var search = $(this).val();--}}
{{--            if (search.length > 1) {--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('admin.data.search') }}",--}}
{{--                    method: "get",--}}
{{--                    data: {--}}
{{--                        search: search,--}}
{{--                        type: 'students',--}}
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
{{--                    url: "{{ route('admin.data.search') }}",--}}
{{--                    method: "get",--}}
{{--                    data: {--}}
{{--                        search: search,--}}
{{--                        type: 'students',--}}
{{--                    },--}}
{{--                    success: function(response) {--}}
{{--                        if (response) {--}}
{{--                            $(".data_pagination").html(response);--}}
{{--                        }--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--        });--}}
{{--</script>--}}


    <script>
        function updateDataTable() {
            const params = {
                searchData: $(".searchData").val(),
                page: $(".page-item.active .page-link").text(),
            };
            const url = "{{ route('admin.student.index') }}?" + $.param(params);

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
