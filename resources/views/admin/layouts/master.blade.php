<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @php
        $fav_icon = get_setting('fav_icon')->value;
    @endphp
  <link rel="icon" type="image/x-icon" href="{{ asset($fav_icon) }}">
    @include('admin.layouts.partial.styles')

    @stack('css')
    <style>
        .btn_new_info {
            background-color: #5A66F1;
            color: #FFFFFF;
            width: 8%;
            padding: 8px;
        }
        .btn_new_black {
            background-color: #000000;
            color: #FFFFFF;
            width: 8%;
            padding: 8px;
        }

        .btn:hover {
            color: #FFFFFF !important;
            text-decoration: none;
            /* Remove underline on hover */
        }

        /* Override hover styles for links */
        a:hover {
            color: #your_color_here;
            /* New color for text on hover */
            text-decoration: none;
            /* Remove underline on hover */
        }

        .page-item.active .page-link {

            background-color: #5A66F1 !important;
            border-color: #5A66F1 !important;
        }

        .navbar-expand .navbar-nav .dropdown-menu {
            padding: 12px !important;
            border-radius: 7px !important;
            border: 1px solid #5A66F1 !important;
        }

        .bg_info {
            background-color: #EEEFFE;
            color: #98C3FE;
            padding: 8px;
            width: 80px;
            border-radius: 20px;
        }

        .bg_warning {
            background-color: #FEF9C3;
            color: #B0B8A6;
            padding: 8px;
            width: 80px;
            border-radius: 20px;
        }

        .bg_success {
            background-color: #DCFCE7;
            color: #167DA1;
            padding: 8px;
            width: 80px;
            border-radius: 20px;
        }

        .bg_danger {
            background-color: #FEE2E2;
            color: #A98DA2;
            padding: 8px;
            width: 80px;
            border-radius: 20px;
        }

        .action-btn {
            display: inline-flex;
            gap: 10px;
        }

        .btn-edit {
            background: #eab3081a;
            color: #eab308;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: auto;
            transition-duration: 300ms;
            display: flex;
            align-items: center;
        }

        .btn-edit:hover {
            background: #eab308;
            color: #fff;

        }

        .btn-view {
            background: #60a5fa1a;
            color: #60a5fa;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: auto;
            transition-duration: 300ms;
            display: flex;
            align-items: center;
        }

        .btn-view:hover {
            background: #60a5fa;
            color: #fff;
        }
        
         .btn-purple {
            background: #c460fa33;
            color: #b14cfe;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: auto;
            transition-duration: 300ms;
            display: flex;
            align-items: center;
        }

        .btn-purple:hover {
            background: #b760fa;
            color: #fff;
        }
        .btn-green {
            background: #60faaf52;
            color: #02972f;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: auto;
            transition-duration: 300ms;
            display: flex;
            align-items: center;
        }

        .btn-green:hover {
            background: #02972f;
            color: #fff;
        }

        .btn-delete {
            background: #f43f5e1a;
            color: #f43f5e;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: auto;
            transition-duration: 300ms;
            display: flex;
            align-items: center;
        }

        .btn-delete:hover {
            background: #f43f5e;
            color: #fff;
        }

        /*    icon style*/
        .fa.fa-edit {
            font-size: 0.8125rem !important;
        }

        .fa.fa-eye {
            font-size: 0.8125rem !important;
        }

        .fa.fa-trash {
            font-size: 0.8125rem !important;
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-success,
        .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-success {
            background: #5A66F1 !important;
            color: #fff;
        }

        .custom_form_control {
            height: 50px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 90% !important;
        }

        .select2-container--default .select2-selection--single {
            height: 50px !important;
        }

        .custom-file-label {
            padding-top: 9px !important;
        }

        .custom-file-label::after {
            height: 100% !important;
            padding-top: 10px !important;
        }

        .custom-control-label::before,
        .custom-file-label,
        .custom-select {
            height: 50px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CED4DA !important;
        }

        .btn_sub_info {
            background-color: #5A66F1;
            color: #FFFFFF;
            width: 25%;
            margin-top: 15px;
            padding: 10px;
            margin-bottom: 50px !important;
        }

        .custom-img {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 2px;
            width: 150px;
            margin-top: 10px;
        }

        #toast-container>.toast-success {

            background-color: #5A66F1;
        }

        .custom-img-style {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 2px;
            width: 75px;
            height: 65px;
        }
        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header{
            height: auto !important;
        }


.dropdown-menu.show {position: absolute;left: 50% !important;transform: translateX(-50%);}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{--    <div class="preloader flex-column justify-content-center align-items-center"> --}}
        {{--        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
        {{--    </div> --}}

        <!-- Navbar -->
        @include('admin.layouts.partial.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <!-- Sidebar -->
             @if(Auth::guard('admin')->user()->role == 3)
                @include('admin.layouts.partial.teacher_sidebar')
            @else
               @include('admin.layouts.partial.sidebar')
            @endif
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('main-content')
        <!-- /.content-wrapper -->
        @include('admin.layouts.partial.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.layouts.partial.scripts')

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        });
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    @if (Session::has('success'))
        <script>
            toastr.options = {
                'progressBar': true,
                'closeButton': true,
                'positionClass': 'toast-bottom-right', // Set position to bottom-right
                'preventDuplicates': true, // Prevent duplicate toasts
            };
            toastr.success("{{ Session::get('success') }}", 'Success!', {
                timeout: 120000
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.options = {
                'progressBar': true,
                'closeButton': true,
                'positionClass': 'toast-bottom-right',
            }
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.options = {
                        'progressBar': true,
                        'closeButton': true,
                        'positionClass': 'toast-bottom-right',
                    }
                    toastr.error('{{ $error }}');
                @endforeach
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteButton', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });
    </script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    @stack('js')
</body>

</html>