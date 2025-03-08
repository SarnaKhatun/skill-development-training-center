@extends('student.layouts.master')
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
                    <div class="col-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$detail->course->name ?? ""}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="p-1 mb-2">
                                    <strong>
                                        @if ($detail->type==1)
                                            @php
                                                // Convert the YouTube video URL to the embeddable format
                                                $embed_url = str_replace("watch?v=", "embed/", $detail->url_video);
                                            @endphp
                                            <div class="">
                                                <iframe width="1300" class="embed-responsive-item" height="600" src="{{ $embed_url }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        @elseif ($detail->type==2)
                                            <video width="1300" height="500" controls>
                                                <source src="{{ asset($detail->upload_video) }}" type="video/mp4">
                                            </video>
                                        @endif
                                    </strong>
                                </div>
                                <div class="p-1 mb-2">
                                    <span> {{$detail->header_title ?? ""}} : </span> <strong> {{$detail->title ?? ""}}</strong>
                                </div>

                                <div class="p-1 mb-2">
                                    <span>Description:</span>
                                    <strong>{!! $detail->description !!}</strong>
                                </div>

                                <div class="p-1 mb-2">
                                    <span>Document:</span><br>
                                    <strong>
                                        @if($detail->pdf)
                                            <iframe  src="{{ asset($detail->pdf) }}" width="100%" height="600px" alt="nothing found"></iframe>
                                        @endif
                                    </strong>
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
