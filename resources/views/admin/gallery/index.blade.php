@extends('admin.layouts.master')

@section('gallery', 'active')

@push('css')
    <style>
        .card-body.toggle__body {
            position: relative;
        }
        .nav-item.dropdown.toggle__dropdown {
            position: absolute;
            z-index: 999;
            right: 0;
        }
        .nav-item.dropdown.toggle__dropdown i {
            background: #656dc7bf;
            color: #fff;
            width: 30px;
            height: 30px;
            transition: all .5s ease;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
        }
        a.btn.btn-secondary.dropdown-toggle {
            background: #5a66f1;
            color: #fff;
            width: 30px;
            height: 30px;
            transition: all .5s ease;
            text-align: center;
            line-height: 0;
            border-radius: 50%;
            position: absolute;
            z-index: 99;
            margin-left: 90%;
            top: 10px;
        }
        .nav-item.dropdown.toggle__dropdown i:hover {
            background: #5a66f1;
        }
        .nav-item.dropdown.toggle__dropdown a.nav-link {
            padding-right: 12px;
            padding-top: 12px;
        }
        .pagination {
            justify-content: center;
            margin-top: 5px;
        }
        .dropdown-toggle::after {
            display:none
        }
    </style>
@endpush
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Galleries</li>
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
                                <h3 class="card-title">All User</h3>
                                <a href="javascript:void(0)" class="btn btn_new_info float-right" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i>
                                    Create
                                    <a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @if($galaries->isNotEmpty())
                        @foreach($galaries as $key=>$item)
                            <div class="col-md-2">
                                <div class="card-body toggle__body toggle__dropdown">
                                    <div class="dropdown toggle__dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ asset($item->path_name) }}" download="download">Download</a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="copyLink({{ $item->id }})">Copy link</a>
                                            <a class="dropdown-item  deleteButton" href="{{ route('admin.gallery.delete',$item->id) }}" >Delete</a>
                                        </div>
                                    </div>
                                    <div class="card p-2 mb-0" style="width: 15rem;">
                                        @if($item->path_name)
                                            <img src="{{ asset($item->path_name) }}" class="card-img-top"
                                                 alt="...">
                                        @else
                                            <img src="{{ asset('backend/images/no-image.png') }}" class="card-img-top"
                                                 alt="...">
                                        @endif
                                            <div class="card-body p-0 mt-2">
                                                <input type="hidden" id="link{{ $item->id }}" value="{{ asset($item->path_name) }}">
                                                <p class="card-text mb-0">{{ Str::limit(pathinfo($item->filename, PATHINFO_FILENAME), 20) }}.{{ pathinfo($item->filename, PATHINFO_EXTENSION) }}</p>
                                                <p class="card-text mt-0">    {{ is_numeric($item->file_size) ? round($item->file_size / 1024, 2) . " KB" : 'N/A' }}</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
               <div class="ml-5"> {{ $galaries->links() }}<div>
            </div>
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-content modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Upload Multiple Images (JPG, JPEG, PNG, .webp)</label>

                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data"
                          class="dropzone" id="myDragAndDropUploader">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    <script type="text/javascript">

        function copyLink(id){
            navigator.clipboard.writeText($('#link' + id).val());
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success('Link copied to clipboard');
        }
        var maxFilesizeVal = 12;
        var maxFilesVal = 12;

        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.myDragAndDropUploader = {
            paramName:"filename",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to "+maxFilesVal+" files.",
            maxfilesexceeded: function(filename) {
                this.removeFile(filename);
            },
            sending: function (file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function (filename, response) {
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.success('File Uploaded Successfully');
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            },
            error: function (filename, response) {
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.error('Sorry something went to wrong');
                return false;
            }
        };
    </script>
@endpush
