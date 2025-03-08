@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>course</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">course Details</li>
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
                                <h3 class="card-title">Course Details</h3>
                                    <a href="{{ route('admin.coursedetail.index') }}" class="btn btn_new_info float-right">
                                        <i class="fa fa-arrow-left"></i> Back <a>
                            </div>
                            <div class="card-body">
                                <div class="p-1 mb-2">
                                    <span>Course Name:</span>
                                    <strong>{{$coursedetail->course->name ?? ""}}</strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Lession Name:</span>
                                    <strong>{{$coursedetail->header_title ?? ""}}</strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Lession Title:</span>
                                    <strong>{{$coursedetail->title ?? ""}}</strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Lession Video:</span>
                                    <strong>
                                        @if ($coursedetail->type==1)
                                            @php
                                                // Convert the YouTube video URL to the embeddable format
                                                $embed_url = str_replace("watch?v=", "embed/", $coursedetail->url_video);
                                            @endphp
                                            <div class="">
                                                <iframe width="560" class="embed-responsive-item" height="315" src="{{ $embed_url }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        @elseif ($coursedetail->type==2)
                                            <video width="200" height="140" controls>
                                                <source src="{{ asset($coursedetail->upload_video) }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Priority:</span>
                                    <strong>{{$coursedetail->priority ?? ""}}</strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Date:</span>
                                    <strong>{{ date('d M Y',strtotime($coursedetail->created_at)) }}</strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Course PDF:</span><br>
                                    <strong>
                                        @if($coursedetail->pdf)
                                            <iframe  src="{{ asset($coursedetail->pdf) }}" width="35%" height="400px" alt="nothing found"></iframe>
                                        @endif
                                    </strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span>Description:</span>
                                    <strong>{!! $coursedetail->description !!}</strong>
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

@endpush
